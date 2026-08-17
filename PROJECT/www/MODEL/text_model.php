<?php // -- IMPORTS

require_once __DIR__ . '/' . 'text.php';

// -- FUNCTIONS

function GetDatabaseTextBySlug(
    string $slug
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `Text` from `TEXT` where `Slug` = ? limit 1' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $text = $statement->fetchObject();

    return $text;
}

// ~~

function GetTextBySlugMap(
    array &$text_array
    )
{
    $text_by_slug_map = array();

    foreach ( $text_array as $text )
    {
        $text_by_slug_map[ $text->Slug ] = $text->Text;
    }

    return $text_by_slug_map;
}
