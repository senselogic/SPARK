<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<div id="remove-page-view">
    <div class="page-section form-section">
        <form class="form-centered" action="/admin/page/remove/<?php echo htmlspecialchars( $this->Page->Id ); ?>" method="post">
            <div class="form-container">
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Slug' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Slug" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Page->Slug ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Type Slug' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="TypeSlug" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Page->TypeSlug ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Route' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Route" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Page->Route ) ); ?>" readonly/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Title' ) ); ?> :
                </div>
                <div>
                    <div>
                        <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                            <input class="form-translation form-input" name="Title" type="text" value="<?php echo htmlspecialchars( GetValueText( GetTranslatedText( $this->Page->Title, $language_code ) ) ); ?>" readonly/>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Text' ) ); ?> :
                </div>
                <div>
                    <div>
                        <?php foreach ( LanguageCodeArray as  $language_code ) { ?>
                            <textarea class="form-translation form-textarea" name="Text" readonly><?php echo htmlspecialchars( GetTranslatedText( $this->Page->Text, $language_code ) ); ?></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Image Path' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="ImagePath" type="text" value="<?php echo htmlspecialchars( $this->Page->ImagePath ); ?>" readonly/>
                    <div class="form-upload-container">
                        <img class="form-upload-image" src="<?php echo htmlspecialchars( $this->Page->ImagePath ); ?>" onerror="this.src='/static/image/admin/missing_image.svg'"/>
                    </div>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Video Path' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="VideoPath" type="text" value="<?php echo htmlspecialchars( $this->Page->VideoPath ); ?>" readonly/>
                    <div class="form-upload-container">
                        <video class="form-upload-video" src="<?php echo htmlspecialchars( $this->Page->VideoPath ); ?>" type="video/mp4" onerror="this.src='/static/video/admin/missing_video.mp4'"></video>
                    </div>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Is Active' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="IsActive" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Page->IsActive ) ); ?>" readonly/>
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