<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_model.php';

// -- TYPES

class MANAGE_BLOCKS_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title;

    // -- CONSTRUCTORS

    function __construct(
        )
    {
        parent::__construct();

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $this->Title = 'Manage blocks';

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/manage_blocks_view.php';
        }
    }
}

// -- STATEMENTS

$manage_blocks_controller = new MANAGE_BLOCKS_CONTROLLER();
