<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_type_model.php';

// -- TYPES

class DO_ADD_PAGE_TYPE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            $id = GetPostValue( 'Id' );
            $slug = GetPostValue( 'Slug' );
            $name = GetPostValue( 'Name' );

            AddDatabasePageType( $id, $slug, $name );

            Redirect( GetParentRoute( null, '/admin/page-type' ) );
        }
    }
}

// -- STATEMENTS

$do_add_page_type_controller = new DO_ADD_PAGE_TYPE_CONTROLLER( $language_code );
