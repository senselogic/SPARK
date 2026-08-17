<?php // -- FUNCTIONS

function GetRequest(
    )
{
    return $_SERVER[ 'REQUEST_URI' ];
}

// ~~

function GetPath(
    )
{
    static 
        $path = null;

    if ( is_null( $path ) )
    {
        $path = explode( '?', $_SERVER[ 'REQUEST_URI' ] )[ 0 ];

        if ( $path === '' )
        {
            $path = '/';
        }
    }

    return $path;
}

// ~~

function GetPathValueArray(
    string $path
    )
{
    if ( substr( $path, 0, 1 ) === '/' )
    {
        $path = substr( $path, 1 );
    }

    if ( substr( $path, -1 ) === '/' )
    {
        $path = substr( $path, 0, -1 );
    }

    if ( $path === '' )
    {
        return [];
    }
    else
    {
        return explode( '/', $path );
    }
}

// ~~

function GetRoute(
    array &$path_value_array,
    string $default_value = ''
    )
{
    if ( count( $path_value_array ) === 0 )
    {
        return $default_value;
    }
    else
    {
        return implode( '/', $path_value_array );
    }
}

// ~~

function AddParentRoute(
    $route = null
    )
{
    if ( $route === null )
    {
        $route = GetPath();
    }

    $route_array = FindSessionValue( "RouteArray", [] );

    for ( $route_index = count( $route_array ) - 1;
          $route_index >= 0;
          --$route_index )
    {
        if ( $route_array[ $route_index ] === $route )
        {
            array_splice( $route_array, $route_index );

            break;
        }
    }

    array_push( $route_array, $route );

    SetSessionValue( "RouteArray", $route_array );
}

// ~~

function MatchesRouteFilter(
    string $route,
    $route_filter
    )
{
    if ( $route_filter === null )
    {
        return false;
    }
    else if ( is_array( $route_filter ) )
    {
        foreach ( $route_filter as $sub_route_filer )
        {
            if ( MatchesRouteFilter( $route, sub_route_filter ) )
            {
                return true;
            }
        }

        return false;
    }
    else if ( HasPrefix( $route_filter, '*' )
              && HasSuffix( $route, substr( $route_filter, 1 ) ) )
    {
        return true;
    }
    else
    {
        return $route === $route_filter;
    }
}

// ~~

function GetParentRoute(
    $route = null,
    string $default_parent_route = '',
    $forbidden_parent_route_filter = null
    )
{
    if ( $route === null )
    {
        $route = GetPath();
    }

    $route_array = FindSessionValue( "RouteArray", [] );

    for ( $route_index = 0;
          $route_index < count( $route_array );
          ++$route_index )
    {
        if ( $route_array[ $route_index ] === $route
             && $route_index > 0
             && !MatchesRouteFilter( $route_array[ $route_index - 1 ], $forbidden_parent_route_filter ) )
        {
            return $route_array[ $route_index - 1 ];
        }
    }

    return $default_parent_route;
}

// ~~

function IsGetRequest(
    )
{
    return $_SERVER[ 'REQUEST_METHOD' ] === 'GET';
}

// ~~

function IsPostRequest(
    )
{
    return $_SERVER[ 'REQUEST_METHOD' ] === 'POST';
}

// ~~

function IsPutRequest(
    )
{
    return $_SERVER[ 'REQUEST_METHOD' ] === 'PUT';
}

// ~~

function IsDeleteRequest(
    )
{
    return $_SERVER[ 'REQUEST_METHOD' ] === 'DELETE';
}

// ~~

function GetQuery(
    )
{
    return $_SERVER[ 'QUERY_STRING' ];
}

// ~~

function HasQueryValue(
    string $name
    )
{
    return isset( $_GET[ $name ] );
}

// ~~

function GetQueryValue(
    string $name
    )
{
    return $_GET[ $name ];
}

// ~~

function FindQueryValue(
    string $name,
    string $default_value
    )
{
    if ( isset( $_GET[ $name ] ) )
    {
        return $_GET[ $name ];
    }
    else
    {
        return $default_value;
    }
}

// ~~

function HasPostValue(
    string $name
    )
{
    return isset( $_POST[ $name ] );
}

// ~~

function GetPostValue(
    string $name
    )
{
    return $_POST[ $name ];
}

// ~~

function FindPostValue(
    string $name,
    string $default_value
    )
{
    if ( isset( $_POST[ $name ] ) )
    {
        return $_POST[ $name ];
    }
    else
    {
        return $default_value;
    }
}

// ~~

function HasCookieValue(
    string $name
    )
{
    return isset( $_COOKIE[ $name ] );
}

// ~~

function GetCookieValue(
    string $name
    )
{
    return $_COOKIE[ $name ];
}

// ~~

function FindCookieValue(
    string $name,
    string $default_value
    )
{
    if ( isset( $_COOKIE[ $name ] ) )
    {
        return $_COOKIE[ $name ];
    }
    else
    {
        return $default_value;
    }
}

// ~~

function GetServerName(
    )
{
    return $_SERVER[ 'SERVER_NAME' ];
}

// ~~

function GetServerAddress(
    )
{
    return $_SERVER[ 'SERVER_ADDR' ];
}

// ~~

function GetBrowserName(
    )
{
    if ( isset( $_SERVER[ 'HTTP_USER_AGENT' ] ) )
    {
        $user_agent = $_SERVER[ 'HTTP_USER_AGENT' ];
        $part_array = explode( '/', str_replace( ' ', '/', $user_agent ) );

        if ( in_array( 'Edge', $part_array ) )
        {
            return 'Edge';
        }
        else if ( in_array( 'MSIE', $part_array )
                  && !in_array( 'Opera', $part_array ) )
        {
            return 'Internet Explorer';
        }
        else if ( in_array( 'Firefox', $part_array ) )
        {
            return 'Firefox';
        }
        else if ( in_array( 'Chrome', $part_array ) )
        {
            return 'Chrome';
        }
        else if ( in_array( 'Safari', $part_array ) )
        {
            return 'Safari';
        }
        else if ( in_array( 'Opera', $part_array ) )
        {
            return 'Opera';
        }
        else if ( in_array( 'Netscape', $part_array ) )
        {
            return 'Netscape';
        }
        else if ( strpos( $user_agent, 'like Gecko' ) !== false )
        {
            return 'Internet Explorer';
        }
    }

    return 'Unknown';
}

