<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_model.php';

// -- TYPES

class VIEW_BLOCK_CONTROLLER extends VIEW_CONTROLLER
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
            $this->Title = 'View a block';
            $this->Block = GetDatabaseBlockById( $block_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_block_view.php';
        }
    }
}

// -- STATEMENTS

$view_block_controller = new VIEW_BLOCK_CONTROLLER( $language_code, $block_id );
