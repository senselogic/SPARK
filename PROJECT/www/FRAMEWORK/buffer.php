<?php // -- FUNCTIONS

function BeginBuffer(
    )
{
    return ob_start();
}

// ~~

function GetBuffer(
    )
{
    return ob_get_contents();
}

// ~~

function EndBuffer(
    )
{
    return ob_end_clean();
}
