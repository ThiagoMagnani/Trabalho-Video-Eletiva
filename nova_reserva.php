<?php
require_once('funcoes.php');

$espacos = json_decode(file_get_contents('espacos.json'), true);
$eventos = json_decode(file_get_contents('eventos.json'), true);
$usuarios = json_decode(file_get_contents('usuarios.json'), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $reservas = [];

    if (file_exists('reservas.json')) {
        $reservas = json_decode(file_get_contents('reservas.json'), true);
    }

    $reservas[] = [

        'usuario' => $_POST['usuario'],
        'espaco' => $_POST['espaco'],
        'evento' => $_POST['evento'],
        'data' => $_POST['data'],
        'hora' => $_POST['hora']
    ];

    salvar('reservas.json', $reservas);

    header('Location: reservas.php');
}

require_once('cabecalho.php');
?>

<h2>Nova Reserva</h2>
<form method="post">
    <div class="mb-3">
        <label>Usuário</label>
        <select name="usuario" class="form-control">
            <?php foreach ($usuarios as $id => $u): ?>
                <option value="<?= $id ?>"><?= $u['nome'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Espaço</label>
        <select name="espaco" class="form-control">
            <?php foreach ($espacos as $id => $e): ?>
                <option value="<?= $id ?>"><?= $e['nome'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Evento</label>
        <select name="evento" class="form-control">
            <?php foreach ($eventos as $id => $e): ?>
                <option value="<?= $id ?>"><?= $e['descricao'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Data</label>
        <input type="date" name="data" class="form-control">
    </div>
    <div class="mb-3">
        <label>Hora</label>
        <input type="time" name="hora" class="form-control">
    </div>
    <button class="btn btn-primary">Salvar</button>
</form>

<?php
require_once('rodape.php');
?>