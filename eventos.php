<?php
require_once('cabecalho.php');

$eventos = [];

if (file_exists('eventos.json')) {
    $eventos = json_decode(file_get_contents('eventos.json'), true);
}
?>

<h2>Eventos</h2>
<a href="novo_evento.php" class="btn btn-success mb-3">Novo Registro</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($eventos as $id => $evento): ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $evento['descricao'] ?></td>
                <td class="d-flex gap-2">
                    <a href="alterar_evento.php?id=<?= $id ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="consultar_evento.php?id=<?= $id ?>" class="btn btn-sm btn-info">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once('rodape.php');
?>