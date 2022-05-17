<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/user_model.php';

// -- TYPES

class VIEW_USERS_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        $this->Title = 'View users';
        $this->UserArray = GetDatabaseUserArray();

        SetSessionValue( 'ListRoute', GetRequest() );

        require_once __DIR__ . '/' . '../VIEW/view_users_view.php';
    }
}

// -- STATEMENTS

 $view_users_controller = new VIEW_USERS_CONTROLLER(  $language_code );
