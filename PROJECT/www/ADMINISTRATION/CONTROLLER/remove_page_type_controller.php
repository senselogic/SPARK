<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_type_model.php';

// -- TYPES

class REMOVE_PAGE_TYPE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $PageType;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $page_type_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            $this->Title = 'Remove a page type';
            $this->PageType = GetDatabasePageTypeById( $page_type_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/remove_page_type_view.php';
        }
    }
}

// -- STATEMENTS

$remove_page_type_controller = new REMOVE_PAGE_TYPE_CONTROLLER( $language_code, $page_type_id );
