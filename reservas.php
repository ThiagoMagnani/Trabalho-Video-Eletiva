<?php
require_once('cabecalho.php');

$usuarios = file_exists('usuarios.json')
    ? json_decode(file_get_contents('usuarios.json'), true)
    : [];

$espacos = file_exists('espacos.json')
    ? json_decode(file_get_contents('espacos.json'), true)
    : [];

$eventos = file_exists('eventos.json')
    ? json_decode(file_get_contents('eventos.json'), true)
    : [];

$reservas = [];

if (file_exists('reservas.json')) {
    $reservas = json_decode(file_get_contents('reservas.json'), true);
}
?>

<h2>Reservas</h2>
<a href="nova_reserva.php" class="btn btn-success mb-3">Nova Reserva</a>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Espaço</th>
        <th>Evento</th>
        <th>Data</th>
        <th>Hora</th>
    </tr>
    <?php foreach ($reservas as $id => $r): ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $usuarios[$r['usuario']]['nome'] ?? '' ?></td>
            <td><?= $espacos[$r['espaco']]['nome'] ?? '' ?></td>
            <td><?= $eventos[$r['evento']]['descricao'] ?? '' ?></td>
            <td><?= $r['data'] ?></td>
            <td><?= $r['hora'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once('rodape.php');
?>