<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_category_model.php';

// -- TYPES

class EDIT_BLOCK_CATEGORY_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $block_category_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $this->Title = 'Edit a block category';
            $this->BlockCategory = GetDatabaseBlockCategoryById( $block_category_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/edit_block_category_view.php';
        }
    }
}

// -- STATEMENTS

 $edit_block_category_controller = new EDIT_BLOCK_CATEGORY_CONTROLLER(  $language_code,  $block_category_id );
