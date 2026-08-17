<?php // -- VARIABLES

$TextBySlugMap = [];
$ProcessedTagArray = [];
$ProcessedTagDefinitionArray = [];
$ProcessedDualTagArray = [];
$ProcessedDualTagDefinitionArray = [];
$ProcessedLineTagArray = [];
$ProcessedLineTagDefinitionArray = [];
$EndTagIsDefined = false;

// -- FUNCTIONS

function GetCharacterCount(
    string $text
    )
{
    return strlen( $text );
}

// ~~

function HasText(
    $value
    )
{
    return !is_null( $value ) && $value !== '';
}

// ~~

function SplitText(
    string $text,
    string $separator
    )
{
    return explode( $separator, $text );
}

// ~~

function GetTextPosition(
    string $text,
    string $searched_text,
    int $first_text_position = 0
    )
{
    return strpos( $text, $searched_text, $first_text_position );
}

// ~~

function ContainsText(
    string $text,
    string $searched_text
    )
{
    return strpos( $text, $searched_text ) !== false;
}

// ~~

function ReplaceText(
    string $text,
    $old_text,
    $new_text
    )
{
    return str_replace( $old_text, $new_text, $text );
}

// ~~

function ReplaceTexts(
    string $text,
    $old_text,
    $new_text
    )
{
    do
    {
        $prior_text = $text;

        $text = str_replace( $old_text, $new_text, $text );
    }
    while ( $text !== $prior_text );

    return $text;
}

// ~~

function ReplaceSpecialCharacters(
    string $text
    )
{
    return str_replace( [ '\n', '\r', '\t' ], [ "\n", "\r", "\t" ], $text );
}

// ~~

function ReplaceDualText(
    string $text,
    string $old_text,
    string $first_new_text,
    string $second_new_text
    )
{
    $part_array = explode( $old_text, $text );
    $part_count = count( $part_array );

    for ( $part_index = 0;
          $part_index + 1 < $part_count;
          $part_index += 2 )
    {
        $part_array[ $part_index ] .= $first_new_text;
        $part_array[ $part_index + 1 ] .= $second_new_text;
    }

    return implode( '', $part_array );
}

// ~~

function GetRepeatedText(
    string $text,
    int $count,
    string $separator = ''
    )
{
    if ( $count === 0 )
    {
        return '';
    }
    else if ( $separator === '' )
    {
        return str_repeat( $text, $count );
    }
    else
    {
        return implode( $separator, array_fill( 0, $count, $text ) );
    }
}

// ~~

function GetBase64Text(
    string $text
    )
{
    return base64_encode( $text );
}

// ~~

function GetUntaggedText(
    string $text
    )
{
    return
        str_replace(
            [ '<', '>' ],
            [ '&lt;', '&gt;' ],
            $text
            );
}

// ~~

function GetEncodedText(
    string $text
    )
{
    return htmlspecialchars( $text );
}

// ~~

function GetEncodedHtml(
    string $text
    )
{
    return htmlentities( $text );
}

// ~~

function GetDecodedHtml(
    string $text
    )
{
    return html_entity_decode( $text );
}

// ~~

function GetEncodedUri(
    string $text
    )
{
    return urlencode( $text );
}

// ~~

function GetDecodedUri(
    string $text
    )
{
    return urldecode( $text );
}

// ~~

function IsInteger(
    $value
    )
{
    return
        is_numeric( $value )
        && $value === ( int ) $value;
}

// ~~

function IsNatural(
    $value
    )
{
    return
        is_numeric( $value )
        && $value === ( int ) $value
        && $value > 0;
}

// ~~

function IsUuid(
    $value
    )
{
    return
        is_string( $value )
        && strlen( $value ) === 36
        && preg_match( '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/', $value ) === 1;
}

// ~~

function GetInteger(
    $value
    )
{
    return intval( $value );
}

// ~~

function GetReal(
    $value
    )
{
    return floatval( $value );
}

// ~~

function GetValueText(
    $value
    )
{
    if ( is_array( $value )
         || is_object( $value ) )
    {
        return json_encode( $value );
    }
    else
    {
        return strval( $value );
    }
}

