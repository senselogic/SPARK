<script src="/static/script/vista_base.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_text.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_element.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_animation.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_request.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_storage.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_scroll.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_viewport.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_sortable_grid.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_sortable_table.js?v=<?php echo VersionTimestamp; ?>"></script>
<script src="/static/script/vista_multilingual_input.js?v=<?php echo VersionTimestamp; ?>"></script>
<script>
    // -- FUNCTIONS

    function HandleImagePathInputChangeEvent(
        path_element
        )
    {
        path_element.GetNextElement().GetFirstChildElement().src = path_element.value;
    }

    // ~~

    function HandleVideoPathInputChangeEvent(
        path_element
        )
    {
        path_element.GetNextElement().GetFirstChildElement().src = path_element.value;
    }

    // ~~

    async function HandleImageFileInputChangeEvent(
        file_element
        )
    {
        var
            file_element,
            request,
            form_data;

        if ( file_element.files.length > 0 )
        {
            form_data = new FormData();
            form_data.append( "File", file_element.files[ 0 ] );
            request = await SendRequest( "/admin/upload/image", "POST", form_data );

            if ( request.status === 201 )
            {
                file_path = GetJsonObject( request.response );
                file_element.GetParentElement().GetPriorElement().src = file_path;
                file_element.GetParentElement().GetParentElement().GetPriorElement().value = file_path;
            }
        }
    }

    // ~~

    async function HandleVideoFileInputChangeEvent(
        file_element
        )
    {
        var
            file_element,
            request,
            form_data;

        if ( file_element.files.length > 0 )
        {
            form_data = new FormData();
            form_data.append( "File", file_element.files[ 0 ] );
            request = await SendRequest( "/admin/upload/video", "POST", form_data );

            if ( request.status === 201 )
            {
                file_path = GetJsonObject( request.response );
                file_element.GetParentElement().GetPriorElement().src = file_path;
                file_element.GetParentElement().GetParentElement().GetPriorElement().value = file_path;
            }
        }
    }

    // ~~

    async function HandleDocumentFileInputChangeEvent(
        file_element
        )
    {
        var
            file_element,
            request,
            form_data;

        if ( file_element.files.length > 0 )
        {
            form_data = new FormData();
            form_data.append( "File", file_element.files[ 0 ] );
            request = await SendRequest( "/admin/upload/document", "POST", form_data );

            if ( request.status === 201 )
            {
                file_path = GetJsonObject( request.response );
                file_element.GetParentElement().GetPriorElement().src = file_path;
                file_element.GetParentElement().GetParentElement().GetPriorElement().value = file_path;
            }
        }
    }

    // ~~

    async function HandleFileInputDeleteButtonClickEvent(
        button_element
        )
    {
        var
            file_path,
            file_path_input_element,
            file_element,
            request,
            form_data;

        file_path_input_element = button_element.GetParentElement().GetPriorElement();
        file_path = file_path_input_element.value;

        if ( file_path.HasPrefix( "/upload/" ) )
        {
            form_data = new FormData();
            form_data.append( "FilePath", file_path );
            request = await SendRequest( "/admin/delete/file", "POST", form_data );

            if ( request.status === 201 )
            {
                file_path_input_element.value = "";
                button_element.GetPriorElement().GetPriorElement().src = "";
            }
        }
    }

    // ~~

    function InitializeTextAreas(
        )
    {
        GetElements( ".form-textarea" )
            .SetContentHeight()
            .AddEventListener( "input", ( event ) => event.target.SetContentHeight() );
    }

    // -- STATEMENTS

    DelayCall( InitializeSortableTableColumns );
    DelayCall( InitializeMultilingualInputs );
    DelayCall( InitializeTextAreas );
</script>
