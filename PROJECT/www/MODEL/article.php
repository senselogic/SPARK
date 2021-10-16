<?php // -- FUNCTIONS

function GetDatabaseArticleArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `Name`, `Text`, `ImagePath`, `VideoPath`, `Importance`, `NextArticleId` from `ARTICLE`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $article_array = [];

    while (  $article = $statement->fetchObject() )
    {
        $article->Id = ( int )( $article->Id );
        $article->NextArticleId = ( int )( $article->NextArticleId );
        array_push( $article_array, $article );
    }

    return $article_array;
}

// ~~

function GetDatabaseArticleById(
    int $id
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `Name`, `Text`, `ImagePath`, `VideoPath`, `Importance`, `NextArticleId` from `ARTICLE` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $article = $statement->fetchObject();
    $article->Id = ( int )( $article->Id );
    $article->NextArticleId = ( int )( $article->NextArticleId );

    return $article;
}

// ~~

function AddDatabaseArticle(
    string $slug,
    string $name,
    string $text,
    string $image_path,
    string $video_path,
    string $importance,
    int $next_article_id
    )
{
     $statement = GetDatabaseStatement( 'insert into `ARTICLE` ( `Slug`, `Name`, `Text`, `ImagePath`, `VideoPath`, `Importance`, `NextArticleId` ) values ( ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $name, PDO::PARAM_STR );
    $statement->bindParam( 3, $text, PDO::PARAM_STR );
    $statement->bindParam( 4, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 5, $video_path, PDO::PARAM_STR );
    $statement->bindParam( 6, $importance, PDO::PARAM_STR );
    $statement->bindParam( 7, $next_article_id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseArticle(
    string $slug,
    string $name,
    string $text,
    string $image_path,
    string $video_path,
    string $importance,
    int $next_article_id
    )
{
     $statement = GetDatabaseStatement( 'replace into `ARTICLE` ( `Slug`, `Name`, `Text`, `ImagePath`, `VideoPath`, `Importance`, `NextArticleId` ) values ( ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $name, PDO::PARAM_STR );
    $statement->bindParam( 3, $text, PDO::PARAM_STR );
    $statement->bindParam( 4, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 5, $video_path, PDO::PARAM_STR );
    $statement->bindParam( 6, $importance, PDO::PARAM_STR );
    $statement->bindParam( 7, $next_article_id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseArticle(
    int $id,
    string $slug,
    string $name,
    string $text,
    string $image_path,
    string $video_path,
    string $importance,
    int $next_article_id
    )
{
     $statement = GetDatabaseStatement( 'update `ARTICLE` set `Slug` = ?, `Name` = ?, `Text` = ?, `ImagePath` = ?, `VideoPath` = ?, `Importance` = ?, `NextArticleId` = ? where Id = ?' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $name, PDO::PARAM_STR );
    $statement->bindParam( 3, $text, PDO::PARAM_STR );
    $statement->bindParam( 4, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 5, $video_path, PDO::PARAM_STR );
    $statement->bindParam( 6, $importance, PDO::PARAM_STR );
    $statement->bindParam( 7, $next_article_id, PDO::PARAM_INT );
    $statement->bindParam( 8, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseArticleById(
    int $id
    )
{
     $statement = GetDatabaseStatement( 'delete from `ARTICLE` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}
