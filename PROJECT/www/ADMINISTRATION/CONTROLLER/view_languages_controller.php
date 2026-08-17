<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/language_model.php';

// -- TYPES

class VIEW_LANGUAGES_CONTROLLER extends VIEW_CONTROLLER
{
    // -- ATTRIBUTES

    public
        $Title,
        $LanguageArray;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'author' ) )
        {
            $this->Title = 'View languages';
            $this->LanguageArray = GetDatabaseLanguageArray();

            AddParentRoute();

            require_once __DIR__ . '/' . '../VIEW/view_languages_view.php';
        }
    }
}

// -- STATEMENTS

$view_languages_controller = new VIEW_LANGUAGES_CONTROLLER( $language_code );
