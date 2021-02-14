<?php // -- IMPORTS

require_once __DIR__ . '/' . 'view_controller.php';
require_once __DIR__ . '/' . '../MODEL/product_model.php';
require_once __DIR__ . '/' . '../MODEL/category_model.php';
require_once __DIR__ . '/' . '../MODEL/text_model.php';

// -- TYPES

class SHOW_BASE_CONTROLLER extends VIEW_CONTROLLER
{
    function __construct(
        string $language_code,
        string $view_name
        )
    {
        parent::__construct( $language_code );
        $this->ViewName = $view_name;

        $this->CategoryArray = GetDatabaseCategoryArray();
        $this->CategoryCount = count( $this->CategoryArray );
        $this->ProductArray = GetDatabaseProductArray();
        $this->ProductCount = count( $this->ProductArray );

        $this->Captcha = GetCaptchaText( 6 );
        $this->Session->Captcha = $this->Captcha;
        $this->Session->Store();

        require_once __DIR__ . '/' . '../VIEW/show_base_view.php';
    }
}

// -- STATEMENTS

 $show_base_controller = new SHOW_BASE_CONTROLLER(  $language_code,  $view_name );