// ~~

function GetHexadecimalText(
    int $integer
    )
{
    return base_convert( $integer, 10, 16 );
}

// ~~

function GetHexatridecimalText(
    int $integer
    )
{
    return base_convert( $integer, 10, 36 );
}

// ~~

function GetQuotedText(
    string $text
    )
{
    return addslashes( $text );
}

// ~~

function GetCsvText(
    string $text
    )
{
    if ( strpos( $text, '"' ) !== false
         || strpos( $text, ',' ) !== false
         || strpos( $text, "\r" ) !== false
         || strpos( $text, "\n" ) !== false )
    {
        return '"' . ReplaceText( $text, '"', '""' ) . '"';
    }
    else
    {
        return $text;
    }
}

// ~~

function GetLeftPaddedText(
    string $text,
    int $character_count,
    string $padding
    )
{
    return str_pad( $text, $character_count, $padding, STR_PAD_LEFT );
}

// ~~

function GetRightPaddedText(
    string $text,
    int $character_count,
    string $padding
    )
{
    return str_pad( $text, $character_count, $padding, STR_PAD_RIGHT );
}

// ~~

function GetSidePaddedText(
    string $text,
    int $character_count,
    string $padding
    )
{
    return str_pad( $text, $character_count, $padding, STR_PAD_BOTH );
}

// ~~

function HasPrefix(
    string $text,
    string $prefix
    )
{
    return strncmp( $text, $prefix, strlen( $prefix ) ) === 0;
}

// ~~

function RemovePrefix(
    string $text,
    string $prefix
    )
{
    $prefix_character_count = strlen( $prefix );

    if ( strncmp( $text, $prefix, $prefix_character_count ) === 0 )
    {
        return substr( $text, $prefix_character_count );
    }
    else
    {
        return $text;
    }
}

// ~~

function ReplacePrefix(
    string $text,
    string $old_prefix,
    string $new_prefix
    )
{
    $old_prefix_character_count = strlen( $old_prefix );

    if ( strncmp( $text, $old_prefix, $old_prefix_character_count ) === 0 )
    {
        return $new_prefix . substr( $text, $old_prefix_character_count );
    }
    else
    {
        return $text;
    }
}

// ~~

function HasSuffix(
    string $text,
    string $suffix
    )
{
    $text_character_count = strlen( $text );
    $suffix_character_count = strlen( $suffix );

    return
        $text_character_count >= $suffix_character_count
        && substr_compare( $text, $suffix, $text_character_count - $suffix_character_count, $suffix_character_count ) === 0;
}

// ~~

function RemoveSuffix(
    string $text,
    string $suffix
    )
{
    $text_character_count = strlen( $text );
    $suffix_character_count = strlen( $suffix );

    if ( $text_character_count >= $suffix_character_count
         && substr_compare( $text, $suffix, $text_character_count - $suffix_character_count, $suffix_character_count ) === 0 )
    {
        return substr( $text, 0, $text_character_count - $suffix_character_count );
    }
    else
    {
        return $text;
    }
}

// ~~

function ReplaceSuffix(
    string $text,
    string $old_suffix,
    string $new_suffix
    )
{
    $text_character_count = strlen( $text );
    $old_suffix_character_count = strlen( $old_suffix );

    if ( $text_character_count >= $old_suffix_character_count
         && substr_compare( $text, $old_suffix, $text_character_count - $old_suffix_character_count, $old_suffix_character_count ) === 0 )
    {
        return substr( $text, 0, $text_character_count - $old_suffix_character_count ) . $new_suffix;
    }
    else
    {
        return $text;
    }
}

// ~~

function GetRandomText(
    int $character_count = 32,
    string $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
    )
{
    $alphabet_character_count = strlen( $alphabet );
    $random_text = '';

    for( $random_character_index = 0;
         $random_character_index < 32;
         ++$random_character_index )
    {
        $random_text .= substr( $alphabet, mt_rand( 0, $alphabet_character_count - 1 ), 1 );
    }

    return $random_text;
}

// ~~

