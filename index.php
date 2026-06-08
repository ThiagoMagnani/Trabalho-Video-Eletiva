<?php
session_start();

$erro_login = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $arquivo_usuarios = 'usuarios.json';

    $usuarios = [];

    if (file_exists($arquivo_usuarios)) {
        $usuarios = json_decode(
            file_get_contents($arquivo_usuarios),
            true
        );
    }

    $usuario_encontrado = false;

    foreach ($usuarios as $u) {

        if (
            $u['email'] == $email &&
            password_verify($senha, $u['senha'])
        ) {

            $_SESSION['nome'] = $u['nome'];
            $_SESSION['email'] = $u['email'];
            $_SESSION['acesso'] = true;

            $usuario_encontrado = true;

            header('Location: principal.php');
            exit();
        }
    }

    if (!$usuario_encontrado) {

        $_SESSION['acesso'] = false;

        $erro_login = 'Email e/ou senha incorretos!';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width:100%; max-width:400px;">
            <h3 class="text-center mb-4">Sistema de Reserva de Espaços</h3>
            <form method="post">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <?php if ($erro_login): ?>
                <p class="text-danger mt-3"><?= $erro_login ?></p>
            <?php endif; ?>
            <p class="text-center mt-3">Não tem conta?<a href="cadastro.php">Cadastre-se</a></p>
        </div>
    </div>
</body>

</html>