<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Tag;

$tags = Tag::getTags();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem-tags.php';
include __DIR__ . '/includes/footer.php';