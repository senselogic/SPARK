<div class="form-container">
    <div class="form-field-name">
        <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?> :
    </div>
    <div class="form-field-value">
        <input-component class="form-component" result-name="Route" result-value="<?php echo htmlspecialchars( GetValueText( $page->Route ) ); ?>" is-readonly></input-component>
    </div>
    <div class="form-field-name">
        <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?> :
    </div>
    <div class="form-field-value"">
        <dropdown-component class="form-component" result-name="TypeSlug" result-value="<?php echo htmlspecialchars( GetValueText( $page->TypeSlug ) ); ?>" is-readonly  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetElementPropertyArray( $this->PageTypeArray, 'Slug' ) ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->PageTypeArray, 'Name' ) ) ) ) ); ?>"></dropdown-component>
    </div>
    <?php if ( $page->Title !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-input-component class="form-component" result-name="Title" result-value="<?php echo htmlspecialchars( GetValueText( $page->Title ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-component>
        </div>
    <?php } ?>
    <?php if ( $page->Teaser !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-input-component class="form-component" result-name="Teaser" result-value="<?php echo htmlspecialchars( GetValueText( $page->Teaser ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-component>
        </div>
    <?php } ?>
    <?php if ( $page->Text !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-input-component class="form-component" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $page->Text ) ); ?>" is-readonly language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-component>
        </div>
    <?php } ?>
    <?php if ( $page->ImagePath !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-image-path-input-component class="form-component" result-name="ImagePath" result-value="<?php echo htmlspecialchars( GetValueText( $page->ImagePath ) ); ?>" is-readonly error-image-path="/static/image/admin/missing_image.svg" upload-api-url="/admin/upload/image" delete-api-url="/admin/delete/file" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-image-path-input-component>
        </div>
    <?php } ?>
    <?php if ( $page->VideoPath !== '' ) { ?>
        <div class="form-field-name">
            <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?> :
        </div>
        <div class="form-field-value">
            <multilingual-video-path-input-component class="form-component" result-name="VideoPath" result-value="<?php echo htmlspecialchars( GetValueText( $page->VideoPath ) ); ?>" is-readonly error-video-path="/static/video/admin/missing_video.mp4" upload-api-url="/admin/upload/video" delete-api-url="/admin/delete/file" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-video-path-input-component>
        </div>
    <?php } ?>
</div>
