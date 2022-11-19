<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/article_page_model.php';

// -- TYPES

class DO_ADD_ARTICLE_PAGE_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

         $id = GetPostValue( 'Id' );
         $route = GetPostValue( 'Route' );
         $type_slug = GetPostValue( 'TypeSlug' );
         $number = GetPostValue( 'Number' );
         $language_code_array = GetJsonObject( GetPostValue( 'LanguageCodeArray' ) );
         $is_active = GetPostValue( 'IsActive' );
         $title = GetPostValue( 'Title' );
         $text = GetPostValue( 'Text' );
         $image_path = GetPostValue( 'ImagePath' );
         $image_vertical_position = GetPostValue( 'ImageVerticalPosition' );
         $image_horizontal_position = GetPostValue( 'ImageHorizontalPosition' );
         $video_path = GetPostValue( 'VideoPath' );

        AddDatabaseArticlePage( $id, $route, $type_slug, $number, $language_code_array, $is_active, $title, $text, $image_path, $image_vertical_position, $image_horizontal_position, $video_path );

        Redirect( FindSessionValue( 'ListRoute', '/admin/article-page' ) );
    }
}

// -- STATEMENTS

 $do_add_article_page_controller = new DO_ADD_ARTICLE_PAGE_CONTROLLER(  $language_code );
