<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="remove-image-block-view">
    <div class="page-section form-section">
        <form class="form-centered" action="/admin/image-block/remove/<?php echo htmlspecialchars( $this->ImageBlock->Id ); ?>" method="post">
            <div class="form-container">
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Page Id' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="PageId" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->ImageBlock->PageId ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Category Slug' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="CategorySlug" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->ImageBlock->CategorySlug ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Type Slug' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="TypeSlug" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->ImageBlock->TypeSlug ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Number' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Number" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->ImageBlock->Number ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Language Code Array' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="LanguageCodeArray" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->ImageBlock->LanguageCodeArray ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Title' ) ); ?> :
                </div>
                <div>
                    <div>
                        <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                            <input class="form-translation form-input" name="Title" type="text" value="<?php echo htmlspecialchars( GetValueText( GetTranslatedText( $this->ImageBlock->Title, $language_code ) ) ); ?>" readonly/>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Text' ) ); ?> :
                </div>
                <div>
                    <div>
                        <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                            <textarea class="form-translation form-textarea" name="Text" readonly><?php echo htmlspecialchars( GetTranslatedText( $this->ImageBlock->Text, $language_code ) ); ?></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Image Path' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="ImagePath" type="text" value="<?php echo htmlspecialchars( $this->ImageBlock->ImagePath ); ?>" readonly/>
                    <div class="form-upload-container">
                        <img class="form-upload-image" src="<?php echo htmlspecialchars( $this->ImageBlock->ImagePath ); ?>" onerror="this.src='/static/image/admin/missing_image.svg'"/>
                    </div>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Image Vertical Position' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="ImageVerticalPosition" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->ImageBlock->ImageVerticalPosition ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Image Horizontal Position' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="ImageHorizontalPosition" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->ImageBlock->ImageHorizontalPosition ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Video Path' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="VideoPath" type="text" value="<?php echo htmlspecialchars( $this->ImageBlock->VideoPath ); ?>" readonly/>
                    <div class="form-upload-container">
                        <video class="form-upload-video" src="<?php echo htmlspecialchars( $this->ImageBlock->VideoPath ); ?>" type="video/mp4" onerror="this.src='/static/video/admin/missing_video.mp4'"></video>
                    </div>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( $this->ListRoute ); ?>">
                </a>
                <button class="justify-self-end form-button-large form-button form-button-large remove-button" type="submit">
                </button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
