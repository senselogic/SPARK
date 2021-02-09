<?php // -- FUNCTIONS

function GetDatabaseSlideArray(
    )
{
     $statement = GetDatabaseStatement( 'select Id, Text, Image, Video, HasVideo, Number from SLIDE order by Number asc' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $slide_array = [];

    while (  $slide = $statement->fetchObject() )
    {
        $slide->Id = ( int )( $slide->Id );
        $slide->Number = ( int )( $slide->Number );
        array_push( $slide_array, $slide );
    }

    return $slide_array;
}

// ~~

function GetDatabaseSlideById(
    int $id
    )
{
     $statement = GetDatabaseStatement( 'select Id, Text, Image, Video, HasVideo, Number from SLIDE where Id = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $slide = $statement->fetchObject();
    $slide->Id = ( int )( $slide->Id );
    $slide->Number = ( int )( $slide->Number );

    return $slide;
}

// ~~

function AddDatabaseSlide(
    string $text,
    string $image,
    string $video,
    bool $has_video,
    int $number
    )
{
     $statement = GetDatabaseStatement( 'insert into SLIDE ( Text, Image, Video, HasVideo, Number ) values ( ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $text, PDO::PARAM_STR );
    $statement->bindParam( 2, $image, PDO::PARAM_STR );
    $statement->bindParam( 3, $video, PDO::PARAM_STR );
    $statement->bindParam( 4, $has_video, PDO::PARAM_BOOL );
    $statement->bindParam( 5, $number, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseSlide(
    int $id,
    string $text,
    string $image,
    string $video,
    bool $has_video,
    int $number
    )
{
     $statement = GetDatabaseStatement( 'update SLIDE set Text = ?, Image = ?, Video = ?, HasVideo = ?, Number = ? where Id = ?' );
    $statement->bindParam( 1, $text, PDO::PARAM_STR );
    $statement->bindParam( 2, $image, PDO::PARAM_STR );
    $statement->bindParam( 3, $video, PDO::PARAM_STR );
    $statement->bindParam( 4, $has_video, PDO::PARAM_BOOL );
    $statement->bindParam( 5, $number, PDO::PARAM_INT );
    $statement->bindParam( 6, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseSlideById(
    int $id
    )
{
     $statement = GetDatabaseStatement( 'delete from SLIDE where Id = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}