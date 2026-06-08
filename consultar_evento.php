<?php

$id = $_GET['id'];

$eventos = json_decode(
    file_get_contents('eventos.json'),
    true
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    unset($eventos[$id]);

    file_put_contents(
        'eventos.json',
        json_encode(array_values($eventos), JSON_PRETTY_PRINT)
    );

    header('Location: eventos.php');
    exit();
}

require_once('cabecalho.php');
?>

<h1>Consultar Evento</h1>
<p><strong>Descrição:</strong><?= $eventos[$id]['descricao'] ?></p>
<div class="d-flex gap-2">
    <a href="eventos.php" class="btn btn-secondary">Voltar</a>
    <a href="alterar_evento.php?id=<?= $id ?>" class="btn btn-warning">Editar</a>
    <form method="post">
        <button class="btn btn-danger">Excluir</button>
    </form>
</div>

<?php
require_once('rodape.php');
?>