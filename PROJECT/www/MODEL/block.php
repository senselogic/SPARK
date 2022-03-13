<?php // -- FUNCTIONS

function GetDatabaseBlockArray(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `ArticleSlug`, `Number`, `Title`, `Text`, `ImagePath`, `VideoPath` from `BLOCK`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $block_array = [];

    while (  $block = $statement->fetchObject() )
    {
        $block->Id = ( int )( $block->Id );
        $block->Number = ( float )( $block->Number );
        array_push( $block_array, $block );
    }

    return $block_array;
}

// ~~

function GetDatabaseBlockByArticleSlugMap(
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `ArticleSlug`, `Number`, `Title`, `Text`, `ImagePath`, `VideoPath` from `BLOCK`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $block_by_article_slug_map = [];

    while (  $block = $statement->fetchObject() )
    {
        $block->Id = ( int )( $block->Id );
        $block->Number = ( float )( $block->Number );
        $block_by_article_slug_map[ $block->ArticleSlug ] = $block;
    }

    return $block_by_article_slug_map;
}

// ~~

function GetDatabaseBlockById(
    int $id
    )
{
     $statement = GetDatabaseStatement( 'select `Id`, `Slug`, `ArticleSlug`, `Number`, `Title`, `Text`, `ImagePath`, `VideoPath` from `BLOCK` where `Id` = ? limit 1' );
    $statement->bindParam( 1, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

     $block = $statement->fetchObject();
    $block->Id = ( int )( $block->Id );
    $block->Number = ( float )( $block->Number );

    return $block;
}

// ~~

function AddDatabaseBlock(
    string $slug,
    string $article_slug,
    float $number,
    string $title,
    string $text,
    string $image_path,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'insert into `BLOCK` ( `Slug`, `ArticleSlug`, `Number`, `Title`, `Text`, `ImagePath`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $article_slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $number, PDO::PARAM_STR );
    $statement->bindParam( 4, $title, PDO::PARAM_STR );
    $statement->bindParam( 5, $text, PDO::PARAM_STR );
    $statement->bindParam( 6, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 7, $video_path, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function PutDatabaseBlock(
    string $slug,
    string $article_slug,
    float $number,
    string $title,
    string $text,
    string $image_path,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'replace into `BLOCK` ( `Slug`, `ArticleSlug`, `Number`, `Title`, `Text`, `ImagePath`, `VideoPath` ) values ( ?, ?, ?, ?, ?, ?, ? )' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $article_slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $number, PDO::PARAM_STR );
    $statement->bindParam( 4, $title, PDO::PARAM_STR );
    $statement->bindParam( 5, $text, PDO::PARAM_STR );
    $statement->bindParam( 6, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 7, $video_path, PDO::PARAM_STR );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    return GetDatabaseAddedId( $statement );
}

// ~~

function SetDatabaseBlock(
    int $id,
    string $slug,
    string $article_slug,
    float $number,
    string $title,
    string $text,
    string $image_path,
    string $video_path
    )
{
     $statement = GetDatabaseStatement( 'update `BLOCK` set `Slug` = ?, `ArticleSlug` = ?, `Number` = ?, `Title` = ?, `Text` = ?, `ImagePath` = ?, `VideoPath` = ? where Id = ?' );
    $statement->bindParam( 1, $slug, PDO::PARAM_STR );
    $statement->bindParam( 2, $article_slug, PDO::PARAM_STR );
    $statement->bindParam( 3, $number, PDO::PARAM_STR );
    $statement->bindParam( 4, $title, PDO::PARAM_STR );
    $statement->bindParam( 5, $text, PDO::PARAM_STR );
    $statement->bindParam( 6, $image_path, PDO::PARAM_STR );
    $statement->bindParam( 7, $video_path, PDO::PARAM_STR );
    $statement->bindParam( 8, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function RemoveDatabaseBlockById(
    int $id
    )
{
     $statement = GetDatabaseStatement( 'delete from `BLOCK` where `Id` = ?' );
    $statement->bindParam( 1, $id, PDO::PARAM_INT );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }
}

// ~~

function GetBlockArrayByArticleSlugMap(
    array &$block_array
    )
{
     $block_array_by_article_slug_map = [];

    foreach ( $block_array as  $block )
    {
        if ( !isset( $block_array_by_article_slug_map[ $block->ArticleSlug ] ) )
        {
            $block_array_by_article_slug_map[ $block->ArticleSlug ] = [ $block ];
        }
        else
        {
            array_push( $block_array_by_article_slug_map[ $block->ArticleSlug ], $block );
        }
    }

    return $block_array_by_article_slug_map;
}

// ~~

function GetBlockArrayByArticleSlug(
    array &$block_array,
    string $article_slug
    )
{
     $block_array_by_article_slug = [];

    foreach ( $block_array as  $block )
    {
        if ( $block->ArticleSlug === $article_slug )
        {
            array_push( $block_array_by_article_slug, $block );
        }
    }

    return $block_array_by_article_slug;
}

// ~~

function GetBlockByArticleSlugMap(
    array &$block_array
    )
{
     $block_by_article_slug_map = [];

    foreach ( $block_array as  $block )
    {
        $block_by_article_slug_map[ $block->ArticleSlug ] = $block;
    }

    return $block_by_article_slug_map;
}

// ~~

function GetBlockByArticleSlug(
    array &$block_by_article_slug_map,
    string $article_slug
    )
{
    if ( isset( $block_by_article_slug_map[ $article_slug ] ) )
    {
        return $block_by_article_slug_map[ $article_slug ];
    }
    else
    {
        return null;
    }
}
