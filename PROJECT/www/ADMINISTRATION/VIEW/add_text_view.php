<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<script>
    // -- FUNCTIONS

    function IsValidAddTextForm()
    {
        var
            add_text_form,
            it_is_valid_add_text_form,
            id_field,
            slug_field,
            text_field;

        add_text_form = document.AddTextForm;
        id_field = add_text_form.Id;
        slug_field = add_text_form.Slug;
        text_field = add_text_form.Text;

        id_field.RemoveClass( "form-field-error" );
        slug_field.RemoveClass( "form-field-error" );
        text_field.RemoveClass( "form-field-error" );

        it_is_valid_add_text_form = true;

        if ( id_field.value === "" )
        {
            id_field.AddClass( "form-field-error" );

            it_is_valid_add_text_form = false;
        }

        if ( !IsSlugText( slug_field.value ) )
        {
            slug_field.AddClass( "form-field-error" );

            it_is_valid_add_text_form = false;
        }

        if ( text_field.value === "" )
        {
            text_field.AddClass( "form-field-error" );

            it_is_valid_add_text_form = false;
        }

        return it_is_valid_add_text_form;
    }
</script>
<div id="add-text-view">
    <div class="page-section form-section">
        <form class="form-centered" name="AddTextForm" onsubmit="return IsValidAddTextForm()" action="/admin/text/add" method="post">
            <div class="form-container" data-is-row data-table-name="TEXT">
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
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Slug">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Slug">
                    <input-component class="form-component" result-name="Slug" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
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
                <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( GetParentRoute( null, '/admin/text' ) ); ?>">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button">
                </button>
            </div>
        </form>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
