<?php // -- FUNCTIONS

function GetErrorMessage(
    )
{
    $error_property_array = error_get_last();

    if ( $error_property_array !== null
         && isset( $error_property_array[ 'message' ] ) )
    {
        return $error_property_array[ 'message' ];
    }
    else
    {
        return '';
    }
}

// ~~

function ShowErrors(
    )
{
    ini_set( 'display_startup_errors', 1 );
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
}

// ~~

function HideErrors(
    )
{
    ini_set( 'display_startup_errors', 0 );
    ini_set( 'display_errors', 0 );
    error_reporting( 0 );
}

// ~~

function PrintText(
    $text = ''
    )
{
    error_log( $text, 3, $_SERVER[ 'DOCUMENT_ROOT' ] . '/php.log' );
}

// ~~

function PrintLine(
    $text = ''
    )
{
    PrintText( $text . "\n" );
}

// ~~

function PrintValue(
    $value
    )
{
    PrintLine( json_encode( $value, JSON_PRETTY_PRINT ) );
}

// ~~

function PrintRequest(
    )
{
    PrintLine( 'URI : ' . date( 'Y-m-d H:i:s' ) . ' ' . $_SERVER[ 'REQUEST_METHOD' ] . ' ' . $_SERVER[ 'REQUEST_URI' ] );
    PrintLine( 'GET : ' . json_encode( $_GET, JSON_PRETTY_PRINT ) );
    PrintLine( 'POST : ' . json_encode( $_POST, JSON_PRETTY_PRINT ) );
    PrintLine( 'FILES : ' . json_encode( $_FILES, JSON_PRETTY_PRINT ) );
    PrintLine( 'SESSION : ' . json_encode( $_SESSION, JSON_PRETTY_PRINT ) );
    PrintLine( 'SERVER : ' . json_encode( $_SERVER, JSON_PRETTY_PRINT ) );
}

// ~~

function PrintError(
    $text
    )
{
    PrintText( '*** ERROR : ' . $text . "\n" );
}

// ~~

function PrintStack(
    )
{
    $function_call_array = debug_backtrace();

    foreach ( $function_call_array as $function_call )
    {
        PrintLine(
            $function_call[ 'file' ]
            . ' ['
            . $function_call[ 'line' ]
            . '] : '
            . $function_call[ 'function' ]
            . '('
            . json_encode( $function_call[ 'args' ] )
            . ')'
            );
        PrintLine( '    ' . $function_call[ 'type' ] );
        PrintLine( '    ' . $function_call[ 'class' ] );
        PrintLine( '    ' . json_encode( $function_call[ 'object' ] ) );
    }
}

// ~~

function DumpStack(
    )
{
    debug_print_backtrace();
}

// ~~

function Abort(
    $text = ''
    )
{
    PrintError( $text );

    exit();
}

// -- STATEMENTS

ini_set( 'log_errors', 1 );
ini_set( 'error_log', $_SERVER[ 'DOCUMENT_ROOT' ] . '/error.log' );

if ( $_SERVER[ 'SERVER_NAME' ] === 'localhost' )
{
    ShowErrors();
}
else
{
    HideErrors();
}
