<?php // -- FUNCTIONS

function GetDatabaseBlockArray(
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `PageId`, `TypeSlug`, `Number`, `LanguageCodeArray`, `MinimumHeight`, `Title`, `TitleArray`, `Teaser`, `TeaserArray`, `Text`, `TextArray`, `Route`, `RouteArray`, `ImageSide`, `ImageTitle`, `ImageTitleArray`, `ImagePath`, `ImagePathArray`, `ImageVerticalPosition`, `ImageVerticalPositionArray`, `ImageHorizontalPosition`, `ImageHorizontalPositionArray`, `ImageFit`, `VideoPath`, `VideoPathArray`, `DocumentPath`, `DocumentPathArray`, `KeyArray`, `ValueArray` from `BLOCK` order by `Number` asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $block_array = [];

    while ( $block = $statement->fetchObject() )
    {
        $block->Number = ( float )( $block->Number );
        $block->LanguageCodeArray = json_decode( $block->LanguageCodeArray );
        $block->TitleArray = json_decode( $block->TitleArray );
        $block->TeaserArray = json_decode( $block->TeaserArray );
        $block->TextArray = json_decode( $block->TextArray );
        $block->RouteArray = json_decode( $block->RouteArray );
        $block->ImageTitleArray = json_decode( $block->ImageTitleArray );
        $block->ImagePathArray = json_decode( $block->ImagePathArray );
        $block->ImageVerticalPositionArray = json_decode( $block->ImageVerticalPositionArray );
        $block->ImageHorizontalPositionArray = json_decode( $block->ImageHorizontalPositionArray );
        $block->VideoPathArray = json_decode( $block->VideoPathArray );
        $block->DocumentPathArray = json_decode( $block->DocumentPathArray );
        $block->KeyArray = json_decode( $block->KeyArray );
        $block->ValueArray = json_decode( $block->ValueArray );
        array_push( $block_array, $block );
    }

    return $block_array;
}

// ~~

function GetDatabaseBlockById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `PageId`, `TypeSlug`, `Number`, `LanguageCodeArray`, `MinimumHeight`, `Title`, `TitleArray`, `Teaser`, `TeaserArray`, `Text`, `TextArray`, `Route`, `RouteArray`, `ImageSide`, `ImageTitle`, `ImageTitleArray`, `ImagePath`, `ImagePathArray`, `ImageVerticalPosition`, `ImageVerticalPositionArray`, `ImageHorizontalPosition`, `ImageHorizontalPositionArray`, `ImageFit`, `VideoPath`, `VideoPathArray`, `DocumentPath`, `DocumentPathArray`, `KeyArray`, `ValueArray` from `BLOCK` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $block = $statement->fetchObject();

    if ( $block )
    {
        $block->Number = ( float )( $block->Number );
        $block->LanguageCodeArray = json_decode( $block->LanguageCodeArray );
        $block->TitleArray = json_decode( $block->TitleArray );
        $block->TeaserArray = json_decode( $block->TeaserArray );
        $block->TextArray = json_decode( $block->TextArray );
        $block->RouteArray = json_decode( $block->RouteArray );
        $block->ImageTitleArray = json_decode( $block->ImageTitleArray );
        $block->ImagePathArray = json_decode( $block->ImagePathArray );
        $block->ImageVerticalPositionArray = json_decode( $block->ImageVerticalPositionArray );
        $block->ImageHorizontalPositionArray = json_decode( $block->ImageHorizontalPositionArray );
        $block->VideoPathArray = json_decode( $block->VideoPathArray );
        $block->DocumentPathArray = json_decode( $block->DocumentPathArray );
        $block->KeyArray = json_decode( $block->KeyArray );
        $block->ValueArray = json_decode( $block->ValueArray );
    }

    return $block;
}

// ~~

