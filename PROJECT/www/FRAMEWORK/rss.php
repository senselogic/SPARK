<?php // -- FUNCTIONS

function GetRssItemArray(
    $rss_feed_path
    )
{
    $xml_content = simplexml_load_file( $rss_feed_path );
    $item_array = $xml_content->xpath( '//item' );

    foreach ( $item_array as $item )
    {
        $item->timestamp = strtotime( $item->pubDate );
    }

    return $item_array;
}

// ~~

function GetRssItemComparison(
    object $first_item,
    object $second_item
    )
{
    return $first_item->timestamp - $second_item->timestamp;
}

// ~~

function SortRssItemArray(
    array & $item_array
    )
{
    usort( $item_array, GetRssItemComparison );
}
