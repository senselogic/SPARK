<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_type_model.php';

// -- TYPES

class VIEW_PAGE_TYPES_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $PageTypeArray;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'author' ) )
        {
            $this->Title = 'View page types';
            $this->PageTypeArray = GetDatabasePageTypeArray();

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_page_types_view.php';
        }
    }
}

// -- STATEMENTS

$view_page_types_controller = new VIEW_PAGE_TYPES_CONTROLLER( $language_code );
