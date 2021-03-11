<?php
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$erro = false;

session_start(); //AshgdjagJAgsda

// checar se as credenciais do usuario estão ok
if ($usuario == 'admin' && $senha == '123456') {
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = 'Administrador';
    $_SESSION['cartao'] = '411111111111111';

    header('Location: pagina_segura.php');
} else if (!empty($_POST)) {
    $erro = true;
}

//Checar se o usuário já está logado
if (!empty($_SESSION['logado']) && $_SESSION['logado']) {
    header('Location: pagina_segura.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Login</title>
</head>

<body>
    <header>
        <h2>🔐 Entre em sua conta </h2>
    </header>

    <main>
        <form method="POST" action="login.php">
            <?php if ($erro) : ?>
                <div style="background: #fafae1; padding: 15px; margin-bottom: 24px;">
                    📢 Usuário ou Senha inválidos! Tente novamente.
                </div>
            <?php endif; ?>

            <label>Usuário: </label><br />
            <input type="text" name="usuario" /><br />

            <label>Senha: </label><br />
            <input type="password" name="senha" /><br />

            <button>Entrar</button>
        </form>
    </main>
</body>

</html>