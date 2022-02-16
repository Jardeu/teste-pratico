<?php

use App\Entity\ProdutoTag;
use App\Entity\Tag;

$resultados = '';

foreach ($produtos as $produto) {
    $tags = ProdutoTag::getPorProduto($produto->id);
    $resultado_tags = '';
    foreach ($tags as $tag) {
        $nome_tag = Tag::getTag($tag->tag_id)->name;

        $resultado_tags .= '<span class="badge rounded-pill bg-secondary">'
            . $nome_tag . '</span>';
    }
    $resultados .= '<tr>
                        <td>' . $produto->id . '</td>
                        <td>' . $produto->name . '</td>
                        <td>' . $resultado_tags . '</td>
                        <td>
                            <a href="editar-produto.php?id=' . $produto->id . '">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a><a href="excluir-produto.php?id=' . $produto->id . '">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>';
}

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success w-100">Ação executada com sucesso</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger w-100">Ação não executada</div>';
            break;
    }
}
?>
<div class="d-grid gap-3 mx-auto">
    <div class="container">
        <?= $mensagem ?>
    </div>
    <section>
        <div class="container">
            <a href="index.php" class="btn btn-outline-light">Voltar ao início</a>
            <a href="cadastrar-produto.php" class="btn btn-outline-light">Novo produto</a>
        </div>
    </section>

    <section>
        <div class="container lista-produtos">
            <h6 class="text-center text-white mb-lg-4">Lista de Produtos</h6>
            <table class="table table-light table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?= $resultados ?>
                </tbody>
            </table>
        </div>
    </section>
</div>