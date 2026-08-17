<?php // -- FUNCTIONS

function SetTimeZone(
    string $time_zone
    )
{
    date_default_timezone_set( $time_zone );
}

// ~~

function GetTimeZone(
    )
{
    return date_default_timezone_get();
}

// ~~

function GetCurrentTimestamp(
    )
{
    return time();
}

// ~~

function GetVersionTimestamp(
    int $expiration_second_count
    )
{
    return intdiv( time(), $expiration_second_count );
}

// ~~

function GetCurrentMillisecondTimestamp(
    )
{
    $part_array = explode( ' ', microtime() );

    return $part_array[ 1 ] . substr( $part_array[ 0 ] . '00000', 2, 3 );
}

// ~~

function GetCurrentMicrosecondTimestamp(
    )
{
    $part_array = explode( ' ', microtime() );

    return $part_array[ 1 ] . substr( $part_array[ 0 ] . '00000000', 2, 6 );
}

// ~~

function GetCurrentDateTimeReal(
    )
{
    return floatval( date( 'Ymd.His' ) );
}

// ~~

function GetCurrentDateTimeSuffix(
    )
{
    return date( 'YmdHis' );
}

// ~~

function GetCurrentDateTime(
    )
{
    return date( 'Y-m-d H:i:s' );
}

// ~~

function GetCurrentDate(
    )
{
    return date( 'Y-m-d' );
}

// ~~

function GetCurrentTime(
    )
{
    return date( 'H:i:s' );
}

// ~~

function GetTimestampFromDateTime(
    string $date_time
    )
{
    return strtotime( $date_time );
}

// ~~

function GetDateTimeFromTimestampAndTimeZone(
    int $timestamp,
    string $time_zone
    )
{
    $date_time = new DateTime( '@' . $timestamp );
    $date_time->setTimezone( new DateTimeZone( $time_zone ) );

    return $date_time->format( 'Y-m-d H:i:s' );
}

// ~~

function GetDateFromTimestampAndTimeZone(
    int $timestamp,
    string $time_zone
    )
{
    $date_time = new DateTime( '@' . $timestamp );
    $date_time->setTimezone( new DateTimeZone( $time_zone ) );

    return $date_time->format( 'Y-m-d' );
}

// ~~

function GetTimeFromTimestampAndTimeZone(
    int $timestamp,
    string $time_zone
    )
{
    $date_time = new DateTime( '@' . $timestamp );
    $date_time->setTimezone( new DateTimeZone( $time_zone ) );

    return $date_time->format( 'H:i:s' );
}

// ~~

