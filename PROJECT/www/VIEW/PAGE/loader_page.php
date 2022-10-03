<style>
    .loader-page
    {
        z-index: 10000;
        position: relative;

        height: 100vh;
        width: 100%;

        background: #FFFFFF;
    }

    body.is-appearing .loader-page
    {
        background: transparent;
    }

    @keyframes loader-page-slider-appearing-animation
    {
        0%
        {
            opacity: 0;

            background: linear-gradient( #FFFFFF, #FFFFFF );
        }

        100%
        {
            opacity: 1;

            background: linear-gradient( #FFFFFF, #FFFFFF );
        }
    }

    .loader-page-slider
    {
        position: absolute;
        top: 0;
        bottom: 50vh;
        left: 0;
        right: 0;

        background: linear-gradient( #FFFFFF, #FFFFFF );
        background-size: auto 100vh;

        animation: loader-page-slider-appearing-animation 1s;
    }

    @keyframes loader-page-slider-disappearing-animation
    {
        0%
        {
            bottom: 0;
        }

        100%
        {
            bottom: 100vh;
        }
    }

    body.is-appearing .loader-page-slider
    {
        animation: loader-page-slider-disappearing-animation 1s forwards;
    }

    @keyframes loader-page-logo-appearing-animation
    {
        0%
        {
            opacity: 0;
        }

        100%
        {
            opacity: 1;
        }
    }

    .loader-page-logo
    {
        --progress: 0;

        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX( -50% ) translateY( -50% );

        height: 15rem;
        width: 15rem;

        animation: loader-page-logo-appearing-animation 1s;
    }

    body.is-appearing .loader-page-logo
    {
        display: none;
    }

    .loader-page-logo-upper-slider
    {
        position: absolute;
        top: 0;
        bottom: var( --progress );
        left: 0;
        right: 0;
        overflow: hidden;
    }

    .loader-page-logo-lower-slider
    {
        position: absolute;
        top: calc( 100% - var( --progress ) );
        bottom: 0;
        left: 0;
        right: 0;
        overflow: hidden;
    }

    .loader-page-logo-background
    {
        height: 15rem;
        width: 15rem;
    }

    .loader-page-logo-upper-slider .loader-page-logo-background
    {
        transform: translateY( 0 );
        background: url( "/static/image/loader/initial_logo.svg" ) no-repeat center center / contain;
    }

    .loader-page-logo-lower-slider .loader-page-logo-background
    {
        transform: translateY( calc( 0% - calc( 100% - var( --progress ) ) ) );
        background: url( "/static/image/loader/final_logo.svg" ) no-repeat center center / contain;
    }
</style>
<div id="loader-page" class="loader-page">
    <div class="loader-page-slider">
    </div>
    <div id="loader-page-logo" class="loader-page-logo">
        <div class="loader-page-logo-upper-slider">
            <div class="loader-page-logo-background">
            </div>
        </div>
        <div class="loader-page-logo-lower-slider">
            <div class="loader-page-logo-background">
            </div>
        </div>
    </div>
</div>
<script>
    // -- FUNCTIONS

    function HideLoader(
        )
    {
        GetElementById( "loader-page-logo" ).AnimateStyles(
            {
                "--progress" : [ ".", "100%" ]
            },
            [ 0.0, 0.5 ]
            );

        DelayCall(
            function (
                )
            {
                GetElement( "body" ).AddClass( "is-appearing" );
            },
            1
            );

        DelayCall(
            function (
                )
            {
                GetElementById( "loader-page" ).AddClass( "is-hidden" );
            },
            2
            );

        DelayCall(
            function (
                )
            {
                GetElement( "body" ).RemoveClass( "is-appearing" );
            },
            4
            );
    }

    // -- STATEMENTS

    GetElementById( "loader-page-logo" ).AnimateStyles(
        {
            "--progress" : [ "0%", "0%", "100%" ]
        },
        [ 0.0, 1.0, 2.0 ]
        );

    DelayCall( HideLoader );
</script>
