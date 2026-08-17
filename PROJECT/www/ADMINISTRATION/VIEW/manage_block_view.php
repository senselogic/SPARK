<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="manage-block-view">
    <div class="page-section form-section">
        <?php
            $block = $this->Block;
            require __DIR__ . '/' . 'BLOCK/PREVIEW/block.php';
        ?>
        <div class="form-toolbar">
            <?php if ( HasSessionMinimumUserRole( 'author' ) ) { ?>
                <a class="form-button edit-button" href="/admin/block/edit/<?php echo htmlspecialchars( $this->Block->Id ); ?>">
                </a>
            <?php } ?>
            <?php if ( HasSessionMinimumUserRole( 'publisher' ) ) { ?>
                <a class="form-button remove-button" href="/admin/block/remove/<?php echo htmlspecialchars( $this->Block->Id ); ?>">
                </a>
            <?php } ?>
        </div>
    </div>
    <div>
        <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( GetParentRoute( null, '/admin/block' ) ); ?>">
        </a>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/block_footer.php'; ?>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
