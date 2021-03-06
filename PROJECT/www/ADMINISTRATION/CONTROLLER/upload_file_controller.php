<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';

// -- TYPES

class UPLOAD_FILE_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        )
    {
        parent::__construct();

        if ( HasUploadedFile( 'file' ) )
        {
             $source_file_path = GetUploadedFilePath( 'file' );
             $source_file_name = GetValidFileName( GetUploadedFileName( 'file' ) );
             $target_file_name = GetSuffixedFilePath( $source_file_name, '_' . GetCurrentDateTimeSuffix() );
             $target_file_path = GetBaseFolderPath() . 'upload/file/' . $target_file_name;

            if ( MoveUploadedFile( $source_file_path, $target_file_path ) )
            {
                SetStatus( 201 );
                SetJsonResponse( '/upload/file/' . $target_file_name );
            }
            else
            {
                SetStatus( 400 );
            }
        }
    }
}

// -- STATEMENTS

 $upload_file_controller = new UPLOAD_FILE_CONTROLLER();
