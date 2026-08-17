<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/connection_model.php';

// -- TYPES

class VIEW_CONNECTIONS_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $ConnectionArray;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'administrator' ) )
        {
            $this->Title = 'View connections';
            $this->ConnectionArray = GetDatabaseConnectionArray();

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_connections_view.php';
        }
    }
}

// -- STATEMENTS

$view_connections_controller = new VIEW_CONNECTIONS_CONTROLLER( $language_code );
