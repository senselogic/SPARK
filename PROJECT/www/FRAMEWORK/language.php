<?php // -- FUNCTIONS

function GetBrowserLanguageCode(
    array $valid_language_code_array,
    string $default_language_code = 'en'
    )
{
    if ( isset( $_SERVER[ 'HTTP_ACCEPT_LANGUAGE' ] ) )
    {
        $browser_language_code_array = explode( ',', strtolower( $_SERVER[ 'HTTP_ACCEPT_LANGUAGE' ] ) );

        foreach ( $browser_language_code_array as $browser_language_code )
        {
            $browser_language_code = substr( $browser_language_code, 0, 2 );

            $valid_language_code_index = array_search( $browser_language_code, $valid_language_code_array, true );

            if ( $valid_language_code_index !== false )
            {
                return $valid_language_code_array[ $valid_language_code_index ];
            }
        }
    }

    return $default_language_code;
}

// ~~

function ExtractLanguageCode(
    array & $path_value_array,
    array $valid_language_code_array,
    string $default_language_code = 'en'
    )
{
    if ( count( $path_value_array ) > 0 )
    {
        $language_code = $path_value_array[ 0 ];

        foreach ( $valid_language_code_array as $valid_language_code )
        {
            if ( $language_code === $valid_language_code )
            {
                $path_value_array = array_slice( $path_value_array, 1 );

                return $language_code;
            }
        }
    }

    return $default_language_code;
}

// ~~

function GetUntranslatedText(
    string $text
    )
{
    $translated_text_array = explode( '¨', $text );

    return $translated_text_array[ 0 ];
}

// ~~

function MatchesLanguageSpecifier(
    string $language_tag,
    string $language_specifier
    )
{
    $language_tag_part_array = explode( '-', $language_tag . '--' );

    foreach ( explode( ',', $language_specifier ) as $language_specifier_tag )
    {
        $language_specifier_tag_part_array = explode( '-', $language_specifier_tag . '--' );

        if ( ( $language_tag_part_array[ 0 ] === ''
               || $language_specifier_tag_part_array[ 0 ] === ''
               || $language_tag_part_array[ 0 ] === $language_specifier_tag_part_array[ 0 ] )
             && ( $language_tag_part_array[ 1 ] === ''
                  || $language_specifier_tag_part_array[ 1 ] === ''
                  || $language_tag_part_array[ 1 ] === $language_specifier_tag_part_array[ 1 ] )
             && ( $language_tag_part_array[ 2 ] === ''
                  || $language_specifier_tag_part_array[ 2 ] === ''
                  || $language_tag_part_array[ 2 ] === $language_specifier_tag_part_array[ 2 ] ) )
        {
            return true;
        }
    }

    return false;
}

// ~~

function GetTranslatedText(
    string $text,
    string $language_tag,
    string $default_language_tag = 'en'
    )
{
    $translated_text_array = explode( '¨', $text );

    if ( $language_tag !== $default_language_tag )
    {
        for ( $translated_text_index = count( $translated_text_array ) - 1;
              $translated_text_index >= 1;
              --$translated_text_index )
        {
            $translated_text = $translated_text_array[ $translated_text_index ];
            $colon_character_index = strpos( $translated_text, ':' );

            if ( $colon_character_index !== false )
            {
                if ( MatchesLanguageSpecifier( $language_tag, substr( $translated_text, 0, $colon_character_index ) ) )
                {
                    return substr( $translated_text, $colon_character_index + 1 );
                }
            }
        }
    }

    return $translated_text_array[ 0 ];
}

// ~~

function GetTranslationArray(
    string $text,
    string $default_language_tag = ''
    )
{
    $translated_text_array = explode( '¨', $text );

    $translation = new stdClass();
    $translation->Specifier = $default_language_tag;
    $translation->Data = $translated_text_array[ 0 ];

    $translation_array = [];
    array_push( $translation_array, $translation );

    for ( $translated_text_index = 1;
          $translated_text_index < count( $translated_text_array );
          ++$translated_text_index )
    {
        $translated_text = $translated_text_array[ $translated_text_index ];
        $colon_character_index = strpos( $translated_text, ":" );

        if ( $colon_character_index !== false )
        {
            $translation = new stdClass();
            $translation->Specifier = substr( $translated_text, 0, $colon_character_index );
            $translation->Data = substr( $translated_text, $colon_character_index + 1 );

            array_push( $translation_array, $translation );
        }
    }

    return $translation_array;
}

// ~~

function GetMultilingualText(
    array &$translation_array
    )
{
    $multilingual_text = "";

    if ( count( $translation_array ) > 0 )
    {
        $multilingual_text = $translation_array[ 0 ]->Data;

        for ( $translation_index = 1;
              $translation_index < count( $translation_array );
              ++$translation_index )
        {
            $translation = $translation_array[ $translation_index ];

            $multilingual_text .= "¨" . $translation->Specifier . ":" . $translation->Data;
        }
    }

    return $multilingual_text;
}

// ~~

function GetTranslatedNumber(
    string $number,
    string $decimal_separator
    )
{
    if ( $decimal_separator === ',' )
    {
        return str_replace( '.', ',', $number );
    }
    else
    {
        return $number;
    }
}

// ~~

function GetLanguageDecimalSeparator(
    string $language_code
    )
{
    if ( $language_code === "en"
         || $language_code === "ja"
         || $language_code === "ko"
         || $language_code === "zh" )
    {
        return '.';
    }
    else
    {
        return ',';
    }
}
