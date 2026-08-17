<?php
    $article_page_count = count( $article_page_array );
    $article_carousel_slide_count = $article_page_count + 1;
?>






















































<div id="article-carousel" class="article-carousel">
    <div id="article-carousel-strip" class="article-carousel-strip">
        <?php for ( $article_carousel_slide_index = 0; $article_carousel_slide_index < $article_carousel_slide_count; ++$article_carousel_slide_index ) { ?>
            <?php $article_page = $article_page_array[ $article_carousel_slide_index % $article_page_count ]; ?>
            <div class="article-carousel-slide" style="background: linear-gradient( rgba( 0, 0, 0, 0.1 ), rgba( 0, 0, 0, 0.1 ) ), url( '<?php echo $article_page->ImagePath; ?>?v=<?php echo VersionTimestamp; ?>' ) no-repeat <?php echo $article_page->ImageHorizontalPosition; ?> <?php echo $article_page->ImageVerticalPosition; ?> / <?php echo $article_page->ImageFit; ?>, url( '<?php echo GetPreloadImagePath( $article_page->ImagePath ); ?>?v=<?php echo VersionTimestamp; ?>' ) no-repeat <?php echo $article_page->ImageHorizontalPosition; ?> <?php echo $article_page->ImageVerticalPosition; ?> / <?php echo $article_page->ImageFit; ?>" onclick="ShowView( '<?php echo $article_page->Route; ?>' )">
                <div class="article-carousel-slide-text">
                    <?php echo $this->GetTranslatedText( $article_page->Teaser ); ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="article-carousel-left-arrow" class="article-carousel-arrow article-carousel-left-arrow">
        &lt;
    </div>
    <div id="article-carousel-right-arrow" class="article-carousel-arrow article-carousel-right-arrow">
        &gt;
    </div>
    <?php require __DIR__ . '/' . 'scroll_down_reminder.php'; ?>
</div>
<script>
    var article_carousel
        = new CAROUSEL(
              GetElementById( "article-carousel" ),
              GetElementById( "article-carousel-strip" ),
              0.0,
              <?php echo $article_carousel_slide_count; ?>,
              1,
              3.0,
              0.5
              );

    GetElementById( "article-carousel-left-arrow" ).AddEventListener(
        "click",
        function (
            )
        {
            article_carousel.StopAutomaticAnimation();
            article_carousel.ShowPriorSlide();
        }
        );

    GetElementById( "article-carousel-right-arrow" ).AddEventListener(
        "click",
        function (
            )
        {
            article_carousel.StopAutomaticAnimation();
            article_carousel.ShowNextSlide();
        }
        );

    article_carousel.StartAutomaticAnimation();
</script>
