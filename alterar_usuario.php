<?php
require_once('funcoes.php');
require_once('cabecalho.php');

$id = $_GET['id'];

$usuarios = json_decode(
    file_get_contents('usuarios.json'),
    true
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $emailAntigo = $usuarios[$id]['email'];

    $usuarios[$id]['nome'] = $_POST['nome'];
    $usuarios[$id]['email'] = $_POST['email'];

    if ($emailAntigo == $_SESSION['email']) {
        $_SESSION['nome'] = $_POST['nome'];
        $_SESSION['email'] = $_POST['email'];
    }

    salvar('usuarios.json', $usuarios);

    header('Location: usuarios.php');
    exit();
}
?>

<h2>Alterar Usuário</h2>
<form method="post">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?= $usuarios[$id]['nome'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?= $usuarios[$id]['email'] ?>" class="form-control" required>
    </div>
    <button class="btn btn-primary">Salvar</button>
</form>

<?php
require_once('rodape.php');
?>