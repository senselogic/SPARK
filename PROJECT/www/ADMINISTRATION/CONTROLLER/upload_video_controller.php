<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';

// -- TYPES

class UPLOAD_VIDEO_CONTROLLER extends CONTROLLER
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
             $target_file_path = GetBaseFolderPath() . 'upload/video/' . $target_file_name;

            if ( MoveUploadedFile( $source_file_path, $target_file_path ) )
            {
                SetStatus( 201 );
                SetJsonResponse( '/upload/video/' . $target_file_name );
            }
            else
            {
                SetStatus( 400 );
            }
        }
    }
}

// -- STATEMENTS

 $upload_video_controller = new UPLOAD_VIDEO_CONTROLLER();
