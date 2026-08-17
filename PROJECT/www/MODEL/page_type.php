<?php // -- FUNCTIONS

function GetDatabasePageTypeArray(
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `Name` from `PAGE_TYPE` order by `Name` asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseObjectArray( $statement );
}

// ~~

function GetDatabasePageTypeById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `Name` from `PAGE_TYPE` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return $statement->fetchObject();
}

// ~~

function AddDatabasePageType(
    string $id,
    string $slug,
    string $name
    )
{
    $statement = GetDatabaseStatement( 'insert into `PAGE_TYPE` ( `Id`, `Slug`, `Name` ) values ( ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $name, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabasePageType(
    string $id,
    string $slug,
    string $name
    )
{
    $statement = GetDatabaseStatement( 'replace into `PAGE_TYPE` ( `Id`, `Slug`, `Name` ) values ( ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $name, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabasePageType(
    string $id,
    string $slug,
    string $name
    )
{
    $statement = GetDatabaseStatement( 'update `PAGE_TYPE` set `Slug` = ?, `Name` = ? where Id = ?' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $name, PDO::PARAM_STR );
    $statement->bindParam( 3, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabasePageTypeById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'delete from `PAGE_TYPE` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
