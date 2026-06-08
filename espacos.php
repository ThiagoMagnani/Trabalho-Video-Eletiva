<?php
require_once('cabecalho.php');

$espacos = [];

if (file_exists('espacos.json')) {
    $espacos = json_decode(file_get_contents('espacos.json'), true);
}
?>

<h2>Espaços</h2>
<a href="novo_espaco.php" class="btn btn-success mb-3">Novo Espaço</a>

<?php if (empty($espacos)): ?>
    <div class="alert alert-warning">Nenhum espaço cadastrado.</div>
<?php else: ?>

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($espacos as $id => $e): ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $e['nome'] ?></td>
                <td><a href="alterar_espaco.php?id=<?= $id ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="consultar_espaco.php?id=<?= $id ?>" class="btn btn-info btn-sm">Consultar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
<?php endif; ?>

<?php
require_once('rodape.php');
?>