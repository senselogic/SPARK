<?php
     $article_array = $this->PageBySlugMap[ 'articles' ]->SubPageArray;
?>


<div class="page">
    <?php require __DIR__ . '/' . '../BLOCK/header_menu.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/article_carousel.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/block_list.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/page_padding.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/footer_menu.php'; ?>
</div>
