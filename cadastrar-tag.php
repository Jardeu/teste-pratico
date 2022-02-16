<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar uma nova tag ');

use \App\Entity\Tag;

$obTag = new Tag;

//VALICAÇÃO DO POST
if (isset($_POST['nome'])) {
    $obTag->name = $_POST['nome'];

    $obTag->cadastrar();

    header('location: listar-tag.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-tag.php';
include __DIR__ . '/includes/footer.php';