// ~~

function GetBrowserAddress(
    )
{
    if ( isset( $_SERVER[ 'HTTP_CLIENT_IP' ] ) )
    {
        return $_SERVER[ 'HTTP_CLIENT_IP' ];
    }
    else if ( isset( $_SERVER[ 'HTTP_X_FORWARDED_FOR' ] ) )
    {
        return trim( explode( ',', $_SERVER[ 'HTTP_X_FORWARDED_FOR' ] )[ 0 ] );
    }
    else if ( isset( $_SERVER[ 'HTTP_X_FORWARDED' ] ) )
    {
        return $_SERVER[ 'HTTP_X_FORWARDED' ];
    }
    else if ( isset( $_SERVER[ 'HTTP_FORWARDED_FOR' ] ) )
    {
        return $_SERVER[ 'HTTP_FORWARDED_FOR' ];
    }
    else if ( isset( $_SERVER[ 'HTTP_FORWARDED' ] ) )
    {
        return $_SERVER[ 'HTTP_FORWARDED' ];
    }
    else if ( isset( $_SERVER[ 'REMOTE_ADDR' ] ) )
    {
        return $_SERVER[ 'REMOTE_ADDR' ];
    }

    return '0.0.0.0';
}

// ~~

function GetCapitalLatitudeFromCountryCode(
    string $country_code
    )
{
    switch ( $country_code )
    {
        case 'AD' : return 42.5;
        case 'AE' : return 24.46666667;
        case 'AF' : return 34.51666667;
        case 'AG' : return 17.11666667;
        case 'AI' : return 18.21666667;
        case 'AL' : return 41.31666667;
        case 'AM' : return 40.16666667;
        case 'AO' : return -8.833333333;
        case 'AQ' : return -80.0;
        case 'AR' : return -34.58333333;
        case 'AS' : return -14.26666667;
        case 'AT' : return 48.2;
        case 'AU' : return -35.26666667;
        case 'AW' : return 12.51666667;
        case 'AX' : return 60.116667;
        case 'AZ' : return 40.38333333;
        case 'BA' : return 43.86666667;
        case 'BB' : return 13.1;
        case 'BD' : return 23.71666667;
        case 'BE' : return 50.83333333;
        case 'BF' : return 12.36666667;
        case 'BG' : return 42.68333333;
        case 'BH' : return 26.23333333;
        case 'BI' : return -3.366666667;
        case 'BJ' : return 6.483333333;
        case 'BL' : return 17.88333333;
        case 'BM' : return 32.28333333;
        case 'BN' : return 4.883333333;
        case 'BO' : return -16.5;
        case 'BR' : return -15.78333333;
        case 'BS' : return 25.08333333;
        case 'BT' : return 27.46666667;
        case 'BW' : return -24.63333333;
        case 'BY' : return 53.9;
        case 'BZ' : return 17.25;
        case 'CA' : return 45.41666667;
        case 'CC' : return -12.16666667;
        case 'CD' : return -4.316666667;
        case 'CF' : return 4.366666667;
        case 'CG' : return -4.25;
        case 'CH' : return 46.91666667;
        case 'CI' : return 6.816666667;
        case 'CK' : return -21.2;
        case 'CL' : return -33.45;
        case 'CM' : return 3.866666667;
        case 'CN' : return 39.91666667;
        case 'CO' : return 4.6;
        case 'CR' : return 9.933333333;
        case 'CU' : return 23.11666667;
        case 'CV' : return 14.91666667;
        case 'CW' : return 12.1;
        case 'CX' : return -10.41666667;
        case 'CY' : return 35.16666667;
        case 'CZ' : return 50.08333333;
        case 'DE' : return 52.51666667;
        case 'DJ' : return 11.58333333;
        case 'DK' : return 55.66666667;
        case 'DM' : return 15.3;
        case 'DO' : return 18.46666667;
        case 'DZ' : return 36.75;
        case 'EC' : return -0.216666667;
        case 'EE' : return 59.43333333;
        case 'EG' : return 30.05;
        case 'EH' : return 27.153611;
        case 'ER' : return 15.33333333;
        case 'ES' : return 40.4;
        case 'ET' : return 9.033333333;
        case 'FI' : return 60.16666667;
        case 'FJ' : return -18.13333333;
        case 'FK' : return -51.7;
        case 'FM' : return 6.916666667;
        case 'FO' : return 62;
        case 'FR' : return 48.86666667;
        case 'GA' : return 0.383333333;
        case 'GB' : return 51.5;
        case 'GD' : return 12.05;
        case 'GE' : return 41.68333333;
        case 'GG' : return 49.45;
        case 'GH' : return 5.55;
        case 'GI' : return 36.13333333;
        case 'GL' : return 64.18333333;
        case 'GM' : return 13.45;
        case 'GN' : return 9.5;
        case 'GQ' : return 3.75;
        case 'GR' : return 37.98333333;
        case 'GS' : return -54.283333;
        case 'GT' : return 14.61666667;
        case 'GU' : return 13.46666667;
        case 'GW' : return 11.85;
        case 'GY' : return 6.8;
        case 'HK' : return 0;
        case 'HM' : return 0;
        case 'HN' : return 14.1;
        case 'HR' : return 45.8;
        case 'HT' : return 18.53333333;
        case 'HU' : return 47.5;
        case 'ID' : return -6.166666667;
        case 'IE' : return 53.31666667;
        case 'IL' : return 31.76666667;
        case 'IM' : return 54.15;
        case 'IN' : return 28.6;
        case 'IO' : return -7.3;
        case 'IQ' : return 33.33333333;
        case 'IR' : return 35.7;
        case 'IS' : return 64.15;
        case 'IT' : return 41.9;
        case 'JE' : return 49.18333333;
        case 'JM' : return 18;
        case 'JO' : return 31.95;
        case 'JP' : return 35.68333333;
        case 'KE' : return -1.283333333;
        case 'KG' : return 42.86666667;
        case 'KH' : return 11.55;
        case 'KI' : return -0.883333333;
        case 'KM' : return -11.7;
        case 'KN' : return 17.3;
        case 'KO' : return 42.66666667;
        case 'KP' : return 39.01666667;
        case 'KR' : return 37.55;
        case 'KW' : return 29.36666667;
        case 'KY' : return 19.3;
        case 'KZ' : return 51.16666667;
        case 'LA' : return 17.96666667;
        case 'LB' : return 33.86666667;
        case 'LC' : return 14;
        case 'LI' : return 47.13333333;
        case 'LK' : return 6.916666667;
        case 'LR' : return 6.3;
        case 'LS' : return -29.31666667;
        case 'LT' : return 54.68333333;
        case 'LU' : return 49.6;
        case 'LV' : return 56.95;
        case 'LY' : return 32.88333333;
        case 'MA' : return 34.01666667;
        case 'MC' : return 43.73333333;
        case 'MD' : return 47;
        case 'ME' : return 42.43333333;
        case 'MF' : return 18.0731;
        case 'MG' : return -18.91666667;
        case 'MH' : return 7.1;
        case 'MK' : return 42;
        case 'ML' : return 12.65;
        case 'MM' : return 16.8;
        case 'MN' : return 47.91666667;
        case 'MO' : return 0;
        case 'MP' : return 15.2;
        case 'MR' : return 18.06666667;
        case 'MS' : return 16.7;
        case 'MT' : return 35.88333333;
        case 'MU' : return -20.15;
        case 'MV' : return 4.166666667;
        case 'MW' : return -13.96666667;
        case 'MX' : return 19.43333333;
        case 'MY' : return 3.166666667;
        case 'MZ' : return -25.95;
        case 'NA' : return -22.56666667;
        case 'NC' : return -22.26666667;
        case 'NE' : return 13.51666667;
        case 'NF' : return -29.05;
        case 'NG' : return 9.083333333;
        case 'NI' : return 12.13333333;
        case 'NL' : return 52.35;
        case 'NO' : return 59.91666667;
        case 'NP' : return 27.71666667;
        case 'NR' : return -0.5477;
        case 'NU' : return -19.01666667;
        case 'NZ' : return -41.3;
        case 'OM' : return 23.61666667;
        case 'PA' : return 8.966666667;
        case 'PE' : return -12.05;
        case 'PF' : return -17.53333333;
        case 'PG' : return -9.45;
        case 'PH' : return 14.6;
        case 'PK' : return 33.68333333;
        case 'PL' : return 52.25;
        case 'PM' : return 46.76666667;
        case 'PN' : return -25.06666667;
        case 'PR' : return 18.46666667;
        case 'PS' : return 31.76666667;
        case 'PT' : return 38.71666667;
        case 'PW' : return 7.483333333;
        case 'PY' : return -25.26666667;
        case 'QA' : return 25.28333333;
        case 'RO' : return 44.43333333;
        case 'RS' : return 44.83333333;
        case 'RU' : return 55.75;
        case 'RW' : return -1.95;
        case 'SA' : return 24.65;
        case 'SB' : return -9.433333333;
        case 'SC' : return -4.616666667;
        case 'SD' : return 15.6;
        case 'SE' : return 59.33333333;
        case 'SG' : return 1.283333333;
        case 'SH' : return -15.93333333;
        case 'SI' : return 46.05;
        case 'SJ' : return 78.21666667;
        case 'SK' : return 48.15;
        case 'SL' : return 8.483333333;
        case 'SM' : return 43.93333333;
        case 'SN' : return 14.73333333;
        case 'SO' : return 2.066666667;
        case 'SR' : return 5.833333333;
        case 'SS' : return 4.85;
        case 'ST' : return 0.333333333;
        case 'SV' : return 13.7;
        case 'SX' : return 18.01666667;
        case 'SY' : return 33.5;
        case 'SZ' : return -26.31666667;
        case 'TC' : return 21.46666667;
        case 'TD' : return 12.1;
        case 'TF' : return -49.35;
        case 'TG' : return 6.116666667;
        case 'TH' : return 13.75;
        case 'TJ' : return 38.55;
        case 'TK' : return -9.166667;
        case 'TL' : return -8.583333333;
        case 'TM' : return 37.95;
        case 'TN' : return 36.8;
        case 'TO' : return -21.13333333;
        case 'TR' : return 39.93333333;
        case 'TT' : return 10.65;
        case 'TV' : return -8.516666667;
        case 'TW' : return 25.03333333;
        case 'TZ' : return -6.8;
        case 'UA' : return 50.43333333;
        case 'UG' : return 0.316666667;
        case 'UM' : return 38.883333;
        case 'US' : return 38.883333;
        case 'UY' : return -34.85;
        case 'UZ' : return 41.31666667;
        case 'VA' : return 41.9;
        case 'VC' : return 13.13333333;
        case 'VE' : return 10.48333333;
        case 'VG' : return 18.41666667;
        case 'VI' : return 18.35;
        case 'VN' : return 21.03333333;
        case 'VU' : return -17.73333333;
        case 'WF' : return -13.95;
        case 'WS' : return -13.81666667;
        case 'YE' : return 15.35;
        case 'ZA' : return -25.7;
        case 'ZM' : return -15.41666667;
        case 'ZW' : return -17.81666667;
    }

    return 0.0;
}