function GetLowerCaseText(
    string $text
    )
{
    return strtolower( $text );
}

// ~~

function GetUpperCaseText(
    string $text
    )
{
    return strtoupper( $text );
}

// ~~

function GetCapitalCaseText(
    string $text
    )
{
    if ( strlen( $text ) <= 1 )
    {
        return strtoupper( $text );
    }
    else
    {
        return strtoupper( $text[ 0 ] ) . strtolower( substr( $text, 1 ) );
    }
}

// ~~

function GetCapitalizedCaseText(
    string $text
    )
{
    $word_array = explode( ' ', $text );

    for ( $word_index = 0;
          $word_index < count( $word_array );
          ++$word_index )
    {
        $word_array[ $word_index ] = GetCapitalCaseText( $word_array[ $word_index ] );
    }

    return implode( ' ', $word_array );
}

// ~~

function GetAlphanumericText(
    string $text,
    string $kept_characters = '',
    string $replaced_characters = '',
    string $replacement_character = ''
    )
{
    $alphanumeric_text = '';

    foreach ( str_split( $text ) as $character )
    {
        if ( ( $character >= '0' && $character <= '9' )
             || ( $character >= 'a' && $character <= 'z' )
             || ( $character >= 'A' && $character <= 'Z' )
             || strpos( $kept_characters, $character ) !== false )
        {
            $alphanumeric_text .= $character;
        }
        else if ( $replacement_character !== ''
                  && ( $replaced_characters === ''
                       || strpos( $replaced_characters, $character ) !== false ) )
        {
            $alphanumeric_text .= $replacement_character;
        }
    }

    return $alphanumeric_text;
}

// ~~

function GetUnaccentuatedText(
    string $text
    )
{
    return
        str_replace(
            [
                'á', 'à', 'â', 'ã', 'ª', 'ä', 'å', 'Á', 'À', 'Â', 'Ã', 'Ä',
                'é', 'è', 'ê', 'ë', 'É', 'È', 'Ê', 'Ë',
                'í', 'ì', 'î', 'ï', 'Í', 'Ì', 'Î', 'Ï',
                'œ', 'ò', 'ó', 'ô', 'õ', 'ø', 'Ø', 'Ó', 'Ò', 'Ô', 'Õ',
                'ú', 'ù', 'û', 'Ú', 'Ù', 'Û',
                'ç', 'Ç', 'Ñ', 'ñ'
            ],
            [
                'a', 'a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A',
                'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E',
                'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I',
                'oe', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O',
                'u', 'u', 'u', 'U', 'U', 'U',
                'c', 'C', 'N', 'n'
            ],
            $text
            );
}

// ~~

function GetSlugText(
    string $text
    )
{
    return ReplaceTexts( GetAlphanumericText( GetLowerCaseText( GetUnaccentuatedText( $text ) ), '', '', '-' ), '--', '-' );
}

// ~~

function GetTitleCaseText(
    string $text,
    bool $prior_character_is_letter = false,
    bool $separator_characters_are_kept = true
    )
{
    $title_case_text = '';

    foreach ( str_split( $text ) as $character )
    {
        $lower_case_character = strtolower( $character );
        $upper_case_character = strtoupper( $character );

        if ( $lower_case_character !== $upper_case_character )
        {
            if ( $prior_character_is_letter )
            {
                $title_case_text .= $lower_case_character;
            }
            else
            {
                $title_case_text .= $upper_case_character;
            }

            $prior_character_is_letter = true;
        }
        else
        {
            if ( ( $character >= '0'
                   && $character <= '9' )
                 || $separator_characters_are_kept )
            {
                $title_case_text .= $character;
            }

            $prior_character_is_letter = false;
        }
    }

    return $title_case_text;
}

// ~~

function GetPascalCaseText(
    string $text,
    bool $prior_character_is_letter = false
    )
{
    return GetTitleCaseText( $text, false, false );
}

// ~~

function GetCamelCaseText(
    string $text
    )
{
    return GetTitleCaseText( $text, true, false );
}

// ~~

