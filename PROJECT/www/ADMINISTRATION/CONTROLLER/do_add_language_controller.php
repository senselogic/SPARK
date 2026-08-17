<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/language_model.php';

// -- TYPES

class DO_ADD_LANGUAGE_CONTROLLER extends VIEW_CONTROLLER
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
            $code = GetPostValue( 'Code' );
            $number = GetPostValue( 'Number' );
            $text = GetPostValue( 'Text' );
            $is_active = GetPostValue( 'IsActive' );

            AddDatabaseLanguage( $id, $code, $number, $text, $is_active );

            Redirect( GetParentRoute( null, '/admin/language' ) );
        }
    }
}

// -- STATEMENTS

$do_add_language_controller = new DO_ADD_LANGUAGE_CONTROLLER( $language_code );