// ~~

function GetCapitalLongitudeFromCountryCode(
    string $country_code
    )
{
    switch ( $country_code )
    {
        case 'AD' : return 1.516667;
        case 'AE' : return 54.366667;
        case 'AF' : return 69.183333;
        case 'AG' : return -61.85;
        case 'AI' : return -63.05;
        case 'AL' : return 19.816667;
        case 'AM' : return 44.5;
        case 'AO' : return 13.216667;
        case 'AQ' : return 0.0;
        case 'AR' : return -58.666667;
        case 'AS' : return -170.7;
        case 'AT' : return 16.366667;
        case 'AU' : return 149.133333;
        case 'AW' : return -70.033333;
        case 'AX' : return 19.9;
        case 'AZ' : return 49.866667;
        case 'BA' : return 18.416667;
        case 'BB' : return -59.616667;
        case 'BD' : return 90.4;
        case 'BE' : return 4.333333;
        case 'BF' : return -1.516667;
        case 'BG' : return 23.316667;
        case 'BH' : return 50.566667;
        case 'BI' : return 29.35;
        case 'BJ' : return 2.616667;
        case 'BL' : return -62.85;
        case 'BM' : return -64.783333;
        case 'BN' : return 114.933333;
        case 'BO' : return -68.15;
        case 'BR' : return -47.916667;
        case 'BS' : return -77.35;
        case 'BT' : return 89.633333;
        case 'BW' : return 25.9;
        case 'BY' : return 27.566667;
        case 'BZ' : return -88.766667;
        case 'CA' : return -75.7;
        case 'CC' : return 96.833333;
        case 'CD' : return 15.3;
        case 'CF' : return 18.583333;
        case 'CG' : return 15.283333;
        case 'CH' : return 7.466667;
        case 'CI' : return -5.266667;
        case 'CK' : return -159.766667;
        case 'CL' : return -70.666667;
        case 'CM' : return 11.516667;
        case 'CN' : return 116.383333;
        case 'CO' : return -74.083333;
        case 'CR' : return -84.083333;
        case 'CU' : return -82.35;
        case 'CV' : return -23.516667;
        case 'CW' : return -68.916667;
        case 'CX' : return 105.716667;
        case 'CY' : return 33.366667;
        case 'CZ' : return 14.466667;
        case 'DE' : return 13.4;
        case 'DJ' : return 43.15;
        case 'DK' : return 12.583333;
        case 'DM' : return -61.4;
        case 'DO' : return -69.9;
        case 'DZ' : return 3.05;
        case 'EC' : return -78.5;
        case 'EE' : return 24.716667;
        case 'EG' : return 31.25;
        case 'EH' : return -13.203333;
        case 'ER' : return 38.933333;
        case 'ES' : return -3.683333;
        case 'ET' : return 38.7;
        case 'FI' : return 24.933333;
        case 'FJ' : return 178.416667;
        case 'FK' : return -57.85;
        case 'FM' : return 158.15;
        case 'FO' : return -6.766667;
        case 'FR' : return 2.333333;
        case 'GA' : return 9.45;
        case 'GB' : return -0.083333;
        case 'GD' : return -61.75;
        case 'GE' : return 44.833333;
        case 'GG' : return -2.533333;
        case 'GH' : return -0.216667;
        case 'GI' : return -5.35;
        case 'GL' : return -51.75;
        case 'GM' : return -16.566667;
        case 'GN' : return -13.7;
        case 'GQ' : return 8.783333;
        case 'GR' : return 23.733333;
        case 'GS' : return -36.5;
        case 'GT' : return -90.516667;
        case 'GU' : return 144.733333;
        case 'GW' : return -15.583333;
        case 'GY' : return -58.15;
        case 'HK' : return 0;
        case 'HM' : return 0;
        case 'HN' : return -87.216667;
        case 'HR' : return 16;
        case 'HT' : return -72.333333;
        case 'HU' : return 19.083333;
        case 'ID' : return 106.816667;
        case 'IE' : return -6.233333;
        case 'IL' : return 35.233333;
        case 'IM' : return -4.483333;
        case 'IN' : return 77.2;
        case 'IO' : return 72.4;
        case 'IQ' : return 44.4;
        case 'IR' : return 51.416667;
        case 'IS' : return -21.95;
        case 'IT' : return 12.483333;
        case 'JE' : return -2.1;
        case 'JM' : return -76.8;
        case 'JO' : return 35.933333;
        case 'JP' : return 139.75;
        case 'KE' : return 36.816667;
        case 'KG' : return 74.6;
        case 'KH' : return 104.916667;
        case 'KI' : return 169.533333;
        case 'KM' : return 43.233333;
        case 'KN' : return -62.716667;
        case 'KO' : return 21.166667;
        case 'KP' : return 125.75;
        case 'KR' : return 126.983333;
        case 'KW' : return 47.966667;
        case 'KY' : return -81.383333;
        case 'KZ' : return 71.416667;
        case 'LA' : return 102.6;
        case 'LB' : return 35.5;
        case 'LC' : return -61;
        case 'LI' : return 9.516667;
        case 'LK' : return 79.833333;
        case 'LR' : return -10.8;
        case 'LS' : return 27.483333;
        case 'LT' : return 25.316667;
        case 'LU' : return 6.116667;
        case 'LV' : return 24.1;
        case 'LY' : return 13.166667;
        case 'MA' : return -6.816667;
        case 'MC' : return 7.416667;
        case 'MD' : return 28.85;
        case 'ME' : return 19.266667;
        case 'MF' : return -63.0822;
        case 'MG' : return 47.516667;
        case 'MH' : return 171.383333;
        case 'MK' : return 21.433333;
        case 'ML' : return -8;
        case 'MM' : return 96.15;
        case 'MN' : return 106.916667;
        case 'MO' : return 0;
        case 'MP' : return 145.75;
        case 'MR' : return -15.966667;
        case 'MS' : return -62.216667;
        case 'MT' : return 14.5;
        case 'MU' : return 57.483333;
        case 'MV' : return 73.5;
        case 'MW' : return 33.783333;
        case 'MX' : return -99.133333;
        case 'MY' : return 101.7;
        case 'MZ' : return 32.583333;
        case 'NA' : return 17.083333;
        case 'NC' : return 166.45;
        case 'NE' : return 2.116667;
        case 'NF' : return 167.966667;
        case 'NG' : return 7.533333;
        case 'NI' : return -86.25;
        case 'NL' : return 4.916667;
        case 'NO' : return 10.75;
        case 'NP' : return 85.316667;
        case 'NR' : return 166.920867;
        case 'NU' : return -169.916667;
        case 'NZ' : return 174.783333;
        case 'OM' : return 58.583333;
        case 'PA' : return -79.533333;
        case 'PE' : return -77.05;
        case 'PF' : return -149.566667;
        case 'PG' : return 147.183333;
        case 'PH' : return 120.966667;
        case 'PK' : return 73.05;
        case 'PL' : return 21;
        case 'PM' : return -56.183333;
        case 'PN' : return -130.083333;
        case 'PR' : return -66.116667;
        case 'PS' : return 35.233333;
        case 'PT' : return -9.133333;
        case 'PW' : return 134.633333;
        case 'PY' : return -57.666667;
        case 'QA' : return 51.533333;
        case 'RO' : return 26.1;
        case 'RS' : return 20.5;
        case 'RU' : return 37.6;
        case 'RW' : return 30.05;
        case 'SA' : return 46.7;
        case 'SB' : return 159.95;
        case 'SC' : return 55.45;
        case 'SD' : return 32.533333;
        case 'SE' : return 18.05;
        case 'SG' : return 103.85;
        case 'SH' : return -5.716667;
        case 'SI' : return 14.516667;
        case 'SJ' : return 15.633333;
        case 'SK' : return 17.116667;
        case 'SL' : return -13.233333;
        case 'SM' : return 12.416667;
        case 'SN' : return -17.633333;
        case 'SO' : return 45.333333;
        case 'SR' : return -55.166667;
        case 'SS' : return 31.616667;
        case 'ST' : return 6.733333;
        case 'SV' : return -89.2;
        case 'SX' : return -63.033333;
        case 'SY' : return 36.3;
        case 'SZ' : return 31.133333;
        case 'TC' : return -71.133333;
        case 'TD' : return 15.033333;
        case 'TF' : return 70.216667;
        case 'TG' : return 1.216667;
        case 'TH' : return 100.516667;
        case 'TJ' : return 68.766667;
        case 'TK' : return -171.833333;
        case 'TL' : return 125.6;
        case 'TM' : return 58.383333;
        case 'TN' : return 10.183333;
        case 'TO' : return -175.2;
        case 'TR' : return 32.866667;
        case 'TT' : return -61.516667;
        case 'TV' : return 179.216667;
        case 'TW' : return 121.516667;
        case 'TZ' : return 39.283333;
        case 'UA' : return 30.516667;
        case 'UG' : return 32.55;
        case 'UM' : return -77;
        case 'US' : return -77;
        case 'UY' : return -56.166667;
        case 'UZ' : return 69.25;
        case 'VA' : return 12.45;
        case 'VC' : return -61.216667;
        case 'VE' : return -66.866667;
        case 'VG' : return -64.616667;
        case 'VI' : return -64.933333;
        case 'VN' : return 105.85;
        case 'VU' : return 168.316667;
        case 'WF' : return -171.933333;
        case 'WS' : return -171.766667;
        case 'YE' : return 44.2;
        case 'ZA' : return 28.216667;
        case 'ZM' : return 28.283333;
        case 'ZW' : return 31.033333;
    }

    return 0.0;
}

