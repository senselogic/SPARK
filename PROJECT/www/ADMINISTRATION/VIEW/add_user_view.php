<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidAddUserForm()
    {
        var
            add_user_form,
            it_is_valid_add_user_form,
            id_field,
            pseudonym_field,
            password_field,
            role_field,
            email_field;

        add_user_form = document.AddUserForm;
        id_field = add_user_form.Id;
        pseudonym_field = add_user_form.Pseudonym;
        password_field = add_user_form.Password;
        role_field = add_user_form.Role;
        email_field = add_user_form.Email;

        id_field.RemoveClass( "form-field-error" );
        pseudonym_field.RemoveClass( "form-field-error" );
        password_field.RemoveClass( "form-field-error" );
        role_field.RemoveClass( "form-field-error" );
        email_field.RemoveClass( "form-field-error" );

        it_is_valid_add_user_form = true;

        if ( id_field.value === "" )
        {
            id_field.AddClass( "form-field-error" );

            it_is_valid_add_user_form = false;
        }

        if ( pseudonym_field.value === "" )
        {
            pseudonym_field.AddClass( "form-field-error" );

            it_is_valid_add_user_form = false;
        }

        if ( password_field.value === "" )
        {
            password_field.AddClass( "form-field-error" );

            it_is_valid_add_user_form = false;
        }

        if ( role_field.value === "" )
        {
            role_field.AddClass( "form-field-error" );

            it_is_valid_add_user_form = false;
        }

        if ( email_field.value === "" )
        {
            email_field.AddClass( "form-field-error" );

            it_is_valid_add_user_form = false;
        }

        return it_is_valid_add_user_form;
    }
</script>
<div id="add-user-view">
    <div class="page-section form-section">
        <form class="form-centered" name="AddUserForm" onsubmit="return IsValidAddUserForm()" action="/admin/user/add" method="post">
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
                    <input-component result-class="form-input" result-name="Id" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                     $field_name = 'Pseudonym';

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
                    <?php echo htmlspecialchars( GetTextBySlug( 'Pseudonym' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Pseudonym" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                     $field_name = 'Password';

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
                    <?php echo htmlspecialchars( GetTextBySlug( 'Password' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Password" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
                </div>
                <?php
                     $field_name = 'Role';

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
                    <?php echo htmlspecialchars( GetTextBySlug( 'Role' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Role" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
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
                    <?php echo htmlspecialchars( GetTextBySlug( 'Email' ) ); ?> :
                </div>
                <div>
                    <input-component result-class="form-input" result-name="Email" result-value="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
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
