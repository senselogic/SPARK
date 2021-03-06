<!doctype html>
<html lang="en">
    <head>
        <?php require __DIR__ . '/' . 'page_head.php'; ?>
    </head>
    <body>
        <?php require __DIR__ . '/' . 'page_body.php'; ?>
        <div class="extended-container page-container">
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
                        <a href="/admin/article">
                            <span class="form-button form-button-large article-button">
                            </span>
                            <span class="form-button-tooltip">
                                Article
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
                    <?php if ( HasSessionMinimumUserRole( 'administrator' ) ) { ?>
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
