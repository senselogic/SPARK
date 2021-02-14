<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/contact_model.php';

// -- TYPES

class DO_EDIT_CONTACT_CONTROLLER extends CONTROLLER
{
    function __construct(
        int $contact_id
        )
    {
        parent::__construct();

         $name = GetPostValue( 'Name' );
         $company = GetPostValue( 'Company' );
         $email = GetPostValue( 'Email' );
         $phone = GetPostValue( 'Phone' );
         $subject = GetPostValue( 'Subject' );
         $message = GetPostValue( 'Message' );
         $date_time = GetPostValue( 'DateTime' );

        SetDatabaseContact( $contact_id, $name, $company, $email, $phone, $subject, $message, $date_time );

        Redirect( '/admin/contact' );
    }
}

// -- STATEMENTS

 $do_edit_contact_controller = new DO_EDIT_CONTACT_CONTROLLER(  $contact_id );
