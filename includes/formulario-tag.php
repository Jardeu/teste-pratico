<div class="d-flex flex-column justify-content-center align-itens-center">
    <div class="d-grid gap-4 text-center mt-lg-5">
        <h6 class="text-white"><?= TITLE ?></h6>
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-4">
                                <label for="nome" class="form-label">Nome da Tag</label>

                                <input type="text" class="form-control" name="nome" value="<?= $obTag->name ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Concluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-start">
            <div class="col-6 mx-auto d-flex justify-content-start d-grid gap-3">
                <a href="index.php" class="btn btn-outline-light">Voltar ao Inicio</a>
                <a href="listar-tags.php" class="btn btn-outline-light">Listar Tags</a>
            </div>
        </div>
    </div>
</div>