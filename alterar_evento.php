<?php
require_once('funcoes.php');

$id = $_GET['id'];

$eventos = json_decode(
    file_get_contents('eventos.json'),
    true
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $eventos[$id]['descricao'] = $_POST['descricao'];

    salvar('eventos.json', $eventos);

    header('Location: eventos.php');
    exit();
}

require_once('cabecalho.php');
?>

<h1>Alterar Evento</h1>
<form method="post">
    <div class="mb-3">
        <label class="form-label">Informe a descrição</label>
        <input type="text" name="descricao" value="<?= $eventos[$id]['descricao'] ?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
require_once('rodape.php');
?>