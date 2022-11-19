<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/articles_page_model.php';

// -- TYPES

class DO_EDIT_ARTICLES_PAGE_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $articles_page_id
        )
    {
        parent::__construct( $language_code );

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

        SetDatabaseArticlesPage( $articles_page_id, $route, $type_slug, $number, $language_code_array, $is_active, $title, $text, $image_path, $image_vertical_position, $image_horizontal_position, $video_path );

        Redirect( FindSessionValue( 'ListRoute', '/admin/articles-page' ) );
    }
}

// -- STATEMENTS

 $do_edit_articles_page_controller = new DO_EDIT_ARTICLES_PAGE_CONTROLLER(  $language_code,  $articles_page_id );