function GetSnakeCaseText(
    string $text,
    string $separator_character = '_'
    )
{
    $character_array = [];
    $character_is_lower_case_array = [];
    $character_is_upper_case_array = [];
    $character_is_digit_array = [];

    foreach ( str_split( str_replace( '-', '_', $text ) ) as $character )
    {
        array_push( $character_array, $character );

        $lower_case_character = strtolower( $character );
        $upper_case_character = strtoupper( $character );

        if ( $lower_case_character !== $upper_case_character )
        {
            array_push( $character_is_lower_case_array, $character === $lower_case_character );
            array_push( $character_is_upper_case_array, $character === $upper_case_character );
        }
        else
        {
            array_push( $character_is_lower_case_array, false );
            array_push( $character_is_upper_case_array, false );
        }

        array_push( $character_is_digit_array, $character >= '0' && $character <= '9' );
    }

    $character_count = strlen( $character_array );
    $snake_case_text = '';
    $prior_character_is_lower_case = false;
    $prior_character_is_upper_case = false;
    $prior_character_is_digit = false;

    for ( $character_index = 0;
          $character_index < $character_count;
          ++$character_index )
    {
        $character = $character_array[ $character_index ];
        $character_is_lower_case = $character_is_lower_case_array[ $character_index ];
        $character_is_upper_case = $character_is_upper_case_array[ $character_index ];
        $character_is_digit = $character_is_digit_array[ $character_index ];

        if ( $character_index + 1 < $character_count )
        {
            $next_character_is_lower_case = $character_is_lower_case_array[ $character_index + 1 ];
        }
        else
        {
            $next_character_is_lower_case = false;
        }

        if ( ( $prior_character_is_lower_case
               && ( $character_is_upper_case
                    || $character_is_digit ) )
             || ( $prior_character_is_digit
                  && ( $character_is_lower_case
                       || $character_is_upper_case ) )
             || ( $prior_character_is_upper_case
                  && $character_is_upper_case
                  && $next_character_is_lower_case ) )
        {
            $snake_case_text .= $separator_character;
        }

        $snake_case_text .= $character;

        $prior_character_is_lower_case = $character_is_lower_case;
        $prior_character_is_upper_case = $character_is_upper_case;
        $prior_character_is_digit = $character_is_digit;
    }

    return strtolower( $snake_case_text );
}

// ~~

function GetKebabCaseText(
    string $text
    )
{
    return GetSnakeCaseText( $text, '-' );
}

// ~~

function GetPartialText(
    string $text,
    int $maximum_character_count,
    string $ellipsis = '...',
    string $trimmed_characters = ' '
    )
{
    $text_character_count = strlen( $text );

    if ( $text_character_count <= $maximum_character_count )
    {
        return $text;
    }
    else
    {
        return
            rtrim( substr( $text, 0, $maximum_character_count - strlen( $ellipsis ) ), $trimmed_characters )
            . $ellipsis;
    }
}

// ~~

function GetShortenedText(
    string $text,
    int $maximum_character_count,
    string $ellipsis = '...',
    string $trimmed_characters = ' '
    )
{
    $text_character_count = strlen( $text );

    if ( $text_character_count <= $maximum_character_count )
    {
        return $text;
    }
    else
    {
        $ellipsis_character_count = strlen( $ellipsis );
        $first_character_count = ( int )( ( $maximum_character_count - $ellipsis_character_count ) / 2 );
        $last_character_count = $maximum_character_count - $first_character_count - $ellipsis_character_count;

        return
            rtrim( substr( $text, 0, $first_character_count ), $trimmed_characters )
            . $ellipsis
            . ltrim( substr( $text, $text_character_count - $last_character_count, $last_character_count ), $trimmed_characters );
    }
}

// ~~

function GetIncrementedText(
    string $prefix = '',
    string $suffix = ''
    )
{
    static 
        $counter = 0;

    ++$counter;

    return $prefix . $counter . $suffix;
}

// ~~

function GetBareText(
    string $text
    )
{
    return preg_replace( '/<.*?>?>/', '', $text );
}

// ~~

