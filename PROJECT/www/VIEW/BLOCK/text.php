












<div id="<?php echo  $block->Id; ?>" class="y-translation-opacity-transition block block-text-column appearing-block text" style="min-height: <?php echo $block->MinimumHeight; ?>">
    <?php require __DIR__ . '/' . str_replace( '-', '_', $block->ContentSlug ) . '_content.php'; ?>
</div>
