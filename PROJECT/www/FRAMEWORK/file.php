<?php // -- FUNCTIONS

function FolderExists(
    string $folder_path
    )
{
    return is_dir( $folder_path );
}

// ~~

function FileExists(
    string $file_path
    )
{
    return file_exists( $file_path );
}

// ~~

function CreateFolder(
    string $folder_path
    )
{
    if ( !file_exists( $folder_path ) )
    {
        return mkdir( $folder_path, 0777, true );
    }
    else
    {
        return false;
    }
}

// ~~

function MoveFile(
    string $old_file_path,
    string $new_file_path
    )
{
    return rename( $old_file_path, $new_file_path );
}

// ~~

function CopyFile(
    string $old_file_path,
    string $new_file_path
    )
{
    return copy( $old_file_path, $new_file_path );
}

// ~~

function RemoveFile(
    string $file_path
    )
{
    return unlink( $file_path );
}

// ~~

function WriteTextFile(
    string $file_path,
    string $file_text
    )
{
    return file_put_contents( $file_path, $file_text );
}

// ~~

function DownloadFile(
    string $file_url,
    string $file_path
    )
{
    $curl_request = curl_init( $file_url );
    curl_setopt( $curl_request, CURLOPT_HEADER, 0 );
    curl_setopt( $curl_request, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $curl_request, CURLOPT_BINARYTRANSFER, 1 );
    $file_content = curl_exec( $curl_request );
    curl_close( $curl_request );

    $file_ = fopen( $file_path, 'w' );
    fwrite( $file_, $file_content );
    fclose( $file_ );
}

// ~~

function GetFileText(
    string $file_path
    )
{
    return file_get_contents( $file_path );
}

// ~~

function SetFileText(
    string $file_path,
    string $file_text
    )
{
    return file_put_contents( $file_path, $file_text );
}

// ~~

function HasUploadedFile(
    string $name
    )
{
    return
        count( $_FILES ) > 0
        && isset( $_FILES[ $name ] );
}

// ~~

function GetUploadedFilePath(
    string $name
    )
{
    return $_FILES[ $name ][ 'tmp_name' ];
}

// ~~

function GetUploadedFileName(
    string $name
    )
{
    return $_FILES[ $name ][ 'name' ];
}

// ~~

function GetUploadedFileByteCount(
    string $name
    )
{
    return $_FILES[ $name ][ 'size' ];
}

// ~~

function MoveUploadedFile(
    string $source_file_path,
    string $target_file_path
    )
{
    return move_uploaded_file( $source_file_path, $target_file_path);
}
