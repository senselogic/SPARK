<?php // -- FUNCTIONS

function IsEmpty(
    array &$array_
    )
{
    return empty( $array_ );
}

// ~~

function JoinArray(
    array &$array_,
    string $separator
    )
{
    return implode( $separator, $array_ );
}

// ~~

function GetKeys(
    array &$array_
    )
{
    return array_keys( $array_ );
}

// ~~

function HasKey(
    array &$array_,
    $key
    )
{
    return array_key_exists( $key, $array_ );
}

// ~~

function HasValue(
    array &$array_,
    $value
    )
{
    return in_array( $value, $array_, true );
}

// ~~

function SortArrayByKey(
    array &$array_,
    callable $key_comparison_function
    )
{
    uksort( $array_, $key_comparison_function );
}

// ~~

function SortArrayByAscendingNaturalKey(
    array &$array_
    )
{
    ksort( $array_, SORT_NATURAL );
}

// ~~

function SortArrayByDescendingNaturalKey(
    array &$array_
    )
{
    krsort( $array_, SORT_NATURAL );
}

// ~~

function SortArrayByAscendingNumericKey(
    array &$array_
    )
{
    ksort( $array_, SORT_NUMERIC );
}

// ~~

function SortArrayByDescendingNumericKey(
    array &$array_
    )
{
    krsort( $array_, SORT_NUMERIC );
}

// ~~

function SortArrayByAscendingTextualKey(
    array &$array_
    )
{
    ksort( $array_, SORT_STRING );
}

// ~~

function SortArrayByDescendingTextualKey(
    array &$array_
    )
{
    krsort( $array_, SORT_STRING );
}

// ~~

function SortArrayByValue(
    array &$array_,
    callable $value_comparison_function
    )
{
    usort( $array_, $value_comparison_function );
}

// ~~

function SortArrayByAscendingNaturalValue(
    array &$array_
    )
{
    sort( $array_, SORT_NATURAL );
}

// ~~

function SortArrayByDescendingNaturalValue(
    array &$array_
    )
{
    rsort( $array_, SORT_NATURAL );
}

// ~~

function SortArrayByAscendingNumericValue(
    array &$array_
    )
{
    sort( $array_, SORT_NUMERIC );
}

// ~~

function SortArrayByDescendingNumericValue(
    array &$array_
    )
{
    rsort( $array_, SORT_NUMERIC );
}

// ~~

function SortArrayByAscendingTextualValue(
    array &$array_
    )
{
    sort( $array_, SORT_STRING );
}

// ~~

function SortArrayByDescendingTextualValue(
    array &$array_
    )
{
    rsort( $array_, SORT_STRING );
}

// ~~

function GetAddedElementNumber(
    array &$element_array,
    int $prior_element_index
    )
{
    $prior_value = $element_array[ $prior_element_index ]->Number;

    if ( $prior_element_index + 1 < count( $element_array ) )
    {
        $next_value = $element_array[ $prior_element_index + 1 ]->Number;

        return ( $prior_value + $next_value ) * 0.5;
    }
    else
    {
        return $prior_value + 1;
    }
}

// ~~

function GetElementPropertyByKey(
    array &$array_,
    $key,
    string $property_name,
    $default_value = null
    )
{
    if ( isset( $array_[ $key ] )
         && property_exists( $array_[ $key ], $property_name ) )
    {
        return $array_[ $key ]->$property_name;
    }
    else
    {
        return $default_value;
    }
}

// ~~

function GetElementByKey(
    array &$array_,
    $key,
    $default_value = null
    )
{
    if ( isset( $array_[ $key ] ) )
    {
        return $array_[ $key ];
    }
    else
    {
        return $default_value;
    }
}

// ~~

function GetElementByKeyMap(
    array &$element_array,
    string $key_property_name
    )
{
    $element_by_key_map = [];

    foreach ( $element_array as $element )
    {
        if ( property_exists( $element, $key_property_name ) )
        {
            $element_by_key_map[ $element->$key_property_name ] = $element;
        }
    }

    return $element_by_key_map;
}

// ~~

function GetElementArrayByKeyMap(
    array &$element_array,
    string $key_property_name
    )
{
    $element_array_by_key_map = [];

    foreach ( $element_array as $element )
    {
        if ( property_exists( $element, $key_property_name ) )
        {
            $element_key = $element->$key_property_name;

            if ( !isset( $element_array_by_key_map[ $element_key ] ) )
            {
                $element_array_by_key_map[ $element_key ] = [ $element ];
            }
            else
            {
                array_push( $element_array_by_key_map[ $element_key ], $element );
            }
        }
    }

    return $element_array_by_key_map;
}

// ~~

function GetElementPropertyArray(
    array &$element_array,
    string $property_name
    )
{
    $element_property_array = [];

    foreach ( $element_array as $element )
    {
        array_push( $element_property_array, $element->$property_name );
    }

    return $element_property_array;
}

// ~~

function GetUntranslatedElementArray(
    array $element_array
    )
{
    $untranslated_element_array = [];

    foreach ( $element_array as $element )
    {
        array_push( $untranslated_element_array, GetUntranslatedText( $element ) );
    }

    return $untranslated_element_array;
}
