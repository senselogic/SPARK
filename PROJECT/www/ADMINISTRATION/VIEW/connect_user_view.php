<?php require __DIR__ . '/' . 'BLOCK/page_header.php'; ?>
<style>
    // -- ELEMENTS

    form
    {
        transform: translateY( -2.5rem );
    }

    // -- CLASSES

    .page-menu
    {
        display: none;
    }

    .page-section
    {
        padding: 1rem 2rem;
    }
</style>
<form class="margin-top-auto margin-bottom-auto flex-direction-column form-centered" name="ConnectUser" action="/admin" method="post">
    <div class="logo-image">
    </div>
    <?php if ( $this->Connection->BackoffSecondCount > 0 ) { ?>
        <div class="backoff-message">
            There have been <?php echo $this->Connection->AttemptCount; ?> successive failed connection attempts from this IP address.<br/>
            Please wait a moment before trying again.
        </div>
        <div class="backoff-duration">
            <div class="backoff-count">
                <div id="hour-count-text" class="backoff-count-text">
                </div>
                <div class="backoff-count-unit">
                    Hours
                </div>
            </div>
            <div class="backoff-count">
                <div id="minute-count-text" class="backoff-count-text">
                </div>
                <div class="backoff-count-unit">
                    Minutes
                </div>
            </div>
            <div class="backoff-count">
                <div id="second-count-text" class="backoff-count-text">
                </div>
                <div class="backoff-count-unit">
                    Seconds
                </div>
            </div>
        </div>
        <script>
            // -- VARIABLES

            var
                HourCountTextElement = GetElementById( "hour-count-text" ),
                MinuteCountTextElement = GetElementById( "minute-count-text" ),
                SecondCountTextElement = GetElementById( "second-count-text" ),
                InitialSecondCount = GetCurrentTimeSecondCount(),
                BackoffSecondCount = <?php echo $this->Connection->BackoffSecondCount; ?>,
                UpdateCountdownInterval;

            // -- FUNCTIONS

            function GetCurrentTimeSecondCount(
                )
            {
                return new Date().getTime() / 1000;
            }

            // ~~

            function UpdateCountdown(
                )
            {
                var
                    backoff_hour_count,
                    backoff_minute_count,
                    backoff_second_count;

                backoff_second_count = Math.ceil( BackoffSecondCount - ( GetCurrentTimeSecondCount() - InitialSecondCount ) );

                if ( backoff_second_count <= 0 )
                {
                    backoff_second_count = 0;

                    if ( UpdateCountdown !== undefined )
                    {
                        clearInterval( UpdateCountdown );
                    }
                }

                backoff_hour_count = Math.floor( backoff_second_count / 3600 );
                backoff_minute_count = Math.floor( ( backoff_second_count % 3600 ) / 60 );
                backoff_second_count = backoff_second_count % 60;

                HourCountTextElement.textContent = backoff_hour_count.toString().padStart( 2, "0" );
                MinuteCountTextElement.textContent = backoff_minute_count.toString().padStart( 2, "0" );
                SecondCountTextElement.textContent = backoff_second_count.toString().padStart( 2, "0" );
            }

            // -- STATEMENTS

            UpdateCountdown();
            UpdateCountdownInterval = setInterval( UpdateCountdown, 100 );
        </script>
    <?php } else { ?>
        <div class="margin-top-3rem width-30rem page-section">
            <div class="form-field-name">
                <?php echo htmlspecialchars( GetTextBySlug( "Username" ) ); ?>
            </div>
            <input class="margin-top-50prm form-input" name="Pseudonym" type="text"/>
            <div class="margin-top-1rem form-field-name">
                <?php echo htmlspecialchars( GetTextBySlug( "Password" ) ); ?>
            </div>
            <input class="margin-top-50prm form-input" name="Password" type="password"/>
            <div class="margin-top-2rem form-extended form-centered">
                <button class="form-text-button" type="submit">
                    <?php echo htmlspecialchars( GetTextBySlug( "Sign in" ) ); ?>
                </button>
            </div>
        </div>
    <?php } ?>
</form>
<?php require __DIR__ . '/' . 'BLOCK/page_footer.php'; ?>
