<?php // -- FUNCTIONS

function GetDatabaseTextAndImageBlockArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `PageId`, `BlockId`, `TypeSlug`, `Number`, `LanguageCodeArray`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `ImageSide`, `VideoPath` from `TEXT_AND_IMAGE_BLOCK`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $text_and_image_block_array = [];

    while (  $text_and_image_block = $statement->fetchObject() )
    {
        $text_and_image_block->Number = ( float )( $text_and_image_block->Number );
        $text_and_image_block->LanguageCodeArray = json_decode( $text_and_image_block->LanguageCodeArray );
        array_push( $text_and_image_block_array, $text_and_image_block );
    }

    return $text_and_image_block_array;
}

// ~~

function GetSortedDatabaseTextAndImageBlockArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `PageId`, `BlockId`, `TypeSlug`, `Number`, `LanguageCodeArray`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `ImageSide`, `VideoPath` from `TEXT_AND_IMAGE_BLOCK` order by `Number` asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $text_and_image_block_array = [];

    while (  $text_and_image_block = $statement->fetchObject() )
    {
        $text_and_image_block->Number = ( float )( $text_and_image_block->Number );
        $text_and_image_block->LanguageCodeArray = json_decode( $text_and_image_block->LanguageCodeArray );
        array_push( $text_and_image_block_array, $text_and_image_block );
    }

    return $text_and_image_block_array;
}

// ~~

function GetDatabaseTextAndImageBlockById(
    string $id
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `PageId`, `BlockId`, `TypeSlug`, `Number`, `LanguageCodeArray`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `ImageSide`, `VideoPath` from `TEXT_AND_IMAGE_BLOCK` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $text_and_image_block = $statement->fetchObject();
    $text_and_image_block->Number = ( float )( $text_and_image_block->Number );
    $text_and_image_block->LanguageCodeArray = json_decode( $text_and_image_block->LanguageCodeArray );

    return $text_and_image_block;
}

// ~~

function AddDatabaseTextAndImageBlock(
    string $id,
    string $page_id,
    string $block_id,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $title,
    string $text,
    string $image_path,
    string $image_vertical_position,
    string $image_horizontal_position,
    string $image_side,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'insert into `TEXT_AND_IMAGE_BLOCK` ( `Id`, `PageId`, `BlockId`, `TypeSlug`, `Number`, `LanguageCodeArray`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `ImageSide`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 3, $block_id, PDO::PARAM_STR );
    $statement->bindParam( 4, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 5, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 6, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 7, $title, PDO::PARAM_STR );
    $statement->bindParam( 8, $text, PDO::PARAM_STR );
    $statement->bindParam( 9, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 10, $image_vertical_position, PDO::PARAM_STR );
    $statement->bindParam( 11, $image_horizontal_position, PDO::PARAM_STR );
    $statement->bindParam( 12, $image_side, PDO::PARAM_STR );
    $statement->bindParam( 13, $video_path, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseTextAndImageBlock(
    string $id,
    string $page_id,
    string $block_id,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $title,
    string $text,
    string $image_path,
    string $image_vertical_position,
    string $image_horizontal_position,
    string $image_side,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'replace into `TEXT_AND_IMAGE_BLOCK` ( `Id`, `PageId`, `BlockId`, `TypeSlug`, `Number`, `LanguageCodeArray`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `ImageSide`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 3, $block_id, PDO::PARAM_STR );
    $statement->bindParam( 4, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 5, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 6, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 7, $title, PDO::PARAM_STR );
    $statement->bindParam( 8, $text, PDO::PARAM_STR );
    $statement->bindParam( 9, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 10, $image_vertical_position, PDO::PARAM_STR );
    $statement->bindParam( 11, $image_horizontal_position, PDO::PARAM_STR );
    $statement->bindParam( 12, $image_side, PDO::PARAM_STR );
    $statement->bindParam( 13, $video_path, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseTextAndImageBlock(
    string $id,
    string $page_id,
    string $block_id,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $title,
    string $text,
    string $image_path,
    string $image_vertical_position,
    string $image_horizontal_position,
    string $image_side,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'update `TEXT_AND_IMAGE_BLOCK` set `PageId` = ?, `BlockId` = ?, `TypeSlug` = ?, `Number` = ?, `LanguageCodeArray` = ?, `Title` = ?, `Text` = ?, `ImagePath` = ?, `ImageVerticalPosition` = ?, `ImageHorizontalPosition` = ?, `ImageSide` = ?, `VideoPath` = ? where Id = ?' );
    $statement->bindParam( 1, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 2, $block_id, PDO::PARAM_STR );
    $statement->bindParam( 3, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 4, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 5, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 6, $title, PDO::PARAM_STR );
    $statement->bindParam( 7, $text, PDO::PARAM_STR );
    $statement->bindParam( 8, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 9, $image_vertical_position, PDO::PARAM_STR );
    $statement->bindParam( 10, $image_horizontal_position, PDO::PARAM_STR );
    $statement->bindParam( 11, $image_side, PDO::PARAM_STR );
    $statement->bindParam( 12, $video_path, PDO::PARAM_STR );
    $statement->bindParam( 13, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseTextAndImageBlockById(
    string $id
    )
{
     $statement = GetDatabaseStatement( 'delete from `TEXT_AND_IMAGE_BLOCK` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
