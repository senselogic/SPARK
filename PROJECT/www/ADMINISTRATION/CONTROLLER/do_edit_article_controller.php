<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/article_model.php';

// -- TYPES

class DO_EDIT_ARTICLE_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $article_id
        )
    {
        parent::__construct( $language_code );

         $slug = GetPostValue( 'Slug' );
         $name = GetPostValue( 'Name' );
         $text = GetPostValue( 'Text' );
         $image_path = GetPostValue( 'ImagePath' );
         $video_path = GetPostValue( 'VideoPath' );
         $next_article_id = GetPostValue( 'NextArticleId' );
         $priority = GetPostValue( 'Priority' );
         $is_active = GetPostValue( 'IsActive' );

        SetDatabaseArticle( $article_id, $slug, $name, $text, $image_path, $video_path, $next_article_id, $priority, $is_active );

        Redirect( FindSessionValue( 'ListPage', '/admin/article' ) );
    }
}

// -- STATEMENTS

 $do_edit_article_controller = new DO_EDIT_ARTICLE_CONTROLLER(  $language_code,  $article_id );