// ~~

function GetContinentCodeFromCountryCode(
    string $country_code
    )
{
    switch ( $country_code )
    {
        case 'AF' : return 'AS';
        case 'AX' : return 'EU';
        case 'AL' : return 'EU';
        case 'DZ' : return 'AF';
        case 'AS' : return 'OC';
        case 'AD' : return 'EU';
        case 'AO' : return 'AF';
        case 'AI' : return 'CA';
        case 'AQ' : return 'AN';
        case 'AG' : return 'CA';
        case 'AR' : return 'SA';
        case 'AM' : return 'EU';
        case 'AW' : return 'CA';
        case 'AU' : return 'OC';
        case 'AT' : return 'EU';
        case 'AZ' : return 'EU';
        case 'BS' : return 'CA';
        case 'BH' : return 'AS';
        case 'BD' : return 'AS';
        case 'BB' : return 'CA';
        case 'BY' : return 'EU';
        case 'BE' : return 'EU';
        case 'BZ' : return 'CA';
        case 'BJ' : return 'AF';
        case 'BM' : return 'CA';
        case 'BT' : return 'AS';
        case 'BO' : return 'SA';
        case 'BA' : return 'EU';
        case 'BW' : return 'AF';
        case 'BR' : return 'SA';
        case 'IO' : return 'AF';
        case 'VG' : return 'CA';
        case 'BN' : return 'AS';
        case 'BG' : return 'EU';
        case 'BF' : return 'AF';
        case 'BI' : return 'AF';
        case 'KH' : return 'AS';
        case 'CM' : return 'AF';
        case 'CA' : return 'NA';
        case 'CV' : return 'AF';
        case 'KY' : return 'CA';
        case 'CF' : return 'AF';
        case 'TD' : return 'AF';
        case 'CL' : return 'SA';
        case 'CN' : return 'AS';
        case 'CX' : return 'OC';
        case 'CC' : return 'OC';
        case 'CO' : return 'SA';
        case 'KM' : return 'AF';
        case 'CK' : return 'OC';
        case 'CR' : return 'CA';
        case 'CI' : return 'AF';
        case 'HR' : return 'EU';
        case 'CU' : return 'CA';
        case 'CW' : return 'CA';
        case 'CY' : return 'EU';
        case 'CZ' : return 'EU';
        case 'CD' : return 'AF';
        case 'DK' : return 'EU';
        case 'DJ' : return 'AF';
        case 'DM' : return 'CA';
        case 'DO' : return 'CA';
        case 'EC' : return 'SA';
        case 'EG' : return 'AF';
        case 'SV' : return 'CA';
        case 'GQ' : return 'AF';
        case 'ER' : return 'AF';
        case 'EE' : return 'EU';
        case 'ET' : return 'AF';
        case 'FK' : return 'SA';
        case 'FO' : return 'EU';
        case 'FM' : return 'OC';
        case 'FJ' : return 'OC';
        case 'FI' : return 'EU';
        case 'FR' : return 'EU';
        case 'PF' : return 'OC';
        case 'TF' : return 'AN';
        case 'GA' : return 'AF';
        case 'GE' : return 'EU';
        case 'DE' : return 'EU';
        case 'GH' : return 'AF';
        case 'GI' : return 'EU';
        case 'GR' : return 'EU';
        case 'GL' : return 'CA';
        case 'GD' : return 'CA';
        case 'GU' : return 'OC';
        case 'GT' : return 'CA';
        case 'GG' : return 'EU';
        case 'GN' : return 'AF';
        case 'GW' : return 'AF';
        case 'GY' : return 'SA';
        case 'HT' : return 'CA';
        case 'HM' : return 'AN';
        case 'HN' : return 'CA';
        case 'HK' : return 'AS';
        case 'HU' : return 'EU';
        case 'IS' : return 'EU';
        case 'IN' : return 'AS';
        case 'ID' : return 'AS';
        case 'IR' : return 'AS';
        case 'IQ' : return 'AS';
        case 'IE' : return 'EU';
        case 'IM' : return 'EU';
        case 'IL' : return 'AS';
        case 'IT' : return 'EU';
        case 'JM' : return 'CA';
        case 'JP' : return 'AS';
        case 'JE' : return 'EU';
        case 'JO' : return 'AS';
        case 'KZ' : return 'AS';
        case 'KE' : return 'AF';
        case 'KI' : return 'OC';
        case 'KO' : return 'EU';
        case 'KW' : return 'AS';
        case 'KG' : return 'AS';
        case 'LA' : return 'AS';
        case 'LV' : return 'EU';
        case 'LB' : return 'AS';
        case 'LS' : return 'AF';
        case 'LR' : return 'AF';
        case 'LY' : return 'AF';
        case 'LI' : return 'EU';
        case 'LT' : return 'EU';
        case 'LU' : return 'EU';
        case 'MO' : return 'AS';
        case 'MK' : return 'EU';
        case 'MG' : return 'AF';
        case 'MW' : return 'AF';
        case 'MY' : return 'AS';
        case 'MV' : return 'AS';
        case 'ML' : return 'AF';
        case 'MT' : return 'EU';
        case 'MH' : return 'OC';
        case 'MR' : return 'AF';
        case 'MU' : return 'AF';
        case 'MX' : return 'CA';
        case 'MD' : return 'EU';
        case 'MC' : return 'EU';
        case 'MN' : return 'AS';
        case 'ME' : return 'EU';
        case 'MS' : return 'CA';
        case 'MA' : return 'AF';
        case 'MZ' : return 'AF';
        case 'MM' : return 'AS';
        case 'NA' : return 'AF';
        case 'NR' : return 'OC';
        case 'NP' : return 'AS';
        case 'NL' : return 'EU';
        case 'NC' : return 'OC';
        case 'NZ' : return 'OC';
        case 'NI' : return 'CA';
        case 'NE' : return 'AF';
        case 'NG' : return 'AF';
        case 'NU' : return 'OC';
        case 'NF' : return 'OC';
        case 'KP' : return 'AS';
        case 'MP' : return 'OC';
        case 'NO' : return 'EU';
        case 'OM' : return 'AS';
        case 'PK' : return 'AS';
        case 'PW' : return 'OC';
        case 'PS' : return 'AS';
        case 'PA' : return 'CA';
        case 'PG' : return 'OC';
        case 'PY' : return 'SA';
        case 'PE' : return 'SA';
        case 'PH' : return 'AS';
        case 'PN' : return 'OC';
        case 'PL' : return 'EU';
        case 'PT' : return 'EU';
        case 'PR' : return 'CA';
        case 'QA' : return 'AS';
        case 'CG' : return 'AF';
        case 'RO' : return 'EU';
        case 'RU' : return 'EU';
        case 'RW' : return 'AF';
        case 'BL' : return 'CA';
        case 'SH' : return 'AF';
        case 'KN' : return 'CA';
        case 'LC' : return 'CA';
        case 'MF' : return 'CA';
        case 'PM' : return 'CA';
        case 'VC' : return 'CA';
        case 'WS' : return 'OC';
        case 'SM' : return 'EU';
        case 'ST' : return 'AF';
        case 'SA' : return 'AS';
        case 'SN' : return 'AF';
        case 'RS' : return 'EU';
        case 'SC' : return 'AF';
        case 'SL' : return 'AF';
        case 'SG' : return 'AS';
        case 'SX' : return 'CA';
        case 'SK' : return 'EU';
        case 'SI' : return 'EU';
        case 'SB' : return 'OC';
        case 'SO' : return 'AF';
        case 'ZA' : return 'AF';
        case 'GS' : return 'AN';
        case 'KR' : return 'AS';
        case 'SS' : return 'AF';
        case 'ES' : return 'EU';
        case 'LK' : return 'AS';
        case 'SD' : return 'AF';
        case 'SR' : return 'SA';
        case 'SJ' : return 'EU';
        case 'SZ' : return 'AF';
        case 'SE' : return 'EU';
        case 'CH' : return 'EU';
        case 'SY' : return 'AS';
        case 'TW' : return 'AS';
        case 'TJ' : return 'AS';
        case 'TZ' : return 'AF';
        case 'TH' : return 'AS';
        case 'GM' : return 'AF';
        case 'TL' : return 'AS';
        case 'TG' : return 'AF';
        case 'TK' : return 'OC';
        case 'TO' : return 'OC';
        case 'TT' : return 'CA';
        case 'TN' : return 'AF';
        case 'TR' : return 'EU';
        case 'TM' : return 'AS';
        case 'TC' : return 'CA';
        case 'TV' : return 'OC';
        case 'UG' : return 'AF';
        case 'UA' : return 'EU';
        case 'AE' : return 'AS';
        case 'GB' : return 'EU';
        case 'US' : return 'NA';
        case 'UY' : return 'SA';
        case 'UM' : return 'OC';
        case 'VI' : return 'CA';
        case 'UZ' : return 'AS';
        case 'VU' : return 'OC';
        case 'VA' : return 'EU';
        case 'VE' : return 'SA';
        case 'VN' : return 'AS';
        case 'WF' : return 'OC';
        case 'EH' : return 'AF';
        case 'YE' : return 'AS';
        case 'ZM' : return 'AF';
        case 'ZW' : return 'AF';
    }

    return '';
}

