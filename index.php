<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("Você não tem permissão para acessar essa página! <a href=\"login.php\">Entrar</a>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Bem-Vindo, <?php echo $_SESSION['nome']; ?> </h1>

    <h2><a href="logout.php">Sair</a></h2>
</body>
</html>