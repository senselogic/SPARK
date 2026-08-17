<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/language_model.php';

// -- TYPES

class DO_EDIT_LANGUAGE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $language_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'author' ) )
        {
            $code = GetPostValue( 'Code' );
            $number = GetPostValue( 'Number' );
            $text = GetPostValue( 'Text' );
            $is_active = GetPostValue( 'IsActive' );

            SetDatabaseLanguage( $language_id, $code, $number, $text, $is_active );

            Redirect( GetParentRoute( null, '/admin/language' ) );
        }
    }
}

// -- STATEMENTS

$do_edit_language_controller = new DO_EDIT_LANGUAGE_CONTROLLER( $language_code, $language_id );
