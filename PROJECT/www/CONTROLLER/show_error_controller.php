<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';

// -- STATEMENTS

class SHOW_ERROR_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        )
    {
        parent::__construct( 'en' );

        require_once __DIR__ . '/' . '../VIEW/show_error_view.php';

        SetStatus( 404 );
    }
}

// -- STATEMENTS

$show_error_controller = new SHOW_ERROR_CONTROLLER();
