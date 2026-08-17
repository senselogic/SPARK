<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../../FRAMEWORK/image.php';

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
            $source_file_extension = GetFileExtension( $source_file_name );

            $media_file_name = GetValidFileName( GetSuffixedFilePath( $source_file_name, '_' . GetCurrentDateTimeSuffix() ) );

            if ( $source_file_extension === '.jpg'
                 || $source_file_extension === '.JPG'
                 || $source_file_extension === '.jpeg'
                 || $source_file_extension === '.JPEG' )
            {
                $media_file_name = ReplaceSuffix( $media_file_name, $source_file_extension, '.jpg' );
            }
            else if ( $source_file_extension === '.png'
                      || $source_file_extension === '.PNG' )
            {
                $media_file_name = ReplaceSuffix( $media_file_name, $source_file_extension, '.png' );
            }

            $media_folder_path = GetBaseFolderName() . '/media/image/';
            $media_file_path = $media_folder_path . $media_file_name;

            $target_file_name = $media_file_name;
            $target_file_extension = GetFileExtension( $target_file_name );

            if ( $target_file_extension === '.avif' )
            {
                $target_file_name = ReplaceSuffix( $target_file_name, $target_file_extension, AlphaImageExtension );
            }
            else if ( $target_file_extension === '.jpg' )
            {
                $target_file_name = ReplaceSuffix( $target_file_name, $target_file_extension, ImageExtension );
            }
            else if ( $target_file_extension === '.png' )
            {
                $target_file_name = ReplaceSuffix( $target_file_name, $target_file_extension, AlphaImageExtension );
            }
            else if ( $target_file_extension === '.webp' )
            {
                $target_file_name = ReplaceSuffix( $target_file_name, $target_file_extension, AlphaImageExtension );
            }

            CreateFolder( $media_folder_path );

            if ( MoveUploadedFile( $source_file_path, $media_file_path ) )
            {
                $target_folder_path = GetBaseFolderName() . '/upload/image/';
                $target_file_path = $target_folder_path . $target_file_name;

                CreateFolder( $target_folder_path );

                if ( HasSuffix( $target_file_path, '.avif' ) )
                {
                    $image = ReadImage( $media_file_path );

                    EnableImageTransparency( $image );

                    $target_image_has_alpha = !IsOpaqueImage( $image );

                    $preload_image = CreateCappedImage( $image, 360, 720, $target_image_has_alpha );
                    WriteAvifImage( $preload_image, $target_file_path . '.preload.avif', 30 );
                    ReleaseImage( $preload_image );

                    $tiny_image = CreateCappedImage( $image, 480, 960, $target_image_has_alpha );
                    WriteAvifImage( $tiny_image, $target_file_path . '.tiny.avif', 60 );
                    ReleaseImage( $tiny_image );

                    $small_image = CreateCappedImage( $image, 640, 1280, $target_image_has_alpha );
                    WriteAvifImage( $small_image, $target_file_path . '.small.avif', 60 );
                    ReleaseImage( $small_image );

                    $medium_image = CreateCappedImage( $image, 960, 1920, $target_image_has_alpha );
                    WriteAvifImage( $medium_image, $target_file_path . '.medium.avif', 60 );
                    ReleaseImage( $medium_image );

                    $wide_image = CreateCappedImage( $image, 1280, 2560, $target_image_has_alpha );
                    WriteAvifImage( $wide_image, $target_file_path . '.wide.avif', 60 );
                    ReleaseImage( $wide_image );

                    $large_image = CreateCappedImage( $image, 1920, 1920, $target_image_has_alpha );
                    WriteAvifImage( $large_image, $target_file_path, 60 );
                    ReleaseImage( $large_image );

                    $big_image = CreateCappedImage( $image, 2560, 2560, $target_image_has_alpha );
                    WriteAvifImage( $big_image, $target_file_path . '.big.avif', 60 );
                    ReleaseImage( $big_image );

                    $huge_image = CreateCappedImage( $image, 3840, 3840, $target_image_has_alpha );
                    WriteAvifImage( $huge_image, $target_file_path . '.huge.avif', 60 );
                    ReleaseImage( $huge_image );

                    $meta_image = CreateCoveredImage( $image, 1200, 630, $target_image_has_alpha );
                    WriteJpegImage( $meta_image, $target_file_path . '.meta.jpg', 85 );
                    ReleaseImage( $meta_image );

                    ReleaseImage( $image );
                }
                else if ( HasSuffix( $target_file_path, '.jpg' ) )
                {
                    $image = ReadImage( $media_file_path );

                    $preload_image = CreateCappedImage( $image, 360, 720 );
                    WriteJpegImage( $preload_image, $target_file_path . '.preload.jpg', 50 );
                    ReleaseImage( $preload_image );

                    $tiny_image = CreateCappedImage( $image, 480, 960 );
                    WriteJpegImage( $tiny_image, $target_file_path . '.tiny.jpg', 70 );
                    ReleaseImage( $tiny_image );

                    $small_image = CreateCappedImage( $image, 640, 1280 );
                    WriteJpegImage( $small_image, $target_file_path . '.small.jpg', 70 );
                    ReleaseImage( $small_image );

                    $medium_image = CreateCappedImage( $image, 960, 1920 );
                    WriteJpegImage( $medium_image, $target_file_path . '.medium.jpg', 70 );
                    ReleaseImage( $medium_image );

                    $wide_image = CreateCappedImage( $image, 1280, 2560 );
                    WriteJpegImage( $wide_image, $target_file_path . '.wide.jpg', 70 );
                    ReleaseImage( $wide_image );

                    $large_image = CreateCappedImage( $image, 1920, 1920 );
                    WriteJpegImage( $large_image, $target_file_path, 70 );
                    ReleaseImage( $large_image );

                    $big_image = CreateCappedImage( $image, 2560, 2560 );
                    WriteJpegImage( $big_image, $target_file_path . '.big.jpg', 70 );
                    ReleaseImage( $big_image );

                    $huge_image = CreateCappedImage( $image, 3840, 3840 );
                    WriteJpegImage( $huge_image, $target_file_path . '.huge.jpg', 70 );
                    ReleaseImage( $huge_image );

                    $meta_image = CreateCoveredImage( $image, 1200, 630 );
                    WriteJpegImage( $meta_image, $target_file_path . '.meta.jpg', 85 );
                    ReleaseImage( $meta_image );

                    ReleaseImage( $image );
                }
                else if ( HasSuffix( $target_file_path, '.png' ) )
                {
                    $image = ReadImage( $media_file_path );

                    EnableImageTransparency( $image );

                    if ( IsOpaqueImage( $image ) )
                    {
                        $target_file_name = ReplaceSuffix( $target_file_name, '.png', '.jpg' );
                        $target_file_path = ReplaceSuffix( $target_file_path, '.png', '.jpg' );

                        $preload_image = CreateCappedImage( $image, 360, 720 );
                        WriteJpegImage( $preload_image, $target_file_path . '.preload.jpg', 50 );
                        ReleaseImage( $preload_image );

                        $tiny_image = CreateCappedImage( $image, 480, 960 );
                        WriteJpegImage( $tiny_image, $target_file_path . '.tiny.jpg', 70 );
                        ReleaseImage( $tiny_image );

                        $small_image = CreateCappedImage( $image, 640, 1280 );
                        WriteJpegImage( $small_image, $target_file_path . '.small.jpg', 70 );
                        ReleaseImage( $small_image );

                        $medium_image = CreateCappedImage( $image, 960, 1920 );
                        WriteJpegImage( $medium_image, $target_file_path . '.medium.jpg', 70 );
                        ReleaseImage( $medium_image );

                        $wide_image = CreateCappedImage( $image, 1280, 2560 );
                        WriteJpegImage( $wide_image, $target_file_path . '.wide.jpg', 70 );
                        ReleaseImage( $wide_image );

                        $large_image = CreateCappedImage( $image, 1920, 1920 );
                        WriteJpegImage( $large_image, $target_file_path, 70 );
                        ReleaseImage( $large_image );

                        $big_image = CreateCappedImage( $image, 2560, 2560 );
                        WriteJpegImage( $big_image, $target_file_path . '.big.jpg', 70 );
                        ReleaseImage( $big_image );

                        $huge_image = CreateCappedImage( $image, 3840, 3840 );
                        WriteJpegImage( $huge_image, $target_file_path . '.huge.jpg', 70 );
                        ReleaseImage( $huge_image );
                    }
                    else
                    {
                        $preload_image = CreateCappedImage( $image, 360, 720, true );
                        WritePngImage( $preload_image, $target_file_path . '.preload.png' );
                        ReleaseImage( $preload_image );

                        $tiny_image = CreateCappedImage( $image, 480, 960, true );
                        WritePngImage( $tiny_image, $target_file_path . '.tiny.png' );
                        ReleaseImage( $tiny_image );

                        $small_image = CreateCappedImage( $image, 640, 1280, true );
                        WritePngImage( $small_image, $target_file_path . '.small.png' );
                        ReleaseImage( $small_image );

                        $medium_image = CreateCappedImage( $image, 960, 1920, true );
                        WritePngImage( $medium_image, $target_file_path . '.medium.png' );
                        ReleaseImage( $medium_image );

                        $wide_image = CreateCappedImage( $image, 1280, 2560, true );
                        WritePngImage( $wide_image, $target_file_path . '.wide.png' );
                        ReleaseImage( $wide_image );

                        $large_image = CreateCappedImage( $image, 1920, 1920, true );
                        WritePngImage( $large_image, $target_file_path );
                        ReleaseImage( $large_image );

                        $big_image = CreateCappedImage( $image, 2560, 2560, true );
                        WritePngImage( $big_image, $target_file_path . '.big.png' );
                        ReleaseImage( $big_image );

                        $huge_image = CreateCappedImage( $image, 3840, 3840, true );
                        WritePngImage( $huge_image, $target_file_path . '.huge.png' );
                        ReleaseImage( $huge_image );
                    }

                    $meta_image = CreateCoveredImage( $image, 1200, 630 );
                    WriteJpegImage( $meta_image, $target_file_path . '.meta.jpg', 85 );
                    ReleaseImage( $meta_image );

                    ReleaseImage( $image );
                }
                else if ( HasSuffix( $target_file_path, '.webp' ) )
                {
                    $image = ReadImage( $media_file_path );

                    EnableImageTransparency( $image );

                    $target_image_has_alpha = !IsOpaqueImage( $image );

                    $preload_image = CreateCappedImage( $image, 360, 720, $target_image_has_alpha );
                    WriteWebpImage( $preload_image, $target_file_path . '.preload.webp', 50 );
                    ReleaseImage( $preload_image );

                    $tiny_image = CreateCappedImage( $image, 480, 960, $target_image_has_alpha );
                    WriteWebpImage( $tiny_image, $target_file_path . '.tiny.webp', 70 );
                    ReleaseImage( $tiny_image );

                    $small_image = CreateCappedImage( $image, 640, 1280, $target_image_has_alpha );
                    WriteWebpImage( $small_image, $target_file_path . '.small.webp', 70 );
                    ReleaseImage( $small_image );

                    $medium_image = CreateCappedImage( $image, 960, 1920, $target_image_has_alpha );
                    WriteWebpImage( $medium_image, $target_file_path . '.medium.webp', 70 );
                    ReleaseImage( $medium_image );

                    $wide_image = CreateCappedImage( $image, 1280, 2560, $target_image_has_alpha );
                    WriteWebpImage( $wide_image, $target_file_path . '.wide.webp', 70 );
                    ReleaseImage( $wide_image );

                    $large_image = CreateCappedImage( $image, 1920, 1920, $target_image_has_alpha );
                    WriteWebpImage( $large_image, $target_file_path, 70 );
                    ReleaseImage( $large_image );

                    $big_image = CreateCappedImage( $image, 2560, 2560, $target_image_has_alpha );
                    WriteWebpImage( $big_image, $target_file_path . '.big.webp', 70 );
                    ReleaseImage( $big_image );

                    $huge_image = CreateCappedImage( $image, 3840, 3840, $target_image_has_alpha );
                    WriteWebpImage( $huge_image, $target_file_path . '.huge.webp', 70 );
                    ReleaseImage( $huge_image );

                    $meta_image = CreateCoveredImage( $image, 1200, 630, $target_image_has_alpha );
                    WriteJpegImage( $meta_image, $target_file_path . '.meta.jpg', 85 );
                    ReleaseImage( $meta_image );

                    ReleaseImage( $image );
                }
                else
                {
                    MoveFile( $media_file_path, $target_file_path );
                }

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

$upload_image_controller = new UPLOAD_IMAGE_CONTROLLER( $language_code );
