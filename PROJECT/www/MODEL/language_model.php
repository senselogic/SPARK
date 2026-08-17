<?php // -- IMPORTS

require_once __DIR__ . '/' . 'language.php';

// -- FUNCTION

function GetActiveLanguageArray(
    array &$language_array
    )
{
    $active_language_array = [];

    foreach ( $language_array as $language )
    {
        if ( $language->IsActive )
        {
            array_push( $active_language_array, $language );
        }
    }

    return $active_language_array;
}
