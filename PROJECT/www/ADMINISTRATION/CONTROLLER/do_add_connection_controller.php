<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/connection_model.php';

// -- TYPES

class DO_ADD_CONNECTION_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'administrator' ) )
        {
            $id = GetPostValue( 'Id' );
            $browser_address = GetPostValue( 'BrowserAddress' );
            $date_time = GetPostValue( 'DateTime' );
            $is_failed = GetPostValue( 'IsFailed' );
            $attempt_count = GetPostValue( 'AttemptCount' );

            AddDatabaseConnection( $id, $browser_address, $date_time, $is_failed, $attempt_count );

            Redirect( GetParentRoute( null, '/admin/connection' ) );
        }
    }
}

// -- STATEMENTS

$do_add_connection_controller = new DO_ADD_CONNECTION_CONTROLLER( $language_code );
