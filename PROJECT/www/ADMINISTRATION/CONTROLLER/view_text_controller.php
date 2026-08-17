<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/text_model.php';

// -- TYPES

class VIEW_TEXT_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $Text;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $text_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'author' ) )
        {
            $this->Title = 'View a text';
            $this->Text = GetDatabaseTextById( $text_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_text_view.php';
        }
    }
}

// -- STATEMENTS

$view_text_controller = new VIEW_TEXT_CONTROLLER( $language_code, $text_id );
