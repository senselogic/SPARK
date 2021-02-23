<!doctype html>
<html lang="en">
    <head>
        <?php require __DIR__ . '/' . 'page_head_block.php' ?>
    </head>
    <body>
        <?php require __DIR__ . '/' . 'page_body_block.php' ?>
        <div class="container-extended page-container">
            <div class="page-menu">
                <div class="page-menu-content">
                    <div class="page-menu-item">
                        <a href="/admin/text">
                            <span class="form-button form-button-large text-button">
                            </span>
                            <span class="form-button-tooltip">
                                Text
                            </span>
                        </a>
                    </div>
                    <div class="page-menu-item">
                        <a href="/admin/department">
                            <span class="form-button form-button-large department-button">
                            </span>
                            <span class="form-button-tooltip">
                                Department
                            </span>
                        </a>
                    </div>
                    <div class="page-menu-item">
                        <a href="/admin/product">
                            <span class="form-button form-button-large product-button">
                            </span>
                            <span class="form-button-tooltip">
                                Product
                            </span>
                        </a>
                    </div>
                    <div class="page-menu-item">
                        <a href="/admin/contact">
                            <span class="form-button form-button-large contact-button">
                            </span>
                            <span class="form-button-tooltip">
                                Contact
                            </span>
                        </a>
                    </div>
                    <?php if ( FindSessionValue( 'UserRole', '' ) === 'administrator' ) { ?>
                        <div class="page-menu-item">
                            <a href="/admin/user">
                                <span class="form-button form-button-large user-button">
                                </span>
                                <span class="form-button-tooltip">
                                    User
                                </span>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="page-menu-item">
                        <a href="/admin/disconnect">
                            <span class="form-button form-button-large disconnect-button">
                            </span>
                            <span class="form-button-tooltip">
                                Disconnect
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="page-title">
                <span class="page-title-content">
                    <?php echo htmlspecialchars( $this->Title ); ?>
                </span>
            </div>
            <div class="page-body">
                <div class="page-body-content">
