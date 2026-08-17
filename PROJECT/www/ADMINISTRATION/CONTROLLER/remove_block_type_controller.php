<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_type_model.php';

// -- TYPES

class REMOVE_BLOCK_TYPE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $BlockType;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $block_type_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            $this->Title = 'Remove a block type';
            $this->BlockType = GetDatabaseBlockTypeById( $block_type_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/remove_block_type_view.php';
        }
    }
}

// -- STATEMENTS

$remove_block_type_controller = new REMOVE_BLOCK_TYPE_CONTROLLER( $language_code, $block_type_id );
