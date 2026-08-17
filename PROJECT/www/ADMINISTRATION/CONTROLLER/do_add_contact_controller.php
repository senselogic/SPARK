<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/contact_model.php';

// -- TYPES

class DO_ADD_CONTACT_CONTROLLER extends VIEW_CONTROLLER
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
            $name = GetPostValue( 'Name' );
            $company = GetPostValue( 'Company' );
            $email = GetPostValue( 'Email' );
            $phone = GetPostValue( 'Phone' );
            $subject = GetPostValue( 'Subject' );
            $message = GetPostValue( 'Message' );

            AddDatabaseContact( $id, $name, $company, $email, $phone, $subject, $message );

            Redirect( GetParentRoute( null, '/admin/contact' ) );
        }
    }
}

// -- STATEMENTS

$do_add_contact_controller = new DO_ADD_CONTACT_CONTROLLER( $language_code );