function GetTimeZoneFromLocation(
    float $latitude,
    float $longitude,
    string $country_code
    )
{
    $time_shift = max( min( ( int )round( $longitude / 15.0 ), 12 ), -12 );

    if ( $time_shift >= 12 )
    {
        $time_shift = -12;
    }

    switch ( $country_code )
    {
        case 'AD' : return 'Europe/Andorra';
        case 'AE' : return 'Asia/Dubai';
        case 'AF' : return 'Asia/Kabul';
        case 'AG' : return 'America/Antigua';
        case 'AI' : return 'America/Anguilla';
        case 'AL' : return 'Europe/Tirane';
        case 'AM' : return 'Asia/Yerevan';
        case 'AO' : return 'Africa/Luanda';
        case 'AQ' :
        {
            switch ( $time_shift )
            {
                case -11 : return 'Antarctica/McMurdo';
                case -3 : return 'Antarctica/Palmer';
                case 0 : return 'Antarctica/Troll';
                case 3 : return 'Antarctica/Syowa';
                case 5 : return 'Antarctica/Mawson';
                case 6 : return 'Antarctica/Vostok';
                case 7 : return 'Antarctica/Davis';
                case 10 : return 'Antarctica/DumontDUrville';
                case 11 : return 'Antarctica/Casey';
            }

            break;
        }
        case 'AR' : return 'America/Argentina/Buenos_Aires';
        case 'AS' : return 'Pacific/Pago_Pago';
        case 'AT' : return 'Europe/Vienna';
        case 'AU' :
        {
            switch ( $time_shift )
            {
                case 8 : return 'Australia/Perth';
                case 9 : return 'Australia/Darwin';
                case 10 :
                {
                    if ( $latitude < -29.0 )
                    {
                        return 'Australia/Sydney';
                    }
                    else
                    {
                        return 'Australia/Brisbane';
                    }
                }
            }

            break;
        }
        case 'AW' : return 'America/Aruba';
        case 'AX' : return 'Europe/Mariehamn';
        case 'AZ' : return 'Asia/Baku';
        case 'BA' : return 'Europe/Sarajevo';
        case 'BB' : return 'America/Barbados';
        case 'BD' : return 'Asia/Dhaka';
        case 'BE' : return 'Europe/Brussels';
        case 'BF' : return 'Africa/Ouagadougou';
        case 'BG' : return 'Europe/Sofia';
        case 'BH' : return 'Asia/Bahrain';
        case 'BI' : return 'Africa/Bujumbura';
        case 'BJ' : return 'Africa/Porto-Novo';
        case 'BL' : return 'America/St_Barthelemy';
        case 'BM' : return 'Atlantic/Bermuda';
        case 'BN' : return 'Asia/Brunei';
        case 'BO' : return 'America/La_Paz';
        case 'BQ' : return 'America/Kralendijk';
        case 'BR' :
        {
            switch ( $time_shift )
            {
                case -5 : return 'America/Rio_Branco';
                case -4 : return 'America/Manaus';
                case -3 : return 'America/Sao_Paulo';
                case -2 : return 'America/Recife';
            }

            break;
        }
        case 'BS' : return 'America/Nassau';
        case 'BT' : return 'Asia/Thimphu';
        case 'BW' : return 'Africa/Gaborone';
        case 'BY' : return 'Europe/Minsk';
        case 'BZ' : return 'America/Belize';
        case 'CA' :
        {
            switch ( $time_shift )
            {
                case -9 : return 'America/Whitehorse';
                case -8 : return 'America/Vancouver';
                case -7 : return 'America/Edmonton';
                case -6 : return 'America/Winnipeg';
                case -5 : return 'America/Toronto';
                case -4 : return 'America/Halifax';
                case -3 : return 'America/St_Johns';
            }

            break;
        }
        case 'CC' : return 'Indian/Cocos';
        case 'CD' :
        {
            switch ( $time_shift )
            {
                case 1 : return 'Africa/Kinshasa';
                case 2 : return 'Africa/Lubumbashi';
            }

            break;
        }
        case 'CF' : return 'Africa/Bangui';
        case 'CG' : return 'Africa/Brazzaville';
        case 'CH' : return 'Europe/Zurich';
        case 'CI' : return 'Africa/Abidjan';
        case 'CK' : return 'Pacific/Rarotonga';
        case 'CL' :
        {
            switch ( $time_shift )
            {
                case -7 : return 'Pacific/Easter';
                case -5 :
                case -4 : return 'America/Santiago';
            }

            break;
        }
        case 'CM' : return 'Africa/Douala';
        case 'CN' :
        {
            switch ( $time_shift )
            {
                case 5 :
                case 6 : return 'Asia/Urumqi';
                case 7 :
                case 8 :
                case 9 : return 'Asia/Shanghai';
            }

            break;
        }
        case 'CO' : return 'America/Bogota';
        case 'CR' : return 'America/Costa_Rica';
        case 'CU' : return 'America/Havana';
        case 'CV' : return 'Atlantic/Cape_Verde';
        case 'CW' : return 'America/Curacao';
        case 'CX' : return 'Indian/Christmas';
        case 'CY' : return 'Asia/Famagusta';
        case 'CY' : return 'Asia/Nicosia';
        case 'CZ' : return 'Europe/Prague';
        case 'DE' : return 'Europe/Berlin';
        case 'DE' : return 'Europe/Busingen';
        case 'DJ' : return 'Africa/Djibouti';
        case 'DK' : return 'Europe/Copenhagen';
        case 'DM' : return 'America/Dominica';
        case 'DO' : return 'America/Santo_Domingo';
        case 'DZ' : return 'Africa/Algiers';
        case 'EC' :
        {
            switch ( $time_shift )
            {
                case -6 : return 'Pacific/Galapagos';
                case -5 : return 'America/Guayaquil';
            }

            break;
        }
        case 'EE' : return 'Europe/Tallinn';
        case 'EG' : return 'Africa/Cairo';
        case 'EH' : return 'Africa/El_Aaiun';
        case 'ER' : return 'Africa/Asmara';
        case 'ES' :
        {
            if ( $longitude < -12.0 )
            {
                return 'Atlantic/Canary';
            }
            else
            {
                return 'Europe/Madrid';
            }
        }
        case 'ET' : return 'Africa/Addis_Ababa';
        case 'FI' : return 'Europe/Helsinki';
        case 'FJ' : return 'Pacific/Fiji';
        case 'FK' : return 'Atlantic/Stanley';
        case 'FM' :
        {
            switch ( $time_shift )
            {
                case 10 : return 'Pacific/Chuuk';
                case 11 : return 'Pacific/Pohnpei';
            }

            break;
        }
        case 'FO' : return 'Atlantic/Faroe';
        case 'FR' : return 'Europe/Paris';
        case 'GA' : return 'Africa/Libreville';
        case 'GB' : return 'Europe/London';
        case 'GD' : return 'America/Grenada';
        case 'GE' : return 'Asia/Tbilisi';
        case 'GF' : return 'America/Cayenne';
        case 'GG' : return 'Europe/Guernsey';
        case 'GH' : return 'Africa/Accra';
        case 'GI' : return 'Europe/Gibraltar';
        case 'GL' :
        {
            switch ( $time_shift )
            {
                case -4 : return 'America/Thule';
                case -3 : return 'America/Nuuk';
                case -1 : return 'America/Scoresbysund';
                case 0 : return 'America/Danmarkshavn';
            }

            break;
        }
        case 'GM' : return 'Africa/Banjul';
        case 'GN' : return 'Africa/Conakry';
        case 'GP' : return 'America/Guadeloupe';
        case 'GQ' : return 'Africa/Malabo';
        case 'GR' : return 'Europe/Athens';
        case 'GS' : return 'Atlantic/South_Georgia';
        case 'GT' : return 'America/Guatemala';
        case 'GU' : return 'Pacific/Guam';
        case 'GW' : return 'Africa/Bissau';
        case 'GY' : return 'America/Guyana';
        case 'HK' : return 'Asia/Hong_Kong';
        case 'HN' : return 'America/Tegucigalpa';
        case 'HR' : return 'Europe/Zagreb';
        case 'HT' : return 'America/Port-au-Prince';
        case 'HU' : return 'Europe/Budapest';
        case 'ID' :
        {
            switch ( $time_shift )
            {
                case 6 :
                case 7 : return 'Asia/Jakarta';
                case 8 : return 'Asia/Makassar';
                case 9 : return 'Asia/Jayapura';
            }

            break;
        }
        case 'IE' : return 'Europe/Dublin';
        case 'IL' : return 'Asia/Jerusalem';
        case 'IM' : return 'Europe/Isle_of_Man';
        case 'IN' : return 'Asia/Kolkata';
        case 'IO' : return 'Indian/Chagos';
        case 'IQ' : return 'Asia/Baghdad';
        case 'IR' : return 'Asia/Tehran';
        case 'IS' : return 'Atlantic/Reykjavik';
        case 'IT' : return 'Europe/Rome';
        case 'JE' : return 'Europe/Jersey';
        case 'JM' : return 'America/Jamaica';
        case 'JO' : return 'Asia/Amman';
        case 'JP' : return 'Asia/Tokyo';
        case 'KE' : return 'Africa/Nairobi';
        case 'KG' : return 'Asia/Bishkek';
        case 'KH' : return 'Asia/Phnom_Penh';
        case 'KI' :
        {
            switch ( $time_shift )
            {
                case -12 : return 'Pacific/Tarawa';
                case -11 : return 'Pacific/Enderbury';
                case -10 : return 'Pacific/Kiritimati';
            }

            break;
        }
        case 'KM' : return 'Indian/Comoro';
        case 'KN' : return 'America/St_Kitts';
        case 'KP' : return 'Asia/Pyongyang';
        case 'KR' : return 'Asia/Seoul';
        case 'KW' : return 'Asia/Kuwait';
        case 'KY' : return 'America/Cayman';
        case 'KZ' :
        {
            switch ( $time_shift )
            {
                case 4 : return 'Asia/Aqtau';
                case 5 :
                case 6 : return 'Asia/Almaty';
            }

            break;
        }
        case 'LA' : return 'Asia/Vientiane';
        case 'LB' : return 'Asia/Beirut';
        case 'LC' : return 'America/St_Lucia';
        case 'LI' : return 'Europe/Vaduz';
        case 'LK' : return 'Asia/Colombo';
        case 'LR' : return 'Africa/Monrovia';
        case 'LS' : return 'Africa/Maseru';
        case 'LT' : return 'Europe/Vilnius';
        case 'LU' : return 'Europe/Luxembourg';
        case 'LV' : return 'Europe/Riga';
        case 'LY' : return 'Africa/Tripoli';
        case 'MA' : return 'Africa/Casablanca';
        case 'MC' : return 'Europe/Monaco';
        case 'MD' : return 'Europe/Chisinau';
        case 'ME' : return 'Europe/Podgorica';
        case 'MF' : return 'America/Marigot';
        case 'MG' : return 'Indian/Antananarivo';
        case 'MH' : return 'Pacific/Majuro';
        case 'MK' : return 'Europe/Skopje';
        case 'ML' : return 'Africa/Bamako';
        case 'MM' : return 'Asia/Yangon';
        case 'MN' : return 'Europe/Chisinau';
        case 'MO' : return 'Asia/Macau';
        case 'MP' : return 'Pacific/Saipan';
        case 'MQ' : return 'America/Martinique';
        case 'MR' : return 'Africa/Nouakchott';
        case 'MS' : return 'America/Montserrat';
        case 'MT' : return 'Europe/Malta';
        case 'MU' : return 'Indian/Mauritius';
        case 'MV' : return 'Indian/Maldives';
        case 'MW' : return 'Africa/Blantyre';
        case 'MX' :
        {
            switch ( $time_shift )
            {
                case -9 :
                case -8 : return 'America/Tijuana';
                case -7 : return 'America/Chihuahua';
                case -6 : return 'America/Mexico_City';
                case -5 : return 'America/Cancun';
            }

            break;
        }
        case 'MY' : return 'Asia/Kuala_Lumpur';
        case 'MZ' : return 'Africa/Maputo';
        case 'NA' : return 'Africa/Windhoek';
        case 'NC' : return 'Pacific/Noumea';
        case 'NE' : return 'Africa/Niamey';
        case 'NF' : return 'Pacific/Norfolk';
        case 'NG' : return 'Africa/Lagos';
        case 'NI' : return 'America/Managua';
        case 'NL' : return 'Europe/Amsterdam';
        case 'NO' : return 'Europe/Oslo';
        case 'NP' : return 'Asia/Kathmandu';
        case 'NR' : return 'Pacific/Nauru';
        case 'NU' : return 'Pacific/Niue';
        case 'NZ' : return 'Pacific/Auckland';
        case 'OM' : return 'Asia/Muscat';
        case 'PA' : return 'America/Panama';
        case 'PE' : return 'America/Lima';
        case 'PF' :
        {
            switch ( $time_shift )
            {
                case -10 : return 'Pacific/Tahiti';
                case -9 : return 'Pacific/Marquesas';
            }

            break;
        }
        case 'PG' :
        {
            switch ( $time_shift )
            {
                case 10 : return 'Pacific/Port_Moresby';
                case 11 : return 'Pacific/Bougainville';
            }

            break;
        }
        case 'PH' : return 'Asia/Manila';
        case 'PK' : return 'Asia/Karachi';
        case 'PL' : return 'Europe/Warsaw';
        case 'PM' : return 'America/Miquelon';
        case 'PN' : return 'Pacific/Pitcairn';
        case 'PR' : return 'America/Puerto_Rico';
        case 'PS' : return 'Asia/Hebron';
        case 'PT' :
        {
            if ( $longitude < -12.0 )
            {
                return 'Atlantic/Azores';
            }
            else
            {
                return 'Europe/Lisbon';
            }
        }
        case 'PW' : return 'Pacific/Palau';
        case 'PY' : return 'America/Asuncion';
        case 'QA' : return 'Asia/Qatar';
        case 'RE' : return 'Indian/Reunion';
        case 'RO' : return 'Europe/Bucharest';
        case 'RS' : return 'Europe/Belgrade';
        case 'RU' :
        {
            switch ( $time_shift )
            {
                case 1 :
                case 2 : return 'Europe/Kaliningrad';
                case 3 : return 'Europe/Moscow';
                case 4 : return 'Europe/Volgograd';
                case 5 : return 'Asia/Yekaterinburg';
                case 6 : return 'Asia/Omsk';
                case 7 : return 'Asia/Tomsk';
                case 8 : return 'Asia/Irkutsk';
                case 9 : return 'Asia/Yakutsk';
                case 10 : return 'Asia/Vladivostok';
                case 11 : return 'Asia/Sakhalin';
                case -12 : return 'Asia/Anadyr';
            }

            break;
        }
        case 'RW' : return 'Africa/Kigali';
        case 'SA' : return 'Asia/Riyadh';
        case 'SB' : return 'Pacific/Guadalcanal';
        case 'SC' : return 'Indian/Mahe';
        case 'SD' : return 'Africa/Khartoum';
        case 'SE' : return 'Europe/Stockholm';
        case 'SG' : return 'Asia/Singapore';
        case 'SH' : return 'Atlantic/St_Helena';
        case 'SI' : return 'Europe/Ljubljana';
        case 'SJ' : return 'Arctic/Longyearbyen';
        case 'SK' : return 'Europe/Bratislava';
        case 'SL' : return 'Africa/Freetown';
        case 'SM' : return 'Europe/San_Marino';
        case 'SN' : return 'Africa/Dakar';
        case 'SO' : return 'Africa/Mogadishu';
        case 'SR' : return 'America/Paramaribo';
        case 'SS' : return 'Africa/Juba';
        case 'ST' : return 'Africa/Sao_Tome';
        case 'SV' : return 'America/El_Salvador';
        case 'SX' : return 'America/Lower_Princes';
        case 'SY' : return 'Asia/Damascus';
        case 'SZ' : return 'Africa/Mbabane';
        case 'TC' : return 'America/Grand_Turk';
        case 'TD' : return 'Africa/Ndjamena';
        case 'TF' : return 'Indian/Kerguelen';
        case 'TG' : return 'Africa/Lome';
        case 'TH' : return 'Asia/Bangkok';
        case 'TJ' : return 'Asia/Dushanbe';
        case 'TK' : return 'Pacific/Fakaofo';
        case 'TL' : return 'Asia/Dili';
        case 'TM' : return 'Asia/Ashgabat';
        case 'TN' : return 'Africa/Tunis';
        case 'TO' : return 'Pacific/Tongatapu';
        case 'TR' : return 'Europe/Istanbul';
        case 'TT' : return 'America/Port_of_Spain';
        case 'TV' : return 'Pacific/Funafuti';
        case 'TW' : return 'Asia/Taipei';
        case 'TZ' : return 'Africa/Dar_es_Salaam';
        case 'UA' :
        {
            switch ( $time_shift )
            {
                case 1 :
                case 2 : return 'Europe/Kiev';
                case 3 : return 'Europe/Simferopol';
            }

            break;
        }
        case 'UG' : return 'Africa/Kampala';
        case 'UM' :
        {
            switch ( $time_shift )
            {
                case -12 : return 'Pacific/Wake';
                case -11 : return 'Pacific/Midway';
            }

            break;
        }
        case 'US' :
        {
            switch ( $time_shift )
            {
                case -11 :
                case -10 : return 'Pacific/Honolulu';
                case -9 : return 'America/Juneau';
                case -8 : return 'America/Los_Angeles';
                case -7 : return 'America/Denver';
                case -6 : return 'America/Chicago';
                case -5 :
                case -4 : return 'America/New_York';
            }

            break;
        }
        case 'UY' : return 'America/Montevideo';
        case 'UZ' : return 'Asia/Samarkand';
        case 'UZ' : return 'Asia/Tashkent';
        case 'VA' : return 'Europe/Vatican';
        case 'VC' : return 'America/St_Vincent';
        case 'VE' : return 'America/Caracas';
        case 'VG' : return 'America/Tortola';
        case 'VI' : return 'America/St_Thomas';
        case 'VN' : return 'Asia/Ho_Chi_Minh';
        case 'VU' : return 'Pacific/Efate';
        case 'WF' : return 'Pacific/Wallis';
        case 'WS' : return 'Pacific/Apia';
        case 'YE' : return 'Asia/Aden';
        case 'YT' : return 'Indian/Mayotte';
        case 'ZA' : return 'Africa/Johannesburg';
        case 'ZM' : return 'Africa/Lusaka';
        case 'ZW' : return 'Africa/Harare';
    }

    switch ( $time_shift )
    {
        case -12 : return 'Pacific/Funafuti';
        case -11 : return 'Pacific/Pago_Pago';
        case -10 : return 'Pacific/Honolulu';
        case -9 : return 'America/Juneau';
        case -8 : return 'America/Vancouver';
        case -7 : return 'America/Denver';
        case -6 : return 'America/Chicago';
        case -5 : return 'America/New_York';
        case -4 : return 'America/Puerto_Rico';
        case -3 : return 'America/Sao_Paulo';
        case -2 : return 'Atlantic/South_Georgia';
        case -1 : return 'Atlantic/Azores';
        case 0 : return 'Europe/London';
        case 1 : return 'Europe/Vienna';
        case 2 : return 'Europe/Bucharest';
        case 3 : return 'Europe/Moscow';
        case 4 : return 'Asia/Dubai';
        case 5 : return 'Asia/Dushanbe';
        case 6 : return 'Asia/Thimphu';
        case 7 : return 'Asia/Jakarta';
        case 8 : return 'Asia/Shanghai';
        case 9 : return 'Asia/Tokyo';
        case 10 : return 'Australia/Brisbane';
        case 11 : return 'Pacific/Noumea';
    }

    return '';
}

// ~~

function GetBackoffSecondCount(
    int $attempt_count,
    int $minimum_attempt_count = 3,
    int $maximum_attempt_count = 8
    )
{
    if ( $attempt_count < $minimum_attempt_count )
    {
        return 0;
    }
    else
    {
        return 60 * ( 2 ** min( $attempt_count - $minimum_attempt_count, $maximum_attempt_count ) ) * 15 / 16;
    }
}
