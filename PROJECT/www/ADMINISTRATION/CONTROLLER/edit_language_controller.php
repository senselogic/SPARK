<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/language_model.php';

// -- TYPES

class EDIT_LANGUAGE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $Language;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $language_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'author' ) )
        {
            $this->Title = 'Edit a language';
            $this->Language = GetDatabaseLanguageById( $language_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/edit_language_view.php';
        }
    }
}

// -- STATEMENTS

$edit_language_controller = new EDIT_LANGUAGE_CONTROLLER( $language_code, $language_id );
