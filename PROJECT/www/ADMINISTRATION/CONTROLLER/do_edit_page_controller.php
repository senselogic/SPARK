<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_model.php';

// -- TYPES

class DO_EDIT_PAGE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $page_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $slug = GetPostValue( 'Slug' );
            $route = GetPostValue( 'Route' );
            $type_slug = GetPostValue( 'TypeSlug' );
            $number = GetPostValue( 'Number' );
            $language_code_array = GetJsonObject( GetPostValue( 'LanguageCodeArray' ) );
            $is_active = GetPostValue( 'IsActive' );
            $title = GetPostValue( 'Title' );
            $heading = GetPostValue( 'Heading' );
            $teaser = GetPostValue( 'Teaser' );
            $text = GetPostValue( 'Text' );
            $image_path = GetPostValue( 'ImagePath' );
            $image_vertical_position = GetPostValue( 'ImageVerticalPosition' );
            $image_horizontal_position = GetPostValue( 'ImageHorizontalPosition' );
            $image_fit = GetPostValue( 'ImageFit' );
            $video_path = GetPostValue( 'VideoPath' );
            $meta_title = GetPostValue( 'MetaTitle' );
            $meta_description = GetPostValue( 'MetaDescription' );
            $meta_image_path = GetPostValue( 'MetaImagePath' );

            SetDatabasePage( $page_id, $slug, $route, $type_slug, $number, $language_code_array, $is_active, $title, $heading, $teaser, $text, $image_path, $image_vertical_position, $image_horizontal_position, $image_fit, $video_path, $meta_title, $meta_description, $meta_image_path );

            Redirect( GetParentRoute( null, '/admin/page' ) );
        }
    }
}

// -- STATEMENTS

$do_edit_page_controller = new DO_EDIT_PAGE_CONTROLLER( $language_code, $page_id );
