<style>
    .scroll-button
    {
        z-index: 999;
        position: fixed;
        bottom: 10px;
        right: 10px;

        overflow: visible;
        height: 50px;
        width: 20px;

        opacity: 1;
        background: url( "/static/image/scroll/scroll-button-icon.svg" ) no-repeat center center;
        background-size: contain;

        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    .scroll-button:not( .is-scrolled )
    {
        opacity: 0;

        pointer-events: none;
    }
</style>
<div id="scroll-button" class="scroll-button" onclick="window.SetScrollTop( 0 )">
</div>
<script>
    // -- STATEMENTS

    HandleScrollEvent( 100, "#scroll-button", "is-scrolled" );
</script>