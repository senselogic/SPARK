<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/text_model.php';

// -- TYPES

class ADD_TEXT_CONTROLLER extends VIEW_CONTROLLER
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
            $this->Title = 'Add a text';

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/add_text_view.php';
        }
    }
}

// -- STATEMENTS

$add_text_controller = new ADD_TEXT_CONTROLLER( $language_code );
