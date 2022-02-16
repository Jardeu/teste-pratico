<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Edite a tag ');

use \App\Entity\Tag;

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//CONSULTA A TAG
$obTag = Tag::getTag($_GET['id']);

//VALIDAÇÃO DA TAG
if (!$obTag instanceof Tag) {
    header('location: index.php?status=error');
    exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['nome'])) {
    $obTag->name = $_POST['nome'];

    $obTag->atualizar();

    header('location: listar-tags.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-tag.php';
include __DIR__ . '/includes/footer.php';
