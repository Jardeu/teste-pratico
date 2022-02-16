<div class="d-flex flex-column justify-content-center align-itens-center">
    <div class="d-grid gap-4 text-center mt-lg-5">
        <h6 class="text-white">Excluir <?= TITLE ?></h6>
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <p>Você deseja realmente excluir <?php echo (TITLE == "tag") ? "a" : "o" ?> <?= TITLE ?>
                                    <strong><?= (TITLE == "tag") ? $obTag->name : $obProduto->name ?></strong>?
                                </p>
                            </div>
                            <div class="form-group">
                                <a href="index.php" class="btn btn-success">Cancelar</a>

                                <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>