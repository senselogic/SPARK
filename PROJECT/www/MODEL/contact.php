<?php // -- FUNCTIONS

function GetDatabaseContactArray(
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Name`, `Company`, `Email`, `Phone`, `Subject`, `Message`, `DateTime` from `CONTACT` order by `DateTime` desc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseObjectArray( $statement );
}

// ~~

function GetDatabaseContactById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'select `Id`, `Name`, `Company`, `Email`, `Phone`, `Subject`, `Message`, `DateTime` from `CONTACT` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return $statement->fetchObject();
}

// ~~

function AddDatabaseContact(
    string $id,
    string $name,
    string $company,
    string $email,
    string $phone,
    string $subject,
    string $message
    )
{
    $statement = GetDatabaseStatement( 'insert into `CONTACT` ( `Id`, `Name`, `Company`, `Email`, `Phone`, `Subject`, `Message`, `DateTime` ) values ( ?, ?, ?, ?, ?, ?, ?, now() )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $name, PDO::PARAM_STR );
    $statement->bindParam( 3, $company, PDO::PARAM_STR );
    $statement->bindParam( 4, $email, PDO::PARAM_STR );
    $statement->bindParam( 5, $phone, PDO::PARAM_STR );
    $statement->bindParam( 6, $subject, PDO::PARAM_STR );
    $statement->bindParam( 7, $message, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseContact(
    string $id,
    string $name,
    string $company,
    string $email,
    string $phone,
    string $subject,
    string $message
    )
{
    $statement = GetDatabaseStatement( 'replace into `CONTACT` ( `Id`, `Name`, `Company`, `Email`, `Phone`, `Subject`, `Message`, `DateTime` ) values ( ?, ?, ?, ?, ?, ?, ?, now() )' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );
    $statement->bindParam( 2, $name, PDO::PARAM_STR );
    $statement->bindParam( 3, $company, PDO::PARAM_STR );
    $statement->bindParam( 4, $email, PDO::PARAM_STR );
    $statement->bindParam( 5, $phone, PDO::PARAM_STR );
    $statement->bindParam( 6, $subject, PDO::PARAM_STR );
    $statement->bindParam( 7, $message, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseContact(
    string $id,
    string $name,
    string $company,
    string $email,
    string $phone,
    string $subject,
    string $message,
    string $date_time
    )
{
    $statement = GetDatabaseStatement( 'update `CONTACT` set `Name` = ?, `Company` = ?, `Email` = ?, `Phone` = ?, `Subject` = ?, `Message` = ?, `DateTime` = ? where Id = ?' );
    $statement->bindParam( 1, $name, PDO::PARAM_STR );
    $statement->bindParam( 2, $company, PDO::PARAM_STR );
    $statement->bindParam( 3, $email, PDO::PARAM_STR );
    $statement->bindParam( 4, $phone, PDO::PARAM_STR );
    $statement->bindParam( 5, $subject, PDO::PARAM_STR );
    $statement->bindParam( 6, $message, PDO::PARAM_STR );
    $statement->bindParam( 7, $date_time, PDO::PARAM_STR );
    $statement->bindParam( 8, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseContactById(
    string $id
    )
{
    $statement = GetDatabaseStatement( 'delete from `CONTACT` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
