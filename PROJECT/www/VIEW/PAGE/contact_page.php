











<div id="<?php echo $page->Slug; ?>" class="page">
    <?php require __DIR__ . '/' . '../BLOCK/header_menu.php'; ?>
    <div class="contact-page-heading" style="background: linear-gradient( rgba( 0, 0, 0, 0.1 ), rgba( 0, 0, 0, 0.1 ) ), url( '<?php echo $page->ImagePath; ?>?v=<?php echo VersionTimestamp; ?>' ) no-repeat center center / cover, url( '<?php echo GetPreloadImagePath( $page->ImagePath ); ?>?v=<?php echo VersionTimestamp; ?>' ) no-repeat center center / cover">
        <?php require __DIR__ . '/' . '../BLOCK/contact_form.php'; ?>
        <?php require __DIR__ . '/' . '../BLOCK/scroll_down_reminder.php'; ?>
    </div>
    <?php require __DIR__ . '/' . '../BLOCK/contact_map.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/page_block_list.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/page_padding.php'; ?>
    <?php require __DIR__ . '/' . '../BLOCK/footer_menu.php'; ?>
</div>
