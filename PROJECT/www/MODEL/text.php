<?php // -- FUNCTIONS

function GetDatabaseTextArray(
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `Text` from `TEXT`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseObjectArray( $statement );
}

// ~~

function GetDatabaseTextById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `Text` from `TEXT` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return $statement->fetchObject();
}

// ~~

function AddDatabaseText(
    string $id,
    string $slug,
    string $text
    )
{
    $statement = GetDatabaseStatement( 'insert into `TEXT` ( `Id`, `Slug`, `Text` ) values ( ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $text, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseText(
    string $id,
    string $slug,
    string $text
    )
{
    $statement = GetDatabaseStatement( 'replace into `TEXT` ( `Id`, `Slug`, `Text` ) values ( ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $text, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseText(
    string $id,
    string $slug,
    string $text
    )
{
    $statement = GetDatabaseStatement( 'update `TEXT` set `Slug` = ?, `Text` = ? where Id = ?' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $text, PDO::PARAM_STR );
    $statement->bindParam( 3, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseTextById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'delete from `TEXT` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
