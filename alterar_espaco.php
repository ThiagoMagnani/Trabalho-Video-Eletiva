<?php
require_once('funcoes.php');

$id = $_GET['id'];

$espacos = json_decode(
    file_get_contents('espacos.json'),
    true
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $espacos[$id]['nome'] = $_POST['nome'];

    salvar('espacos.json', $espacos);

    header('Location: espacos.php');
}

require_once('cabecalho.php');
?>

<h2>Alterar Espaço</h2>
<form method="post">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?= $espacos[$id]['nome'] ?>" class="form-control" required>
    </div>
    <button class="btn btn-primary">Salvar</button>
</form>

<?php
require_once('rodape.php');
?>