// ~~

function GetContinentSlugFromContinentCode(
    string $continent_code
    )
{
    switch ( $continent_code )
    {
        case 'AF' : return 'africa';
        case 'AN' : return 'antarctica';
        case 'AS' : return 'asia';
        case 'OC' : return 'oceania';
        case 'CA' : return 'central-america';
        case 'EU' : return 'europe';
        case 'NA' : return 'north-america';
        case 'SA' : return 'south-america';
    }

    return '';
}

// ~~

function GetContinentSlugFromCountryCode(
    string $country_code
    )
{
    return GetContinentSlugFromContinentCode( GetContinentCodeFromCountryCode( $country_code ) );
}

// ~~

function SetLocationContinent(
    object $location
    )
{
    $location->ContinentCode = GetContinentCodeFromCountryCode( $location->CountryCode );
    $location->ContinentSlug = GetContinentSlugFromContinentCode( $location->ContinentCode );
    $location->IsAntarctica = ( $location->ContinentCode === 'AN' );
    $location->IsSouthAmerica = ( $location->ContinentCode === 'SA' );
    $location->IsCentralAmerica = ( $location->ContinentCode === 'CA' );
    $location->IsNorthAmerica = ( $location->ContinentCode === 'NA' );
    $location->IsAmerica = ( $location->IsSouthAmerica || $location->IsCentralAmerica || $location->IsNorthAmerica );
    $location->IsAfrica = ( $location->ContinentCode === 'AF' );
    $location->IsEurope = ( $location->ContinentCode === 'EU' );
    $location->IsOceania = ( $location->ContinentCode === 'OC' );
    $location->IsAsia = ( $location->ContinentCode === 'AS' );
    $location->IsJapan = ( $location->CountryCode === 'JP' );
}

