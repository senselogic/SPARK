<?php // -- IMPORTS

require_once __DIR__ . '/' . 'block.php';
require_once __DIR__ . '/' . 'block_type.php';

// -- FUNCTIONS

function LinkBlockArray(
    array &$block_array
    )
{
     $block_count = count( $block_array );
     $block_index = 0;

    foreach ( $block_array as  $block )
    {
        $block->BlockIndex = $block_index;

        if ( $block_index === 0 )
        {
            $block->PriorBlock = $block_array[ $block_count - 1 ];
        }
        else
        {
            $block->PriorBlock = $block_array[ $block_index - 1 ];
        }

        if ( $block_index === $block_count - 1 )
        {
            $block->NextBlock = $block_array[ 0 ];
        }
        else
        {
            $block->NextBlock = $block_array[ $block_index + 1 ];
        }

        ++$block_index;
    }
}

// ~~

function GetActiveBlockArray(
    array &$block_array,
    string $language_code
    )
{
     $active_block_array = [];

    foreach ( $block_array as  $block )
    {
        if ( in_array( $language_code, $block->LanguageCodeArray, true ) )
        {
            array_push( $active_block_array, $block );
        }
    }

    return $active_block_array;
}

// ~~

function GetValidBlockByIdMap(
    array &$block_array
    )
{
     $block_by_id_map = [];

    foreach ( $block_array as  $block )
    {
        $block->SubBlockArray = [];
        $block_by_id_map[ $block->Id ] = $block;
    }

    foreach ( $block_array as  $block )
    {
        if ( property_exists( $block, 'BlockId' )
             && isset( $block_by_id_map[ $block->BlockId ] ) )
        {
            array_push(
                $block_by_id_map[ $block->BlockId ]->SubBlockArray,
                $block
                );
        }
    }

    return $block_by_id_map;
}

// ~~

function GetValidBlockById(
    array &$block_by_id_map,
    int $id
    )
{
    foreach ( $block_by_id_map as  $block_id =>  $block )
    {
        if ( $block->Id === $id )
        {
            return $block;
        }
    }

    return null;
}
