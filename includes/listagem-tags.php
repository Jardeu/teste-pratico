<?php
$resultados = '';

foreach ($tags as $tag) {
    $resultados .= '<tr>
                        <td>' . $tag->id . '</td>
                        <td>' . $tag->name . '</td>
                        <td>
                            <a href="editar-tag.php?id=' . $tag->id . '">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a><a href="excluir-tag.php?id=' . $tag->id . '">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>';
}

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada</div>';
            break;
    }
}
?>

<div class="d-grid gap-3 w-50 mx-auto">
    <?= $mensagem ?>
    <section>
        <div class="container">
            <a href="index.php" class="btn btn-outline-light">Voltar ao início</a>
            <a href="cadastrar-tag.php" class="btn btn-outline-light">Nova tag</a>
        </div>
    </section>

    <section>
        <div class="container">
            <h6 class="text-center text-white mb-lg-4">Lista de Tags</h6>
            <table class="table table-light table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
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