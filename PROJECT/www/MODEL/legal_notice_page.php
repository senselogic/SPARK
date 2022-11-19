<?php // -- FUNCTIONS

function GetDatabaseLegalNoticePageArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` from `LEGAL_NOTICE_PAGE`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $legal_notice_page_array = [];

    while (  $legal_notice_page = $statement->fetchObject() )
    {
        $legal_notice_page->Number = ( float )( $legal_notice_page->Number );
        $legal_notice_page->LanguageCodeArray = json_decode( $legal_notice_page->LanguageCodeArray );
        array_push( $legal_notice_page_array, $legal_notice_page );
    }

    return $legal_notice_page_array;
}

// ~~

function GetSortedDatabaseLegalNoticePageArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` from `LEGAL_NOTICE_PAGE` order by `Number` asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $legal_notice_page_array = [];

    while (  $legal_notice_page = $statement->fetchObject() )
    {
        $legal_notice_page->Number = ( float )( $legal_notice_page->Number );
        $legal_notice_page->LanguageCodeArray = json_decode( $legal_notice_page->LanguageCodeArray );
        array_push( $legal_notice_page_array, $legal_notice_page );
    }

    return $legal_notice_page_array;
}

// ~~

function GetDatabaseLegalNoticePageById(
    string $id
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` from `LEGAL_NOTICE_PAGE` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $legal_notice_page = $statement->fetchObject();
    $legal_notice_page->Number = ( float )( $legal_notice_page->Number );
    $legal_notice_page->LanguageCodeArray = json_decode( $legal_notice_page->LanguageCodeArray );

    return $legal_notice_page;
}

// ~~

function AddDatabaseLegalNoticePage(
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
     $statement = GetDatabaseStatement( 'insert into `LEGAL_NOTICE_PAGE` ( `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
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

function PutDatabaseLegalNoticePage(
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
     $statement = GetDatabaseStatement( 'replace into `LEGAL_NOTICE_PAGE` ( `Id`, `Route`, `TypeSlug`, `Number`, `LanguageCodeArray`, `IsActive`, `Title`, `Text`, `ImagePath`, `ImageVerticalPosition`, `ImageHorizontalPosition`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
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

function SetDatabaseLegalNoticePage(
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
     $statement = GetDatabaseStatement( 'update `LEGAL_NOTICE_PAGE` set `Route` = ?, `TypeSlug` = ?, `Number` = ?, `LanguageCodeArray` = ?, `IsActive` = ?, `Title` = ?, `Text` = ?, `ImagePath` = ?, `ImageVerticalPosition` = ?, `ImageHorizontalPosition` = ?, `VideoPath` = ? where Id = ?' );
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

function RemoveDatabaseLegalNoticePageById(
    string $id
    )
{
     $statement = GetDatabaseStatement( 'delete from `LEGAL_NOTICE_PAGE` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
