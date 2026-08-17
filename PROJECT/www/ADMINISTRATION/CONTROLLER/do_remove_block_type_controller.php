<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_type_model.php';

// -- TYPES

class DO_REMOVE_BLOCK_TYPE_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $block_type_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'publisher' ) )
        {
            RemoveDatabaseBlockTypeById( $block_type_id );

            Redirect( GetParentRoute( null, '/admin/block-type', '*/<% block_type.Id %>' ) );
        }
    }
}

// -- STATEMENTS

$do_remove_block_type_controller = new DO_REMOVE_BLOCK_TYPE_CONTROLLER( $language_code, $block_type_id );
