<?php
function carregar($arquivo)
{
    if (file_exists($arquivo)) {
        return json_decode(
            file_get_contents($arquivo),
            true
        );
    }
    return [];
}

function salvar($arquivo, $dados)
{
    file_put_contents(
        $arquivo,
        json_encode($dados, JSON_PRETTY_PRINT)
    );
}