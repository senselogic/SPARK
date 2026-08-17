<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/user_model.php';

// -- TYPES

class VIEW_USERS_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $UserArray;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'administrator' ) )
        {
            $this->Title = 'View users';
            $this->UserArray = GetDatabaseUserArray();

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_users_view.php';
        }
    }
}

// -- STATEMENTS

$view_users_controller = new VIEW_USERS_CONTROLLER( $language_code );
