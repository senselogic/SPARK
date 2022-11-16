<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_category_model.php';

// -- TYPES

class VIEW_BLOCK_CATEGORY_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $block_category_id
        )
    {
        parent::__construct( $language_code );

        $this->Title = 'View a block category';
        $this->BlockCategory = GetDatabaseBlockCategoryById( $block_category_id );
        $this->ListRoute = FindSessionValue( 'ListRoute', '/admin/block-category' );

        require_once __DIR__ . '/' . '../VIEW/view_block_category_view.php';
    }
}

// -- STATEMENTS

 $view_block_category_controller = new VIEW_BLOCK_CATEGORY_CONTROLLER(  $language_code,  $block_category_id );
