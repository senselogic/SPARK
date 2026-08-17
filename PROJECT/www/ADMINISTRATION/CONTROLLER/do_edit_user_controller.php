<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/user_model.php';

// -- TYPES

class DO_EDIT_USER_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $user_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'administrator' ) )
        {
            $email = GetPostValue( 'Email' );
            $pseudonym = GetPostValue( 'Pseudonym' );
            $password = GetPostValue( 'Password' );
            $role = GetPostValue( 'Role' );

            SetDatabaseUser( $user_id, $email, $pseudonym, $password, $role );

            Redirect( GetParentRoute( null, '/admin/user' ) );
        }
    }
}

// -- STATEMENTS

$do_edit_user_controller = new DO_EDIT_USER_CONTROLLER( $language_code, $user_id );
