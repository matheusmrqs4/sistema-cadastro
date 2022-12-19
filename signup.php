<?php

require 'connection.php';

if (isset($_POST['submit'])) {
    $name = $mysqli->real_escape_string($_POST['nome']);
    if ($email = $mysqli->real_escape_string(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
    } else {
        echo "E-mail inválido, insira um e-mail válido" . "<a href='signup.php'>Voltar</a>";
        return false;
    }
    $password = $mysqli->real_escape_string($_POST['senha']);
    $confPassword = $mysqli->real_escape_string($_POST['confSenha']);

    if ($password == $confPassword) {
        $result = $mysqli->query("SELECT * FROM user WHERE email = '$email' ");
        $count = $result->num_rows;

        if ($count === 0) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $mysqli->query("INSERT INTO user (nome, email, senha)
            VALUES ('$name', '$email', '$hash')");

            header('Location: login.php');
            exit;
        } else {
            echo "E-mail já cadastrado!";
        }

        $mysqli->close();
    } else {
        echo "As senhas são diferentes!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
</head>
<body>
    <h1>Cadastre-se:</h1>

    <form action="signup.php" method="POST">
    <p>
            <label>Nome</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>E-mail</label>
            <input type="text" name="email" required>
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha" required>
        </p>
        <p>
            <label>Confirme sua Senha</label>
            <input type="password" name="confSenha" required>
        </p>
        <p>
            <button type="submit" name="submit">Criar Conta</button>
        </p>
        <p>Já tem Conta? <a href="login.php">Entre</a></p>
    </form>
</body>
</html>