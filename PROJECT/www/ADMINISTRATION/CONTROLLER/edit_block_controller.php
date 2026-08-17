<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_model.php';

// -- TYPES

class EDIT_BLOCK_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $Block;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $block_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $this->Title = 'Edit a block';
            $this->Block = GetDatabaseBlockById( $block_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/edit_block_view.php';
        }
    }
}

// -- STATEMENTS

$edit_block_controller = new EDIT_BLOCK_CONTROLLER( $language_code, $block_id );
