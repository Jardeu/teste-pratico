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

$autocomplete = '';
foreach ($tags as $tag) {
    $autocomplete .= '<option value="' . $tag->name . '">';
}

$resultado = '';
foreach ($nomes_tags as $nome) {
    $resultado .= `<li>` . $nome . `<i class="uit uit-multiply" onclick="remove(this, '` . $nome . `')"></i></li>`;
}

?>

<div class="d-flex flex-column justify-content-center align-itens-center">
    <div class="d-grid gap-4 text-center mt-lg-5">
        <?= $mensagem ?>
        <h6 class="text-white"><?= TITLE ?></h6>
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group mb-4">
                                <label for="nome" class="form-label">Nome do Produto</label>

                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $obProduto->name ?>">
                            </div>
                            <div class="form-group mb-4 tags-field">
                                <label for="tags" class="form-label">Tags</label>

                                <ul id="add-tags" class="d-flex p-7">
                                    <?= $resultado ?>
                                    <input type="text" class="form-control" id="tags" name="tags" list="tagsList">
                                    <datalist id="tagsList">
                                        <?= $autocomplete ?>
                                    </datalist>
                                </ul>
                            </div>
                            <input type="hidden" name="tagNames" id="tagNames" value="<?= $nomes_values ?>">
                            <button type="submit" class="btn btn-primary">Concluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-start">
            <div class="col-6 mx-auto">
                <a href="index.php" class="btn btn-outline-light">Voltar ao incício</a>
                <a href="listar-produtos.php" class="btn btn-outline-light">Listar Produtos</a>
            </div>
        </div>
    </div>
</div>