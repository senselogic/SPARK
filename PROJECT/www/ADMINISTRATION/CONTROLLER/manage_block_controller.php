<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_model.php';

// -- TYPES

class MANAGE_BLOCK_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $Block;

    // -- CONSTRUCTORS

    function __construct(
        string $block_id
        )
    {
        parent::__construct();

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $this->Title = 'Manage a block';
            $this->Block = GetValidBlockById( $this->BlockByIdMap, $block_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/manage_block_view.php';
        }
    }
}

// -- STATEMENTS

$manage_block_controller = new MANAGE_BLOCK_CONTROLLER( $block_id );
