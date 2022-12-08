<?php // -- FUNCTIONS

function GetDatabaseBlockArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `PageId`, `CategorySlug`, `ContentSlug`, `TypeSlug`, `Number`, `LanguageCodeArray`, `MinimumHeight`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `ImageSide`, `VideoPath` from `BLOCK` order by `Number` asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $block_array = [];

    while (  $block = $statement->fetchObject() )
    {
        $block->Number = ( float )( $block->Number );
        $block->LanguageCodeArray = json_decode( $block->LanguageCodeArray );
        array_push( $block_array, $block );
    }

    return $block_array;
}

// ~~

function GetDatabaseBlockById(
    string $id
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `PageId`, `CategorySlug`, `ContentSlug`, `TypeSlug`, `Number`, `LanguageCodeArray`, `MinimumHeight`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `ImageSide`, `VideoPath` from `BLOCK` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $block = $statement->fetchObject();
    $block->Number = ( float )( $block->Number );
    $block->LanguageCodeArray = json_decode( $block->LanguageCodeArray );

    return $block;
}

// ~~

function AddDatabaseBlock(
    string $id,
    string $slug,
    string $page_id,
    string $category_slug,
    string $content_slug,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $minimum_height,
    string $title,
    string $text,
    string $image_path,
    string $image_vertical_position,
    string $image_horizontal_position,
    string $image_side,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'insert into `BLOCK` ( `Id`, `Slug`, `PageId`, `CategorySlug`, `ContentSlug`, `TypeSlug`, `Number`, `LanguageCodeArray`, `MinimumHeight`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `ImageSide`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 4, $category_slug, PDO::PARAM_STR );
    $statement->bindParam( 5, $content_slug, PDO::PARAM_STR );
    $statement->bindParam( 6, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 7, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 8, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 9, $minimum_height, PDO::PARAM_STR );
    $statement->bindParam( 10, $title, PDO::PARAM_STR );
    $statement->bindParam( 11, $text, PDO::PARAM_STR );
    $statement->bindParam( 12, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 13, $image_vertical_position, PDO::PARAM_STR );
    $statement->bindParam( 14, $image_horizontal_position, PDO::PARAM_STR );
    $statement->bindParam( 15, $image_side, PDO::PARAM_STR );
    $statement->bindParam( 16, $video_path, PDO::PARAM_STR );

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
    string $category_slug,
    string $content_slug,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $minimum_height,
    string $title,
    string $text,
    string $image_path,
    string $image_vertical_position,
    string $image_horizontal_position,
    string $image_side,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'replace into `BLOCK` ( `Id`, `Slug`, `PageId`, `CategorySlug`, `ContentSlug`, `TypeSlug`, `Number`, `LanguageCodeArray`, `MinimumHeight`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `ImageSide`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 4, $category_slug, PDO::PARAM_STR );
    $statement->bindParam( 5, $content_slug, PDO::PARAM_STR );
    $statement->bindParam( 6, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 7, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 8, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 9, $minimum_height, PDO::PARAM_STR );
    $statement->bindParam( 10, $title, PDO::PARAM_STR );
    $statement->bindParam( 11, $text, PDO::PARAM_STR );
    $statement->bindParam( 12, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 13, $image_vertical_position, PDO::PARAM_STR );
    $statement->bindParam( 14, $image_horizontal_position, PDO::PARAM_STR );
    $statement->bindParam( 15, $image_side, PDO::PARAM_STR );
    $statement->bindParam( 16, $video_path, PDO::PARAM_STR );

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
    string $category_slug,
    string $content_slug,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $minimum_height,
    string $title,
    string $text,
    string $image_path,
    string $image_vertical_position,
    string $image_horizontal_position,
    string $image_side,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'update `BLOCK` set `Slug` = ?, `PageId` = ?, `CategorySlug` = ?, `ContentSlug` = ?, `TypeSlug` = ?, `Number` = ?, `LanguageCodeArray` = ?, `MinimumHeight` = ?, `Title` = ?, `Text` = ?, `ImagePath` = ?, `ImageVerticalPosition` = ?, `ImageHorizontalPosition` = ?, `ImageSide` = ?, `VideoPath` = ? where Id = ?' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 3, $category_slug, PDO::PARAM_STR );
    $statement->bindParam( 4, $content_slug, PDO::PARAM_STR );
    $statement->bindParam( 5, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 6, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 7, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 8, $minimum_height, PDO::PARAM_STR );
    $statement->bindParam( 9, $title, PDO::PARAM_STR );
    $statement->bindParam( 10, $text, PDO::PARAM_STR );
    $statement->bindParam( 11, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 12, $image_vertical_position, PDO::PARAM_STR );
    $statement->bindParam( 13, $image_horizontal_position, PDO::PARAM_STR );
    $statement->bindParam( 14, $image_side, PDO::PARAM_STR );
    $statement->bindParam( 15, $video_path, PDO::PARAM_STR );
    $statement->bindParam( 16, $id, PDO::PARAM_STR );

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

function GetBlockArrayByCategorySlugMap(
    array &$block_array
    )
{
     $block_array_by_category_slug_map = [];

    foreach ( $block_array as  $block )
    {
        if ( !isset( $block_array_by_category_slug_map[ $block->CategorySlug ] ) )
        {
            $block_array_by_category_slug_map[ $block->CategorySlug ] = [ $block ];
        }
        else
        {
            array_push( $block_array_by_category_slug_map[ $block->CategorySlug ], $block );
        }
    }

    return $block_array_by_category_slug_map;
}

// ~~

function GetBlockArrayByCategorySlug(
    array &$block_array,
    string $category_slug
    )
{
     $block_array_by_category_slug = [];

    foreach ( $block_array as  $block )
    {
        if ( $block->CategorySlug === $category_slug )
        {
            array_push( $block_array_by_category_slug, $block );
        }
    }

    return $block_array_by_category_slug;
}

// ~~

function GetBlockByCategorySlugMap(
    array &$block_array
    )
{
     $block_by_category_slug_map = [];

    foreach ( $block_array as  $block )
    {
        $block_by_category_slug_map[ $block->CategorySlug ] = $block;
    }

    return $block_by_category_slug_map;
}

// ~~

function GetBlockByCategorySlug(
    array &$block_by_category_slug_map,
    string $category_slug
    )
{
    if ( isset( $block_by_category_slug_map[ $category_slug ] ) )
    {
        return $block_by_category_slug_map[ $category_slug ];
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

    foreach ( $block_array as  $block )
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

    foreach ( $block_array as  $block )
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

    foreach ( $block_array as  $block )
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
