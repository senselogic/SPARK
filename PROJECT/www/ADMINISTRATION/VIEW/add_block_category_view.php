<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidAddBlockCategoryForm()
    {
        var
            add_block_category_form,
            it_is_valid_add_block_category_form,
            id_field,
            slug_field,
            name_field;

        add_block_category_form = document.AddBlockCategoryForm;
        id_field = add_block_category_form.Id;
        slug_field = add_block_category_form.Slug;
        name_field = add_block_category_form.Name;

        id_field.RemoveClass( "form-field-error" );
        slug_field.RemoveClass( "form-field-error" );
        name_field.RemoveClass( "form-field-error" );

        it_is_valid_add_block_category_form = true;

        if ( id_field.value === "" )
        {
            id_field.AddClass( "form-field-error" );

            it_is_valid_add_block_category_form = false;
        }

        if ( !IsSlugText( slug_field.value ) )
        {
            slug_field.AddClass( "form-field-error" );

            it_is_valid_add_block_category_form = false;
        }

        if ( name_field.value === "" )
        {
            name_field.AddClass( "form-field-error" );

            it_is_valid_add_block_category_form = false;
        }

        return it_is_valid_add_block_category_form;
    }
</script>
<div id="add-block-category-view">
    <div class="page-section form-section">
        <form class="form-centered" name="AddBlockCategoryForm" onsubmit="return IsValidAddBlockCategoryForm()" action="/admin/block-category/add" method="post">
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
                    <input-component class_="form-input" name_="Id" type_="text" value_="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
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
                    <input-component class_="form-input" name_="Slug" type_="text" value_="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
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
                    <?php echo htmlspecialchars( GetTextBySlug( 'Name' ) ); ?> :
                </div>
                <div>
                    <input-component class_="form-input" name_="Name" type_="text" value_="<?php echo htmlspecialchars( GetValueText( $field_value ) ); ?>"></input-component>
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
