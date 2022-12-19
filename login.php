<?php

require 'connection.php';

if (isset($_POST['email']) && $_POST['senha']) {
    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail!";
    } elseif (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha!";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['senha']);


            $sql_code = "SELECT * FROM user WHERE email = '$email'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na Execução: " . $mysqli->error);

            $registers = $sql_query->num_rows;

        if ($registers == 1) {
            $mysqli = $sql_query->fetch_assoc();

            if (!isset($_SESSION['user'])) {
                session_start();
                if (password_verify($password, $mysqli['senha'])) {
                    $_SESSION['id'] = $mysqli['id'];
                    $_SESSION['nome'] = $mysqli['nome'];

                    header("Location: index.php");
                }
            }
        } else {
            echo "E-mail ou senha incorretos!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
</head>
<body>
    <h1>Acesse sua Conta:</h1>

    <form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email" required>
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha" required>
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
        <p>Não tem Conta? <a href="signup.php">Cadastre-Se</a></p>
    </form>
</body>
</html>