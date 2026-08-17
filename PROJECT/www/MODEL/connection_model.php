<?php // -- IMPORTS

require_once __DIR__ . '/' . 'connection.php';

// -- FUNCTIONS

function GetConnection(
    string $browser_address
    )
{
    $connection = GetDatabaseConnectionByBrowserAddress( $browser_address );

    if ( $connection !== false )
    {
        if ( $connection->IsFailed )
        {
            $connection->BackoffSecondCount
                = GetBackoffSecondCount( $connection->AttemptCount, 3, 8 )
                  - ( GetCurrentTimestamp() - GetTimestampFromDateTime( $connection->DateTime ) );
        }
        else
        {
            $connection->BackoffSecondCount = 0;
        }
    }
    else
    {
        $connection = new stdClass();
        $connection->Id = GetRandomTuid();
        $connection->BrowserAddress = $browser_address;
        $connection->DateTime = GetCurrentDateTime();
        $connection->IsFailed = false;
        $connection->AttemptCount = 0;
        $connection->BackoffSecondCount = 0;
    }

    return $connection;
}

// ~~

function SetConnection(
    object $connection
    )
{
    PutDatabaseConnection(
        $connection->Id,
        $connection->BrowserAddress,
        $connection->DateTime,
        $connection->IsFailed,
        $connection->AttemptCount
        );
}
