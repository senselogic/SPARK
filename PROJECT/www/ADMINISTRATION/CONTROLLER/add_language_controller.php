<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/language_model.php';

// -- TYPES

class ADD_LANGUAGE_CONTROLLER extends VIEW_CONTROLLER
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
            $this->Title = 'Add a language';

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/add_language_view.php';
        }
    }
}

// -- STATEMENTS

$add_language_controller = new ADD_LANGUAGE_CONTROLLER( $language_code );
