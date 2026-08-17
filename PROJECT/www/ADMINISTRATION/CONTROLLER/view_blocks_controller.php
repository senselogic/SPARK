<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_model.php';

// -- TYPES

class VIEW_BLOCKS_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $BlockArray;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $this->Title = 'View blocks';
            $this->BlockArray = GetDatabaseBlockArray();

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_blocks_view.php';
        }
    }
}

// -- STATEMENTS

$view_blocks_controller = new VIEW_BLOCKS_CONTROLLER( $language_code );
