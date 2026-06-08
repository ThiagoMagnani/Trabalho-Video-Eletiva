<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($nome && $email && $senha) {
        $arquivo_usuarios = 'usuarios.json';

        $usuarios = [];
        if (file_exists($arquivo_usuarios)) {
            $usuarios = json_decode(file_get_contents($arquivo_usuarios), true);
        }

        $email_existe = false;
        foreach ($usuarios as $u) {
            if ($u['email'] == $email) {
                $email_existe = true;
                break;
            }
        }

        if ($email_existe) {
            $erro = "Este email já foi cadastrado!";
        } else {
            $usuarios[] = [
                'nome' => $nome,
                'email' => $email,
                'senha' => password_hash($senha, PASSWORD_DEFAULT)
            ];

            file_put_contents($arquivo_usuarios, json_encode($usuarios, JSON_PRETTY_PRINT));
            $sucesso = "Cadastro realizado com sucesso! Faça login agora.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Sistema de Reserva de Espaços</h3>
            <h5 class="text-center mb-4">Cadastro</h5>

            <?php if (isset($erro)): ?>
                <div class="alert alert-danger">
                    <?= $erro ?>
                </div>
            <?php endif; ?>

            <?php if (isset($sucesso)): ?>
                <div class="alert alert-success">
                    <?= $sucesso ?>
                </div>
            <?php endif; ?>

            <form method="post">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>
            <p class="text-center mt-3">Já tem conta?<a href="index.php">Faça login</a></p>
        </div>
    </div>
</body>

</html>