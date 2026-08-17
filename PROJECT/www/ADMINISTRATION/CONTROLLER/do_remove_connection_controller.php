<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/connection_model.php';

// -- TYPES

class DO_REMOVE_CONNECTION_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $connection_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'administrator' ) )
        {
            RemoveDatabaseConnectionById( $connection_id );

            Redirect( GetParentRoute( null, '/admin/connection', '*/<% connection.Id %>' ) );
        }
    }
}

// -- STATEMENTS

$do_remove_connection_controller = new DO_REMOVE_CONNECTION_CONTROLLER( $language_code, $connection_id );
