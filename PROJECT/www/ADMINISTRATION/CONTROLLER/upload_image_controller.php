<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';

// -- TYPES

class UPLOAD_IMAGE_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasUploadedFile( 'File' ) )
        {
             $source_file_path = GetUploadedFilePath( 'File' );
             $source_file_name = GetValidFileName( GetUploadedFileName( 'File' ));
             $target_file_name = GetSuffixedFilePath( $source_file_name, '_' . GetCurrentDateTimeSuffix() );
             $target_file_path = GetBaseFolderName() . '/upload/image/' . $target_file_name;

            if ( MoveUploadedFile( $source_file_path, $target_file_path ) )
            {
                SetStatus( 201 );
                SetJsonResponse( '/upload/image/' . $target_file_name );
            }
            else
            {
                SetStatus( 400 );
            }
        }
    }
}

// -- STATEMENTS

 $upload_image_controller = new UPLOAD_IMAGE_CONTROLLER(  $language_code );
