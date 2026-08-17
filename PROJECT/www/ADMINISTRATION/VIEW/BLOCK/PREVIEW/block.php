<div class="form-container">
    <div class="form-field-name" data-is-column-title data-column-name="PageId">
        <?php echo htmlspecialchars( GetTextBySlug( 'Page Id' ) ); ?> :
    </div>
    <div class="form-field-value" data-is-column-value data-column-name="PageId">
        <dropdown-component class="form-component" result-name="PageId" result-value="<?php echo htmlspecialchars( GetValueText( $block->PageId ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetElementPropertyArray( $this->PageArray, 'Id' ) ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->PageArray, 'Title' ) ) ) ) ); ?>"></dropdown-component>
    </div>
    <div class="form-field-name">
        <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?> :
    </div>
    <div class="form-field-value">
        <dropdown-component class="form-component" result-name="TypeSlug" result-value="<?php echo htmlspecialchars( GetValueText( $block->TypeSlug ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetElementPropertyArray( $this->BlockTypeArray, 'Slug' ) ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->BlockTypeArray, 'Name' ) ) ) ) ); ?>"></dropdown-component>
    </div>
    <div class="form-field-name">
        <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
    </div>
    <div class="form-field-value">
        <input-component class="form-component" result-name="Number" result-value="<?php echo htmlspecialchars( GetValueText( $block->Number ) ); ?>" is-readonly></input-component>
    </div>
    <?php if ( $block->Title !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-text-input-component class="form-component" result-name="Title" result-value="<?php echo htmlspecialchars( GetValueText( $block->Title ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
        </div>
    <?php } ?>
    <?php if ( count( $block->TitleArray ) !== 0 ) { ?>
            <div class="form-field-name" data-is-column-title data-column-name="TitleArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Title Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="TitleArray">
                <multilingual-text-input-list-component class="form-component" result-name="TitleArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->TitleArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
            </div>
    <?php } ?>
    <?php if ( $block->Teaser !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-text-input-component class="form-component" result-name="Teaser" result-value="<?php echo htmlspecialchars( GetValueText( $block->Teaser ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
        </div>
    <?php } ?>
    <?php if ( count( $block->TeaserArray ) !== 0 ) { ?>
        <div class="form-field-name" data-is-column-title data-column-name="TeaserArray">
            <?php echo htmlspecialchars( GetTextBySlug( 'Teaser Array' ) ); ?> :
        </div>
        <div class="form-field-value" data-is-column-value data-column-name="TeaserArray">
            <multilingual-text-input-list-component class="form-component" result-name="TeaserArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->TeaserArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
        </div>
    <?php } ?>
    <?php if ( $block->Text !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-text-input-component class="form-component" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $block->Text ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
        </div>
    <?php } ?>
    <?php if ( count( $block->TextArray ) !== 0 ) { ?>
        <div class="form-field-name" data-is-column-title data-column-name="TextArray">
            <?php echo htmlspecialchars( GetTextBySlug( 'Text Array' ) ); ?> :
        </div>
        <div class="form-field-value" data-is-column-value data-column-name="TextArray">
            <multilingual-text-input-list-component class="form-component" result-name="TextArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->TextArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
        </div>
    <?php } ?>
    <?php if ( count( $block->ImageTitleArray ) !== 0 ) { ?>
            <div class="form-field-name" data-is-column-title data-column-name="ImageTitleArray">
                <?php echo htmlspecialchars( GetTextBySlug( 'Image Title Array' ) ); ?> :
            </div>
            <div class="form-field-value" data-is-column-value data-column-name="ImageTitleArray">
                <multilingual-text-input-list-component class="form-component" result-name="ImageTitleArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImageTitleArray ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
            </div>
    <?php } ?>
    <?php if ( $block->ImagePath !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-image-path-input-component class="form-component" result-name="ImagePath" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImagePath ) ); ?>" is-readonly error-image-path="/static/image/admin/missing_image.svg" upload-api-url="/admin/upload/image" delete-api-url="/admin/delete/file" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-image-path-input-component>
        </div>
    <?php } ?>
    <?php if ( count( $block->ImagePathArray ) !== 0 ) { ?>
        <div class="form-field-name" data-is-column-title data-column-name="ImagePathArray">
            <?php echo htmlspecialchars( GetTextBySlug( 'Image Path Array' ) ); ?> :
        </div>
        <div class="form-field-value" data-is-column-value data-column-name="ImagePathArray">
            <image-path-input-list-component class="form-component" result-name="ImagePathArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->ImagePathArray ) ); ?>" is-readonly error-image-path="/static/image/admin/missing_image.svg" upload-api-url="/admin/upload/image" delete-api-url="/admin/delete/file"></image-path-input-list-component>
        </div>
    <?php } ?>
    <?php if ( $block->VideoPath !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-video-path-input-component class="form-component" result-name="VideoPath" result-value="<?php echo htmlspecialchars( GetValueText( $block->VideoPath ) ); ?>" is-readonly error-video-path="/static/video/admin/missing_video.mp4" upload-api-url="/admin/upload/video" delete-api-url="/admin/delete/file" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-video-path-input-component>
        </div>
    <?php } ?>
    <?php if ( count( $block->VideoPathArray ) !== 0 ) { ?>
        <div class="form-field-name" data-is-column-title data-column-name="VideoPathArray">
            <?php echo htmlspecialchars( GetTextBySlug( 'Video Path Array' ) ); ?> :
        </div>
        <div class="form-field-value" data-is-column-value data-column-name="VideoPathArray">
            <video-path-input-list-component class="form-component" result-name="VideoPathArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->VideoPathArray ) ); ?>" is-readonly error-video-path="/static/video/admin/missing_video.mp4" upload-api-url="/admin/upload/video" delete-api-url="/admin/delete/file"></video-path-input-list-component>
        </div>
    <?php } ?>
    <?php if ( $block->DocumentPath !== '' ) { ?>
        <div class="form-field-name" data-is-column-title data-column-name="DocumentPath">
            <?php echo htmlspecialchars( GetTextBySlug( 'Document Path' ) ); ?> :
        </div>
        <div class="form-field-value" data-is-column-value data-column-name="DocumentPath">
            <document-path-input-component class="form-component" result-name="DocumentPath" result-value="<?php echo htmlspecialchars( GetValueText( $block->DocumentPath ) ); ?>" is-readonly error-image-path="/static/image/admin/missing_image.svg" document-image-path="/static/image/admin/document_icon.svg" upload-api-url="/admin/upload/document" delete-api-url="/admin/delete/file"></document-path-input-component>
        </div>
    <?php } ?>
    <?php if ( count( $block->DocumentPathArray ) !== 0 ) { ?>
        <div class="form-field-name" data-is-column-title data-column-name="DocumentPathArray">
            <?php echo htmlspecialchars( GetTextBySlug( 'Document Path Array' ) ); ?> :
        </div>
        <div class="form-field-value" data-is-column-value data-column-name="DocumentPathArray">
            <document-path-input-list-component class="form-component" result-name="DocumentPathArray" result-value="<?php echo htmlspecialchars( GetValueText( $block->DocumentPathArray ) ); ?>" is-readonly error-image-path="/static/image/admin/missing_image.svg" document-image-path="/static/image/admin/document_icon.svg" upload-api-url="/admin/upload/document" delete-api-url="/admin/delete/file"></document-path-input-list-component>
        </div>
    <?php } ?>
</div>
