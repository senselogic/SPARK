<?php // -- FUNCTIONS

function GetDatabaseCategoryArray(
    )
{
     $statement = GetDatabaseStatement( 'select Id, Slug, Name, Text, Image, Number from CATEGORY order by Number asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $category_array = [];

    while (  $category = $statement->fetchObject() )
    {
        $category->Id = ( int )( $category->Id );
        $category->Number = ( int )( $category->Number );
        array_push( $category_array, $category );
    }

    return $category_array;
}

// ~~

function GetDatabaseCategoryById(
    int $id
    )
{
     $statement = GetDatabaseStatement( 'select Id, Slug, Name, Text, Image, Number from CATEGORY where Id = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $category = $statement->fetchObject();
    $category->Id = ( int )( $category->Id );
    $category->Number = ( int )( $category->Number );

    return $category;
}

// ~~

function AddDatabaseCategory(
    string $slug,
    string $name,
    string $text,
    string $image,
    int $number
    )
{
     $statement = GetDatabaseStatement( 'insert into CATEGORY ( Slug, Name, Text, Image, Number ) values ( ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $name, PDO::PARAM_STR );
    $statement->bindParam( 3, $text, PDO::PARAM_STR );
    $statement->bindParam( 4, $image, PDO::PARAM_STR );
    $statement->bindParam( 5, $number, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseCategory(
    int $id,
    string $slug,
    string $name,
    string $text,
    string $image,
    int $number
    )
{
     $statement = GetDatabaseStatement( 'update CATEGORY set Slug = ?, Name = ?, Text = ?, Image = ?, Number = ? where Id = ?' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $name, PDO::PARAM_STR );
    $statement->bindParam( 3, $text, PDO::PARAM_STR );
    $statement->bindParam( 4, $image, PDO::PARAM_STR );
    $statement->bindParam( 5, $number, PDO::PARAM_INT );
    $statement->bindParam( 6, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseCategoryById(
    int $id
    )
{
     $statement = GetDatabaseStatement( 'delete from CATEGORY where Id = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}