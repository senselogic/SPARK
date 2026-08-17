<?php // -- FUNCTIONS

function GetDatabaseLanguageArray(
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Code`, `Number`, `Text`, `IsActive` from `LANGUAGE` order by `Number` asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $language_array = [];

    while ( $language = $statement->fetchObject() )
    {
        $language->Number = ( float )( $language->Number );
        $language->IsActive = ( int )( $language->IsActive );
        array_push( $language_array, $language );
    }

    return $language_array;
}

// ~~

function GetDatabaseLanguageById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Code`, `Number`, `Text`, `IsActive` from `LANGUAGE` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $language = $statement->fetchObject();

    if ( $language )
    {
        $language->Number = ( float )( $language->Number );
        $language->IsActive = ( int )( $language->IsActive );
    }

    return $language;
}

// ~~

function AddDatabaseLanguage(
    string $id,
    string $code,
    float $number,
    string $text,
    bool $is_active
    )
{
    $statement = GetDatabaseStatement( 'insert into `LANGUAGE` ( `Id`, `Code`, `Number`, `Text`, `IsActive` ) values ( ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $code, PDO::PARAM_STR );
    $statement->bindParam( 3, $number, PDO::PARAM_STR );
    $statement->bindParam( 4, $text, PDO::PARAM_STR );
    $statement->bindParam( 5, $is_active, PDO::PARAM_BOOL );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseLanguage(
    string $id,
    string $code,
    float $number,
    string $text,
    bool $is_active
    )
{
    $statement = GetDatabaseStatement( 'replace into `LANGUAGE` ( `Id`, `Code`, `Number`, `Text`, `IsActive` ) values ( ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $code, PDO::PARAM_STR );
    $statement->bindParam( 3, $number, PDO::PARAM_STR );
    $statement->bindParam( 4, $text, PDO::PARAM_STR );
    $statement->bindParam( 5, $is_active, PDO::PARAM_BOOL );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseLanguage(
    string $id,
    string $code,
    float $number,
    string $text,
    bool $is_active
    )
{
    $statement = GetDatabaseStatement( 'update `LANGUAGE` set `Code` = ?, `Number` = ?, `Text` = ?, `IsActive` = ? where Id = ?' );
    $statement->bindParam( 1, $code, PDO::PARAM_STR );
    $statement->bindParam( 2, $number, PDO::PARAM_STR );
    $statement->bindParam( 3, $text, PDO::PARAM_STR );
    $statement->bindParam( 4, $is_active, PDO::PARAM_BOOL );
    $statement->bindParam( 5, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseLanguageById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'delete from `LANGUAGE` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function GetLanguageArrayByCodeMap(
    array &$language_array
    )
{
    $language_array_by_code_map = [];

    foreach ( $language_array as $language )
    {
        if ( !isset( $language_array_by_code_map[ $language->Code ] ) )
        {
            $language_array_by_code_map[ $language->Code ] = [ $language ];
        }
        else
        {
            array_push( $language_array_by_code_map[ $language->Code ], $language );
        }
    }

    return $language_array_by_code_map;
}

// ~~

function GetLanguageArrayByCode(
    array &$language_array,
    string $code
    )
{
    $language_array_by_code = [];

    foreach ( $language_array as $language )
    {
        if ( $language->Code === $code )
        {
            array_push( $language_array_by_code, $language );
        }
    }

    return $language_array_by_code;
}

// ~~

function GetLanguageByCodeMap(
    array &$language_array
    )
{
    $language_by_code_map = [];

    foreach ( $language_array as $language )
    {
        $language_by_code_map[ $language->Code ] = $language;
    }

    return $language_by_code_map;
}

// ~~

function GetLanguageByCode(
    array &$language_by_code_map,
    string $code
    )
{
    if ( isset( $language_by_code_map[ $code ] ) )
    {
        return $language_by_code_map[ $code ];
    }
    else
    {
        return null;
    }
}
