<?php
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success w-50 mx-auto">Ação executada com sucesso</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger w-50 mx-auto">Ação não executada</div>';
            break;
    }
}
?>

<div class="d-flex flex-column justify-content-center align-itens-center">
    <div class="d-grid gap-4 text-center mt-5">
        <?= $mensagem ?>
        <div>
            <a class="btn btn-outline-light btn-lg" href="cadastrar-tag.php">Cadastrar
                Tag</a>
        </div>
        <div>
            <a class="btn btn-outline-light btn-lg" href="listar-tags.php">Lista de
                Tags</a>
        </div>
        <div>
            <a class="btn btn-outline-light btn-lg" href="cadastrar-produto.php">Cadastrar
                Produto</a>
        </div>
        <div>
            <a class="btn btn-outline-light btn-lg" href="listar-produtos.php">Lista de
                Produtos</a>
        </div>
        <div>
            <a class="btn btn-outline-light btn-lg" href="relatorio.php">Relatório de Relevãncia de Produtos</a>
        </div>
    </div>
</div>