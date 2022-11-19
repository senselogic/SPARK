<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidAddPageSubPageForm()
    {
        var
            add_page_sub_page_form,
            it_is_valid_add_page_sub_page_form,
            id_field,
            page_id_field,
            sub_page_id_field,
            number_field;

        add_page_sub_page_form = document.AddPageSubPageForm;
        id_field = add_page_sub_page_form.Id;
        page_id_field = add_page_sub_page_form.PageId;
        sub_page_id_field = add_page_sub_page_form.SubPageId;
        number_field = add_page_sub_page_form.Number;

        id_field.RemoveClass( "form-field-error" );
        page_id_field.RemoveClass( "form-field-error" );
        sub_page_id_field.RemoveClass( "form-field-error" );
        number_field.RemoveClass( "form-field-error" );

        it_is_valid_add_page_sub_page_form = true;

        if ( id_field.value === "" )
        {
            id_field.AddClass( "form-field-error" );

            it_is_valid_add_page_sub_page_form = false;
        }

        if ( page_id_field.value === "" )
        {
            page_id_field.AddClass( "form-field-error" );

            it_is_valid_add_page_sub_page_form = false;
        }

        if ( sub_page_id_field.value === "" )
        {
            sub_page_id_field.AddClass( "form-field-error" );

            it_is_valid_add_page_sub_page_form = false;
        }

        if ( !IsNumericText( number_field.value ) )
        {
            number_field.AddClass( "form-field-error" );

            it_is_valid_add_page_sub_page_form = false;
        }

        return it_is_valid_add_page_sub_page_form;
    }
</script>
<div id="add-page-sub-page-view">
    <div class="page-section form-section">
        <form class="form-centered" name="AddPageSubPageForm" onsubmit="return IsValidAddPageSubPageForm()" action="/admin/page-sub-page/add" method="post">
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
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Page Id' ) ); ?> :
                </div>
                <div>
                    <select class="form-select" name="PageId">
                        <?php  $page_array = GetPageArray(); ?>
                        <?php foreach ( $page_array as  $page ) { ?>
                            <option value="<?php echo htmlspecialchars( GetValueText( $page->Id ) ); ?>"<?php if ( GetValueText( $page->Id ) === $field_value ) echo ' selected'; ?>><?php echo htmlspecialchars( $page->Id ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php
                     $field_name = 'SubPageId';

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
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Sub Page Id' ) ); ?> :
                </div>
                <div>
                    <select class="form-select" name="SubPageId">
                        <?php  $page_array = GetPageArray(); ?>
                        <?php foreach ( $page_array as  $page ) { ?>
                            <option value="<?php echo htmlspecialchars( GetValueText( $page->Id ) ); ?>"<?php if ( GetValueText( $page->Id ) === $field_value ) echo ' selected'; ?>><?php echo htmlspecialchars( $page->Id ); ?></option>
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
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Number' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Number" type="text" value="<?php echo $field_value; ?>"/>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( $this->ListRoute ); ?>">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button" type="submit">
                </button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
