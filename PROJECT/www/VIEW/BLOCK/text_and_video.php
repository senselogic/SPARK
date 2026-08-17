

















































































<div id="<?php echo $block->Slug; ?>">
</div>
<div class="y-translation-opacity-transition block appearing-block text-and-video video-side-<?php echo $block->ImageSide; ?>">
    <div class="text-and-video-text">
        <?php require __DIR__ . '/' . 'text_content.php'; ?>
    </div>
    <div class="text-and-video-video">
        <div class="text-and-video-video-image" style="padding-top: <?php echo $block->MinimumHeight; ?>; background: url( '<?php echo $block->ImagePath; ?>?v=<?php echo VersionTimestamp; ?>' ) no-repeat <?php echo $block->ImageHorizontalPosition; ?> <?php echo $block->ImageVerticalPosition; ?> / <?php echo $block->ImageFit; ?>, url( '<?php echo GetPreloadImagePath( $block->ImagePath ); ?>?v=<?php echo VersionTimestamp; ?>' ) no-repeat <?php echo $block->ImageHorizontalPosition; ?> <?php echo $block->ImageVerticalPosition; ?> / <?php echo $block->ImageFit; ?>">
            <?php if ( $block->VideoPath !== '' ) { ?>
                <video class="autoplay-video text-and-video-video-video" data-video-path="<?php echo $block->VideoPath; ?>|<?php echo $block->VideoPath; ?>.wide.mp4@max-width:65em|<?php echo $block->VideoPath; ?>.small.mp4@max-width:35em" muted playsinline loop poster="<?php echo $block->ImagePath; ?>.small.avif?v=<?php echo VersionTimestamp; ?>"></video>
            <?php } ?>
        </div>
    </div>
</div>
