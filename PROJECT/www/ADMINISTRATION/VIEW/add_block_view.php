<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<script>
    // -- FUNCTIONS

    function IsValidAddBlockForm()
    {
        var
            add_block_form,
            it_is_valid_add_block_form,
            id_field,
            slug_field,
            page_id_field,
            type_slug_field,
            number_field,
            language_code_array_field,
            minimum_height_field,
            title_field,
            title_array_field,
            teaser_field,
            teaser_array_field,
            text_field,
            text_array_field,
            route_field,
            route_array_field,
            image_side_field,
            image_title_field,
            image_title_array_field,
            image_path_field,
            image_path_array_field,
            image_vertical_position_field,
            image_vertical_position_array_field,
            image_horizontal_position_field,
            image_horizontal_position_array_field,
            image_fit_field,
            video_path_field,
            video_path_array_field,
            document_path_field,
            document_path_array_field,
            key_array_field,
            value_array_field;

        add_block_form = document.AddBlockForm;
        id_field = add_block_form.Id;
        slug_field = add_block_form.Slug;
        page_id_field = add_block_form.PageId;
        type_slug_field = add_block_form.TypeSlug;
        number_field = add_block_form.Number;
        language_code_array_field = add_block_form.LanguageCodeArray;
        minimum_height_field = add_block_form.MinimumHeight;
        title_field = add_block_form.Title;
        title_array_field = add_block_form.TitleArray;
        teaser_field = add_block_form.Teaser;
        teaser_array_field = add_block_form.TeaserArray;
        text_field = add_block_form.Text;
        text_array_field = add_block_form.TextArray;
        route_field = add_block_form.Route;
        route_array_field = add_block_form.RouteArray;
        image_side_field = add_block_form.ImageSide;
        image_title_field = add_block_form.ImageTitle;
        image_title_array_field = add_block_form.ImageTitleArray;
        image_path_field = add_block_form.ImagePath;
        image_path_array_field = add_block_form.ImagePathArray;
        image_vertical_position_field = add_block_form.ImageVerticalPosition;
        image_vertical_position_array_field = add_block_form.ImageVerticalPositionArray;
        image_horizontal_position_field = add_block_form.ImageHorizontalPosition;
        image_horizontal_position_array_field = add_block_form.ImageHorizontalPositionArray;
        image_fit_field = add_block_form.ImageFit;
        video_path_field = add_block_form.VideoPath;
        video_path_array_field = add_block_form.VideoPathArray;
        document_path_field = add_block_form.DocumentPath;
        document_path_array_field = add_block_form.DocumentPathArray;
        key_array_field = add_block_form.KeyArray;
        value_array_field = add_block_form.ValueArray;

        id_field.RemoveClass( "form-field-error" );
        slug_field.RemoveClass( "form-field-error" );
        page_id_field.RemoveClass( "form-field-error" );
        type_slug_field.RemoveClass( "form-field-error" );
        number_field.RemoveClass( "form-field-error" );
        language_code_array_field.RemoveClass( "form-field-error" );
        minimum_height_field.RemoveClass( "form-field-error" );
        title_field.RemoveClass( "form-field-error" );
        title_array_field.RemoveClass( "form-field-error" );
        teaser_field.RemoveClass( "form-field-error" );
        teaser_array_field.RemoveClass( "form-field-error" );
        text_field.RemoveClass( "form-field-error" );
        text_array_field.RemoveClass( "form-field-error" );
        route_field.RemoveClass( "form-field-error" );
        route_array_field.RemoveClass( "form-field-error" );
        image_side_field.RemoveClass( "form-field-error" );
        image_title_field.RemoveClass( "form-field-error" );
        image_title_array_field.RemoveClass( "form-field-error" );
        image_path_field.RemoveClass( "form-field-error" );
        image_path_array_field.RemoveClass( "form-field-error" );
        image_vertical_position_field.RemoveClass( "form-field-error" );
        image_vertical_position_array_field.RemoveClass( "form-field-error" );
        image_horizontal_position_field.RemoveClass( "form-field-error" );
        image_horizontal_position_array_field.RemoveClass( "form-field-error" );
        image_fit_field.RemoveClass( "form-field-error" );
        video_path_field.RemoveClass( "form-field-error" );
        video_path_array_field.RemoveClass( "form-field-error" );
        document_path_field.RemoveClass( "form-field-error" );
        document_path_array_field.RemoveClass( "form-field-error" );
        key_array_field.RemoveClass( "form-field-error" );
        value_array_field.RemoveClass( "form-field-error" );

        it_is_valid_add_block_form = true;

        if ( id_field.value === "" )
        {
            id_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( !IsSlugText( slug_field.value )
             && slug_field.value !== ""  )
        {
            slug_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( page_id_field.value === "" )
        {
            page_id_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( !IsSlugText( type_slug_field.value ) )
        {
            type_slug_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( !IsNumericText( number_field.value ) )
        {
            number_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( language_code_array_field.value === "" )
        {
            language_code_array_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( minimum_height_field.value === "" )
        {
            minimum_height_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( image_side_field.value === "" )
        {
            image_side_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( image_vertical_position_field.value === "" )
        {
            image_vertical_position_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( image_vertical_position_array_field.value === "" )
        {
            image_vertical_position_array_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( image_horizontal_position_field.value === "" )
        {
            image_horizontal_position_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( image_horizontal_position_array_field.value === "" )
        {
            image_horizontal_position_array_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        if ( image_fit_field.value === "" )
        {
            image_fit_field.AddClass( "form-field-error" );

            it_is_valid_add_block_form = false;
        }

        return it_is_valid_add_block_form;
    }
</script>
<div id="add-block-view">
    <div class="page-section form-section">
        <form class="form-centered" name="AddBlockForm" onsubmit="return IsValidAddBlockForm()" action="/admin/block/add" method="post">
            <div class="form-container" data-is-row data-table-name="BLOCK">
                <?php
                    $field_name = 'Id';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = GetRandomTuid();
                    }
                ?>
                <div class="form-field-name is-hidden" data-is-column-title data-column-name="Id">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Id' ) ); ?> :
                </div>
                <div class="form-field-value is-hidden" data-is-column-value data-column-name="Id">
                    <input-component class="form-component" result-name="Id" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'Slug';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "...-page-...";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Slug">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Slug">
                    <input-component class="form-component" result-name="Slug" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'PageId';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="PageId">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Page Id' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="PageId">
                    <dropdown-component class="form-component" result-name="PageId" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetElementPropertyArray( $this->PageArray, 'Id' ) ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->PageArray, 'Title' ) ) ) ) ); ?>"></dropdown-component>
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
                <div class="form-field-name" data-is-column-title data-column-name="TypeSlug">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Type Slug' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="TypeSlug">
                    <dropdown-component class="form-component" result-name="TypeSlug" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetElementPropertyArray( $this->BlockTypeArray, 'Slug' ) ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( GetUntranslatedElementArray( GetElementPropertyArray( $this->BlockTypeArray, 'Name' ) ) ) ) ); ?>"></dropdown-component>
                </div>
                <?php
                    $field_name = 'Number';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "1";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Number">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Number">
                    <input-component class="form-component" result-name="Number" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'LanguageCodeArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[ \"en\", \"fr\" ]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="LanguageCodeArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Language Code Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="LanguageCodeArray">
                    <dropdown-list-component class="form-component" result-name="LanguageCodeArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'en', 'fr', 'de', 'ja', 'ru' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'English', 'French', 'German', 'Japanese', 'Russian' ] ) ) ); ?>"></dropdown-list-component>
                </div>
                <?php
                    $field_name = 'MinimumHeight';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "56.25%";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="MinimumHeight">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Minimum Height' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="MinimumHeight">
                    <input-component class="form-component" result-name="MinimumHeight" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
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
                <div class="form-field-name" data-is-column-title data-column-name="Title">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Title' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Title">
                    <multilingual-text-input-component class="form-component" result-name="Title" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
                </div>
                <?php
                    $field_name = 'TitleArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="TitleArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Title Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="TitleArray">
                    <multilingual-text-input-list-component class="form-component" result-name="TitleArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
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
                <div class="form-field-name" data-is-column-title data-column-name="Teaser">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Teaser' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Teaser">
                    <multilingual-text-input-component class="form-component" result-name="Teaser" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
                </div>
                <?php
                    $field_name = 'TeaserArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="TeaserArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Teaser Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="TeaserArray">
                    <multilingual-text-input-list-component class="form-component" result-name="TeaserArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
                </div>
                <?php
                    $field_name = 'Text';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Text">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Text' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Text">
                    <multilingual-text-input-component class="form-component" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
                </div>
                <?php
                    $field_name = 'TextArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="TextArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Text Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="TextArray">
                    <multilingual-text-input-list-component class="form-component" result-name="TextArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
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
                <div class="form-field-name" data-is-column-title data-column-name="Route">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Route' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Route">
                    <multilingual-input-component class="form-component" result-name="Route" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-component>
                </div>
                <?php
                    $field_name = 'RouteArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="RouteArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Route Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="RouteArray">
                    <multilingual-input-list-component class="form-component" result-name="RouteArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-list-component>
                </div>
                <?php
                    $field_name = 'ImageSide';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "left";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ImageSide">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Side' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImageSide">
                    <dropdown-component class="form-component" result-name="ImageSide" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'left', 'right' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Left', 'Right' ] ) ) ); ?>"></dropdown-component>
                </div>
                <?php
                    $field_name = 'ImageTitle';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ImageTitle">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Title' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImageTitle">
                    <multilingual-text-input-component class="form-component" result-name="ImageTitle" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-component>
                </div>
                <?php
                    $field_name = 'ImageTitleArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ImageTitleArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Title Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImageTitleArray">
                    <multilingual-text-input-list-component class="form-component" result-name="ImageTitleArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
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
                <div class="form-field-name" data-is-column-title data-column-name="ImagePath">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Path' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImagePath">
                    <multilingual-image-path-input-component class="form-component" result-name="ImagePath" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" error-image-path="/static/image/admin/missing_image.svg" upload-api-url="/admin/upload/image" delete-api-url="/admin/delete/file" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-image-path-input-component>
                </div>
                <?php
                    $field_name = 'ImagePathArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ImagePathArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Path Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImagePathArray">
                    <image-path-input-list-component class="form-component" result-name="ImagePathArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" error-image-path="/static/image/admin/missing_image.svg" upload-api-url="/admin/upload/image" delete-api-url="/admin/delete/file"></image-path-input-list-component>
                </div>
                <?php
                    $field_name = 'ImageVerticalPosition';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "center";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ImageVerticalPosition">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImageVerticalPosition">
                    <dropdown-component class="form-component" result-name="ImageVerticalPosition" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'top', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'bottom' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Top', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Bottom' ] ) ) ); ?>"></dropdown-component>
                </div>
                <?php
                    $field_name = 'ImageVerticalPositionArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ImageVerticalPositionArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Vertical Position Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImageVerticalPositionArray">
                    <dropdown-list-component class="form-component" result-name="ImageVerticalPositionArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'top', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'bottom' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Top', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Bottom' ] ) ) ); ?>"></dropdown-list-component>
                </div>
                <?php
                    $field_name = 'ImageHorizontalPosition';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "center";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ImageHorizontalPosition">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImageHorizontalPosition">
                    <dropdown-component class="form-component" result-name="ImageHorizontalPosition" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'left', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'right' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Left', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Right' ] ) ) ); ?>"></dropdown-component>
                </div>
                <?php
                    $field_name = 'ImageHorizontalPositionArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ImageHorizontalPositionArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Horizontal Position Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImageHorizontalPositionArray">
                    <dropdown-list-component class="form-component" result-name="ImageHorizontalPositionArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'left', '10%', '20%', '30%', '40%', 'center', '60%', '70%', '80%', '90%', 'right' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Left', '10%', '20%', '30%', '40%', 'Center', '60%', '70%', '80%', '90%', 'Right' ] ) ) ); ?>"></dropdown-list-component>
                </div>
                <?php
                    $field_name = 'ImageFit';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "cover";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ImageFit">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Image Fit' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ImageFit">
                    <dropdown-component class="form-component" result-name="ImageFit" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'cover', 'contain' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'Cover', 'Contain' ] ) ) ); ?>"></dropdown-component>
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
                <div class="form-field-name" data-is-column-title data-column-name="VideoPath">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Video Path' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="VideoPath">
                    <multilingual-video-path-input-component class="form-component" result-name="VideoPath" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" error-video-path="/static/video/admin/missing_video.mp4" upload-api-url="/admin/upload/video" delete-api-url="/admin/delete/file" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-video-path-input-component>
                </div>
                <?php
                    $field_name = 'VideoPathArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="VideoPathArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Video Path Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="VideoPathArray">
                    <video-path-input-list-component class="form-component" result-name="VideoPathArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" error-video-path="/static/video/admin/missing_video.mp4" upload-api-url="/admin/upload/video" delete-api-url="/admin/delete/file"></video-path-input-list-component>
                </div>
                <?php
                    $field_name = 'DocumentPath';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="DocumentPath">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Document Path' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="DocumentPath">
                    <document-path-input-component class="form-component" result-name="DocumentPath" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" error-image-path="/static/image/admin/missing_image.svg" document-image-path="/static/image/admin/document_icon.svg" upload-api-url="/admin/upload/document" delete-api-url="/admin/delete/file"></document-path-input-component>
                </div>
                <?php
                    $field_name = 'DocumentPathArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="DocumentPathArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Document Path Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="DocumentPathArray">
                    <document-path-input-list-component class="form-component" result-name="DocumentPathArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" error-image-path="/static/image/admin/missing_image.svg" document-image-path="/static/image/admin/document_icon.svg" upload-api-url="/admin/upload/document" delete-api-url="/admin/delete/file"></document-path-input-list-component>
                </div>
                <?php
                    $field_name = 'KeyArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="KeyArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Key Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="KeyArray">
                    <multilingual-text-input-list-component class="form-component" result-name="KeyArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
                </div>
                <?php
                    $field_name = 'ValueArray';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "[]";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="ValueArray">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Value Array' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="ValueArray">
                    <multilingual-text-input-list-component class="form-component" result-name="ValueArray" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-text-input-list-component>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( GetParentRoute( null, '/admin/block' ) ); ?>">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button">
                </button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/block_footer.php'; ?>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