// ~~

function GetCountryLocation(
    $country_code
    )
{
    $location = new stdClass();
    $location->Service = '';
    $location->Latitude = GetCapitalLatitudeFromCountryCode( $country_code );
    $location->Longitude = GetCapitalLongitudeFromCountryCode( $country_code );
    $location->CountryCode = $country_code;
    $location->TimeZone = GetTimeZoneFromLocation( $location->Latitude, $location->Longitude, $location->CountryCode );
    $location->IsFound = false;

    SetLocationContinent( $location );

    return $location;
}

// ~~

function GetBrowserLocation(
    string $browser_address,
    $ip_api_key = null
    )
{
    $location = new stdClass();
    $location->Service = '';
    $location->Latitude = 0.0;
    $location->Longitude = 0.0;
    $location->CountryCode = '';
    $location->TimeZone = '';
    $location->IsFound = false;

    if ( $browser_address !== '127.0.0.1'
         && $browser_address !== '::1' )
    {
        if ( isset( $_SERVER[ 'GEOIP_LATITUDE' ] )
             && isset( $_SERVER[ 'GEOIP_LONGITUDE' ] )
             && isset( $_SERVER[ 'GEOIP_COUNTRY_CODE' ] ) )
        {
            $location->Service = 'geoip';
            $location->CountryCode = $_SERVER[ 'GEOIP_COUNTRY_CODE' ];
            $location->Latitude = ( float )$_SERVER[ 'GEOIP_LATITUDE' ];
            $location->Longitude = ( float )$_SERVER[ 'GEOIP_LONGITUDE' ];
            $location->TimeZone = GetTimeZoneFromLocation( $location->Latitude, $location->Longitude, $location->CountryCode );
            $location->IsFound = true;
        }

        if ( !$location->IsFound )
        {
            try
            {
                $geographic_data = json_decode( @file_get_contents( 'http://ip-api.com/json/' . $browser_address ) );

                if ( $geographic_data !== null
                     && property_exists( $geographic_data, 'countryCode' )
                     && property_exists( $geographic_data, 'lat' )
                     && property_exists( $geographic_data, 'lon' )
                     && property_exists( $geographic_data, 'timezone' )
                     && property_exists( $geographic_data, 'status' )
                     && $geographic_data->status === 'success' )
                {
                    $location->Service = 'ip-api.com';
                    $location->CountryCode = $geographic_data->countryCode;
                    $location->Latitude = ( float )$geographic_data->lat;
                    $location->Longitude = ( float )$geographic_data->lon;
                    $location->TimeZone = $geographic_data->timezone;
                    $location->IsFound = true;
                }
            }
            catch ( Exception $exception )
            {
            }
        }

        if ( !$location->IsFound )
        {
            try
            {
                $geographic_data = json_decode( @file_get_contents( 'http://www.geoplugin.net/json.gp?ip=' . $browser_address ) );

                if ( $geographic_data !== null
                     && property_exists( $geographic_data, 'geoplugin_countryCode' )
                     && property_exists( $geographic_data, 'geoplugin_latitude' )
                     && property_exists( $geographic_data, 'geoplugin_longitude' )
                     && property_exists( $geographic_data, 'geoplugin_timezone' )
                     && property_exists( $geographic_data, 'geoplugin_status' )
                     && $geographic_data->geoplugin_countryCode !== null
                     && $geographic_data->geoplugin_status !== 404 )
                {
                    $location->Service = 'geoplugin.net';
                    $location->CountryCode = $geographic_data->geoplugin_countryCode;
                    $location->Latitude = ( float )$geographic_data->geoplugin_latitude;
                    $location->Longitude = ( float )$geographic_data->geoplugin_longitude;
                    $location->TimeZone = $geographic_data->geoplugin_timezone;
                    $location->IsFound = true;
                }
            }
            catch ( Exception $exception )
            {
            }
        }

        if ( !$location->IsFound )
        {
            try
            {
                $geographic_data = json_decode( @file_get_contents( 'https://www.iplocate.io/api/lookup/' . $browser_address ) );

                if ( $geographic_data !== null
                     && property_exists( $geographic_data, 'country_code' )
                     && property_exists( $geographic_data, 'latitude' )
                     && property_exists( $geographic_data, 'longitude' )
                     && property_exists( $geographic_data, 'time_zone' )
                     && $geographic_data->country_code !== null )
                {
                    $location->Service = 'iplocate.io';
                    $location->CountryCode = $geographic_data->country_code;
                    $location->Latitude = ( float )$geographic_data->latitude;
                    $location->Longitude = ( float )$geographic_data->longitude;
                    $location->TimeZone = $geographic_data->time_zone;
                    $location->IsFound = true;
                }
            }
            catch ( Exception $exception )
            {
            }
        }

        if ( !$location->IsFound )
        {
            try
            {
                $geographic_data = json_decode( @file_get_contents( 'https://api.hostip.info/get_json.php?ip=' . $browser_address ) );

                if ( $geographic_data !== null
                     && property_exists( $geographic_data, 'country_code' )
                     && $geographic_data->country_code !== null
                     && $geographic_data->country_code !== 'XX' )
                {
                    $location->Service = 'hostip.info';
                    $location->CountryCode = $geographic_data->country_code;
                    $location->Latitude = GetCapitalLatitudeFromCountryCode( $location->CountryCode );
                    $location->Longitude = GetCapitalLongitudeFromCountryCode( $location->CountryCode );
                    $location->TimeZone = GetTimeZoneFromLocation( $location->Latitude, $location->Longitude, $location->CountryCode );
                    $location->IsFound = true;
                }
            }
            catch ( Exception $exception )
            {
            }
        }
    }

    SetLocationContinent( $location );

    return $location;
}

