<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['acesso']) || $_SESSION['acesso'] == false) {
    header('Location: index.php');
    exit();
}

$pagina = basename($_SERVER['PHP_SELF']);
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            padding-bottom: 0;
        }

        .nav-link {
            padding: 12px 0px;
        }

        .nav-link.active {
            border-bottom: solid white;
            color: white !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="principal.php">Sistema</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $pagina == 'principal.php' ? 'active' : '' ?>"
                            href="principal.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= in_array($pagina, [
                            'espacos.php',
                            'novo_espaco.php',
                            'alterar_espaco.php',
                            'consultar_espaco.php'
                        ]) ? 'active' : '' ?>" href="espacos.php">Espaços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= in_array($pagina, [
                            'usuarios.php',
                            'novo_usuario.php',
                            'alterar_usuario.php',
                            'consultar_usuario.php'
                        ]) ? 'active' : '' ?>" href="usuarios.php">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= in_array($pagina, [
                            'eventos.php',
                            'novo_evento.php',
                            'alterar_evento.php',
                            'consultar_evento.php'
                        ]) ? 'active' : '' ?>" href="eventos.php">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= in_array($pagina, [
                            'reservas.php',
                            'nova_reserva.php'
                        ]) ? 'active' : '' ?>" href="reservas.php">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>

    <div class="container mt-3">