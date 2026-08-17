<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/user_model.php';

// -- TYPES

class VIEW_USER_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $User;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $user_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'administrator' ) )
        {
            $this->Title = 'View a user';
            $this->User = GetDatabaseUserById( $user_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_user_view.php';
        }
    }
}

// -- STATEMENTS

$view_user_controller = new VIEW_USER_CONTROLLER( $language_code, $user_id );
