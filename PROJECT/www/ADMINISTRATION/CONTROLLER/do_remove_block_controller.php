<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_model.php';

// -- TYPES

class DO_REMOVE_BLOCK_CONTROLLER extends VIEW_CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        $block_id
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'contributor' ) )
        {
            RemoveDatabaseBlockById( $block_id );

            Redirect( GetParentRoute( null, '/admin/block', '*/<% block.Id %>' ) );
        }
    }
}

// -- STATEMENTS

$do_remove_block_controller = new DO_REMOVE_BLOCK_CONTROLLER( $language_code, $block_id );