function GetImageText(
    string $image_path,
    array $ignored_folder_path_array = [ '/static/image/base/', '/static/image/', '/upload/image/' ]
    )
{
    return
        trim(
            preg_replace(
                '/\s+/',
                ' ',
                preg_replace(
                    '/[^\p{L}]+/u',
                    ' ',
                    str_replace(
                        $ignored_folder_path_array,
                        '/',
                        preg_replace(
                            '/\.[A-Za-z0-9]+$/i',
                            '',
                            $image_path
                            )
                        )
                    )
                )
            )
        . ' image';
}

// ~~

function DefineText(
    string $slug,
    string $text
    )
{
    global
        $TextBySlugMap;

    $TextBySlugMap[ $slug ] = $text;
}

// ~~

function GetTextBySlug(
    string $slug
    )
{
    global
        $TextBySlugMap;

    if ( array_key_exists( $slug, $TextBySlugMap ) )
    {
        return $TextBySlugMap[ $slug ];
    }
    else
    {
        return $slug;
    }
}

// ~~

function DefineTag(
    string $tag,
    string $tag_definition
    )
{
    global
        $ProcessedTagArray,
        $ProcessedTagDefinitionArray;

    array_push( $ProcessedTagArray, $tag );
    array_push( $ProcessedTagDefinitionArray, $tag_definition );
}

// ~~

function DefineColorTag(
    string $tag_name,
    string $color_value = ''
    )
{
    if ( $color_value === '' )
    {
        DefineTag( '<' . $tag_name . '>', '<span class="color-' . $tag_name . '">' );
    }
    else
    {
        DefineTag( '<' . $tag_name . '>', '<span style="color:' . $color_value . '">' );
    }

    DefineTag( '</' . $tag_name . '>', '</span>' );
}

// ~~

function DefineEndTag(
    )
{
    global
        $EndTagIsDefined;

    if ( !$EndTagIsDefined )
    {
        DefineTag( '>>', '">' );
        $EndTagIsDefined = true;
    }
}

// ~~

function DefineOpenTag(
    string $tag_name
    )
{
    DefineTag( '<' . $tag_name . '<', '<' . $tag_name . ' class="' );
    DefineEndTag();
}

// ~~

function DefineAttributeTag(
    string $tag_name,
    string $attribute_name = ''
    )
{
    if ( $attribute_name === '' )
    {
        DefineTag( '[' . $tag_name . ']', '" ' . $tag_name . '="' );
    }
    else
    {
        DefineTag( '[' . $tag_name . ']', '" ' . $attribute_name . '="' );
    }
}

// ~~

function DefineStyleTag(
    string $tag_name,
    string $style_name = ''
    )
{
    if ( $style_name === '' )
    {
        DefineTag( '<' . $tag_name . '<', '<span style="' . $tag_name . ':' );
    }
    else
    {
        DefineTag( '<' . $tag_name . '<', '<span style="' . $style_name . ':' );
    }

    DefineEndTag();
    DefineTag( '</' . $tag_name . '>', '</span>' );
}

// ~~

function DefineDualTag(
    string $dual_tag,
    string $dual_tag_opening_definition,
    string $dual_tag_closing_definition
    )
{
    global
        $ProcessedDualTagArray,
        $ProcessedDualTagDefinitionArray;

    array_push( $ProcessedDualTagArray, $dual_tag );
    array_push( $ProcessedDualTagDefinitionArray, $dual_tag_opening_definition );
    array_push( $ProcessedDualTagDefinitionArray, $dual_tag_closing_definition );
}

// ~~

function GetProcessedText(
    string $text
    )
{
    global
        $ProcessedDualTagArray,
        $ProcessedDualTagDefinitionArray,
        $ProcessedTagArray,
        $ProcessedTagDefinitionArray;

    $processed_dual_tag_count = count( $ProcessedDualTagArray );

    if ( $processed_dual_tag_count > 0 )
    {
        for ( $processed_dual_tag_index = 0;
              $processed_dual_tag_index < $processed_dual_tag_count;
              ++$processed_dual_tag_index )
        {
            $text
                = ReplaceDualText(
                      $text,
                      $ProcessedDualTagArray[ $processed_dual_tag_index ],
                      $ProcessedDualTagDefinitionArray[ $processed_dual_tag_index * 2 ],
                      $ProcessedDualTagDefinitionArray[ $processed_dual_tag_index * 2 + 1 ]
                      );
        }
    }

    return str_replace( $ProcessedTagArray, $ProcessedTagDefinitionArray, $text );
}

