<?php // -- FUNCTIONS

function GetDatabaseContactPageArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` from `CONTACT_PAGE`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $contact_page_array = [];

    while (  $contact_page = $statement->fetchObject() )
    {
        $contact_page->Number = ( float )( $contact_page->Number );
        $contact_page->LanguageCodeArray = json_decode( $contact_page->LanguageCodeArray );
        array_push( $contact_page_array, $contact_page );
    }

    return $contact_page_array;
}

// ~~

function GetSortedDatabaseContactPageArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` from `CONTACT_PAGE` order by `Number` asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $contact_page_array = [];

    while (  $contact_page = $statement->fetchObject() )
    {
        $contact_page->Number = ( float )( $contact_page->Number );
        $contact_page->LanguageCodeArray = json_decode( $contact_page->LanguageCodeArray );
        array_push( $contact_page_array, $contact_page );
    }

    return $contact_page_array;
}

// ~~

function GetDatabaseContactPageById(
    string $id
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` from `CONTACT_PAGE` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $contact_page = $statement->fetchObject();
    $contact_page->Number = ( float )( $contact_page->Number );
    $contact_page->LanguageCodeArray = json_decode( $contact_page->LanguageCodeArray );

    return $contact_page;
}

// ~~

function AddDatabaseContactPage(
    string $id,
    string $route,
    string $type_slug,
    float $number,
    array $language_code_array,
    bool $is_active,
    string $title,
    string $text,
    string $image_path,
    string $image_vertical_position,
    string $image_horizontal_position,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'insert into `CONTACT_PAGE` ( `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $route, PDO::PARAM_STR );
    $statement->bindParam( 3, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 4, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 5, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 6, $is_active, PDO::PARAM_BOOL );
    $statement->bindParam( 7, $title, PDO::PARAM_STR );
    $statement->bindParam( 8, $text, PDO::PARAM_STR );
    $statement->bindParam( 9, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 10, $image_vertical_position, PDO::PARAM_STR );
    $statement->bindParam( 11, $image_horizontal_position, PDO::PARAM_STR );
    $statement->bindParam( 12, $video_path, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseContactPage(
    string $id,
    string $route,
    string $type_slug,
    float $number,
    array $language_code_array,
    bool $is_active,
    string $title,
    string $text,
    string $image_path,
    string $image_vertical_position,
    string $image_horizontal_position,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'replace into `CONTACT_PAGE` ( `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $route, PDO::PARAM_STR );
    $statement->bindParam( 3, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 4, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 5, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 6, $is_active, PDO::PARAM_BOOL );
    $statement->bindParam( 7, $title, PDO::PARAM_STR );
    $statement->bindParam( 8, $text, PDO::PARAM_STR );
    $statement->bindParam( 9, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 10, $image_vertical_position, PDO::PARAM_STR );
    $statement->bindParam( 11, $image_horizontal_position, PDO::PARAM_STR );
    $statement->bindParam( 12, $video_path, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseContactPage(
    string $id,
    string $route,
    string $type_slug,
    float $number,
    array $language_code_array,
    bool $is_active,
    string $title,
    string $text,
    string $image_path,
    string $image_vertical_position,
    string $image_horizontal_position,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'update `CONTACT_PAGE` set `Route` = ?, `TypeSlug` = ?, `Number` = ?, `LanguageCodeArray` = ?, `IsActive` = ?, `Title` = ?, `Text` = ?, `ImagePath` = ?, `ImageVerticalPosition` = ?, `ImageHorizontalPosition` = ?, `VideoPath` = ? where Id = ?' );
    $statement->bindParam( 1, $route, PDO::PARAM_STR );
    $statement->bindParam( 2, $type_slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $number, PDO::PARAM_STR );
    $language_code_array = json_encode( $language_code_array );
    $statement->bindParam( 4, $language_code_array, PDO::PARAM_STR );
    $statement->bindParam( 5, $is_active, PDO::PARAM_BOOL );
    $statement->bindParam( 6, $title, PDO::PARAM_STR );
    $statement->bindParam( 7, $text, PDO::PARAM_STR );
    $statement->bindParam( 8, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 9, $image_vertical_position, PDO::PARAM_STR );
    $statement->bindParam( 10, $image_horizontal_position, PDO::PARAM_STR );
    $statement->bindParam( 11, $video_path, PDO::PARAM_STR );
    $statement->bindParam( 12, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseContactPageById(
    string $id
    )
{
     $statement = GetDatabaseStatement( 'delete from `CONTACT_PAGE` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
