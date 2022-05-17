<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_sub_page_model.php';

// -- TYPES

class DO_REMOVE_PAGE_SUB_PAGE_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $page_sub_page_id
        )
    {
        parent::__construct( $language_code );

        RemoveDatabasePageSubPageById( $page_sub_page_id );

        Redirect( FindSessionValue( 'ListRoute', '/admin/page-sub-page' ) );
    }
}

// -- STATEMENTS

 $do_remove_page_sub_page_controller = new DO_REMOVE_PAGE_SUB_PAGE_CONTROLLER(  $language_code,  $page_sub_page_id );
