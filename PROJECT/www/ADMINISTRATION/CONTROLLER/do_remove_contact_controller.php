<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/contact_model.php';

// -- TYPES

class DO_REMOVE_CONTACT_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $contact_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'author' ) )
        {
            RemoveDatabaseContactById( $contact_id );

            Redirect( FindSessionValue( 'ListRoute', '/admin/contact' ) );
        }
    }
}

// -- STATEMENTS

 $do_remove_contact_controller = new DO_REMOVE_CONTACT_CONTROLLER(  $language_code,  $contact_id );
