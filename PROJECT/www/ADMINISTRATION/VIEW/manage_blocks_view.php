<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="manage-blocks-view">
    <div class="form-limited form-centered margin-bottom-1rem">
        <div class="tool-container">
            <?php $filter_name = "BlockFilter"; ?>
            <?php require __DIR__ . '/' . 'BLOCK/filter.php'; ?>
            <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                <a class="form-button form-button-large add-button" href="/admin/block/add">
                </a>
            <?php } ?>
        </div>
    </div>
    <?php foreach ( $this->BlockArray as $block ) { ?>
        <div class="page-section form-section filter-row">
            <?php
                require __DIR__ . '/' . 'BLOCK/PREVIEW/block.php';
            ?>
            <div class="form-toolbar">
                <?php if ( HasSessionMinimumUserRole( 'contributor' ) ) { ?>
                    <a class="form-button manage-button" href="/admin/block/manage/<?php echo htmlspecialchars( $block->Id ); ?>">
                    </a>
                <?php } ?>
                <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                    <a class="form-button edit-button" href="/admin/block/edit/<?php echo htmlspecialchars( $block->Id ); ?>">
                    </a>
                <?php } ?>
                <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                    <a class="form-button remove-button" href="/admin/block/remove/<?php echo htmlspecialchars( $block->Id ); ?>">
                    </a>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
<?php require __DIR__ . '/' . 'BLOCK/block_footer.php'; ?>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
