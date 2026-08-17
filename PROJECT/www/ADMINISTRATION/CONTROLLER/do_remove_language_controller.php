<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/language_model.php';

// -- TYPES

class DO_REMOVE_LANGUAGE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $language_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            RemoveDatabaseLanguageById( $language_id );

            Redirect( GetParentRoute( null, '/admin/language', '*/<% language.Id %>' ) );
        }
    }
}

// -- STATEMENTS

$do_remove_language_controller = new DO_REMOVE_LANGUAGE_CONTROLLER( $language_code, $language_id );
