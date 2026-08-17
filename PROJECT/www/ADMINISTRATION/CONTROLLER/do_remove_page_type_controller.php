<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_type_model.php';

// -- TYPES

class DO_REMOVE_PAGE_TYPE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $page_type_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            RemoveDatabasePageTypeById( $page_type_id );

            Redirect( GetParentRoute( null, '/admin/page-type', '*/<% page_type.Id %>' ) );
        }
    }
}

// -- STATEMENTS

$do_remove_page_type_controller = new DO_REMOVE_PAGE_TYPE_CONTROLLER( $language_code, $page_type_id );
