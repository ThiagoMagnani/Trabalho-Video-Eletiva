<?php
require_once('funcoes.php');

$id = $_GET['id'];

$usuarios = json_decode(
    file_get_contents('usuarios.json'),
    true
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    unset($usuarios[$id]);

    salvar(
        'usuarios.json',
        array_values($usuarios)
    );

    header('Location: usuarios.php');
}

require_once('cabecalho.php');
?>

<h2>Consultar Usuário</h2>
<p><strong>Nome:</strong><?= $usuarios[$id]['nome'] ?></p>
<p><strong>Email:</strong><?= $usuarios[$id]['email'] ?></p>
<div class="d-flex gap-2">
    <a href="usuarios.php" class="btn btn-secondary">Voltar</a>
    <a href="alterar_usuario.php?id=<?= $id ?>" class="btn btn-warning">Editar</a>
    <form method="post">
        <button class="btn btn-danger">Excluir</button>
    </form>
</div>

<?php
require_once('rodape.php');
?>