// ~~

function DefineLineTag(
    string $line_tag,
    string $line_tag_opening_definition,
    string $line_tag_inner_definition,
    string $line_tag_closing_definition = ''
    )
{
    global
        $ProcessedLineTagArray,
        $ProcessedLineTagDefinitionArray;

    if ( $line_tag_closing_definition === '' )
    {
        $line_tag_closing_definition = $line_tag_inner_definition;
        $line_tag_inner_definition = '';
    }

    array_push( $ProcessedLineTagArray, $line_tag );
    array_push( $ProcessedLineTagDefinitionArray, $line_tag_opening_definition );
    array_push( $ProcessedLineTagDefinitionArray, $line_tag_inner_definition );
    array_push( $ProcessedLineTagDefinitionArray, $line_tag_closing_definition );
}

// ~~

function GetProcessedMultilineText(
    string $text
    )
{
    global
        $ProcessedLineTagArray,
        $ProcessedLineTagDefinitionArray;

    $processed_line_tag_count = count( $ProcessedLineTagArray );

    if ( $processed_line_tag_count > 0 )
    {
        $line_array = explode( "\n", str_replace( "\r", '', $text ) );
        $line_count = count( $line_array );

        for ( $line_index = 0;
              $line_index < $line_count;
              ++$line_index )
        {
            $line = ltrim( $line_array[ $line_index ], "\n" );

            for ( $processed_line_tag_index = 0;
                  $processed_line_tag_index < $processed_line_tag_count;
                  ++$processed_line_tag_index )
            {
                $processed_line_tag = $ProcessedLineTagArray[ $processed_line_tag_index ];
                $processed_line_tag_character_count = strlen( $processed_line_tag );

                if ( strncmp( $line, $processed_line_tag, $processed_line_tag_character_count ) === 0 )
                {
                    $line_tag_definition_index = $processed_line_tag_index * 3;
                    $line_tag_opening_definition = $ProcessedLineTagDefinitionArray[ $line_tag_definition_index ];
                    $line_tag_inner_definition = $ProcessedLineTagDefinitionArray[ $line_tag_definition_index + 1 ];
                    $line_tag_closing_definition = $ProcessedLineTagDefinitionArray[ $line_tag_definition_index + 2 ];

                    if ( $line_tag_inner_definition === '' )
                    {
                        $line_array[ $line_index ]
                            = $line_tag_opening_definition
                              . substr( $line, $processed_line_tag_character_count )
                              . $line_tag_closing_definition;
                    }
                    else
                    {
                        $space_character_index = strpos( $line, ' ', $processed_line_tag_character_count );

                        if ( $space_character_index !== false )
                        {
                            $line_array[ $line_index ]
                                = $line_tag_opening_definition
                                  . substr( $line, $processed_line_tag_character_count, $space_character_index - $processed_line_tag_character_count )
                                  . $line_tag_inner_definition
                                  . substr( $line, $space_character_index + 1 )
                                  . $line_tag_closing_definition;
                        }
                        else
                        {
                            $line_array[ $line_index ]
                                = $line_tag_opening_definition
                                  . substr( $line, $processed_line_tag_character_count )
                                  . $line_tag_inner_definition
                                  . $line_tag_closing_definition;
                        }
                    }

                    break;
                }
            }
        }

        $text = implode( "\n", $line_array );
    }

    return GetProcessedText( $text );
}

// ~~

function GetEmbeddedVideoPath(
    string $video_path
    )
{
    if ( HasPrefix( $video_path, 'https://www.youtube.com/watch?v=' ) )
    {
        return ReplaceText( $video_path, 'https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/' );
    }
    else
    {
        return '';
    }
}
