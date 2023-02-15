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
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Id' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Id" type="text" value="<?php echo $field_value; ?>"/>
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
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Name' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Name" type="text" value="<?php echo $field_value; ?>"/>
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
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Company' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Company" type="text" value="<?php echo $field_value; ?>"/>
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
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Email' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Email" type="text" value="<?php echo $field_value; ?>"/>
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
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Phone' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Phone" type="text" value="<?php echo $field_value; ?>"/>
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
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Subject' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Subject" type="text" value="<?php echo $field_value; ?>"/>
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
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Message' ) ); ?> :
                </div>
                <div>
                    <textarea class="form-textarea" name="Message"><?php echo $field_value; ?></textarea>
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
