



















<div id="<?php echo $block->Slug; ?>">
</div>
<div class="y-translation-opacity-transition block appearing-block image" style="padding-top: <?php echo $block->MinimumHeight; ?>; background: url( '<?php echo $block->ImagePath; ?>?v=<?php echo VersionTimestamp; ?>' ) no-repeat <?php echo $block->ImageHorizontalPosition; ?> <?php echo $block->ImageVerticalPosition; ?> / <?php echo $block->ImageFit; ?>, url( '<?php echo GetPreloadImagePath( $block->ImagePath ); ?>?v=<?php echo VersionTimestamp; ?>' ) no-repeat <?php echo $block->ImageHorizontalPosition; ?> <?php echo $block->ImageVerticalPosition; ?> / <?php echo $block->ImageFit; ?>">
    <?php require __DIR__ . '/' . 'text_content.php'; ?>
</div>
