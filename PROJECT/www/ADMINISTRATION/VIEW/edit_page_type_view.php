<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidEditPageTypeForm()
    {
        var
            edit_page_type_form,
            it_is_valid_edit_page_type_form,
            slug_field,
            title_field;

        edit_page_type_form = document.EditPageTypeForm;
        slug_field = edit_page_type_form.Slug;
        title_field = edit_page_type_form.Title;

        slug_field.RemoveClass( "form-field-error" );
        title_field.RemoveClass( "form-field-error" );

        it_is_valid_edit_page_type_form = true;

        if ( !IsSlugText( slug_field.value ) )
        {
            slug_field.AddClass( "form-field-error" );

            it_is_valid_edit_page_type_form = false;
        }

        return it_is_valid_edit_page_type_form;
    }
</script>
<div id="edit-page-type-view">
    <div class="page-section form-section">
        <form class="form-centered" name="EditPageTypeForm" onsubmit="return IsValidEditPageTypeForm()" action="/admin/page-type/edit/<?php echo htmlspecialchars( $this->PageType->Id ); ?>" method="post">
            <div class="form-container">
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Slug' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Slug" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->PageType->Slug ) ); ?>"/>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Title' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Title" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->PageType->Title ) ); ?>"/>
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
