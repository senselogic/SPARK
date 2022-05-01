<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_sub_block_model.php';

// -- TYPES

class VIEW_BLOCK_SUB_BLOCK_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $block_sub_block_id
        )
    {
        parent::__construct( $language_code );

        $this->Title = 'View a block sub block';
        $this->BlockSubBlock = GetDatabaseBlockSubBlockById( $block_sub_block_id );
        $this->ListPage = FindSessionValue( 'ListPage', '/admin/block-sub-block' );

        require_once __DIR__ . '/' . '../VIEW/view_block_sub_block_view.php';
    }
}

// -- STATEMENTS

 $view_block_sub_block_controller = new VIEW_BLOCK_SUB_BLOCK_CONTROLLER(  $language_code,  $block_sub_block_id );
