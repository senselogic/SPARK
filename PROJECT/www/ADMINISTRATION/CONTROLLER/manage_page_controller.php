<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_model.php';
require_once __DIR__ . '/' . '../../MODEL/page_model.php';
require_once __DIR__ . '/' . '../../MODEL/page_sub_page_model.php';

// -- TYPES

class MANAGE_PAGE_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        int $page_id
        )
    {
        parent::__construct();

        $this->Title = 'Manage a page';
        $this->BlockArray = GetDatabaseBlockArray();
        $this->BlockBySlugMap = GetValidBlockBySlugMap( $this->BlockArray );
        $this->PageArray = GetDatabasePageArray();
        $this->PageSubPageArray = GetDatabasePageSubPageArray();
        $this->PageBySlugMap = GetValidPageBySlugMap( $this->PageArray, $this->PageSubPageArray, $this->BlockArray, $this->BlockBySlugMap );
        $this->Page = GetValidPageById( $this->PageBySlugMap, $page_id );
        $this->ListRoute = '/admin/page/manage/' . $page_id;

        SetSessionValue( 'ListRoute', GetRequest() );

        require_once __DIR__ . '/' . '../VIEW/manage_page_view.php';
    }
}

// -- STATEMENTS

 $manage_page_controller = new MANAGE_PAGE_CONTROLLER(  $page_id );
