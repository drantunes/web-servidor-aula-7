<?php
    function checarTema()
    {
        if (!empty($_POST['tema'])) {
            $tema = $_POST['tema'];
            setcookie('tema', $tema, time() + 60*60*24*30);
            return $tema;
        }
        return $_COOKIE['tema'] ?? 'light';
    }

    function opcaoDeTema($atual)
    {
        return $atual == 'light' ? 'dark' : 'light';
    }

    $tema = checarTema();

    $old = $_POST['mensagem'] ?? '';
    $erro = (strlen($old) < 5 && !empty($_POST['mensagem']))
            ? 'A mensagem deve ter pelo menos 5 caracteres'
            : '';

    $contador = $_COOKIE['visitas'] ?? 0;
    $visitas = $contador + 1;
    setcookie('visitas', $visitas, time() + 60 * 60 * 24 * 30);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark e Light Mode</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">

    <?php if ($tema == 'dark') : ?>
        <link rel="stylesheet" href="dark.css">
    <?php endif; ?>
</head>

<body>
    <header>
        <h1>Dark ou Light</h1>
        <p>Dark Mode Demo com Cookies no PHP</p>

        <nav>
            <form action="index.php" method="POST">
                <input type="hidden" name="tema" value="<?= opcaoDeTema($tema) ?>">
                <button><?= ucfirst(opcaoDeTema($tema)) ?></button>
            </form>
        </nav>
    </header>
    <main>
        <h3>Bem vindo!</h3>
        <p>Envie uma mensagem!</p>

        <form action="index.php" method="POST">
            <?= $erro ?>
            <input type="text" name="mensagem" value="<?= $old ?>">
            <button>Enviar mensagem</button>
        </form>
    </main>

    <footer>
        <p>
        Você visitou esta página <?= $visitas ?> vezes neste mês.
        </p>
    </footer>
</body>

</html>