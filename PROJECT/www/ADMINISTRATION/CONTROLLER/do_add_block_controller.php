<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_model.php';

// -- TYPES

class DO_ADD_BLOCK_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $id = GetPostValue( 'Id' );
            $slug = GetPostValue( 'Slug' );
            $page_id = GetPostValue( 'PageId' );
            $type_slug = GetPostValue( 'TypeSlug' );
            $number = GetPostValue( 'Number' );
            $language_code_array = GetJsonObject( GetPostValue( 'LanguageCodeArray' ) );
            $minimum_height = GetPostValue( 'MinimumHeight' );
            $title = GetPostValue( 'Title' );
            $title_array = GetJsonObject( GetPostValue( 'TitleArray' ) );
            $teaser = GetPostValue( 'Teaser' );
            $teaser_array = GetJsonObject( GetPostValue( 'TeaserArray' ) );
            $text = GetPostValue( 'Text' );
            $text_array = GetJsonObject( GetPostValue( 'TextArray' ) );
            $route = GetPostValue( 'Route' );
            $route_array = GetJsonObject( GetPostValue( 'RouteArray' ) );
            $image_side = GetPostValue( 'ImageSide' );
            $image_title = GetPostValue( 'ImageTitle' );
            $image_title_array = GetJsonObject( GetPostValue( 'ImageTitleArray' ) );
            $image_path = GetPostValue( 'ImagePath' );
            $image_path_array = GetJsonObject( GetPostValue( 'ImagePathArray' ) );
            $image_vertical_position = GetPostValue( 'ImageVerticalPosition' );
            $image_vertical_position_array = GetJsonObject( GetPostValue( 'ImageVerticalPositionArray' ) );
            $image_horizontal_position = GetPostValue( 'ImageHorizontalPosition' );
            $image_horizontal_position_array = GetJsonObject( GetPostValue( 'ImageHorizontalPositionArray' ) );
            $image_fit = GetPostValue( 'ImageFit' );
            $video_path = GetPostValue( 'VideoPath' );
            $video_path_array = GetJsonObject( GetPostValue( 'VideoPathArray' ) );
            $document_path = GetPostValue( 'DocumentPath' );
            $document_path_array = GetJsonObject( GetPostValue( 'DocumentPathArray' ) );
            $key_array = GetJsonObject( GetPostValue( 'KeyArray' ) );
            $value_array = GetJsonObject( GetPostValue( 'ValueArray' ) );

            AddDatabaseBlock( $id, $slug, $page_id, $type_slug, $number, $language_code_array, $minimum_height, $title, $title_array, $teaser, $teaser_array, $text, $text_array, $route, $route_array, $image_side, $image_title, $image_title_array, $image_path, $image_path_array, $image_vertical_position, $image_vertical_position_array, $image_horizontal_position, $image_horizontal_position_array, $image_fit, $video_path, $video_path_array, $document_path, $document_path_array, $key_array, $value_array );

            Redirect( GetParentRoute( null, '/admin/block' ) );
        }
    }
}

// -- STATEMENTS

$do_add_block_controller = new DO_ADD_BLOCK_CONTROLLER( $language_code );
