<?php // -- FUNCTIONS

function GetTuid(
    string $text
    )
{
    if ( $text === "" )
    {
        return "";
    }
    else
    {
        $hash = md5( $text, true );

        return str_replace( [ '+', '/', '=' ], [ '-', '_', '' ], base64_encode( $hash ) );
    }
}

// ~~

function GetUuid(
    string $text
    )
{
    if ( $text === "" )
    {
        return "00000000-0000-0000-0000-000000000000";
    }
    else
    {
        $hash = md5( $text );

        return
            substr( $hash, 0, 8 )
            . '-'
            . substr( $hash, 8, 4 )
            . '-'
            . substr( $hash, 12, 4 )
            . '-'
            . substr( $hash, 16, 4 )
            . '-'
            . substr( $hash, 20, 12 );
    }
}

// ~~

function GetBasilText(
    $text
    )
{
    return str_replace( [ "\\", "~", "^", "{", "}", "\n", "\r", "\t" ], [ "\\\\", "\\~", "\\{", "\\}", "\\^", "\\n", "", "\\t" ], $text );
}

// ~~

function GetBasilValueText(
    $value
    )
{
    if ( is_array( $value ) )
    {
        if ( count( $value ) === 0 )
        {
            return '{}';
        }
        else
        {
            $value_text_array = [];

            if ( array_keys( $value) !== range( 0, count( $value ) - 1 ) )
            {
                foreach ( $value as $key => $element )
                {
                    array_push( $value_text_array, '{ ' . GetBasilValueText( $key ) . ' ~ ' . GetBasilValueText( $element ) . ' }' );
                }
            }
            else
            {
                foreach ( $value as $element )
                {
                    array_push( $value_text_array, GetBasilValueText( $element ) );
                }
            }

            return '{ ' . implode( ' ~ ', $value_text_array ) . ' }';
        }
    }
    else
    {
        $value_text = GetBasilText( $value );

        $value_text = ReplacePrefix( $value_text, '#', '\\#' );
        $value_text = ReplacePrefix( $value_text, '%', '\\%' );
        $value_text = ReplacePrefix( $value_text, ' ', '^' );
        $value_text = ReplaceSuffix( $value_text, ' ', '^' );

        return $value_text;
    }
}

// ~~

function GetBasilColumnText(
    $column_value,
    $column
    )
{
    if ( ( HasPrefix( $column_value, '[' )
           && HasSuffix( $column_value, ']' )
           && ( HasSuffix( $column->Name, "Array" )
                || HasSuffix( $column->Name, "List" ) ) )
         || ( HasPrefix( $column_value, '{' )
              && HasSuffix( $column_value, '}' )
              && ( HasSuffix( $column->Name, "Map" )
                   || HasSuffix( $column->Name, "Dictionary" ) ) ) )
    {
        return GetBasilValueText( GetJsonObject( $column_value ) );
    }
    else
    {
        return GetBasilText( $column_value );
    }
}

// ~~

function GetBasilTableText(
    string $table_name,
    array &$old_id_array,
    array &$new_id_array
    )
{
    $column_array = GetDatabaseColumnArray( $table_name );
    $column_by_name_map = GetDatabaseColumnByNameMap( $column_array );

    $statement = GetDatabaseStatement( 'select * from `' . $table_name . '`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $basil_table_text = '';
    $basil_row_text_array = [];

    while ( $column_array = $statement->fetch( PDO::FETCH_ASSOC ) )
    {
        $column_name_array = array_keys( $column_array );
        $column_value_array = array_values( $column_array );
        $column_value_count = count( $column_value_array );

        if ( $basil_table_text === '' )
        {
            $basil_table_text
                = strtoupper( $table_name ) . "\n\n"
                  . '    ' . implode( ' ', $column_name_array ) . "\n\n";
        }

        $basil_row_text = '';
        $id_value = '';
        $id_value_character_count = 0;

        for ( $column_value_index = 0;
              $column_value_index < $column_value_count;
              ++$column_value_index )
        {
            if ( $basil_row_text === '' )
            {
                $basil_row_text .= '        ';
            }
            else
            {
                $basil_row_text .= '            ~ ';
            }

            $column_name = $column_name_array[ $column_value_index ];
            $column_value = $column_value_array[ $column_value_index ];

            $basil_row_text .= GetBasilColumnText( $column_value, $column_by_name_map[ $column_name ] ) . "\n";

            if ( strtolower( $table_name ) === 'text'
                 && $column_value_index === 0
                 && strtolower( $column_name ) === 'id' )
            {
                $id_value_character_count = strlen( $column_value );

                if ( $id_value_character_count === 22
                     || $id_value_character_count === 36 )
                {
                    $id_value = $column_value;
                }
                else
                {
                    $id_value_character_count = 0;
                }
            }
            else if ( $id_value_character_count !== 0
                      && ( strtolower( $column_name ) === 'slug'
                           || strtolower( $column_name ) === 'code' ) )
            {
                foreach ( [ $column_value, $column_value . '-' . str_replace( '_', '-', strtolower( $table_name ) ) ] as $slug )
                {
                    if ( $id_value_character_count === 22 )
                    {
                        $old_id = GetTuid( $slug );
                        $new_id = '%' . $slug;
                    }
                    else if ( $id_value_character_count === 36 )
                    {
                        $old_id = GetUuid( $slug );
                        $new_id = '#' . $slug;
                    }

                    if ( $old_id === $id_value )
                    {
                        array_push( $old_id_array, $old_id );
                        array_push( $new_id_array, $new_id );
                    }
                }
            }
        }

        array_push( $basil_row_text_array, $basil_row_text );
    }

    sort( $basil_row_text_array );

    $basil_table_text .= implode( "\n", $basil_row_text_array );

    return $basil_table_text;
}

// ~~

function GetBasilDatabaseText(
    array $table_name_array
    )
{
    $old_id_array = [];
    $new_id_array = [];
    $basil_database_text = '';

    foreach ( $table_name_array as $table_name )
    {
        $basil_database_text
            .= GetBasilTableText( $table_name, $old_id_array, $new_id_array ) . "\n";
    }

    return str_replace( $old_id_array, $new_id_array, $basil_database_text );
}
