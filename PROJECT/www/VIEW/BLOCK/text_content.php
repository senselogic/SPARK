<?php if ( $block->Title !== '' ) { ?>
    <h3 class="block-title">
        <?php echo $this->GetProcessedMultilineText( $block->Title ); ?>
    </h3>
<?php } ?>
<?php if ( $block->Teaser !== '' ) { ?>
    <h4 class="block-teaser">
        <?php echo $this->GetProcessedMultilineText( $block->Teaser ); ?>
    </h4>
<?php } ?>
<?php if ( $block->Text !== '' ) { ?>
    <div class="block-text">
        <?php echo $this->GetProcessedMultilineText( $block->Text ); ?>
    </div>
<?php } ?>
