<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-block-view">
    <div class="page-section form-section">
        <div class="form-container">
            <div class="form-field-name" data-is-column-title data-column-name="Slug">
                <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
            </div>
            <div>
                <input-component data-is-column-value data-column-name="Slug" result-class="form-input" result-name="Slug" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Slug ) ); ?>" is-readonly></input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="PageId">
                <?php echo htmlspecialchars( GetTextBySlug( 'Page Id' ) ); ?> :
            </div>
            <div>
                <select data-is-column-value data-column-name="PageId"class="form-select" name="PageId" readonly>
                    <?php  $page_array = $this->PageArray; ?>
                    <?php foreach ( $page_array as  $page ) { ?>
                        <option value="<?php echo htmlspecialchars( GetValueText( $page->Id ) ); ?>"<?php if ( $this->Block->PageId === $page->Id ) echo ' selected'; ?>><?php echo htmlspecialchars( GetUntranslatedText( $page->Title ) ); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="CategorySlug">
                <?php echo htmlspecialchars( GetTextBySlug( 'Category Slug' ) ); ?> :
            </div>
            <div>
                <select data-is-column-value data-column-name="CategorySlug"class="form-select" name="CategorySlug" readonly>
                    <?php  $block_category_array = $this->BlockCategoryArray; ?>
                    <?php foreach ( $block_category_array as  $block_category ) { ?>
                        <option value="<?php echo htmlspecialchars( GetValueText( $block_category->Slug ) ); ?>"<?php if ( $this->Block->CategorySlug === $block_category->Slug ) echo ' selected'; ?>><?php echo htmlspecialchars( GetUntranslatedText( $block_category->Name ) ); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="TypeSlug">
                <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?> :
            </div>
            <div>
                <select data-is-column-value data-column-name="TypeSlug"class="form-select" name="TypeSlug" readonly>
                    <?php  $block_type_array = $this->BlockTypeArray; ?>
                    <?php foreach ( $block_type_array as  $block_type ) { ?>
                        <option value="<?php echo htmlspecialchars( GetValueText( $block_type->Slug ) ); ?>"<?php if ( $this->Block->TypeSlug === $block_type->Slug ) echo ' selected'; ?>><?php echo htmlspecialchars( GetUntranslatedText( $block_type->Name ) ); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ContentSlug">
                <?php echo htmlspecialchars( GetTextBySlug( 'Content Slug' ) ); ?> :
            </div>
            <div>
                <select data-is-column-value data-column-name="ContentSlug"class="form-select" name="ContentSlug" readonly>
                    <?php  $block_content_array = $this->BlockContentArray; ?>
                    <?php foreach ( $block_content_array as  $block_content ) { ?>
                        <option value="<?php echo htmlspecialchars( GetValueText( $block_content->Slug ) ); ?>"<?php if ( $this->Block->ContentSlug === $block_content->Slug ) echo ' selected'; ?>><?php echo htmlspecialchars( GetUntranslatedText( $block_content->Name ) ); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Number">
                <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
            </div>
            <div>
                <input-component data-is-column-value data-column-name="Number" result-class="form-input" result-name="Number" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Number ) ); ?>" is-readonly></input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="LanguageCodeArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Language Code Array' ) ); ?> :
            </div>
            <div>
                <input-list-component data-is-column-value data-column-name="LanguageCodeArray" container-class="form-list-container" result-class="form-input" result-name="LanguageCodeArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->LanguageCodeArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="MinimumHeight">
                <?php echo htmlspecialchars( GetTextBySlug( 'Minimum Height' ) ); ?> :
            </div>
            <div>
                <input-component data-is-column-value data-column-name="MinimumHeight" result-class="form-input" result-name="MinimumHeight" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->MinimumHeight ) ); ?>" is-readonly></input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Title">
                <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?> :
            </div>
            <div>
                <multilingual-text-input-component data-is-column-value data-column-name="Title" container-class="form-multilingual-container" result-class="form-textarea" result-name="Title" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Title ) ); ?>" is-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-text-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="TitleArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Title Array' ) ); ?> :
            </div>
            <div>
                <multilingual-text-input-list-component data-is-column-value data-column-name="TitleArray" container-class="form-textarea" result-name="TitleArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->TitleArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-text-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Teaser">
                <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?> :
            </div>
            <div>
                <multilingual-text-input-component data-is-column-value data-column-name="Teaser" container-class="form-multilingual-container" result-class="form-textarea" result-name="Teaser" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Teaser ) ); ?>" is-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-text-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="TeaserArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Teaser Array' ) ); ?> :
            </div>
            <div>
                <multilingual-text-input-list-component data-is-column-value data-column-name="TeaserArray" container-class="form-textarea" result-name="TeaserArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->TeaserArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-text-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Text">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
            </div>
            <div>
                <multilingual-text-input-component data-is-column-value data-column-name="Text" container-class="form-multilingual-container" result-class="form-textarea" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Text ) ); ?>" is-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-text-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="TextArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text Array' ) ); ?> :
            </div>
            <div>
                <multilingual-text-input-list-component data-is-column-value data-column-name="TextArray" container-class="form-textarea" result-name="TextArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->TextArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-text-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Route">
                <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?> :
            </div>
            <div>
                <multilingual-input-component data-is-column-value data-column-name="Route" container-class="form-multilingual-container" result-class="form-input" result-name="Route" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Route ) ); ?>" is-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="RouteArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Route Array' ) ); ?> :
            </div>
            <div>
                <multilingual-input-list-component data-is-column-value data-column-name="RouteArray" container-class="form-input" result-name="RouteArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->RouteArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageSide">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Side' ) ); ?> :
            </div>
            <div>
                <select data-is-column-value data-column-name="ImageSide"class="form-select" name="ImageSide" readonly>
                    <option value="left"<?php if ( $this->Block->ImageSide === 'left' ) echo ' selected'; ?>>Left</option>
                    <option value="right"<?php if ( $this->Block->ImageSide === 'right' ) echo ' selected'; ?>>Right</option>
                    <option value="top"<?php if ( $this->Block->ImageSide === 'top' ) echo ' selected'; ?>>Top</option>
                </select>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageLegend">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Legend' ) ); ?> :
            </div>
            <div>
                <multilingual-text-input-component data-is-column-value data-column-name="ImageLegend" container-class="form-multilingual-container" result-class="form-textarea" result-name="ImageLegend" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageLegend ) ); ?>" is-readonly language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-text-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageLegendArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Legend Array' ) ); ?> :
            </div>
            <div>
                <multilingual-text-input-list-component data-is-column-value data-column-name="ImageLegendArray" container-class="form-textarea" result-name="ImageLegendArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageLegendArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-text-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImagePath">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?> :
            </div>
            <div>
                <image-path-input-component data-is-column-value data-column-name="ImagePath" container-class="form-upload-container" result-class="form-input form-upload-input" result-name="ImagePath" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImagePath ) ); ?>" is-readonly image-class="form-upload-image" error-image-path="/static/image/admin/missing_image.svg"></image-path-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImagePathArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Path Array' ) ); ?> :
            </div>
            <div>
                <image-path-input-list-component data-is-column-value data-column-name="ImagePathArray" container-class="form-textarea" result-name="ImagePathArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImagePathArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></image-path-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageVerticalPosition">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position' ) ); ?> :
            </div>
            <div>
                <select data-is-column-value data-column-name="ImageVerticalPosition"class="form-select" name="ImageVerticalPosition" readonly>
                    <option value="top"<?php if ( $this->Block->ImageVerticalPosition === 'top' ) echo ' selected'; ?>>Top</option>
                    <option value="10%"<?php if ( $this->Block->ImageVerticalPosition === '10%' ) echo ' selected'; ?>>10%</option>
                    <option value="20%"<?php if ( $this->Block->ImageVerticalPosition === '20%' ) echo ' selected'; ?>>20%</option>
                    <option value="30%"<?php if ( $this->Block->ImageVerticalPosition === '30%' ) echo ' selected'; ?>>30%</option>
                    <option value="40%"<?php if ( $this->Block->ImageVerticalPosition === '40%' ) echo ' selected'; ?>>40%</option>
                    <option value="center"<?php if ( $this->Block->ImageVerticalPosition === 'center' ) echo ' selected'; ?>>Center</option>
                    <option value="60%"<?php if ( $this->Block->ImageVerticalPosition === '60%' ) echo ' selected'; ?>>60%</option>
                    <option value="70%"<?php if ( $this->Block->ImageVerticalPosition === '70%' ) echo ' selected'; ?>>70%</option>
                    <option value="80%"<?php if ( $this->Block->ImageVerticalPosition === '80%' ) echo ' selected'; ?>>80%</option>
                    <option value="90%"<?php if ( $this->Block->ImageVerticalPosition === '90%' ) echo ' selected'; ?>>90%</option>
                    <option value="bottom"<?php if ( $this->Block->ImageVerticalPosition === 'bottom' ) echo ' selected'; ?>>Bottom</option>
                </select>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageVerticalPositionArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position Array' ) ); ?> :
            </div>
            <div>
                <input-list-component data-is-column-value data-column-name="ImageVerticalPositionArray" container-class="form-list-container" result-class="form-input" result-name="ImageVerticalPositionArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageVerticalPositionArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageHorizontalPosition">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position' ) ); ?> :
            </div>
            <div>
                <select data-is-column-value data-column-name="ImageHorizontalPosition"class="form-select" name="ImageHorizontalPosition" readonly>
                    <option value="left"<?php if ( $this->Block->ImageHorizontalPosition === 'left' ) echo ' selected'; ?>>Left</option>
                    <option value="10%"<?php if ( $this->Block->ImageHorizontalPosition === '10%' ) echo ' selected'; ?>>10%</option>
                    <option value="20%"<?php if ( $this->Block->ImageHorizontalPosition === '20%' ) echo ' selected'; ?>>20%</option>
                    <option value="30%"<?php if ( $this->Block->ImageHorizontalPosition === '30%' ) echo ' selected'; ?>>30%</option>
                    <option value="40%"<?php if ( $this->Block->ImageHorizontalPosition === '40%' ) echo ' selected'; ?>>40%</option>
                    <option value="center"<?php if ( $this->Block->ImageHorizontalPosition === 'center' ) echo ' selected'; ?>>Center</option>
                    <option value="60%"<?php if ( $this->Block->ImageHorizontalPosition === '60%' ) echo ' selected'; ?>>60%</option>
                    <option value="70%"<?php if ( $this->Block->ImageHorizontalPosition === '70%' ) echo ' selected'; ?>>70%</option>
                    <option value="80%"<?php if ( $this->Block->ImageHorizontalPosition === '80%' ) echo ' selected'; ?>>80%</option>
                    <option value="90%"<?php if ( $this->Block->ImageHorizontalPosition === '90%' ) echo ' selected'; ?>>90%</option>
                    <option value="right"<?php if ( $this->Block->ImageHorizontalPosition === 'right' ) echo ' selected'; ?>>Right</option>
                </select>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageHorizontalPositionArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position Array' ) ); ?> :
            </div>
            <div>
                <input-list-component data-is-column-value data-column-name="ImageHorizontalPositionArray" container-class="form-list-container" result-class="form-input" result-name="ImageHorizontalPositionArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageHorizontalPositionArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="VideoPath">
                <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?> :
            </div>
            <div>
                <video-path-input-component data-is-column-value data-column-name="VideoPath" container-class="form-upload-container" result-class="form-input form-upload-input" result-name="VideoPath" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->VideoPath ) ); ?>" is-readonly video-class="form-upload-video" error-video-path="/static/video/admin/missing_video.mp4"></video-path-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="VideoPathArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Video Path Array' ) ); ?> :
            </div>
            <div>
                <video-path-input-list-component data-is-column-value data-column-name="VideoPathArray" container-class="form-textarea" result-name="VideoPathArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->VideoPathArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></video-path-input-list-component>
            </div>
            <a class="justify-self-start form-button form-button-large cancel-button" onclick="SetPriorUrl()">
            </a>
        </div>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/block_footer.php'; ?>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
