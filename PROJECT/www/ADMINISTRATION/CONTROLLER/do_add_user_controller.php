<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/user_model.php';

// -- TYPES

class DO_ADD_USER_CONTROLLER extends VIEW_CONTROLLER
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
            $email = GetPostValue( 'Email' );
            $pseudonym = GetPostValue( 'Pseudonym' );
            $password = GetPostValue( 'Password' );
            $role = GetPostValue( 'Role' );

            AddDatabaseUser( $id, $email, $pseudonym, $password, $role );

            Redirect( GetParentRoute( null, '/admin/user' ) );
        }
    }
}

// -- STATEMENTS

$do_add_user_controller = new DO_ADD_USER_CONTROLLER( $language_code );
