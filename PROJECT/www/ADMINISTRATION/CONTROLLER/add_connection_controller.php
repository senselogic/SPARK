<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/connection_model.php';

// -- TYPES

class ADD_CONNECTION_CONTROLLER extends VIEW_CONTROLLER
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

        if ( HasSessionMinimumUserRole( 'administrator' ) )
        {
            $this->Title = 'Add a connection';

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/add_connection_view.php';
        }
    }
}

// -- STATEMENTS

$add_connection_controller = new ADD_CONNECTION_CONTROLLER( $language_code );
