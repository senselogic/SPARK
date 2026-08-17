<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<script>
    // -- FUNCTIONS

    function IsValidAddContactForm()
    {
        var
            add_contact_form,
            it_is_valid_add_contact_form,
            id_field,
            name_field,
            company_field,
            email_field,
            phone_field,
            subject_field,
            message_field;

        add_contact_form = document.AddContactForm;
        id_field = add_contact_form.Id;
        name_field = add_contact_form.Name;
        company_field = add_contact_form.Company;
        email_field = add_contact_form.Email;
        phone_field = add_contact_form.Phone;
        subject_field = add_contact_form.Subject;
        message_field = add_contact_form.Message;

        id_field.RemoveClass( "form-field-error" );
        name_field.RemoveClass( "form-field-error" );
        company_field.RemoveClass( "form-field-error" );
        email_field.RemoveClass( "form-field-error" );
        phone_field.RemoveClass( "form-field-error" );
        subject_field.RemoveClass( "form-field-error" );
        message_field.RemoveClass( "form-field-error" );

        it_is_valid_add_contact_form = true;

        if ( id_field.value === "" )
        {
            id_field.AddClass( "form-field-error" );

            it_is_valid_add_contact_form = false;
        }

        if ( name_field.value === "" )
        {
            name_field.AddClass( "form-field-error" );

            it_is_valid_add_contact_form = false;
        }

        if ( company_field.value === "" )
        {
            company_field.AddClass( "form-field-error" );

            it_is_valid_add_contact_form = false;
        }

        if ( email_field.value === "" )
        {
            email_field.AddClass( "form-field-error" );

            it_is_valid_add_contact_form = false;
        }

        if ( phone_field.value === "" )
        {
            phone_field.AddClass( "form-field-error" );

            it_is_valid_add_contact_form = false;
        }

        if ( subject_field.value === "" )
        {
            subject_field.AddClass( "form-field-error" );

            it_is_valid_add_contact_form = false;
        }

        if ( message_field.value === "" )
        {
            message_field.AddClass( "form-field-error" );

            it_is_valid_add_contact_form = false;
        }

        return it_is_valid_add_contact_form;
    }
</script>
<div id="add-contact-view">
    <div class="page-section form-section">
        <form class="form-centered" name="AddContactForm" onsubmit="return IsValidAddContactForm()" action="/admin/contact/add" method="post">
            <div class="form-container" data-is-row data-table-name="CONTACT">
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
                    $field_name = 'Name';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Name' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Name">
                    <input-component class="form-component" result-name="Name" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'Company';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Company">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Company' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Company">
                    <input-component class="form-component" result-name="Company" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'Email';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Email">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Email' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Email">
                    <input-component class="form-component" result-name="Email" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'Phone';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Phone">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Phone' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Phone">
                    <input-component class="form-component" result-name="Phone" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'Subject';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Subject">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Subject' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Subject">
                    <input-component class="form-component" result-name="Subject" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                    $field_name = 'Message';

                    if ( HasQueryValue( $field_name ) )
                    {
                        $field_value = GetQueryValue( $field_name );
                    }
                    else
                    {
                        $field_value = '';
                    }
                ?>
                <div class="form-field-name" data-is-column-title data-column-name="Message">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Message' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Message">
                    <text-input-component class="form-component" result-name="Message" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></text-input-component>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( GetParentRoute( null, '/admin/contact' ) ); ?>">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button">
                </button>
            </div>
        </form>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
