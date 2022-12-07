<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../MODEL/block_content_model.php';

// -- TYPES

class VIEW_BLOCK_CONTENTS_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        $this->Title = 'View block contents';
        $this->BlockContentArray = GetDatabaseBlockContentArray();

        SetSessionValue( 'ListRoute', GetRequest() );

        require_once __DIR__ . '/' . '../VIEW/view_block_contents_view.php';
    }
}

// -- STATEMENTS

 $view_block_contents_controller = new VIEW_BLOCK_CONTENTS_CONTROLLER(  $language_code );