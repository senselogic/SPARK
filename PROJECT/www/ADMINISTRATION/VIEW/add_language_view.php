<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<script>
    // -- FUNCTIONS

    function IsValidAddLanguageForm()
    {
        var
            add_language_form,
            it_is_valid_add_language_form,
            id_field,
            code_field,
            number_field,
            text_field,
            is_active_field;

        add_language_form = document.AddLanguageForm;
        id_field = add_language_form.Id;
        code_field = add_language_form.Code;
        number_field = add_language_form.Number;
        text_field = add_language_form.Text;
        is_active_field = add_language_form.IsActive;

        id_field.RemoveClass( "form-field-error" );
        code_field.RemoveClass( "form-field-error" );
        number_field.RemoveClass( "form-field-error" );
        text_field.RemoveClass( "form-field-error" );
        is_active_field.RemoveClass( "form-field-error" );

        it_is_valid_add_language_form = true;

        if ( id_field.value === "" )
        {
            id_field.AddClass( "form-field-error" );

            it_is_valid_add_language_form = false;
        }

        if ( code_field.value === "" )
        {
            code_field.AddClass( "form-field-error" );

            it_is_valid_add_language_form = false;
        }

        if ( !IsNumericText( number_field.value ) )
        {
            number_field.AddClass( "form-field-error" );

            it_is_valid_add_language_form = false;
        }

        if ( text_field.value === "" )
        {
            text_field.AddClass( "form-field-error" );

            it_is_valid_add_language_form = false;
        }

        if ( !IsBooleanText( is_active_field.value )
             && !IsBinaryText( is_active_field.value ) )
        {
            is_active_field.AddClass( "form-field-error" );

            it_is_valid_add_language_form = false;
        }

        return it_is_valid_add_language_form;
    }
</script>
<div id="add-language-view">
    <div class="page-section form-section">
        <form class="form-centered" name="AddLanguageForm" onsubmit="return IsValidAddLanguageForm()" action="/admin/language/add" method="post">
            <div class="form-container" data-is-row data-table-name="LANGUAGE">
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
                    $field_name = 'Code';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Code">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Code' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Code">
                    <input-component class="form-component" result-name="Code" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
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
                <div class="form-field-name" data-is-column-title data-column-name="Number">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Number' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Number">
                    <input-component class="form-component" result-name="Number" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
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
                    <multilingual-input-component class="form-component" result-name="Text" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>" language-tags="<?php echo htmlspecialchars( GetValueText( GetJsonText( LanguageTagArray ) ) ); ?>"></multilingual-input-component>
                </div>
                <?php
                    $field_name = 'IsActive';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "1";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="IsActive">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Is Active' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="IsActive">
                    <dropdown-component class="form-component" result-name="IsActive" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ '0', '1' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'False', 'True' ] ) ) ); ?>"></dropdown-component>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( GetParentRoute( null, '/admin/language' ) ); ?>">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button">
                </button>
            </div>
        </form>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
