<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/text_model.php';

// -- TYPES

class DO_REMOVE_TEXT_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $text_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            RemoveDatabaseTextById( $text_id );

            Redirect( GetParentRoute( null, '/admin/text', '*/<% text.Id %>' ) );
        }
    }
}

// -- STATEMENTS

$do_remove_text_controller = new DO_REMOVE_TEXT_CONTROLLER( $language_code, $text_id );
