<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/page_type_model.php';

// -- TYPES

class DO_EDIT_PAGE_TYPE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $page_type_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'author' ) )
        {
            $slug = GetPostValue( 'Slug' );
            $name = GetPostValue( 'Name' );

            SetDatabasePageType( $page_type_id, $slug, $name );

            Redirect( GetParentRoute( null, '/admin/page-type' ) );
        }
    }
}

// -- STATEMENTS

$do_edit_page_type_controller = new DO_EDIT_PAGE_TYPE_CONTROLLER( $language_code, $page_type_id );
