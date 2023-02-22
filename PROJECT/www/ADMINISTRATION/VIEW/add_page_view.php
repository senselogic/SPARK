<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidAddPageForm()
    {
        var
            add_page_form,
            it_is_valid_add_page_form,
            id_field,
            slug_field,
            route_field,
            type_slug_field,
            number_field,
            language_code_array_field,
            is_active_field,
            title_field,
            heading_field,
            teaser_field,
            image_path_field,
            image_vertical_position_field,
            image_horizontal_position_field,
            video_path_field,
            meta_title_field,
            meta_description_field,
            meta_image_path_field;

        add_page_form = document.AddPageForm;
        id_field = add_page_form.Id;
        slug_field = add_page_form.Slug;
        route_field = add_page_form.Route;
        type_slug_field = add_page_form.TypeSlug;
        number_field = add_page_form.Number;
        language_code_array_field = add_page_form.LanguageCodeArray;
        is_active_field = add_page_form.IsActive;
        title_field = add_page_form.Title;
        heading_field = add_page_form.Heading;
        teaser_field = add_page_form.Teaser;
        image_path_field = add_page_form.ImagePath;
        image_vertical_position_field = add_page_form.ImageVerticalPosition;
        image_horizontal_position_field = add_page_form.ImageHorizontalPosition;
        video_path_field = add_page_form.VideoPath;
        meta_title_field = add_page_form.MetaTitle;
        meta_description_field = add_page_form.MetaDescription;
        meta_image_path_field = add_page_form.MetaImagePath;

        id_field.RemoveClass( "form-field-error" );
        slug_field.RemoveClass( "form-field-error" );
        route_field.RemoveClass( "form-field-error" );
        type_slug_field.RemoveClass( "form-field-error" );
        number_field.RemoveClass( "form-field-error" );
        language_code_array_field.RemoveClass( "form-field-error" );
        is_active_field.RemoveClass( "form-field-error" );
        title_field.RemoveClass( "form-field-error" );
        heading_field.RemoveClass( "form-field-error" );
        teaser_field.RemoveClass( "form-field-error" );
        image_path_field.RemoveClass( "form-field-error" );
        image_vertical_position_field.RemoveClass( "form-field-error" );
        image_horizontal_position_field.RemoveClass( "form-field-error" );
        video_path_field.RemoveClass( "form-field-error" );
        meta_title_field.RemoveClass( "form-field-error" );
        meta_description_field.RemoveClass( "form-field-error" );
        meta_image_path_field.RemoveClass( "form-field-error" );

        it_is_valid_add_page_form = true;

        if ( id_field.value === "" )
        {
            id_field.AddClass( "form-field-error" );

            it_is_valid_add_page_form = false;
        }

        if ( slug_field.value === "" )
        {
            slug_field.AddClass( "form-field-error" );

            it_is_valid_add_page_form = false;
        }

        if ( route_field.value === "" )
        {
            route_field.AddClass( "form-field-error" );

            it_is_valid_add_page_form = false;
        }

        if ( !IsSlugText( type_slug_field.value ) )
        {
            type_slug_field.AddClass( "form-field-error" );

            it_is_valid_add_page_form = false;
        }

        if ( !IsNumericText( number_field.value ) )
        {
            number_field.AddClass( "form-field-error" );

            it_is_valid_add_page_form = false;
        }

        if ( language_code_array_field.value === "" )
        {
            language_code_array_field.AddClass( "form-field-error" );

            it_is_valid_add_page_form = false;
        }

        if ( !IsBooleanText( is_active_field.value )
             && !IsBinaryText( is_active_field.value ) )
        {
            is_active_field.AddClass( "form-field-error" );

            it_is_valid_add_page_form = false;
        }

        if ( image_vertical_position_field.value === "" )
        {
            image_vertical_position_field.AddClass( "form-field-error" );

            it_is_valid_add_page_form = false;
        }

        if ( image_horizontal_position_field.value === "" )
        {
            image_horizontal_position_field.AddClass( "form-field-error" );

            it_is_valid_add_page_form = false;
        }

        return it_is_valid_add_page_form;
    }
