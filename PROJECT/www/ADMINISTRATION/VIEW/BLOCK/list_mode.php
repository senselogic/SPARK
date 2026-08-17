<div id="list-mode-button" class="form-button form-button-large list-button" onclick="ToggleListMode()">
</div>
<script>
    // -- FUNCTIONS

    function GetListMode(
        )
    {
        return FindSessionValue( "<?php echo $list_mode_name; ?>", "card" );
    }

    // ~~

    function ApplyListMode(
        )
    {
        if ( GetListMode() === "cell" )
        {
            GetElements( ".cell-list" ).RemoveClass( "is-hidden" );
            GetElements( ".card-list" ).AddClass( "is-hidden" );
        }
        else
        {
            GetElements( ".cell-list" ).AddClass( "is-hidden" );
            GetElements( ".card-list" ).RemoveClass( "is-hidden" );
        }
    }

    // ~~

    function ToggleListMode(
        )
    {
        if ( GetListMode() === "cell" )
        {
            SetSessionValue( "<?php echo $list_mode_name; ?>", "card" );
        }
        else
        {
            SetSessionValue( "<?php echo $list_mode_name; ?>", "cell" );
        }

        ApplyListMode();
    }

    // -- STATEMENTS

    DelayCall( ApplyListMode );
</script>
