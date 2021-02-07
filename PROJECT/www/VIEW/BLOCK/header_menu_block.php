<style>
    .header-menu-button
    {
        border-radius: 8px;
        padding: 5px 10px;
        background-color: #CCCCCC;
        color: #FFFFFF;
    }

    .header-menu-button:hover,
    .header-menu-button.selected
    {
        background-color: #444444;
        color: #000000;
    }
</style>
<div>
    <button class="header-menu-button selected" data-view-name="home" onclick="SelectView( this )">
        Home
    </button>
    <button class="header-menu-button"  data-view-name="contact" onclick="SelectView( this )">
        Contact
    </button>
</div>
<script>
    // -- STATEMENTS

    AddEventListener(
        "set-view",
        function (
            )
        {
            GetElements( ".header-menu-block-view-button" ).Iterate(
                function (
                    element
                    )
                {
                    if ( element.dataset.viewName === ViewName )
                    {
                        element.AddClass( "selected" );
                    }
                    else
                    {
                        element.RemoveClass( "selected" );
                    }
                }
                );
        }
        );
</script>
