<?php // -- FUNCTIONS

function GetDatabaseTextBlockArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `PageId`, `CategorySlug`, `TypeSlug`, `Number`, `LanguageCodeArray`, `Title`, `Text` from `TEXT_BLOCK` order by `Number` asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $text_block_array = [];

    while (  $text_block = $statement->fetchObject() )
    {
        $text_block->Number = ( float )( $text_block->Number );
        $text_block->LanguageCodeArray = json_decode( $text_block->LanguageCodeArray );
        array_push( $text_block_array, $text_block );
    }

    return $text_block_array;
}

// ~~

function GetDatabaseTextBlockById(
    string $id
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `PageId`, `CategorySlug`, `TypeSlug`, `Number`, `LanguageCodeArray`, `Title`, `Text` from `TEXT_BLOCK` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $text_block = $statement->fetchObject();
    $text_block->Number = ( float )( $text_block->Number );
    $text_block->LanguageCodeArray = json_decode( $text_block->LanguageCodeArray );

    return $text_block;
}

// ~~

function AddDatabaseTextBlock(
    string $id,
    string $page_id,
    string $category_slug,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $title,
    string $text
    )
{
     $statement = GetDatabaseStatement( 'insert into `TEXT_BLOCK` ( `Id`, `PageId`, `CategorySlug`, `TypeSlug`, `Number`, `LanguageCodeArray`, `Title`, `Text` ) values ( ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 3, $category_slug, PDO::PARAM_STR );
    $statement->bindParam( 4, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 5, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 6, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 7, $title, PDO::PARAM_STR );
    $statement->bindParam( 8, $text, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseTextBlock(
    string $id,
    string $page_id,
    string $category_slug,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $title,
    string $text
    )
{
     $statement = GetDatabaseStatement( 'replace into `TEXT_BLOCK` ( `Id`, `PageId`, `CategorySlug`, `TypeSlug`, `Number`, `LanguageCodeArray`, `Title`, `Text` ) values ( ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 3, $category_slug, PDO::PARAM_STR );
    $statement->bindParam( 4, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 5, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 6, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 7, $title, PDO::PARAM_STR );
    $statement->bindParam( 8, $text, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseTextBlock(
    string $id,
    string $page_id,
    string $category_slug,
    string $type_slug,
    float $number,
    array $language_code_array,
    string $title,
    string $text
    )
{
     $statement = GetDatabaseStatement( 'update `TEXT_BLOCK` set `PageId` = ?, `CategorySlug` = ?, `TypeSlug` = ?, `Number` = ?, `LanguageCodeArray` = ?, `Title` = ?, `Text` = ? where Id = ?' );
    $statement->bindParam( 1, $page_id, PDO::PARAM_STR );
    $statement->bindParam( 2, $category_slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 4, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 5, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 6, $title, PDO::PARAM_STR );
    $statement->bindParam( 7, $text, PDO::PARAM_STR );
    $statement->bindParam( 8, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseTextBlockById(
    string $id
    )
{
     $statement = GetDatabaseStatement( 'delete from `TEXT_BLOCK` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
