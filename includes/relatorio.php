<?php
$resultados = '';

foreach ($relatorio as $rel) {
    $resultados .= '<tr>
                        <td>' . $rel->tags . '</td>
                        <td>' . $rel->qtd . '</td>
                    </tr>';
}
?>

<div class="d-grid gap-3 w-50 mx-auto">
    <section>
        <div class="container">
            <a href="index.php" class="btn btn-outline-light">Voltar ao início</a>
        </div>
    </section>

    <section>
        <div class="container">
            <h6 class="text-center text-white mb-lg-4">Relatório de relevância de produtos</h6>
            <table class="table table-light table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Tags</th>
                        <th scope="col">Quantidade de Produtos</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?= $resultados ?>
                </tbody>
            </table>
        </div>
    </section>
</div>