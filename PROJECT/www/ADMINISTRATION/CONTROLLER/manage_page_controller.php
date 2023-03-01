<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_model.php';
require_once __DIR__ . '/' . '../../MODEL/page_model.php';

// -- TYPES

class MANAGE_PAGE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $page_id_or_slug
        )
    {
        parent::__construct();

        $this->Title = 'Manage a page';
        $this->Page = GetValidPageByIdOrSlug( $this->PageByIdMap, $this->PageBySlugMap, $page_id_or_slug );
        $this->ListRoute = '/admin/page/manage/' . $page_id_or_slug;

        SetSessionValue( 'ListRoute', GetRequest() );

        require_once __DIR__ . '/' . '../VIEW/manage_page_view.php';
    }
}

// -- STATEMENTS

 $manage_page_controller = new MANAGE_PAGE_CONTROLLER(  $page_id_or_slug );
