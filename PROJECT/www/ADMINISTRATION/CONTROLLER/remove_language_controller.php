<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/language_model.php';

// -- TYPES

class REMOVE_LANGUAGE_CONTROLLER extends VIEW_CONTROLLER
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

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            $this->Title = 'Remove a language';
            $this->Language = GetDatabaseLanguageById( $language_id );

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/remove_language_view.php';
        }
    }
}

// -- STATEMENTS

$remove_language_controller = new REMOVE_LANGUAGE_CONTROLLER( $language_code, $language_id );
