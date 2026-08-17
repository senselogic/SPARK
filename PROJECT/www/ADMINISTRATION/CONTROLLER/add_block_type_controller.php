<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_type_model.php';

// -- TYPES

class ADD_BLOCK_TYPE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            $this->Title = 'Add a block type';

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/add_block_type_view.php';
        }
    }
}

// -- STATEMENTS

$add_block_type_controller = new ADD_BLOCK_TYPE_CONTROLLER( $language_code );