function AddDatabaseBlock(
    string $id,
    string $slug,
    string $page_id,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $minimum_height,
    string $title,
    array $title_array,
    string $teaser,
    array $teaser_array,
    string $text,
    array $text_array,
    string $route,
    array $route_array,
    string $image_side,
    string $image_title,
    array $image_title_array,
    string $image_path,
    array $image_path_array,
    string $image_vertical_position,
    array $image_vertical_position_array,
    string $image_horizontal_position,
    array $image_horizontal_position_array,
    string $image_fit,
    string $video_path,
    array $video_path_array,
    string $document_path,
    array $document_path_array,
    array $key_array,
    array $value_array
    )
{
    $statement = GetDatabaseStatement( 'insert into `BLOCK` ( `Id`, `Slug`, `PageId`, `TypeSlug`, `Number`, `LanguageCodeArray`, `MinimumHeight`, `Title`, `TitleArray`, `Teaser`, `TeaserArray`, `Text`, `TextArray`, `Route`, `RouteArray`, `ImageSide`, `ImageTitle`, `ImageTitleArray`, `ImagePath`, `ImagePathArray`, `ImageVerticalPosition`, `ImageVerticalPositionArray`, `ImageHorizontalPosition`, `ImageHorizontalPositionArray`, `ImageFit`, `VideoPath`, `VideoPathArray`, `DocumentPath`, `DocumentPathArray`, `KeyArray`, `ValueArray` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 4, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 5, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 6, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 7, $minimum_height, PDO::PARAM_STR );
    $statement->bindParam( 8, $title, PDO::PARAM_STR );
    $title_array = json_encode( $title_array );
    $statement->bindParam( 9, $title_array, PDO::PARAM_STR );
    $statement->bindParam( 10, $teaser, PDO::PARAM_STR );
    $teaser_array = json_encode( $teaser_array );
    $statement->bindParam( 11, $teaser_array, PDO::PARAM_STR );
    $statement->bindParam( 12, $text, PDO::PARAM_STR );
    $text_array = json_encode( $text_array );
    $statement->bindParam( 13, $text_array, PDO::PARAM_STR );
    $statement->bindParam( 14, $route, PDO::PARAM_STR );
    $route_array = json_encode( $route_array );
    $statement->bindParam( 15, $route_array, PDO::PARAM_STR );
    $statement->bindParam( 16, $image_side, PDO::PARAM_STR );
    $statement->bindParam( 17, $image_title, PDO::PARAM_STR );
    $image_title_array = json_encode( $image_title_array );
    $statement->bindParam( 18, $image_title_array, PDO::PARAM_STR );
    $statement->bindParam( 19, $image_path, PDO::PARAM_STR );
    $image_path_array = json_encode( $image_path_array );
    $statement->bindParam( 20, $image_path_array, PDO::PARAM_STR );
    $statement->bindParam( 21, $image_vertical_position, PDO::PARAM_STR );
    $image_vertical_position_array = json_encode( $image_vertical_position_array );
    $statement->bindParam( 22, $image_vertical_position_array, PDO::PARAM_STR );
    $statement->bindParam( 23, $image_horizontal_position, PDO::PARAM_STR );
    $image_horizontal_position_array = json_encode( $image_horizontal_position_array );
    $statement->bindParam( 24, $image_horizontal_position_array, PDO::PARAM_STR );
    $statement->bindParam( 25, $image_fit, PDO::PARAM_STR );
    $statement->bindParam( 26, $video_path, PDO::PARAM_STR );
    $video_path_array = json_encode( $video_path_array );
    $statement->bindParam( 27, $video_path_array, PDO::PARAM_STR );
    $statement->bindParam( 28, $document_path, PDO::PARAM_STR );
    $document_path_array = json_encode( $document_path_array );
    $statement->bindParam( 29, $document_path_array, PDO::PARAM_STR );
    $key_array = json_encode( $key_array );
    $statement->bindParam( 30, $key_array, PDO::PARAM_STR );
    $value_array = json_encode( $value_array );
    $statement->bindParam( 31, $value_array, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseBlock(
    string $id,
    string $slug,
    string $page_id,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $minimum_height,
    string $title,
    array $title_array,
    string $teaser,
    array $teaser_array,
    string $text,
    array $text_array,
    string $route,
    array $route_array,
    string $image_side,
    string $image_title,
    array $image_title_array,
    string $image_path,
    array $image_path_array,
    string $image_vertical_position,
    array $image_vertical_position_array,
    string $image_horizontal_position,
    array $image_horizontal_position_array,
    string $image_fit,
    string $video_path,
    array $video_path_array,
    string $document_path,
    array $document_path_array,
    array $key_array,
    array $value_array
    )
{
    $statement = GetDatabaseStatement( 'replace into `BLOCK` ( `Id`, `Slug`, `PageId`, `TypeSlug`, `Number`, `LanguageCodeArray`, `MinimumHeight`, `Title`, `TitleArray`, `Teaser`, `TeaserArray`, `Text`, `TextArray`, `Route`, `RouteArray`, `ImageSide`, `ImageTitle`, `ImageTitleArray`, `ImagePath`, `ImagePathArray`, `ImageVerticalPosition`, `ImageVerticalPositionArray`, `ImageHorizontalPosition`, `ImageHorizontalPositionArray`, `ImageFit`, `VideoPath`, `VideoPathArray`, `DocumentPath`, `DocumentPathArray`, `KeyArray`, `ValueArray` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 4, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 5, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 6, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 7, $minimum_height, PDO::PARAM_STR );
    $statement->bindParam( 8, $title, PDO::PARAM_STR );
    $title_array = json_encode( $title_array );
    $statement->bindParam( 9, $title_array, PDO::PARAM_STR );
    $statement->bindParam( 10, $teaser, PDO::PARAM_STR );
    $teaser_array = json_encode( $teaser_array );
    $statement->bindParam( 11, $teaser_array, PDO::PARAM_STR );
    $statement->bindParam( 12, $text, PDO::PARAM_STR );
    $text_array = json_encode( $text_array );
    $statement->bindParam( 13, $text_array, PDO::PARAM_STR );
    $statement->bindParam( 14, $route, PDO::PARAM_STR );
    $route_array = json_encode( $route_array );
    $statement->bindParam( 15, $route_array, PDO::PARAM_STR );
    $statement->bindParam( 16, $image_side, PDO::PARAM_STR );
    $statement->bindParam( 17, $image_title, PDO::PARAM_STR );
    $image_title_array = json_encode( $image_title_array );
    $statement->bindParam( 18, $image_title_array, PDO::PARAM_STR );
    $statement->bindParam( 19, $image_path, PDO::PARAM_STR );
    $image_path_array = json_encode( $image_path_array );
    $statement->bindParam( 20, $image_path_array, PDO::PARAM_STR );
    $statement->bindParam( 21, $image_vertical_position, PDO::PARAM_STR );
    $image_vertical_position_array = json_encode( $image_vertical_position_array );
    $statement->bindParam( 22, $image_vertical_position_array, PDO::PARAM_STR );
    $statement->bindParam( 23, $image_horizontal_position, PDO::PARAM_STR );
    $image_horizontal_position_array = json_encode( $image_horizontal_position_array );
    $statement->bindParam( 24, $image_horizontal_position_array, PDO::PARAM_STR );
    $statement->bindParam( 25, $image_fit, PDO::PARAM_STR );
    $statement->bindParam( 26, $video_path, PDO::PARAM_STR );
    $video_path_array = json_encode( $video_path_array );
    $statement->bindParam( 27, $video_path_array, PDO::PARAM_STR );
    $statement->bindParam( 28, $document_path, PDO::PARAM_STR );
    $document_path_array = json_encode( $document_path_array );
    $statement->bindParam( 29, $document_path_array, PDO::PARAM_STR );
    $key_array = json_encode( $key_array );
    $statement->bindParam( 30, $key_array, PDO::PARAM_STR );
    $value_array = json_encode( $value_array );
    $statement->bindParam( 31, $value_array, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseBlock(
    string $id,
    string $slug,
    string $page_id,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $minimum_height,
    string $title,
    array $title_array,
    string $teaser,
    array $teaser_array,
    string $text,
    array $text_array,
    string $route,
    array $route_array,
    string $image_side,
    string $image_title,
    array $image_title_array,
    string $image_path,
    array $image_path_array,
    string $image_vertical_position,
    array $image_vertical_position_array,
    string $image_horizontal_position,
    array $image_horizontal_position_array,
    string $image_fit,
    string $video_path,
    array $video_path_array,
    string $document_path,
    array $document_path_array,
    array $key_array,
    array $value_array
    )
{
    $statement = GetDatabaseStatement( 'update `BLOCK` set `Slug` = ?, `PageId` = ?, `TypeSlug` = ?, `Number` = ?, `LanguageCodeArray` = ?, `MinimumHeight` = ?, `Title` = ?, `TitleArray` = ?, `Teaser` = ?, `TeaserArray` = ?, `Text` = ?, `TextArray` = ?, `Route` = ?, `RouteArray` = ?, `ImageSide` = ?, `ImageTitle` = ?, `ImageTitleArray` = ?, `ImagePath` = ?, `ImagePathArray` = ?, `ImageVerticalPosition` = ?, `ImageVerticalPositionArray` = ?, `ImageHorizontalPosition` = ?, `ImageHorizontalPositionArray` = ?, `ImageFit` = ?, `VideoPath` = ?, `VideoPathArray` = ?, `DocumentPath` = ?, `DocumentPathArray` = ?, `KeyArray` = ?, `ValueArray` = ? where Id = ?' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 3, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 4, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 5, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 6, $minimum_height, PDO::PARAM_STR );
    $statement->bindParam( 7, $title, PDO::PARAM_STR );
    $title_array = json_encode( $title_array );
    $statement->bindParam( 8, $title_array, PDO::PARAM_STR );
    $statement->bindParam( 9, $teaser, PDO::PARAM_STR );
    $teaser_array = json_encode( $teaser_array );
    $statement->bindParam( 10, $teaser_array, PDO::PARAM_STR );
    $statement->bindParam( 11, $text, PDO::PARAM_STR );
    $text_array = json_encode( $text_array );
    $statement->bindParam( 12, $text_array, PDO::PARAM_STR );
    $statement->bindParam( 13, $route, PDO::PARAM_STR );
    $route_array = json_encode( $route_array );
    $statement->bindParam( 14, $route_array, PDO::PARAM_STR );
    $statement->bindParam( 15, $image_side, PDO::PARAM_STR );
    $statement->bindParam( 16, $image_title, PDO::PARAM_STR );
    $image_title_array = json_encode( $image_title_array );
    $statement->bindParam( 17, $image_title_array, PDO::PARAM_STR );
    $statement->bindParam( 18, $image_path, PDO::PARAM_STR );
    $image_path_array = json_encode( $image_path_array );
    $statement->bindParam( 19, $image_path_array, PDO::PARAM_STR );
    $statement->bindParam( 20, $image_vertical_position, PDO::PARAM_STR );
    $image_vertical_position_array = json_encode( $image_vertical_position_array );
    $statement->bindParam( 21, $image_vertical_position_array, PDO::PARAM_STR );
    $statement->bindParam( 22, $image_horizontal_position, PDO::PARAM_STR );
    $image_horizontal_position_array = json_encode( $image_horizontal_position_array );
    $statement->bindParam( 23, $image_horizontal_position_array, PDO::PARAM_STR );
    $statement->bindParam( 24, $image_fit, PDO::PARAM_STR );
    $statement->bindParam( 25, $video_path, PDO::PARAM_STR );
    $video_path_array = json_encode( $video_path_array );
    $statement->bindParam( 26, $video_path_array, PDO::PARAM_STR );
    $statement->bindParam( 27, $document_path, PDO::PARAM_STR );
    $document_path_array = json_encode( $document_path_array );
    $statement->bindParam( 28, $document_path_array, PDO::PARAM_STR );
    $key_array = json_encode( $key_array );
    $statement->bindParam( 29, $key_array, PDO::PARAM_STR );
    $value_array = json_encode( $value_array );
    $statement->bindParam( 30, $value_array, PDO::PARAM_STR );
    $statement->bindParam( 31, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseBlockById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'delete from `BLOCK` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function GetBlockArrayByPageIdMap(
    array &$block_array
    )
{
    $block_array_by_page_id_map = [];

    foreach ( $block_array as $block )
    {
        if ( !isset( $block_array_by_page_id_map[ $block->PageId ] ) )
        {
            $block_array_by_page_id_map[ $block->PageId ] = [ $block ];
        }
        else
        {
            array_push( $block_array_by_page_id_map[ $block->PageId ], $block );
        }
    }

    return $block_array_by_page_id_map;
}

// ~~

function GetBlockArrayByPageId(
    array &$block_array,
    string $page_id
    )
{
    $block_array_by_page_id = [];

    foreach ( $block_array as $block )
    {
        if ( $block->PageId === $page_id )
        {
            array_push( $block_array_by_page_id, $block );
        }
    }

    return $block_array_by_page_id;
}

// ~~

function GetBlockByPageIdMap(
    array &$block_array
    )
{
    $block_by_page_id_map = [];

    foreach ( $block_array as $block )
    {
        $block_by_page_id_map[ $block->PageId ] = $block;
    }

    return $block_by_page_id_map;
}

// ~~

function GetBlockByPageId(
    array &$block_by_page_id_map,
    string $page_id
    )
{
    if ( isset( $block_by_page_id_map[ $page_id ] ) )
    {
        return $block_by_page_id_map[ $page_id ];
    }
    else
    {
        return null;
    }
}

// ~~

function GetBlockArrayByTypeSlugMap(
    array &$block_array
    )
{
    $block_array_by_type_slug_map = [];

    foreach ( $block_array as $block )
    {
        if ( !isset( $block_array_by_type_slug_map[ $block->TypeSlug ] ) )
        {
            $block_array_by_type_slug_map[ $block->TypeSlug ] = [ $block ];
        }
        else
        {
            array_push( $block_array_by_type_slug_map[ $block->TypeSlug ], $block );
        }
    }

    return $block_array_by_type_slug_map;
}

// ~~

function GetBlockArrayByTypeSlug(
    array &$block_array,
    string $type_slug
    )
{
    $block_array_by_type_slug = [];

    foreach ( $block_array as $block )
    {
        if ( $block->TypeSlug === $type_slug )
        {
            array_push( $block_array_by_type_slug, $block );
        }
    }

    return $block_array_by_type_slug;
}

// ~~

function GetBlockByTypeSlugMap(
    array &$block_array
    )
{
    $block_by_type_slug_map = [];

    foreach ( $block_array as $block )
    {
        $block_by_type_slug_map[ $block->TypeSlug ] = $block;
    }

    return $block_by_type_slug_map;
}

// ~~

function GetBlockByTypeSlug(
    array &$block_by_type_slug_map,
    string $type_slug
    )
{
    if ( isset( $block_by_type_slug_map[ $type_slug ] ) )
    {
        return $block_by_type_slug_map[ $type_slug ];
    }
    else
    {
        return null;
    }
}
