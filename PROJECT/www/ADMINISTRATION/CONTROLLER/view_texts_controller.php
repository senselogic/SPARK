<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/text_model.php';

// -- TYPES

class VIEW_TEXTS_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $TextArray;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'author' ) )
        {
            $this->Title = 'View texts';
            $this->TextArray = GetDatabaseTextArray();

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_texts_view.php';
        }
    }
}

// -- STATEMENTS

$view_texts_controller = new VIEW_TEXTS_CONTROLLER( $language_code );
