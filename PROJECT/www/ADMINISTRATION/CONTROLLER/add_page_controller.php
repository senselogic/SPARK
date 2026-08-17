<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_model.php';

// -- TYPES

class ADD_PAGE_CONTROLLER extends VIEW_CONTROLLER
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

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $this->Title = 'Add a page';

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/add_page_view.php';
        }
    }
}

// -- STATEMENTS

$add_page_controller = new ADD_PAGE_CONTROLLER( $language_code );
