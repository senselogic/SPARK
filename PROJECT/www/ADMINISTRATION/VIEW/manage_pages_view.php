<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="manage-pages-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php $filter_name = "PageFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/page/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <?php foreach ( $this->PageArray as $page ) { ?>
        <div class="page-section form-section filter-row">
            <?php
                require __DIR__ . '/' . 'BLOCK/PREVIEW/page.php';
            ?>
            <div class="form-toolbar">
                <?php if ( HasSessionMinimumUserRole( 'contributor' ) ) { ?>
                    <a class="form-button manage-button" href="/admin/page/manage/<?php echo htmlspecialchars( $page->Id ); ?>">
                    </a>
                <?php } ?>
                <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                    <a class="form-button edit-button" href="/admin/page/edit/<?php echo htmlspecialchars( $page->Id ); ?>">
                    </a>
                <?php } ?>
                <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                    <a class="form-button remove-button" href="/admin/page/remove/<?php echo htmlspecialchars( $page->Id ); ?>">
                    </a>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
<?php require __DIR__ . '/' . 'BLOCK/block_footer.php'; ?>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
