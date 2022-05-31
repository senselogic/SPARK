<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidEditPageSubPageForm()
    {
        var
            edit_page_sub_page_form,
            it_is_valid_edit_page_sub_page_form,
            page_slug_field,
            sub_page_slug_field,
            number_field;

        edit_page_sub_page_form = document.EditPageSubPageForm;
        page_slug_field = edit_page_sub_page_form.PageSlug;
        sub_page_slug_field = edit_page_sub_page_form.SubPageSlug;
        number_field = edit_page_sub_page_form.Number;

        page_slug_field.RemoveClass( "form-field-error" );
        sub_page_slug_field.RemoveClass( "form-field-error" );
        number_field.RemoveClass( "form-field-error" );

        it_is_valid_edit_page_sub_page_form = true;

        if ( !IsSlugText( page_slug_field.value ) )
        {
            page_slug_field.AddClass( "form-field-error" );

            it_is_valid_edit_page_sub_page_form = false;
        }

        if ( !IsSlugText( sub_page_slug_field.value ) )
        {
            sub_page_slug_field.AddClass( "form-field-error" );

            it_is_valid_edit_page_sub_page_form = false;
        }

        if ( !IsNumericText( number_field.value ) )
        {
            number_field.AddClass( "form-field-error" );

            it_is_valid_edit_page_sub_page_form = false;
        }

        return it_is_valid_edit_page_sub_page_form;
    }
</script>
<div id="edit-page-sub-page-view">
    <div class="page-section form-section">
        <form class="form-centered" name="EditPageSubPageForm" onsubmit="return IsValidEditPageSubPageForm()" action="/admin/page-sub-page/edit/<?php echo htmlspecialchars( $this->PageSubPage->Id ); ?>" method="post">
            <div class="form-container">
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Page Slug' ) ); ?> :
                </div>
                <div>
                    <select class="form-select" name="PageSlug">
                        <?php  $page_array = GetDatabasePageArray(); ?>
                        <?php foreach ( $page_array as  $page ) { ?>
                            <option value="<?php echo htmlspecialchars( GetValueText( $page->Slug ) ); ?>"<?php if ( $this->PageSubPage->PageSlug === $page->Slug ) echo ' selected'; ?>><?php echo htmlspecialchars( $page->Slug ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Sub Page Slug' ) ); ?> :
                </div>
                <div>
                    <select class="form-select" name="SubPageSlug">
                        <?php  $page_array = GetDatabasePageArray(); ?>
                        <?php foreach ( $page_array as  $page ) { ?>
                            <option value="<?php echo htmlspecialchars( GetValueText( $page->Slug ) ); ?>"<?php if ( $this->PageSubPage->SubPageSlug === $page->Slug ) echo ' selected'; ?>><?php echo htmlspecialchars( $page->Slug ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-field-name">
                    <?php echo htmlspecialchars( $this->GetProcessedTextBySlug( 'Number' ) ); ?> :
                </div>
                <div>
                    <input class="form-input" name="Number" type="text" value="<?php echo htmlspecialchars( GetValueText( $this->PageSubPage->Number ) ); ?>"/>
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