<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/connection_model.php';

// -- TYPES

class VIEW_CONNECTION_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $Connection;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $connection_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'administrator' ) )
        {
            $this->Title = 'View a connection';
            $this->Connection = GetDatabaseConnectionById( $connection_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_connection_view.php';
        }
    }
}

// -- STATEMENTS

$view_connection_controller = new VIEW_CONNECTION_CONTROLLER( $language_code, $connection_id );
