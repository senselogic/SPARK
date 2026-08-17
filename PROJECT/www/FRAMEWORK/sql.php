<?php // -- FUNCTIONS

function GetSqlText(
    $text
    )
{
    return
        '"'
        . str_replace( [ "\\", "\n", "\r", "\t", "\"", "\'" ], [ "\\\\", "\\n", "\\r", "\\t", "\\\"", "\\'" ], $text )
        . '"';
}

// ~~

function GetSqlTableText(
    string $table_name
    )
{
    $column_array = GetDatabaseColumnArray( $table_name );
    $column_by_name_map = GetDatabaseColumnByNameMap( $column_array );

    $sql_table_text
        = 'drop table if exists `' . DatabaseName . '`.`' . strtoupper( $table_name ) . "`;\n\n"
          . 'create table if not exists `' . DatabaseName . '`.`' . strtoupper( $table_name ) . "`(\n";

    $primary_key_column_name_array = [];

    foreach ( $column_array as $column )
    {
        $sql_table_text
            .= '    `' . $column->Name . '` ' . $column->Type . ( $column->IsNullable ? '' : ' not' ) . " null,\n";

        if ( $column->IsPrimaryKey )
        {
            array_push( $primary_key_column_name_array, '`' . $column->Name . '`' );
        }
    }

    $sql_table_text
        .= '    primary key (' . implode( ', ', $primary_key_column_name_array ) . ")\n"
            . "    ) engine = InnoDB;\n\n";

    $statement = GetDatabaseStatement( 'select * from `' . $table_name . '`' );

    if ( !$statement->execute() )
    {
        var_dump( $statement->errorInfo() );
    }

    $sql_row_text_array = [];

    while ( $column_array = $statement->fetch( PDO::FETCH_ASSOC ) )
    {
        $column_name_array = array_keys( $column_array );
        $column_value_array = array_values( $column_array );
        $column_value_count = count( $column_value_array );

        $sql_row_text
            = 'replace into `' . DatabaseName . '`.`' . strtoupper( $table_name ) . "`\n"
              . "    (\n"
              . "        `" . implode( '`, `', $column_name_array ) . "`\n"
              . "    )\n"
              . "    values\n"
              . "    (\n";

        for ( $column_value_index = 0;
              $column_value_index < $column_value_count;
              ++$column_value_index )
        {
            $sql_row_text
                .= '        ' . GetSqlText( $column_value_array[ $column_value_index ] );

            if ( $column_value_index + 1 < $column_value_count )
            {
                $sql_row_text .= ",\n";
            }
            else
            {
                $sql_row_text .= "\n";
            }
        }

        $sql_row_text .= "    );\n";

        array_push( $sql_row_text_array, $sql_row_text );
    }

    sort( $sql_row_text_array );
    $sql_table_text .= implode( "\n", $sql_row_text_array );

    return $sql_table_text;
}

// ~~

function GetSqlDatabaseText(
    array $table_name_array
    )
{
    $sql_database_text = '';

    foreach ( $table_name_array as $table_name )
    {
        $sql_database_text
            .= GetSqlTableText( $table_name ) . "\n";
    }

    return $sql_database_text;
}

// ~~

function GetSqlCommandArray(
    string $text
    )
{
    return explode( ";\n", preg_replace( "/;\s*\n/", ";\n", str_replace( "\r", "", $text ) ) . "\n" );
}
