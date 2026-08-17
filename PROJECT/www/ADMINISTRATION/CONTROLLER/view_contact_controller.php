<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/contact_model.php';

// -- TYPES

class VIEW_CONTACT_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $Contact;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $contact_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'author' ) )
        {
            $this->Title = 'View a contact';
            $this->Contact = GetDatabaseContactById( $contact_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_contact_view.php';
        }
    }
}

// -- STATEMENTS

$view_contact_controller = new VIEW_CONTACT_CONTROLLER( $language_code, $contact_id );
