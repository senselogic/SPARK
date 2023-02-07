<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';

// -- TYPES

class SHOW_HOME_MENU_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        )
    {
        parent::__construct( 'en' );

        $this->Title = '';

        require_once __DIR__ . '/' . '../VIEW/show_home_menu_view.php';
    }
}

// -- STATEMENTS

 $show_home_menu_controller = new SHOW_HOME_MENU_CONTROLLER();