// ~~

function GetJsonText(
    $value
    )
{
    return json_encode( $value );
}

// ~~

function GetJsonObject(
    $text
    )
{
    return json_decode( $text );
}

// ~~

function GetJsonInput(
    )
{
    return json_decode( file_get_contents( 'php://input' ) );
}

// ~~

function AddHeader(
    $text
    )
{
    header( $text );
}

// ~~

function Redirect(
    string $path
    )
{
    header( 'Location: ' . $path, true, 303 );
}

// ~~

function SetStatus(
    $status_code
    )
{
    http_response_code( $status_code );
}

// ~~

function SetJsonResponse(
    $object
    )
{
    header( 'Content-Type: application/json; charset=UTF-8' );
    echo json_encode( $object );
}

// ~~

function SendRequest(
    string $request_url,
    string $request_method,
    $request_body = null,
    array $request_header_array = [],
    array $request_query_map = []
    )
{
    if ( count( $request_query_map ) > 0 )
    {
        $request_url .= '?' . http_build_query( $request_query_map );
    }

    $curl_request = curl_init( $request_url );

    if ( $request_method === 'POST' )
    {
        curl_setopt( $curl_request, CURLOPT_POST, 1 );
    }
    else
    {
        curl_setopt( $curl_request, CURLOPT_CUSTOMREQUEST, $request_method );
    }

    if ( $request_body !== null )
    {
        curl_setopt( $curl_request, CURLOPT_POSTFIELDS, $request_body );
    }

    curl_setopt( $curl_request, CURLOPT_RETURNTRANSFER, true );

    if ( count( $request_header_array ) > 0 )
    {
        curl_setopt( $curl_request, CURLOPT_HTTPHEADER, $request_header_array );
    }

    $request_response = curl_exec( $curl_request );
    $request_status = curl_getinfo( $curl_request, CURLINFO_RESPONSE_CODE );

    curl_close( $curl_request );

    return ( object )array( 'Status' => $request_status, 'Response' => $request_response );
}

// ~~

function SendJsonRequest(
    string $request_url,
    string $request_method,
    $request_object = null,
    array $request_header_array = [],
    array $request_query_map = []
    )
{
    array_push( $request_header_array, 'Content-Type: application/json; charset=UTF-8' );

    $request_result
        = SendRequest(
              $request_url,
              $request_method,
              json_encode( $request_object ),
              $request_header_array,
              $request_query_map
              );

    if ( $request_result->Response !== false
         && is_string( $request_result->Response ) )
    {
        $request_result->Response = json_decode( $request_result->Response );
    }

    return $request_result;
}
