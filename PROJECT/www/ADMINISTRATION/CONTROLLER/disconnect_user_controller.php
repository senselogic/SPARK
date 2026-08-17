<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';

// -- TYPES

class DISCONNECT_USER_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        $this->Session->User = null;
        $this->Session->UserIsConnected = false;
        $this->Session->UserRole = '';
        $this->Session->Store();

        Redirect( '/admin' );
    }
}

// -- STATEMENTS

$disconnect_user_controller = new DISCONNECT_USER_CONTROLLER( $language_code );
