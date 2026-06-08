<?php

require_once('funcoes.php');
require_once('cabecalho.php');

$espacos = carregar('espacos.json');
$usuarios = carregar('usuarios.json');
$eventos = carregar('eventos.json');
$reservas = carregar('reservas.json');
?>

<h2>Bem-vindo <?= $_SESSION['nome'] ?></h2>
<p>Sistema de Reserva de Espaços Públicos</p>
<div class="row mt-4">
    <div class="col-md-3">
        <a href="espacos.php" class="text-decoration-none text-dark">
            <div class="card p-3">
                <h5>Espaços</h5>
                <h3><?= count($espacos) ?></h3>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="usuarios.php" class="text-decoration-none text-dark">
            <div class="card p-3">
                <h5>Usuários</h5>
                <h3><?= count($usuarios) ?></h3>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="eventos.php" class="text-decoration-none text-dark">
            <div class="card p-3">
                <h5>Eventos</h5>
                <h3><?= count($eventos) ?></h3>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="reservas.php" class="text-decoration-none text-dark">
            <div class="card p-3">
                <h5>Reservas</h5>
                <h3><?= count($reservas) ?></h3>
            </div>
        </a>
    </div>
    <div class="mt-4">
        <h4>Próximas Reservas</h4>
        <table class="table table-striped">
            <tr>
                <th>Usuário</th>
                <th>Espaço</th>
                <th>Evento</th>
                <th>Data</th>s
            </tr>
            <?php foreach ($reservas as $r): ?>
                <tr>
                    <td><?= $usuarios[$r['usuario']]['nome'] ?? '' ?></td>
                    <td><?= $espacos[$r['espaco']]['nome'] ?? '' ?></td>
                    <td><?= $eventos[$r['evento']]['descricao'] ?? '' ?></td>
                    <td><?= $r['data'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php
require_once('rodape.php');
?>