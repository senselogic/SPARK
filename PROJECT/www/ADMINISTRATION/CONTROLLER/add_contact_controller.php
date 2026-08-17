<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/contact_model.php';

// -- TYPES

class ADD_CONTACT_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            $this->Title = 'Add a contact';

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/add_contact_view.php';
        }
    }
}

// -- STATEMENTS

$add_contact_controller = new ADD_CONTACT_CONTROLLER( $language_code );
