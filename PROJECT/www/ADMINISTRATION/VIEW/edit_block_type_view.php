<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>

<script>
    // -- FUNCTIONS

    function IsValidEditBlockTypeForm()
    {
        var
            edit_block_type_form,
            it_is_valid_edit_block_type_form,
            slug_field,
            name_field;

        edit_block_type_form = document.EditBlockTypeForm;
        slug_field = edit_block_type_form.Slug;
        name_field = edit_block_type_form.Name;

        slug_field.RemoveClass( "form-field-error" );
        name_field.RemoveClass( "form-field-error" );

        it_is_valid_edit_block_type_form = true;

        if ( !IsSlugText( slug_field.value ) )
        {
            slug_field.AddClass( "form-field-error" );

            it_is_valid_edit_block_type_form = false;
        }

        if ( name_field.value === "" )
        {
            name_field.AddClass( "form-field-error" );

            it_is_valid_edit_block_type_form = false;
        }

        return it_is_valid_edit_block_type_form;
    }
</script>
<div id="edit-block-type-view">
    <div class="page-section form-section">
        <form class="form-centered" name="EditBlockTypeForm" onsubmit="return IsValidEditBlockTypeForm()" action="/admin/block-type/edit/<?php echo htmlspecialchars( $this->BlockType->Id ); ?>" method="post">
            <div class="form-container" data-is-row data-table-name="BLOCK_TYPE">
                <div class="form-field-name" data-is-column-title data-column-name="Slug">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Slug' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Slug">
                    <input-component class="form-component" result-name="Slug" result-value="<?php echo htmlspecialchars( GetValueText( $this->BlockType->Slug ) ); ?>"></input-component>
                </div>
                <div class="form-field-name" data-is-column-title data-column-name="Name">
                    <?php echo htmlspecialchars( GetTextBySlug( 'Name' ) ); ?> :
                </div>
                <div class="form-field-value" data-is-column-value data-column-name="Name">
                    <input-component class="form-component" result-name="Name" result-value="<?php echo htmlspecialchars( GetValueText( $this->BlockType->Name ) ); ?>"></input-component>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( GetParentRoute( null, '/admin/block-type' ) ); ?>">
                </a>
                <a class="justify-self-end form-button form-button-large apply-button" onclick="this.SubmitForm()">
                </a>
            </div>
        </form>
    </div>
</div>

<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
