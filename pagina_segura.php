<?php
    session_start();

    if(empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Pagina protegida</title>
</head>

<body>
    <header>
        <h1>👮‍♀️ Pagina Segura</h1>
        <p>Bem vindo a página protegida: <strong><?= $_SESSION['usuario']?></strong></p>
        <nav>
            <a href="logout.php">Sair</a>
        </nav>
    </header>
</body>

</html>