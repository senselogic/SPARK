<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<script>
    // -- FUNCTIONS

    function IsValidAddConnectionForm()
    {
        var
            add_connection_form,
            it_is_valid_add_connection_form,
            id_field,
            browser_address_field,
            date_time_field,
            is_failed_field,
            attempt_count_field;

        add_connection_form = document.AddConnectionForm;
        id_field = add_connection_form.Id;
        browser_address_field = add_connection_form.BrowserAddress;
        date_time_field = add_connection_form.DateTime;
        is_failed_field = add_connection_form.IsFailed;
        attempt_count_field = add_connection_form.AttemptCount;

        id_field.RemoveClass( "form-field-error" );
        browser_address_field.RemoveClass( "form-field-error" );
        date_time_field.RemoveClass( "form-field-error" );
        is_failed_field.RemoveClass( "form-field-error" );
        attempt_count_field.RemoveClass( "form-field-error" );

        it_is_valid_add_connection_form = true;

        if ( id_field.value === "" )
        {
            id_field.AddClass( "form-field-error" );

            it_is_valid_add_connection_form = false;
        }

        if ( browser_address_field.value === "" )
        {
            browser_address_field.AddClass( "form-field-error" );

            it_is_valid_add_connection_form = false;
        }

        if ( date_time_field.value === "" )
        {
            date_time_field.AddClass( "form-field-error" );

            it_is_valid_add_connection_form = false;
        }

        if ( !IsBooleanText( is_failed_field.value )
             && !IsBinaryText( is_failed_field.value ) )
        {
            is_failed_field.AddClass( "form-field-error" );

            it_is_valid_add_connection_form = false;
        }

        if ( !IsIntegerText( attempt_count_field.value ) )
        {
            attempt_count_field.AddClass( "form-field-error" );

            it_is_valid_add_connection_form = false;
        }

        return it_is_valid_add_connection_form;
    }
</script>
<div id="add-connection-view">
    <div class="page-section form-section">
        <form class="form-centered" name="AddConnectionForm" onsubmit="return IsValidAddConnectionForm()" action="/admin/connection/add" method="post">
            <div class="form-container" data-is-row data-table-name="CONNECTION">
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
                    $field_name = 'BrowserAddress';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="BrowserAddress">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Browser Address' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="BrowserAddress">
                    <input-component class="form-component" result-name="BrowserAddress" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'DateTime';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="DateTime">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Date Time' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="DateTime">
                    <input-component class="form-component" result-name="DateTime" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'IsFailed';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "0";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="IsFailed">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Is Failed' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="IsFailed">
                    <dropdown-component class="form-component" result-name="IsFailed" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"  option-values="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ '0', '1' ] ) ) ); ?>" option-names="<?php echo htmlspecialchars( GetValueText( GetJsonText( [ 'False', 'True' ] ) ) ); ?>"></dropdown-component>
                </div>
                <?php
                    $field_name = 'AttemptCount';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = "0";
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="AttemptCount">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Attempt Count' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="AttemptCount">
                    <input-component class="form-component" result-name="AttemptCount" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( GetParentRoute( null, '/admin/connection' ) ); ?>">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button">
                </button>
            </div>
        </form>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
