<?php

$id = $_GET['id'];

$espacos = json_decode(
    file_get_contents('espacos.json'),
    true
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    unset($espacos[$id]);

    file_put_contents(
        'espacos.json',
        json_encode(array_values($espacos), JSON_PRETTY_PRINT)
    );

    header('Location: espacos.php');
    exit();
}

require_once('cabecalho.php');
?>

<h2>Consultar Espaço</h2>
<p><strong>Nome:</strong><?= $espacos[$id]['nome'] ?></p>
<div class="d-flex gap-2">
    <a href="espacos.php" class="btn btn-secondary">Voltar</a>
    <a href="alterar_espaco.php?id=<?= $id ?>" class="btn btn-warning">Editar</a>
    <form method="post">
        <button class="btn btn-danger">Excluir</button>
    </form>
</div>

<?php
require_once('rodape.php');
?>