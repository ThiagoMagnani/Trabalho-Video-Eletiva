<?php
require_once('funcoes.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];

    $espacos = carregar('espacos.json');

    $espacos[] = ['nome' => $nome];

    salvar('espacos.json', $espacos);

    header('Location: espacos.php');
}

require_once('cabecalho.php');
?>

<h2>Novo Espaço</h2>
<form method="post">
    <div class="mb-3">
        <label>Nome do Espaço</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <button class="btn btn-primary">Salvar</button>
</form>

<?php
require_once('rodape.php');
?>