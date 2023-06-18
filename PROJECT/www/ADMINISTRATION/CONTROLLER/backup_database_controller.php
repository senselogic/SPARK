<?php // -- IMPORTS

require_once __DIR__ . '/' . '../../FRAMEWORK/basil.php';
require_once __DIR__ . '/' . '../../FRAMEWORK/sql.php';
require_once __DIR__ . '/' . 'controller.php';

// -- TYPES

class BACKUP_DATABASE_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasSessionMinimumUserRole( 'administrator' ) )
        {
            $this->Title = 'Backup database';

            AddParentRoute();

            require __DIR__ . '/' . '../VIEW/BLOCK/page_header.php';

            EchoText( '<div class="page-section form-section">' );
            EchoText( '    <div class="color-black" style="display: flex; flex-direction: column; gap: 0.5rem; width: 100%">' );
            EchoStyledLine( 'Backup in progress...', 'font-size: 1.5rem', 'color-blue', '        ' );

             $backup_folder_path = 'backup/';
            CreateFolder( $backup_folder_path );

            if ( FolderExists( $backup_folder_path ) )
            {
                 $table_name_array = GetDatabaseTableNameArray();

                foreach ( $table_name_array as  $table_name )
                {
                    EchoLine( 'Reading database table : ' . $table_name );
                }

                 $file_path
                    = $backup_folder_path
                      . 'database_backup_'
                      . GetCurrentDateTimeSuffix()
                      . '_'
                      . GetRandomText( 32 );

                 $sql_file_path = $file_path . '.sql';
                 $sql_file_text = GetSqlDatabaseText( $table_name_array );
                EchoLine( 'Writing SQL file : <a class="color-blue" href="/' . $sql_file_path . '" download>' . $sql_file_path . '</a>' );
                WriteTextFile( $sql_file_path, $sql_file_text );

                 $basil_file_path = $file_path . '.bd';
                 $basil_file_text = GetBasilDatabaseText( $table_name_array );
                EchoLine( 'Writing Basil file : <a class="color-blue" href="/' . $basil_file_path . '" download>' . $basil_file_path . '</a>' );
                WriteTextFile( $basil_file_path, $basil_file_text );

                EchoStyledLine( 'Backup completed.', 'font-size: 1.5rem', 'color-blue', '        ' );
            }
            else
            {
                EchoStyledLine( 'Backup failed.', 'font-size: 1.5rem', 'color-blue', '        ' );
            }

            EchoText( '    </div>' );
            EchoText( '<div>' );

            require __DIR__ . '/' . '../VIEW/BLOCK/page_footer.php';
        }
    }
}

// -- STATEMENTS

ShowErrors();

 $backup_database_controller = new BACKUP_DATABASE_CONTROLLER(  $language_code );
