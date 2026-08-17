<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<?php $site_is_singlepage = true; ?>
<script>
    // -- VARIABLES

    var
        SiteIsSinglepage = <?php echo $site_is_singlepage ? 'true' : 'false'; ?>,
        OldViewRoute = undefined,
        ViewRoute = "",
        SectionName = "",
        LanguageCode = "<?php echo $this->LanguageCode; ?>",
        ViewElement = null,
        ViewIsRevealed = false;

    // -- FUNCTIONS

    function GetViewElement(
        view_route
        )
    {
        for ( view_element of GetElements( ".view" ) )
        {
            if ( view_element.dataset.viewRoute === ViewRoute )
            {
                return view_element;
            }
        }

        return null;
    }

    // ~~

    function HydrateView(
        view_route
        )
    {
        var
            script_element,
            static_script_element,
            static_script_element_array,
            template_content_element,
            template_element,
            view_element;

        view_element = GetViewElement( view_route );

        if ( view_element !== null )
        {
            if ( !view_element.HasClass( "is-hydrated" ) )
            {
                template_element = view_element.firstElementChild;

                if ( template_element
                     && template_element.tagName.toLowerCase() === "template" )
                {
                    ViewElement = view_element;
                    template_content_element = document.importNode( template_element.content, true );
                    view_element.replaceChild( template_content_element, template_element );
                    static_script_element_array = template_content_element.querySelectorAll( "script" );

                    for ( static_script_element of static_script_element_array )
                    {
                        script_element = document.createElement( "script" );

                        if ( static_script_element.src )
                        {
                            script_element.src = static_script_element.src;
                        }
                        else
                        {
                            script_element.textContent = static_script_element.textContent;
                        }

                        view_element.appendChild( script_element );
                        static_script_element.remove();
                    }
                }

                view_element.AddClass( "is-hydrated" );

                EmitEvent(
                    "hydrate-view",
                    {
                        ViewElement : view_element,
                        ViewRoute : view_route
                    }
                    );
            }
        }
    }

    // ~~

    function InitializeView(
        view_route
        )
    {
        view_element = GetViewElement( view_route );

        if ( view_element !== null )
        {
            if ( !view_element.HasClass( "is-initialized" ) )
            {
                view_element.GetElements( ".appearing-block" )
                    .AddIntersectionObserver( true, 0.1, "is-visible" )
                    .AddIntersectionObserver( false, 0.0, "", "is-visible" );

                InitializeAutoplayVideos( view_element );
                InitializeAutohideVideos( view_element );

                view_element.AddClass( "is-initialized" );

                EmitEvent(
                    "initialize-view",
                    {
                        ViewElement : view_element,
                        ViewRoute : view_route
                    }
                    );
            }
        }
    }

    // ~~

    function PrepareView(
        view_route
        )
    {
        if ( ViewIsRevealed )
        {
            view_element = GetViewElement( view_route );

            if ( view_element !== null )
            {
                if ( !view_element.HasClass( "is-prepared" ) )
                {
                    view_element.AddClass( "is-prepared" );

                    EmitEvent(
                        "prepare-view",
                        {
                            ViewElement : view_element,
                            ViewRoute : view_route
                        }
                        );
                }
            }
        }
    }

    // ~~

    function UpdateView(
        )
    {
        var
            view_route_was_found,
            section_element,
            view_element;

        if ( SiteIsSinglepage
             && ViewRoute !== OldViewRoute )
        {
            view_route_was_found = false;

            for ( view_element of GetElements( ".view" ) )
            {
                FadeView( view_element );

                if ( view_element.dataset.viewRoute === ViewRoute )
                {
                    view_route_was_found = true;

                    EmitEvent(
                        "change-view",
                        {
                            ViewElement : view_element,
                            ViewRoute
                        }
                        );
                }
            }

            if ( !view_route_was_found )
            {
                SetUrl( '/' );
            }
        }

        if ( SectionName === "" )
        {
            SetScrollPosition();
        }
        else
        {
            section_element = GetElement( SectionName );

            if ( section_element === null )
            {
                SetScrollPosition();
            }
            else
            {
                DelayCall(
                    function (
                        )
                    {
                        SetScrollTop( section_element.GetTopPosition() - 48 * GetRemRatio() );
                    },
                    ( ViewRoute === OldViewRoute && SiteIsSinglepage ) ? 0.2 : 0
                    );
            }
        }

        EmitEvent(
            "update-view",
            {
                ViewElement : GetViewElement( ViewRoute ),
                ViewRoute
            }
            );
    }

    // ~~

    function ShowView(
        view_route
        )
    {
        CloseHeaderMenu();

        if ( view_route !== undefined
             && ( view_route.startsWith( "http:" )
                  || view_route.startsWith( "https:" )
                  || view_route.startsWith( "mailto:" )
                  || view_route.startsWith( "tel:" ) ) )
        {
            OpenUrl( view_route );
        }
        else if ( view_route !== undefined
                  && view_route.startsWith( "//" ) )
        {
            OpenUrl( view_route.slice( 1 ) );
        }
        else if ( view_route !== undefined
                  && view_route.startsWith( "/" ) )
        {
            SetUrl( view_route );
        }
        else if ( view_route !== undefined
                  && !SiteIsSinglepage )
        {
            SetUrl( "/" + LanguageCode + "/" + view_route.RemovePrefix( "/" ) );
        }
        else
        {
            if ( SiteIsSinglepage )
            {
                if ( view_route !== undefined )
                {
                    SetRoute( "/" + LanguageCode + "/" + view_route.RemovePrefix( "/" ) );
                }

                TrackRoute();
            }

            OldViewRoute = ViewRoute;
            ViewRoute = GetRoute( "/" + LanguageCode + "/", "/" );

            if ( ViewRoute === "" )
            {
                ViewRoute = "home";
            }

            SectionName = GetHash();

            HydrateView( ViewRoute );
            InitializeView( ViewRoute );
            PrepareView( ViewRoute );
            UpdateView();

            EmitEvent(
                "show-view",
                {
                    ViewElement : GetViewElement( ViewRoute ),
                    ViewRoute
                }
                );
        }
    }

    // ~~

    function RevealView(
        )
    {
        ViewIsRevealed = true;
        ShowView();
    }

    // ~~

    function ResizeView(
        )
    {
        if ( !IsMobileBrowser() )
        {
            UpdateView();
            InitializeAutohideVideos();
        }
    }

    // ~~

    function FadeView(
        view_element
        )
    {
        view_element.Fade( view_element.dataset.viewRoute === ViewRoute );
    }

    // ~~

    function SetLanguageCode(
        language_code
        )
    {
        var
            view_route;

        view_route = GetRoute( "/" + LanguageCode + "/", "/" );

        if ( view_route === "" )
        {
            SetUrl( "/" + language_code );
        }
        else
        {
            SetUrl( "/" + language_code + "/" + view_route );
        }
    }
