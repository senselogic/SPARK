<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';

// -- TYPES

class DELETE_FILE_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        $file_path = GetBaseFolderName() . GetPostValue( 'FilePath' );

        if ( FileExists( $file_path )
             && RemoveFile( $file_path ) )
        {
            if ( HasSuffix( $file_path, ImageExtension ) )
            {
                foreach ( [ HugeImageExtension, BigImageExtension, LargeImageExtension, WideImageExtension, MediumImageExtension, SmallImageExtension, TinyImageExtension, PreloadImageExtension, '.meta.jpg' ] as $suffix )
                {
                    if ( FileExists( $file_path . $suffix ) )
                    {
                        RemoveFile( $file_path . $suffix );
                    }
                }
            }
            else if ( HasSuffix( $file_path, AlphaImageExtension ) )
            {
                foreach ( [ HugeAlphaImageExtension, BigAlphaImageExtension, LargeAlphaImageExtension, WideAlphaImageExtension, MediumAlphaImageExtension, SmallAlphaImageExtension, TinyAlphaImageExtension, PreloadAlphaImageExtension, '.meta.jpg' ] as $suffix )
                {
                    if ( FileExists( $file_path . $suffix ) )
                    {
                        RemoveFile( $file_path . $suffix );
                    }
                }
            }
            else if ( HasSuffix( $file_path, '.mp4' ) )
            {
                foreach ( [ '.small.mp4', '.wide.mp4' ] as $suffix )
                {
                    if ( FileExists( $file_path . $suffix ) )
                    {
                        RemoveFile( $file_path . $suffix );
                    }
                }
            }

            SetStatus( 201 );
            SetJsonResponse( $file_path );
        }
        else
        {
            SetStatus( 400 );
            SetJsonResponse( $file_path );
        }
    }
}

// -- STATEMENTS

$delete_file_controller = new DELETE_FILE_CONTROLLER( $language_code );
