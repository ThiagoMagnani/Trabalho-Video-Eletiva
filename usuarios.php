<?php
require_once('cabecalho.php');

$usuarios = [];

if (file_exists('usuarios.json')) {
    $usuarios = json_decode(file_get_contents('usuarios.json'), true);
}
?>

<h2>Usuários</h2>
<a href="novo_usuario.php" class="btn btn-success mb-3">Novo Usuário</a>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($usuarios as $id => $u): ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $u['nome'] ?></td>
            <td><?= $u['email'] ?></td>
            <td>
                <a href="alterar_usuario.php?id=<?= $id ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="consultar_usuario.php?id=<?= $id ?>" class="btn btn-info btn-sm">Consultar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once('rodape.php');
?>