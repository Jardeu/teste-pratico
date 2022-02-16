<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Produto;
use \App\Entity\ProdutoTag;

define("TITLE", "produto");

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: listar-produtos.php?status=error');
    exit;
}

//CONSULTA A PRODUTO
$obProduto = Produto::getProduto($_GET['id']);
$obProdutoTag = new ProdutoTag;

//VALIDAÇÃO DO PRODUTO
if (!$obProduto instanceof Produto) {
    header('location: listar-produtos.php?status=error');
    exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    if ($obProdutoTag->excluirPorProduto($obProduto->id)) {
        $obProduto->excluir();
    }

    header('location: listar-produtos.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';
