<?php // -- FUNCTIONS

function GetDatabaseConnectionArray(
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `BrowserAddress`, `DateTime`, `IsFailed`, `AttemptCount` from `CONNECTION`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $connection_array = [];

    while ( $connection = $statement->fetchObject() )
    {
        $connection->IsFailed = ( int )( $connection->IsFailed );
        $connection->AttemptCount = ( int )( $connection->AttemptCount );
        array_push( $connection_array, $connection );
    }

    return $connection_array;
}

// ~~

function GetDatabaseConnectionById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `BrowserAddress`, `DateTime`, `IsFailed`, `AttemptCount` from `CONNECTION` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $connection = $statement->fetchObject();

    if ( $connection )
    {
        $connection->IsFailed = ( int )( $connection->IsFailed );
        $connection->AttemptCount = ( int )( $connection->AttemptCount );
    }

    return $connection;
}

// ~~

function GetDatabaseConnectionByBrowserAddress(
    string $connection_browser_address
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `BrowserAddress`, `DateTime`, `IsFailed`, `AttemptCount` from `CONNECTION` where `BrowserAddress` = ? limit 1' );
    $statement->bindParam( 1, $connection_browser_address, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $connection = $statement->fetchObject();

    if ( $connection )
    {
        $connection->IsFailed = ( int )( $connection->IsFailed );
        $connection->AttemptCount = ( int )( $connection->AttemptCount );
    }

    return $connection;
}

// ~~

function AddDatabaseConnection(
    string $id,
    string $browser_address,
    string $date_time,
    bool $is_failed,
    int $attempt_count
    )
{
    $statement = GetDatabaseStatement( 'insert into `CONNECTION` ( `Id`, `BrowserAddress`, `DateTime`, `IsFailed`, `AttemptCount` ) values ( ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $browser_address, PDO::PARAM_STR );
    $statement->bindParam( 3, $date_time, PDO::PARAM_STR );
    $statement->bindParam( 4, $is_failed, PDO::PARAM_BOOL );
    $statement->bindParam( 5, $attempt_count, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseConnection(
    string $id,
    string $browser_address,
    string $date_time,
    bool $is_failed,
    int $attempt_count
    )
{
    $statement = GetDatabaseStatement( 'replace into `CONNECTION` ( `Id`, `BrowserAddress`, `DateTime`, `IsFailed`, `AttemptCount` ) values ( ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $browser_address, PDO::PARAM_STR );
    $statement->bindParam( 3, $date_time, PDO::PARAM_STR );
    $statement->bindParam( 4, $is_failed, PDO::PARAM_BOOL );
    $statement->bindParam( 5, $attempt_count, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseConnection(
    string $id,
    string $browser_address,
    string $date_time,
    bool $is_failed,
    int $attempt_count
    )
{
    $statement = GetDatabaseStatement( 'update `CONNECTION` set `BrowserAddress` = ?, `DateTime` = ?, `IsFailed` = ?, `AttemptCount` = ? where Id = ?' );
    $statement->bindParam( 1, $browser_address, PDO::PARAM_STR );
    $statement->bindParam( 2, $date_time, PDO::PARAM_STR );
    $statement->bindParam( 3, $is_failed, PDO::PARAM_BOOL );
    $statement->bindParam( 4, $attempt_count, PDO::PARAM_INT );
    $statement->bindParam( 5, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseConnectionById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'delete from `CONNECTION` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
