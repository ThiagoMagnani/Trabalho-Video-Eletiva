<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $descricao = $_POST['descricao'];

    $eventos = [];

    if (file_exists('eventos.json')) {
        $eventos = json_decode(file_get_contents('eventos.json'), true);
    }

    $eventos[] = ['descricao' => $descricao];

    file_put_contents(
        'eventos.json',
        json_encode($eventos, JSON_PRETTY_PRINT)
    );

    header('Location: eventos.php');
    exit();
}

require_once('cabecalho.php');
?>

<h1>Novo Evento</h1>
<form method="post">
    <div class="mb-3">
        <label class="form-label">Informe a descrição</label>
        <input type="text" name="descricao" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
require_once('rodape.php');
?>