

<div id="<?php echo $page->Slug; ?>" class="page">
    <?php require __DIR__ . '/' . '../BLOCK/header_menu.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/page_heading.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/page_block_list.php'; ?>
    <?php $page_array = $this->PageArrayByTypeSlugMap[ 'article' ]; ?>
    <?php require __DIR__ . '/' . '../BLOCK/adjacent_page_list.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/page_padding.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/footer_menu.php'; ?>
</div>
