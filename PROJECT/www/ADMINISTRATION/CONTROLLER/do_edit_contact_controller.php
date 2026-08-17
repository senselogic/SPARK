<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/contact_model.php';

// -- TYPES

class DO_EDIT_CONTACT_CONTROLLER extends VIEW_CONTROLLER
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
            $name = GetPostValue( 'Name' );
            $company = GetPostValue( 'Company' );
            $email = GetPostValue( 'Email' );
            $phone = GetPostValue( 'Phone' );
            $subject = GetPostValue( 'Subject' );
            $message = GetPostValue( 'Message' );
            $date_time = GetPostValue( 'DateTime' );

            SetDatabaseContact( $contact_id, $name, $company, $email, $phone, $subject, $message, $date_time );

            Redirect( GetParentRoute( null, '/admin/contact' ) );
        }
    }
}

// -- STATEMENTS

$do_edit_contact_controller = new DO_EDIT_CONTACT_CONTROLLER( $language_code, $contact_id );
