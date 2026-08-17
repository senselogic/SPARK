<?php // -- FUNCTIONS

function GetDatabaseUserArray(
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Email`, `Pseudonym`, `Password`, `Role` from `USER` order by `Email` asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseObjectArray( $statement );
}

// ~~

function GetDatabaseUserById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Email`, `Pseudonym`, `Password`, `Role` from `USER` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return $statement->fetchObject();
}

// ~~

function AddDatabaseUser(
    string $id,
    string $email,
    string $pseudonym,
    string $password,
    string $role
    )
{
    $statement = GetDatabaseStatement( 'insert into `USER` ( `Id`, `Email`, `Pseudonym`, `Password`, `Role` ) values ( ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $email, PDO::PARAM_STR );
    $statement->bindParam( 3, $pseudonym, PDO::PARAM_STR );
    $statement->bindParam( 4, $password, PDO::PARAM_STR );
    $statement->bindParam( 5, $role, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseUser(
    string $id,
    string $email,
    string $pseudonym,
    string $password,
    string $role
    )
{
    $statement = GetDatabaseStatement( 'replace into `USER` ( `Id`, `Email`, `Pseudonym`, `Password`, `Role` ) values ( ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $email, PDO::PARAM_STR );
    $statement->bindParam( 3, $pseudonym, PDO::PARAM_STR );
    $statement->bindParam( 4, $password, PDO::PARAM_STR );
    $statement->bindParam( 5, $role, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseUser(
    string $id,
    string $email,
    string $pseudonym,
    string $password,
    string $role
    )
{
    $statement = GetDatabaseStatement( 'update `USER` set `Email` = ?, `Pseudonym` = ?, `Password` = ?, `Role` = ? where Id = ?' );
    $statement->bindParam( 1, $email, PDO::PARAM_STR );
    $statement->bindParam( 2, $pseudonym, PDO::PARAM_STR );
    $statement->bindParam( 3, $password, PDO::PARAM_STR );
    $statement->bindParam( 4, $role, PDO::PARAM_STR );
    $statement->bindParam( 5, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseUserById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'delete from `USER` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
