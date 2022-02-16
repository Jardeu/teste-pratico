<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Tag;
use \App\Entity\ProdutoTag;

define("TITLE", "tag");

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: listar-tags.php?status=error');
    exit;
}

//CONSULTA A TAG
$obTag = Tag::getTag($_GET['id']);
$obProdutoTag = new ProdutoTag;

//VALIDAÇÃO DA TAG
if (!$obTag instanceof Tag) {
    header('location: listar-tags.php?status=error');
    exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    if ($obProdutoTag->excluirPorTag($obTag->id)) {
        $obTag->excluir();
    }

    header('location: listar-tags.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';
