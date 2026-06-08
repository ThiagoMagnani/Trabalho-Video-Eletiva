<?php
require_once('funcoes.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuarios = carregar('usuarios.json');

    $usuarios[] = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
    ];

    salvar('usuarios.json', $usuarios);

    header('Location: usuarios.php');
    exit();
}

require_once('cabecalho.php');
?>

<h2>Novo Usuário</h2>
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
    <button class="btn btn-primary">Salvar</button>
</form>

<?php
require_once('rodape.php');
?>