</script>
<div>
    <?php require __DIR__ . '/' . 'PAGE/starter_page.php'; ?>
    <?php if ( $site_is_singlepage ) { ?>
        <?php foreach ( $this->PageByIdMap as $page_id => $page ) { ?>
            <?php if ( $page->Route == $this->PageRoute ) { ?>
                <div class="view is-hidden" data-view-route="<?php echo $page->Route; ?>">
                    <?php require __DIR__ . '/' . 'PAGE/' . str_replace( '-', '_', $page->TypeSlug ) . '_page.php'; ?>
                </div>
            <?php } else { ?>
                <div class="view is-hidden" data-view-route="<?php echo $page->Route; ?>">
                    <template>
                        <?php require __DIR__ . '/' . 'PAGE/' . str_replace( '-', '_', $page->TypeSlug ) . '_page.php'; ?>
                    </template>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } else { ?>
        <?php foreach ( $this->PageByIdMap as $page_id => $page ) { ?>
            <?php if ( $page->Route == $this->PageRoute ) { ?>
                <div class="view" data-view-route="<?php echo $page->Route; ?>">
                    <?php require __DIR__ . '/' . 'PAGE/' . str_replace( '-', '_', $page->TypeSlug ) . '_page.php'; ?>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
    <?php require __DIR__ . '/' . 'BLOCK/scroll_top_button.php'; ?>
    <?php require __DIR__ . '/' . 'BLOCK/cookie_consent.php'; ?>
</div>
<script src="/static/script/header_menu.js?v=<?php echo VersionTimestamp; ?>"></script>
<script>
    // -- STATEMENTS

    HandleScrollEvent( 1, "body", "is-scrolled" );
    HandleResizeEvent( ResizeView );
    HandleRouteEvent( ShowView );
    AddEventListener( "reveal-view", RevealView );
</script>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
