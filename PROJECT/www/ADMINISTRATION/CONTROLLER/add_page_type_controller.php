<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_type_model.php';

// -- TYPES

class ADD_PAGE_TYPE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            $this->Title = 'Add a page type';

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/add_page_type_view.php';
        }
    }
}

// -- STATEMENTS

$add_page_type_controller = new ADD_PAGE_TYPE_CONTROLLER( $language_code );
