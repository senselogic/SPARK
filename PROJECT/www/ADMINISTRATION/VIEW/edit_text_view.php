<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidEditTextForm()
    {
        var
            edit_text_form,
            it_is_valid_edit_text_form,
            slug_field,
            text_field;

        it_is_valid_edit_text_form = true;

        edit_text_form = document.EditTextForm;
        slug_field = edit_text_form.Slug;
        text_field = edit_text_form.Text;

        if ( slug_field.value !== "" )
        {
            slug_field.classList.remove( "form-field-error" );
        }
        else
        {
            slug_field.classList.add( "form-field-error" );

            it_is_valid_edit_text_form = false;
        }

        if ( text_field.value !== "" )
        {
            text_field.classList.remove( "form-field-error" );
        }
        else
        {
            text_field.classList.add( "form-field-error" );

            it_is_valid_edit_text_form = false;
        }

        return it_is_valid_edit_text_form;
    }
</script>
<div class="edit-text-view">
    <div class="page-section form-section">
        <form class="form-centered" name="EditTextForm" onsubmit="return IsValidEditTextForm()" action="/admin/text/edit/<?php echo htmlspecialchars( $this->Text->Id ); ?>" method="post">
            <div class="form-container">
                <div class="form-field-name">
                    Slug :
                </div>
                <div>
                    <input class="form-input" name="Slug" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->Text->Slug ) ); ?>"/>
                </div>
                <div class="form-field-name">
                    Text :
                </div>
                <div>
                    <textarea class="form-textarea" name="Text"><?php echo htmlspecialchars( $this->Text->Text ); ?></textarea>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="<?php echo htmlspecialchars( $this->ListPage ); ?>">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button" type="submit">
                </button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
