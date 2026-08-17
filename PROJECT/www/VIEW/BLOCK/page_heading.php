








































<div class="page-heading" style="background: linear-gradient( rgba( 0, 0, 0, 0.1 ), rgba( 0, 0, 0, 0.1 ) ), url( '<?php echo $page->ImagePath; ?>.huge.avif?v=<?php echo VersionTimestamp; ?>' ) no-repeat <?php echo $page->ImageHorizontalPosition; ?> <?php echo $page->ImageVerticalPosition; ?> / <?php echo $page->ImageFit; ?>, url( '<?php echo GetPreloadImagePath( $page->ImagePath ); ?>?v=<?php echo VersionTimestamp; ?>' ) no-repeat <?php echo $page->ImageHorizontalPosition; ?> <?php echo $page->ImageVerticalPosition; ?> / <?php echo $page->ImageFit; ?>">
    <?php if ( $page->Heading !== '' ) { ?>
        <h1 class="page-heading-title">
            <?php echo $this->GetProcessedText( $page->Heading ); ?>
        </h1>
    <?php } ?>
    <?php if ( $page->Teaser !== '' ) { ?>
        <h2 class="page-heading-teaser">
            <?php echo $this->GetProcessedMultilineText( $page->Teaser ); ?>
        </h2>
    <?php } ?>
    <?php if ( $page->Text !== '' ) { ?>
        <div class="page-heading-text">
            <?php echo $this->GetProcessedMultilineText( $page->Text ); ?>
        </div>
    <?php } ?>
    <?php require __DIR__ . '/' . 'scroll_down_reminder.php'; ?>
</div>
