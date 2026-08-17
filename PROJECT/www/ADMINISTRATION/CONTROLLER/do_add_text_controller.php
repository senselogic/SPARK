<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/text_model.php';

// -- TYPES

class DO_ADD_TEXT_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            $id = GetPostValue( 'Id' );
            $slug = GetPostValue( 'Slug' );
            $text = GetPostValue( 'Text' );

            AddDatabaseText( $id, $slug, $text );

            Redirect( GetParentRoute( null, '/admin/text' ) );
        }
    }
}

// -- STATEMENTS

$do_add_text_controller = new DO_ADD_TEXT_CONTROLLER( $language_code );
