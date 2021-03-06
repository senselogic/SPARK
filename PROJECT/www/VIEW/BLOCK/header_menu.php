









































































































































































<div id="header-menu" class="header-menu">
    <div class="large-padded-container header-menu-button-container">
        <div class="header-menu-button" data-view-name="home" onclick="ShowView( 'home' )">
            <?php echo $this->GetText( 'HeaderMenuHomeButton' ); ?>
        </div>
        <div class="margin-left-auto! header-menu-button header-menu-desktop-button" data-view-name="home" onclick="ShowView( 'home/#article-list' )">
            <?php echo $this->GetText( 'HeaderMenuArticleListButton' ); ?>
        </div>
        <div class="margin-right-auto! header-menu-button header-menu-desktop-button" data-view-name="legal-notice" onclick="ShowView( 'legal-notice' )">
            <?php echo $this->GetText( 'HeaderMenuLegalNoticeButton' ); ?>
        </div>
        <div class="header-menu-button header-menu-desktop-button" data-view-name="contact" onclick="ShowView( 'contact' )">
            <?php echo $this->GetText( 'HeaderMenuContactButton' ); ?>
        </div>
        <div class="margin-left-auto! header-menu-icon-button header-menu-open-button" onclick="OpenHeaderMenu()">
        </div>
    </div>
    <div class="header-menu-mobile-button-container">
        <div class="header-menu-mobile-button" data-view-name="home" onclick="CloseHeaderMenu(); ShowView( 'home' )">
            <?php echo $this->GetText( 'HeaderMenuHomeButton' ); ?>
        </div>
        <div class="header-menu-mobile-button" data-view-name="home" onclick="CloseHeaderMenu(); ShowView( 'home/#article-list' )">
            <?php echo $this->GetText( 'HeaderMenuArticleListButton' ); ?>
        </div>
        <div class="header-menu-mobile-button" data-view-name="legal-notice" onclick="CloseHeaderMenu(); ShowView( 'legal-notice' )">
            <?php echo $this->GetText( 'HeaderMenuLegalNoticeButton' ); ?>
        </div>
        <div class="header-menu-mobile-button" data-view-name="contact" onclick="CloseHeaderMenu(); ShowView( 'contact' )">
            <?php echo $this->GetText( 'HeaderMenuContactButton' ); ?>
        </div>
        <div class="header-menu-icon-button header-menu-close-button" onclick="CloseHeaderMenu()">
        </div>
    </div>
</div>
<script>
    // -- FUNCTIONS

    function OpenHeaderMenu(
        )
    {
        GetElementById( "header-menu" ).AddClass( "is-open" );
        SetScrollTop( 0 );
    }

    // ~~

    function CloseHeaderMenu(
        )
    {
        GetElementById( "header-menu" ).RemoveClass( "is-open" );
    }

    // -- STATEMENTS

    AddEventListener(
        "update-view",
        function (
            )
        {
            GetElements( ".header-menu-button" ).Iterate(
                function (
                    element
                    )
                {
                    element.ToggleClass( "is-selected", element.dataset.viewName === ViewName );
                }
                );
        }
        );
</script>
