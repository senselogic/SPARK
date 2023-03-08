<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<div id="view-block-view">
    <div class="page-section form-section">
        <div class="form-container" data-is-row data-table-name="BLOCK">
            <div class="form-field-name" data-is-column-title data-column-name="Slug">
                <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Slug">
                <input-component result-class="form-input" result-name="Slug" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Slug ) ); ?>" is-readonly></input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="PageId">
                <?php echo htmlspecialchars( GetTextBySlug( 'Page Id' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="PageId">
                <dropdown-component result-class="form-select" result-name="PageId" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->PageId ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetJsonText( GetElementPropertyArray( $this->PageArray, 'Id' ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->PageArray, 'Title' ) ) ) ); ?>"></dropdown-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="CategorySlug">
                <?php echo htmlspecialchars( GetTextBySlug( 'Category Slug' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="CategorySlug">
                <dropdown-component result-class="form-select" result-name="CategorySlug" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->CategorySlug ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetJsonText( GetElementPropertyArray( $this->BlockCategoryArray, 'Slug' ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->BlockCategoryArray, 'Name' ) ) ) ); ?>"></dropdown-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ContentSlug">
                <?php echo htmlspecialchars( GetTextBySlug( 'Content Slug' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ContentSlug">
                <dropdown-component result-class="form-select" result-name="ContentSlug" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ContentSlug ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetJsonText( GetElementPropertyArray( $this->BlockContentArray, 'Slug' ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->BlockContentArray,'Name' ) ) ) ); ?>"></dropdown-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="TypeSlug">
                <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="TypeSlug">
                <dropdown-component result-class="form-select" result-name="TypeSlug" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->TypeSlug ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetJsonText( GetElementPropertyArray( $this->BlockTypeArray, 'Slug' ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->BlockTypeArray, 'Name' ) ) ) ); ?>"></dropdown-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Number">
                <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Number">
                <input-component result-class="form-input" result-name="Number" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Number ) ); ?>" is-readonly></input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="LanguageCodeArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Language Code Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="LanguageCodeArray">
                <input-list-component container-class="form-list-container" result-class="form-input" result-name="LanguageCodeArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->LanguageCodeArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="MinimumHeight">
                <?php echo htmlspecialchars( GetTextBySlug( 'Minimum Height' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="MinimumHeight">
                <input-component result-class="form-input" result-name="MinimumHeight" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->MinimumHeight ) ); ?>" is-readonly></input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Title">
                <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Title">
                <multilingual-text-input-component container-class="form-multilingual-container" result-class="form-textarea" result-name="Title" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Title ) ); ?>" is-readonly language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-text-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="TitleArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Title Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="TitleArray">
                <multilingual-text-input-list-component container-class="form-textarea" result-name="TitleArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->TitleArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-text-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Teaser">
                <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Teaser">
                <multilingual-text-input-component container-class="form-multilingual-container" result-class="form-textarea" result-name="Teaser" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Teaser ) ); ?>" is-readonly language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-text-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="TeaserArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Teaser Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="TeaserArray">
                <multilingual-text-input-list-component container-class="form-textarea" result-name="TeaserArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->TeaserArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-text-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Text">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Text">
                <multilingual-text-input-component container-class="form-multilingual-container" result-class="form-textarea" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Text ) ); ?>" is-readonly language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-text-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="TextArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Text Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="TextArray">
                <multilingual-text-input-list-component container-class="form-textarea" result-name="TextArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->TextArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-text-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="Route">
                <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="Route">
                <multilingual-input-component container-class="form-multilingual-container" result-class="form-input" result-name="Route" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->Route ) ); ?>" is-readonly language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="RouteArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Route Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="RouteArray">
                <multilingual-input-list-component container-class="form-input" result-name="RouteArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->RouteArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageSide">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Side' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImageSide">
                <dropdown-component result-class="form-select" result-name="ImageSide" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageSide ) ); ?>" is-readonly is-optional option-values="<?php echo htmlspecialchars( GetJsonText( [ 'left', 'right' ] ) ); ?>" option-names="<?php echo htmlspecialchars( GetJsonText( [ 'Left', 'Right' ] ) ); ?>"></dropdown-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageLegend">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Legend' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImageLegend">
                <multilingual-text-input-component container-class="form-multilingual-container" result-class="form-textarea" result-name="ImageLegend" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageLegend ) ); ?>" is-readonly language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-text-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageLegendArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Legend Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImageLegendArray">
                <multilingual-text-input-list-component container-class="form-textarea" result-name="ImageLegendArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageLegendArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button" language-codes="<?php echo htmlspecialchars( GetJsonText( LanguageCodeArray ) ); ?>" language-names="<?php echo htmlspecialchars( GetJsonText( LanguageNameArray ) ); ?>"></multilingual-text-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImagePath">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImagePath">
                <image-path-input-component container-class="form-upload-container" result-class="form-input form-upload-input" result-name="ImagePath" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImagePath ) ); ?>" is-readonly image-class="form-upload-image" error-image-path="/static/image/admin/missing_image.svg"></image-path-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImagePathArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Path Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImagePathArray">
                <image-path-input-list-component container-class="form-textarea" result-name="ImagePathArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImagePathArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></image-path-input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageVerticalPosition">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImageVerticalPosition">
                <dropdown-component result-class="form-select" result-name="ImageVerticalPosition" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageVerticalPosition ) ); ?>" is-readonly is-optional option-values="<?php echo htmlspecialchars( GetJsonText( [ 'top', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'bottom'] ) ); ?>" option-names="<?php echo htmlspecialchars( GetJsonText( ['Top', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Bottom' ] ) ); ?>"></dropdown-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageVerticalPositionArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImageVerticalPositionArray">
                <input-list-component container-class="form-list-container" result-class="form-input" result-name="ImageVerticalPositionArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageVerticalPositionArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageHorizontalPosition">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImageHorizontalPosition">
                <dropdown-component result-class="form-select" result-name="ImageHorizontalPosition" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageHorizontalPosition ) ); ?>" is-readonly is-optional option-values="<?php echo htmlspecialchars( GetJsonText( [ 'left', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'right'] ) ); ?>" option-names="<?php echo htmlspecialchars( GetJsonText( ['Left', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Right' ] ) ); ?>"></dropdown-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="ImageHorizontalPositionArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImageHorizontalPositionArray">
                <input-list-component container-class="form-list-container" result-class="form-input" result-name="ImageHorizontalPositionArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->ImageHorizontalPositionArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></input-list-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="VideoPath">
                <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="VideoPath">
                <video-path-input-component container-class="form-upload-container" result-class="form-input form-upload-input" result-name="VideoPath" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->VideoPath ) ); ?>" is-readonly video-class="form-upload-video" error-video-path="/static/video/admin/missing_video.mp4"></video-path-input-component>
            </div>
            <div class="form-field-name" data-is-column-title data-column-name="VideoPathArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Video Path Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="VideoPathArray">
                <video-path-input-list-component container-class="form-textarea" result-name="VideoPathArray" result-value="<?php echo htmlspecialchars( GetValueText( $this->Block->VideoPathArray ) ); ?>" is-readonly value-container-class="form-value-container" value-class="form-input form-value" drag-button-class="form-button drag-button form-drag-value-button" add-button-class="form-button add-button form-add-value-button" remove-button-class="form-button remove-button form-remove-value-button"></video-path-input-list-component>
            </div>
            <a class="justify-self-start form-button form-button-large cancel-button" onclick="SetPriorUrl()">
            </a>
        </div>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/block_footer.php'; ?>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
