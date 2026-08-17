<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_model.php';

// -- TYPES

class VIEW_PAGES_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $PageArray;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            $this->Title = 'View pages';
            $this->PageArray = GetDatabasePageArray();

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_pages_view.php';
        }
    }
}

// -- STATEMENTS

$view_pages_controller = new VIEW_PAGES_CONTROLLER( $language_code );