</script>
<div id="add-page-view">
    <div class="page-section form-section">
        <form class="form-centered" name="AddPageForm" onsubmit="return IsValidAddPageForm()" action="/admin/page/add" method="post">
            <div class="form-container">
                <?php
                     $field_name = 'Id';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Id' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Id" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                     $field_name = 'Slug';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Slug" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                     $field_name = 'Route';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Route" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                     $field_name = 'TypeSlug';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?> :
                </div>
                <div>
                    <select class="form-select" name="TypeSlug">
                        <?php  $page_type_array = $this->PageTypeArray; ?>
                        <?php foreach ( $page_type_array as  $page_type ) { ?>
                            <option value="<?php echo htmlspecialchars( GetValueText( $page_type->Slug ) ); ?>"<?php if ( GetValueText( $page_type->Slug ) === $field_value ) echo ' selected'; ?>><?php echo htmlspecialchars( GetUntranslatedText( $page_type->Title ) ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php
                     $field_name = 'Number';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Number" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                     $field_name = 'LanguageCodeArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Language Code Array' ) ); ?> :
                </div>
                <div>
                    <input-list-component result-class="form-input" result-name="LanguageCodeArray" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-list-component>
                </div>
                <?php
                     $field_name = 'IsActive';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '1';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Is Active' ) ); ?> :
                </div>
                <div>
                    <select class="form-select" name="IsActive">
                        <option value="0"<?php if ( $field_value === '0' ) echo ' selected'; ?>>False</option>
                        <option value="1"<?php if ( $field_value === '1' ) echo ' selected'; ?>>True</option>
                    </select>
                </div>
                <?php
                     $field_name = 'Title';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?> :
                </div>
                <div>
                    <multilingual-input-component container-class="form-multilingual-input-container" result-class="form-textarea" result-name="Title" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-input-component>
                </div>
                <?php
                     $field_name = 'Heading';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Heading' ) ); ?> :
                </div>
                <div>
                    <multilingual-input-component container-class="form-multilingual-input-container" result-class="form-textarea" result-name="Heading" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-input-component>
                </div>
                <?php
                     $field_name = 'Teaser';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?> :
                </div>
                <div>
                    <multilingual-textarea-component container-class="form-multilingual-textarea-container" result-class="form-textarea" result-name="Teaser" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"><?php echo htmlspecialchars( $field_value ); ?></multilingual-textarea-component>
                </div>
                <?php
                     $field_name = 'ImagePath';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?> :
                </div>
                <div>
                    <image-path-input-component container-class="form-upload-container" result-class="form-input" result-name="ImagePath" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" image-class="form-upload-image" error-image-path="/static/image/admin/missing_image.svg" upload-button-class="form-upload-button" upload-button-image-class="form-upload-icon" upload-button-image-path="/static/image/admin/upload_icon.svg" upload-api-url="/admin/upload/image" delete-button-image-class="form-delete-icon" delete-image-code="HandleFileInputDeleteButtonClickEvent( this )"></image-path-input-component>
                </div>
                <?php
                     $field_name = 'ImageVerticalPosition';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = 'center';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position' ) ); ?> :
                </div>
                <div>
                    <select class="form-select" name="ImageVerticalPosition">
                        <option value="top"<?php if ( $field_value === 'top' ) echo ' selected'; ?>>Top</option>
                        <option value="10%"<?php if ( $field_value === '10%' ) echo ' selected'; ?>>10%</option>
                        <option value="20%"<?php if ( $field_value === '20%' ) echo ' selected'; ?>>20%</option>
                        <option value="30%"<?php if ( $field_value === '30%' ) echo ' selected'; ?>>30%</option>
                        <option value="40%"<?php if ( $field_value === '40%' ) echo ' selected'; ?>>40%</option>
                        <option value="center"<?php if ( $field_value === 'center' ) echo ' selected'; ?>>Center</option>
                        <option value="60%"<?php if ( $field_value === '60%' ) echo ' selected'; ?>>60%</option>
                        <option value="70%"<?php if ( $field_value === '70%' ) echo ' selected'; ?>>70%</option>
                        <option value="80%"<?php if ( $field_value === '80%' ) echo ' selected'; ?>>80%</option>
                        <option value="90%"<?php if ( $field_value === '90%' ) echo ' selected'; ?>>90%</option>
                        <option value="bottom"<?php if ( $field_value === 'bottom' ) echo ' selected'; ?>>Bottom</option>
                    </select>
                </div>
                <?php
                     $field_name = 'ImageHorizontalPosition';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = 'center';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position' ) ); ?> :
                </div>
                <div>
                    <select class="form-select" name="ImageHorizontalPosition">
                        <option value="left"<?php if ( $field_value === 'left' ) echo ' selected'; ?>>Left</option>
                        <option value="10%"<?php if ( $field_value === '10%' ) echo ' selected'; ?>>10%</option>
                        <option value="20%"<?php if ( $field_value === '20%' ) echo ' selected'; ?>>20%</option>
                        <option value="30%"<?php if ( $field_value === '30%' ) echo ' selected'; ?>>30%</option>
                        <option value="40%"<?php if ( $field_value === '40%' ) echo ' selected'; ?>>40%</option>
                        <option value="center"<?php if ( $field_value === 'center' ) echo ' selected'; ?>>Center</option>
                        <option value="60%"<?php if ( $field_value === '60%' ) echo ' selected'; ?>>60%</option>
                        <option value="70%"<?php if ( $field_value === '70%' ) echo ' selected'; ?>>70%</option>
                        <option value="80%"<?php if ( $field_value === '80%' ) echo ' selected'; ?>>80%</option>
                        <option value="90%"<?php if ( $field_value === '90%' ) echo ' selected'; ?>>90%</option>
                        <option value="right"<?php if ( $field_value === 'right' ) echo ' selected'; ?>>Right</option>
                    </select>
                </div>
                <?php
                     $field_name = 'VideoPath';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?> :
                </div>
                <div>
                    <video-path-input-component container-class="form-upload-container" result-class="form-input" result-name="VideoPath" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" video-class="form-upload-video" error-video-path="/static/video/admin/missing_video.mp4" upload-button-class="form-upload-button" upload-button-image-class="form-upload-icon" upload-button-image-path="/static/image/admin/upload_icon.svg" upload-api-url="/admin/upload/video" delete-button-image-class="form-delete-icon" delete-api-url="/admin/delete/file"></video-path-input-component>
                </div>
                <?php
                     $field_name = 'MetaTitle';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Meta Title' ) ); ?> :
                </div>
                <div>
                    <multilingual-input-component container-class="form-multilingual-input-container" result-class="form-textarea" result-name="MetaTitle" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"></multilingual-input-component>
                </div>
                <?php
                     $field_name = 'MetaDescription';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Meta Description' ) ); ?> :
                </div>
                <div>
                    <multilingual-textarea-component container-class="form-multilingual-textarea-container" result-class="form-textarea" result-name="MetaDescription" language-codes="<?php echo LanguageCodes; ?>" language-names="<?php echo LanguageNames; ?>"><?php echo htmlspecialchars( $field_value ); ?></multilingual-textarea-component>
                </div>
                <?php
                     $field_name = 'MetaImagePath';

                    if ( HasQueryValue( $field_name ) )
                    {
                         $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Meta Image Path' ) ); ?> :
                </div>
                <div>
                    <image-path-input-component container-class="form-upload-container" result-class="form-input" result-name="MetaImagePath" type_="text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" image-class="form-upload-image" error-image-path="/static/image/admin/missing_image.svg" upload-button-class="form-upload-button" upload-button-image-class="form-upload-icon" upload-button-image-path="/static/image/admin/upload_icon.svg" upload-api-url="/admin/upload/image" delete-button-image-class="form-delete-icon" delete-image-code="HandleFileInputDeleteButtonClickEvent( this )"></image-path-input-component>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" onclick="SetPriorUrl()">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button" type="submit">
                </button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
