<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_model.php';

// -- TYPES

class EDIT_PAGE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $Page;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $page_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $this->Title = 'Edit a page';
            $this->Page = GetDatabasePageById( $page_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/edit_page_view.php';
        }
    }
}

// -- STATEMENTS

$edit_page_controller = new EDIT_PAGE_CONTROLLER( $language_code, $page_id );
