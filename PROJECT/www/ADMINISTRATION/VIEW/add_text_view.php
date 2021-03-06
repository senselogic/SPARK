<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidAddTextForm()
    {
        var
            add_text_form,
            it_is_valid_add_text_form,
            slug_field,
            text_field;

        it_is_valid_add_text_form = true;

        add_text_form = document.AddTextForm;
        slug_field = add_text_form.Slug;
        text_field = add_text_form.Text;

        if ( slug_field.value !== "" )
        {
            slug_field.classList.remove( "form-field-error" );
        }
        else
        {
            slug_field.classList.add( "form-field-error" );

            it_is_valid_add_text_form = false;
        }

        if ( text_field.value !== "" )
        {
            text_field.classList.remove( "form-field-error" );
        }
        else
        {
            text_field.classList.add( "form-field-error" );

            it_is_valid_add_text_form = false;
        }

        return it_is_valid_add_text_form;
    }
</script>
<div>
    <div class="page-section form-section">
        <form class="form-centered" name="AddTextForm" onsubmit="return IsValidAddTextForm()" action="/admin/text/add" method="post">
            <div class="form-container">
                <div class="form-field-name">
                    Slug :
                </div>
                <div>
                    <input class="form-input" name="Slug" type="text"/>
                </div>
                <div class="form-field-name">
                    Text :
                </div>
                <div>
                    <textarea class="form-textarea" name="Text"></textarea>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="/admin/text">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button" type="submit">
                </button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
