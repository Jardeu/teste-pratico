<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\ProdutoTag;

$relatorio = ProdutoTag::getRelatorio();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/relatorio.php';
include __DIR__ . '/includes/footer.php';
