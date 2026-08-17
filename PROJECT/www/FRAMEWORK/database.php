<?php // -- FUNCTIONS

function GetDatabaseConnection(
    )
{
    static 
        $connection = null;

    if ( is_null( $connection ) )
    {
        $connection
            = new PDO(
                  'mysql:host=' . DatabaseHost . ';dbname=' . DatabaseName,
                  DatabaseUserName,
                  DatabasePassword,
                  [
                      PDO::ATTR_EMULATE_PREPARES => false,
                      PDO::ATTR_STRINGIFY_FETCHES => false
                  ]
                  );

        $connection->prepare( "set names 'utf8mb4'" )->execute();
    }

    return $connection;
}

// ~~

function GetDatabaseError(
    )
{
    return GetDatabaseConnection()->errorInfo();
}

// ~~

function GetDatabaseAddedId(
    )
{
    return GetDatabaseConnection()->lastInsertId();
}

// ~~

function GetDatabaseStatement(
    string $command
    )
{
    return GetDatabaseConnection()->prepare( $command );
}

// ~~

function RunDatabaseCommand(
    string $command
    )
{
    $statement = GetDatabaseStatement( $command );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return $statement;
}

// ~~

function GetDatabaseObject(
    $statement
    )
{
    return $statement->fetchObject();
}

// ~~

function GetDatabaseObjectArray(
    $statement
    )
{
    $object_array = [];

    while ( $object = $statement->fetchObject() )
    {
        array_push( $object_array, $object );
    }

    return $object_array;
}

// ~~

function GetDatabaseTableObjectArray(
    string $table_name
    )
{
    $statement = GetDatabaseStatement( 'select * from `' . $table_name . '`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseObjectArray( $statement );
}

// ~~

function GetDatabaseTableNameArray(
    )
{
    $statement = GetDatabaseStatement( 'show tables' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $table_name_array = [];

    while ( $column_array = $statement->fetch( PDO::FETCH_NUM ) )
    {
        array_push( $table_name_array, $column_array[ 0 ] );
    }

    sort( $table_name_array );

    return $table_name_array;
}

// ~~

function GetDatabaseColumnArray(
    string $table_name
    )
{
    $statement
        = GetDatabaseStatement(
            "select * from information_schema.columns where table_schema = '"
            . DatabaseName
            . "' and table_name = '"
            . $table_name
            . "' order by ordinal_position asc"
            );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $column_object_array = GetDatabaseObjectArray( $statement );
    $column_array = [];

    foreach ( $column_object_array as $column_object )
    {
        $column = new stdClass();
        $column->Number = $column_object->ORDINAL_POSITION;
        $column->Name = $column_object->COLUMN_NAME;
        $column->Type = $column_object->COLUMN_TYPE;
        $column->DataType = $column_object->DATA_TYPE;
        $column->Capacity = $column_object->CHARACTER_MAXIMUM_LENGTH;
        $column->Precision = $column_object->NUMERIC_PRECISION;
        $column->Default = $column_object->COLUMN_DEFAULT;
        $column->IsNullable = ( $column_object->IS_NULLABLE === 'YES' );
        $column->IsPrimaryKey = ( $column_object->COLUMN_KEY === 'PRI' );

        array_push( $column_array, $column );
    }

    return $column_array;
}

// ~~

function GetDatabaseColumnByNameMap(
    array &$column_array
    )
{
    $column_by_name_map = [];

    foreach ( $column_array as $column )
    {
        $column_by_name_map[ $column->Name ] = $column;
    }

    return $column_by_name_map;
}
