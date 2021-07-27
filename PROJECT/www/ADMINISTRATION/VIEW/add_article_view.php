<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<script>
    // -- FUNCTIONS

    function IsValidAddArticleForm()
    {
        var
            add_article_form,
            it_is_valid_add_article_form,
            slug_field,
            name_field,
            text_field,
            image_path_field,
            video_path_field;

        it_is_valid_add_article_form = true;

        add_article_form = document.AddArticleForm;
        slug_field = add_article_form.Slug;
        name_field = add_article_form.Name;
        text_field = add_article_form.Text;
        image_path_field = add_article_form.ImagePath;
        video_path_field = add_article_form.VideoPath;

        if ( slug_field.value !== "" )
        {
            slug_field.classList.remove( "form-field-error" );
        }
        else
        {
            slug_field.classList.add( "form-field-error" );

            it_is_valid_add_article_form = false;
        }

        if ( name_field.value !== "" )
        {
            name_field.classList.remove( "form-field-error" );
        }
        else
        {
            name_field.classList.add( "form-field-error" );

            it_is_valid_add_article_form = false;
        }

        if ( text_field.value !== "" )
        {
            text_field.classList.remove( "form-field-error" );
        }
        else
        {
            text_field.classList.add( "form-field-error" );

            it_is_valid_add_article_form = false;
        }

        if ( image_path_field.value !== "" )
        {
            image_path_field.classList.remove( "form-field-error" );
        }
        else
        {
            image_path_field.classList.add( "form-field-error" );

            it_is_valid_add_article_form = false;
        }

        if ( video_path_field.value !== "" )
        {
            video_path_field.classList.remove( "form-field-error" );
        }
        else
        {
            video_path_field.classList.add( "form-field-error" );

            it_is_valid_add_article_form = false;
        }

        return it_is_valid_add_article_form;
    }
</script>
<div>
    <div class="page-section form-section">
        <form class="form-centered" name="AddArticleForm" onsubmit="return IsValidAddArticleForm()" action="/admin/article/add" method="post">
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
                    Image Path :
                </div>
                <div>
                    <input class="form-input" name="ImagePath" type="text" oninput="HandleImagePathInputChangeEvent( this )"/>
                    <div class="form-upload-container">
                        <img class="form-upload-image" src="" onerror="this.src='/static/image/admin/missing_image.svg'"/>
                        <label class="form-upload-button">
                            <img class="form-upload-icon" src="/static/image/admin/upload_icon.svg"/><input id="file" class="form-upload-file" type="file" accept="image/jpeg, image/png, image/webp, image/gif, image/svg" onchange="HandleImageFileInputChangeEvent( this )"/>
                        </label>
                    </div>
                </div>
                <div class="form-field-name">
                    Video Path :
                </div>
                <div>
                    <input class="form-input" name="VideoPath" type="text" oninput="HandleVideoPathInputChangeEvent( this )"/>
                    <div class="form-upload-container">
                        <video class="form-upload-video" src="" type="video/mp4" onerror="this.src='/static/video/admin/missing_video.mp4'"></video>
                        <label class="form-upload-button">
                            <img class="form-upload-icon" src="/static/image/admin/upload_icon.svg"/><input id="file" class="form-upload-file" type="file" accept="video/mp4" onchange="HandleVideoFileInputChangeEvent( this )"/>
                        </label>
                    </div>
                </div>
                <a class="justify-self-start form-button form-button-large cancel-button" href="/admin/article">
                </a>
                <button class="justify-self-end form-button form-button-large apply-button" type="submit">
                </button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
