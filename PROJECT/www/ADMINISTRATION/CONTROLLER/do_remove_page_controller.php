<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_model.php';

// -- TYPES

class DO_REMOVE_PAGE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $page_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            RemoveDatabasePageById( $page_id );

            Redirect( GetParentRoute( null, '/admin/page', '*/<% page.Id %>' ) );
        }
    }
}

// -- STATEMENTS

$do_remove_page_controller = new DO_REMOVE_PAGE_CONTROLLER( $language_code, $page_id );
