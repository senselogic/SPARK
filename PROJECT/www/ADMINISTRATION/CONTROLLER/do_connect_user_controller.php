<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/connection_model.php';
require_once __DIR__ . '/' . '../../MODEL/user_model.php';

// -- TYPES

class DO_CONNECT_USER_CONTROLLER extends CONTROLLER
{
    // -- ATTRIBUTES

    public
        $BrowserAddress,
        $Connection;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        string $path
        )
    {
        parent::__construct( $language_code );

        $this->BrowserAddress = GetBrowserAddress();
        $this->Connection = GetConnection( $this->BrowserAddress );

        if ( $this->Connection->BackoffSecondCount > 0 )
        {
            $user = null;
        }
        else
        {
            $pseudonym = GetPostValue( 'Pseudonym' );
            $password = GetPostValue( 'Password' );
            $user = GetDatabaseUserByPseudonymAndPassword( $pseudonym, $password );
        }

        $this->Connection->DateTime = GetCurrentDateTime();

        if ( $user === null )
        {
            $this->Connection->IsFailed = true;
            $this->Connection->AttemptCount += 1;

            SetConnection( $this->Connection );

            $this->Title = 'Sign In';

            Redirect( 'admin' );
        }
        else
        {
            $this->Connection->IsFailed = false;
            $this->Connection->AttemptCount = 0;

            SetConnection( $this->Connection );

            $this->Session->User = $user;
            $this->Session->UserIsConnected = true;
            $this->Session->UserRole = $user->Role;
            $this->Session->Store();

            Redirect( $path );
        }
    }
}

// -- STATEMENTS

$do_connect_user_controller = new DO_CONNECT_USER_CONTROLLER( $language_code, $path );
