<?php // -- IMPORTS

require_once __DIR__ . '/' . 'page.php';

// -- FUNCTIONS

function LinkPageArray(
    array &$page_array
    )
{
    $page_count = count( $page_array );
    $page_index = 0;

    foreach ( $page_array as $page )
    {
        $page->PageIndex = $page_index;

        if ( $page_index === 0 )
        {
            $page->PriorPage = $page_array[ $page_count - 1 ];
        }
        else
        {
            $page->PriorPage = $page_array[ $page_index - 1 ];
        }

        if ( $page_index === $page_count - 1 )
        {
            $page->NextPage = $page_array[ 0 ];
        }
        else
        {
            $page->NextPage = $page_array[ $page_index + 1 ];
        }

        ++$page_index;
    }
}

// ~~

function GetBlockComparison(
    object $first_block,
    object $second_block
    )
{
    return $first_block->Number <=> $second_block->Number;
}

// ~~

function GetActivePageArray(
    array &$page_array,
    string $language_code
    )
{
    $active_page_array = [];

    foreach ( $page_array as $page )
    {
        if ( $page->IsActive
             && in_array( $language_code, $page->LanguageCodeArray, true ) )
        {
            array_push( $active_page_array, $page );
        }
    }

    return $active_page_array;
}

// ~~

function GetValidPageByIdMap(
    array &$page_array,
    array &$block_array,
    array &$block_by_id_map
    )
{
    $page_by_id_map = [];

    foreach ( $page_array as $page )
    {
        $page->BlockArray = [];
        $page_by_id_map[ $page->Id ] = $page;
    }

    foreach ( $block_array as $block )
    {
        if ( isset( $page_by_id_map[ $block->PageId ] ) )
        {
            array_push(
                $page_by_id_map[ $block->PageId ]->BlockArray,
                $block
                );
        }
    }

    foreach ( $page_array as $page )
    {
        SortArrayByValue( $page->BlockArray, 'GetBlockComparison' );
        LinkBlockArray( $page->BlockArray );
    }

    return $page_by_id_map;
}

// ~~

function GetPageBySlugMap(
    array &$page_array
    )
{
    $page_by_slug_map = [];

    foreach ( $page_array as $page )
    {
        $page_by_slug_map[ $page->Slug ] = $page;
    }

    return $page_by_slug_map;
}

// ~~

function GetValidPageByIdOrSlug(
    array &$page_by_id_map,
    array &$page_by_slug_map,
    string $page_id_or_slug
    )
{
    if ( HasKey( $page_by_id_map, $page_id_or_slug ) )
    {
        return $page_by_id_map[ $page_id_or_slug ];
    }
    else if ( HasKey( $page_by_slug_map, $page_id_or_slug ) )
    {
        return $page_by_slug_map[ $page_id_or_slug ];
    }
    else
    {
        return null;
    }
}

// ~~

function GetFilledPageSlug(
    string $slug,
    string $title
    )
{
    if ( $slug === '' )
    {
        $slug = GetSlugText( GetUntranslatedText( $title ) ) . '-page';
    }

    return $slug;
}

// ~~

function GetFilledPageRoute(
    string $route,
    string $title
    )
{
    if ( $route === '' )
    {
        $route = GetSlugText( GetUntranslatedText( $title ) );
    }

    return $route;
}
