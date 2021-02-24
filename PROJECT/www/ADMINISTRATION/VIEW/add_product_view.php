<?php require __DIR__ . '/' . 'BLOCK/page_header_block.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidAddProductForm()
    {
        var
            add_product_form,
            it_is_valid_add_product_form,
            slug_field,
            name_field,
            text_field,
            image_field,
            video_field,
            department_slug_field;

        it_is_valid_add_product_form = true;

        add_product_form = document.AddProductForm;
        slug_field = add_product_form.Slug;
        name_field = add_product_form.Name;
        text_field = add_product_form.Text;
        image_field = add_product_form.Image;
        video_field = add_product_form.Video;
        department_slug_field = add_product_form.DepartmentSlug;

        if ( slug_field.value !== "" )
        {
            slug_field.classList.remove( "form-field-error" );
        }
        else
        {
            slug_field.classList.add( "form-field-error" );

            it_is_valid_add_product_form = false;
        }

        if ( name_field.value !== "" )
        {
            name_field.classList.remove( "form-field-error" );
        }
        else
        {
            name_field.classList.add( "form-field-error" );

            it_is_valid_add_product_form = false;
        }

        if ( text_field.value !== "" )
        {
            text_field.classList.remove( "form-field-error" );
        }
        else
        {
            text_field.classList.add( "form-field-error" );

            it_is_valid_add_product_form = false;
        }

        if ( image_field.value !== "" )
        {
            image_field.classList.remove( "form-field-error" );
        }
        else
        {
            image_field.classList.add( "form-field-error" );

            it_is_valid_add_product_form = false;
        }

        if ( video_field.value !== "" )
        {
            video_field.classList.remove( "form-field-error" );
        }
        else
        {
            video_field.classList.add( "form-field-error" );

            it_is_valid_add_product_form = false;
        }

        if ( department_slug_field.value !== "" )
        {
            department_slug_field.classList.remove( "form-field-error" );
        }
        else
        {
            department_slug_field.classList.add( "form-field-error" );

            it_is_valid_add_product_form = false;
        }

        return it_is_valid_add_product_form;
    }
</script>
<div>
    <div class="page-section form-section">
        <form class="form-centered" name="AddProductForm" onsubmit="return IsValidAddProductForm()" action="/admin/product/add" method="post">
            <div class="form-container">
                <div class="form-field-name">
                    Slug :
                </div>
                <div>
                    <input class="form-input" name="Slug" type="text"/>
                </div>
                <div class="form-field-name">
                    Name :
                </div>
                <div>
                    <input class="form-input" name="Name" type="text"/>
                </div>
                <div class="form-field-name">
                    Text :
                </div>
                <div>
                    <textarea class="form-textarea" name="Text"></textarea>
                </div>
                <div class="form-field-name">
                    Image :
                </div>
                <div>
                    <input class="form-input" name="Image" type="text" oninput="HandleImagePathInputChangeEvent( this )"/>
                    <div class="form-upload-container">
                        <img class="form-upload-image" src="" onerror="this.src='/static/image/admin/missing_image.svg'"/>
                        <label class="form-upload-button">
                            <img class="form-upload-icon" src="/static/image/admin/upload_icon.svg"/><input id="file" class="form-upload-file" type="file" accept="image/jpeg, image/png, image/webp, image/gif, image/svg" onchange="HandleImageFileInputChangeEvent( this )"/>
                        </label>
                    </div>
                </div>
                <div class="form-field-name">
                    Video :
                </div>
                <div>
                    <input class="form-input" name="Video" type="text" oninput="HandleVideoPathInputChangeEvent( this )"/>
                    <div class="form-upload-container">
                        <video class="form-upload-video" src="" type="video/mp4" onerror="this.src='/static/video/admin/missing_video.mp4'"></video>
                        <label class="form-upload-button">
                            <img class="form-upload-icon" src="/static/image/admin/upload_icon.svg"/><input id="file" class="form-upload-file" type="file" accept="video/mp4" onchange="HandleVideoFileInputChangeEvent( this )"/>
                        </label>
                    </div>
                </div>
                <div class="form-field-name">
                    Department Slug :
                </div>
                <div>
                    <input class="form-input" name="DepartmentSlug" type="text"/>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="/admin/product">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button" type="submit">
                </button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer_block.php'; ?>
