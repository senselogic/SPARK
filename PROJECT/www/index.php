<?php // -- IMPORTS

require_once __DIR__ . '/' . 'FRAMEWORK/error.php';
require_once __DIR__ . '/' . 'FRAMEWORK/base.php';
require_once __DIR__ . '/' . 'FRAMEWORK/global.php';
require_once __DIR__ . '/' . 'FRAMEWORK/random.php';
require_once __DIR__ . '/' . 'FRAMEWORK/text.php';
require_once __DIR__ . '/' . 'FRAMEWORK/path.php';
require_once __DIR__ . '/' . 'FRAMEWORK/file.php';
require_once __DIR__ . '/' . 'FRAMEWORK/time.php';
require_once __DIR__ . '/' . 'FRAMEWORK/array.php';
require_once __DIR__ . '/' . 'FRAMEWORK/request.php';
require_once __DIR__ . '/' . 'FRAMEWORK/session.php';
require_once __DIR__ . '/' . 'FRAMEWORK/language.php';
require_once __DIR__ . '/' . 'FRAMEWORK/database.php';
require_once __DIR__ . '/' . 'FRAMEWORK/captcha.php';
require_once __DIR__ . '/' . 'FRAMEWORK/mail.php';
require_once __DIR__ . '/' . 'FRAMEWORK/user.php';

// -- CONSTANTS

define( 'DefaultDomainName', 'www.spark-project.com' );
define( 'DefaultLanguageCode', 'en' );
define( 'LanguageTagArray', [ 'en', 'fr', 'de' ] );
define( 'LanguageCodeArray', [ 'en', 'fr', 'de' ] );
define( 'LanguageNameArray', [ 'English', 'French', 'German' ] );
define( 'ImageExtension', '.avif' );
define( 'PreloadImageExtension', '.preload.avif' );
define( 'TinyImageExtension', '.tiny.avif' );
define( 'SmallImageExtension', '.small.avif' );
define( 'MediumImageExtension', '.medium.avif' );
define( 'WideImageExtension', '.wide.avif' );
define( 'LargeImageExtension', '' );
define( 'BigImageExtension', '.big.avif' );
define( 'HugeImageExtension', '.huge.avif' );
define( 'AlphaImageExtension', '.avif' );
define( 'PreloadAlphaImageExtension', '.preload.avif' );
define( 'TinyAlphaImageExtension', '.tiny.avif' );
define( 'SmallAlphaImageExtension', '.small.avif' );
define( 'MediumAlphaImageExtension', '.medium.avif' );
define( 'WideAlphaImageExtension', '.wide.avif' );
define( 'LargeAlphaImageExtension', '' );
define( 'BigAlphaImageExtension', '.big.avif' );
define( 'HugeAlphaImageExtension', '.huge.avif' );
define( 'GoogleAnalyticsTrackingId', 'G-ABCDEFGHIJ' );

if ( GetServerName() === 'localhost' )
{
    define( 'DatabaseHost', 'localhost' );
    define( 'DatabaseName', 'spark-project' );
    define( 'DatabaseUserName', 'root' );
    define( 'DatabasePassword', '' );
    define( 'VersionTimestamp', GetVersionTimestamp( 1 ) );
}
else
{
    define( 'DatabaseHost', 'localhost' );
    define( 'DatabaseName', '???' );
    define( 'DatabaseUserName', '???' );
    define( 'DatabasePassword', '???' );
    define( 'VersionTimestamp', GetVersionTimestamp( 600 ) );
}

DefineLineTag( '! ', '<div class="paragraph title-1">', '</div>' );
DefineLineTag( '!! ', '<div class="paragraph title-2">', '</div>' );
DefineLineTag( '!!! ', '<div class="paragraph title-3">', '</div>' );
DefineLineTag( '!!!! ', '<div class="paragraph title-4">', '</div>' );
DefineLineTag( '- ', '<div class="paragraph dash-bullet-1">', '</div>' );
DefineLineTag( '  - ', '<div class="paragraph dash-bullet-2">', '</div>' );
DefineLineTag( '    - ', '<div class="paragraph dash-bullet-3">', '</div>' );
DefineLineTag( '      - ', '<div class="paragraph dash-bullet-4">', '</div>' );
DefineLineTag( '* ', '<div class="paragraph round-bullet-1">', '</div>' );
DefineLineTag( '  * ', '<div class="paragraph round-bullet-2">', '</div>' );
DefineLineTag( '    * ', '<div class="paragraph round-bullet-3">', '</div>' );
DefineLineTag( '      * ', '<div class="paragraph round-bullet-4">', '</div>' );
DefineLineTag( '° ', '<div class="paragraph hollow-bullet-1">', '</div>' );
DefineLineTag( '  ° ', '<div class="paragraph hollow-bullet-2">', '</div>' );
DefineLineTag( '    ° ', '<div class="paragraph hollow-bullet-3">', '</div>' );
DefineLineTag( '      ° ', '<div class="paragraph hollow-bullet-4">', '</div>' );
DefineLineTag( '@ ', '<div class="paragraph numbered-bullet-1"><div>', '</div><div>', '</div></div>' );
DefineLineTag( '  @ ', '<div class="paragraph numbered-bullet-2"><div>', '</div><div>', '</div></div>' );
DefineLineTag( '    @ ', '<div class="paragraph numbered-bullet-3"><div>', '</div><div>', '</div></div>' );
DefineLineTag( '      @ ', '<div class="paragraph numbered-bullet-4"><div>', '</div><div>', '</div></div>' );
DefineLineTag( '', '<div class="paragraph">', '</div>' );

DefineDualTag( '**', '<b>', '</b>' );
DefineDualTag( '%%', '<i>', '</i>' );
DefineDualTag( '__', '<u>', '</u>' );
DefineDualTag( ',,', '<sub>', '</sub>' );
DefineDualTag( '^^', '<sup>', '</sup>' );

DefineTag( '~', '&nbsp;' );
DefineTag( '¦', '<wbr/>' );
DefineTag( '§', '<br/>' );
DefineTag( '¶', '<br class="linebreak"/>' );
DefineTag( '®', '<sup>®</sup>' );
DefineTag( '™', '<sup>™</sup>' );
DefineTag( '[[[', '<table>' );
DefineTag( ']]]', '</table>' );
DefineTag( '[[', '<tr><td>' );
DefineTag( '||', '</td><td>' );
DefineTag( ']]', '</td></tr>' );
DefineTag( '((', '<a class="link" href="' );
DefineTag( ')(', '" target="_blank">' );
DefineTag( '))', '</a>' );
DefineTag( '([', "<span class=\"link-button\" onclick=\"ShowView( '" );
DefineTag( '][', "' )\">" );
DefineTag( '])', '</span>' );
DefineTag( '¬', '' );

DefineTag( '<div<', '<div class="' );
DefineTag( '<span<', '<span class="' );

DefineTag( '<wrapper>', '<div><wrap>' );
DefineTag( '</wrapper>', '</wrap></div>' );
DefineTag( '<wrap></div>', '' );
DefineTag( '<div class="paragraph"></wrap>', '' );

DefineColorTag( 'red' );
DefineColorTag( 'green', '#0F0' );
DefineStyleTag( 'color' );
DefineStyleTag( 'size', 'font-size' );
DefineStyleTag( 'weight', 'font-weight' );

// -- FUNCTIONS

function Route(
    string $path
    )
{
    $path_value_array = GetPathValueArray( $path );
    $language_code = ExtractLanguageCode( $path_value_array, LanguageCodeArray, '' );

    if ( $language_code === '' )
    {
        $language_code = GetBrowserLanguageCode( LanguageCodeArray, DefaultLanguageCode );
    }

    $route = GetRoute( $path_value_array, 'home' );
    $path_value_count = count( $path_value_array );
    $it_is_get_request = IsGetRequest();
    $it_is_post_request = IsPostRequest();
    $it_is_put_request = IsPutRequest();
    $it_is_delete_request = IsDeleteRequest();
    $user_is_connected = FindSessionValue( 'UserIsConnected', false );

    if ( $path_value_count >= 1
         && $path_value_array[ 0 ] === 'admin' )
    {
        DefineText( 'en', 'English' );
        DefineText( 'fr', 'French' );

        DefineText( 'Document Path', 'Document' );
        DefineText( 'Document Path Array', 'Documents' );
        DefineText( 'Image Horizontal Position Array', 'Image Horizontal Positions' );
        DefineText( 'Image Legend Array', 'Image Legends' );
        DefineText( 'Image Path', 'Image' );
        DefineText( 'Image Path Array', 'Images' );
        DefineText( 'Image Title Array', 'Image Titles' );
        DefineText( 'Image Vertical Position Array', 'Image Vertical Positions' );
        DefineText( 'Language Code Array', 'Languages' );
        DefineText( 'Page Id', 'Page' );
        DefineText( 'Route Array', 'Routes' );
        DefineText( 'Teaser Array', 'Teasers' );
        DefineText( 'Text Array', 'Texts' );
        DefineText( 'Title Array', 'Titles' );
        DefineText( 'Type Slug', 'Type' );
        DefineText( 'Video Path', 'Video' );
        DefineText( 'Video Path Array', 'Videos' );

        if ( !$user_is_connected )
        {
            if ( $it_is_get_request )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/connect_user_controller.php';
            }
            else if ( $it_is_post_request )
            {
                $path = '/admin';

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_connect_user_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $path_value_count === 1 )
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/show_home_menu_controller.php';
        }
        else if ( $it_is_post_request
                  && $path_value_count === 3
                  && $path_value_array[ 1 ] === 'upload'
                  && $path_value_array[ 2 ] === 'image' )
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/upload_image_controller.php';
        }
        else if ( $it_is_post_request
                  && $path_value_count === 3
                  && $path_value_array[ 1 ] === 'upload'
                  && $path_value_array[ 2 ] === 'video' )
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/upload_video_controller.php';
        }
        else if ( $it_is_post_request
                  && $path_value_count === 3
                  && $path_value_array[ 1 ] === 'upload'
                  && $path_value_array[ 2 ] === 'document' )
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/upload_document_controller.php';
        }
        else if ( $it_is_post_request
                  && $path_value_count === 3
                  && $path_value_array[ 1 ] === 'delete'
                  && $path_value_array[ 2 ] === 'file' )
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/delete_file_controller.php';
        }
        else if ( $it_is_get_request
                  && $path_value_count === 2
                  && $path_value_array[ 1 ] === 'disconnect' )
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/disconnect_user_controller.php';
        }
        else if ( $it_is_get_request
                  && $path_value_count === 3
                  && $path_value_array[ 1 ] === 'page'
                  && $path_value_array[ 2 ] === 'manage')
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/manage_pages_controller.php';
        }
        else if ( $it_is_get_request
                  && $path_value_count === 4
                  && $path_value_array[ 1 ] === 'page'
                  && $path_value_array[ 2 ] === 'manage' )
        {
            $page_id_or_slug = $path_value_array[ 3 ];

            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/manage_page_controller.php';
        }
        else if ( $it_is_get_request
                  && $path_value_count === 3
                  && $path_value_array[ 1 ] === 'block'
                  && $path_value_array[ 2 ] === 'manage' )
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/manage_blocks_controller.php';
        }
        else if ( $it_is_get_request
                  && $path_value_count === 4
                  && $path_value_array[ 1 ] === 'block'
                  && $path_value_array[ 2 ] === 'manage' )
        {
            $block_id = $path_value_array[ 3 ];

            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/manage_block_controller.php';
        }
        else if ( $it_is_get_request
                  && $path_value_count === 3
                  && $path_value_array[ 1 ] === 'server'
                  && $path_value_array[ 2 ] === 'backup' )
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/make_backup_controller.php';
        }
        else if ( $it_is_get_request
                  && $path_value_count === 3
                  && $path_value_array[ 1 ] === 'server'
                  && $path_value_array[ 2 ] === 'sitemap' )
        {
            require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/update_sitemap_controller.php';
        }
        else if ( $path_value_count >= 2
                  && $path_value_array[ 1 ] === 'text' )
        {
            if ( $it_is_get_request
                 && $path_value_count === 2 )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_texts_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add' )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/add_text_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add'
                      && HasPostValue( 'Id' )
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'Text' ) )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_add_text_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'view' )
            {
                $text_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_text_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit' )
            {
                $text_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/edit_text_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit'
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'Text' ) )
            {
                $text_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_edit_text_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $text_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/remove_text_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $text_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_remove_text_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $path_value_count >= 2
                  && $path_value_array[ 1 ] === 'language' )
        {
            if ( $it_is_get_request
                 && $path_value_count === 2 )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_languages_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add' )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/add_language_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add'
                      && HasPostValue( 'Id' )
                      && HasPostValue( 'Code' )
                      && HasPostValue( 'Number' )
                      && HasPostValue( 'Text' )
                      && HasPostValue( 'IsActive' ) )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_add_language_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'view' )
            {
                $language_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_language_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit' )
            {
                $language_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/edit_language_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit'
                      && HasPostValue( 'Code' )
                      && HasPostValue( 'Number' )
                      && HasPostValue( 'Text' )
                      && HasPostValue( 'IsActive' ) )
            {
                $language_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_edit_language_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $language_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/remove_language_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $language_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_remove_language_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $path_value_count >= 2
                  && $path_value_array[ 1 ] === 'page-type' )
        {
            if ( $it_is_get_request
                 && $path_value_count === 2 )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_page_types_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add' )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/add_page_type_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add'
                      && HasPostValue( 'Id' )
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'Name' ) )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_add_page_type_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'view' )
            {
                $page_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_page_type_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit' )
            {
                $page_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/edit_page_type_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit'
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'Name' ) )
            {
                $page_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_edit_page_type_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $page_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/remove_page_type_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $page_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_remove_page_type_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $path_value_count >= 2
                  && $path_value_array[ 1 ] === 'page' )
        {
            if ( $it_is_get_request
                 && $path_value_count === 2 )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_pages_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add' )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/add_page_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add'
                      && HasPostValue( 'Id' )
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'Route' )
                      && HasPostValue( 'TypeSlug' )
                      && HasPostValue( 'Number' )
                      && HasPostValue( 'LanguageCodeArray' )
                      && HasPostValue( 'IsActive' )
                      && HasPostValue( 'Title' )
                      && HasPostValue( 'Heading' )
                      && HasPostValue( 'Teaser' )
                      && HasPostValue( 'Text' )
                      && HasPostValue( 'ImagePath' )
                      && HasPostValue( 'ImageVerticalPosition' )
                      && HasPostValue( 'ImageHorizontalPosition' )
                      && HasPostValue( 'ImageFit' )
                      && HasPostValue( 'VideoPath' )
                      && HasPostValue( 'MetaTitle' )
                      && HasPostValue( 'MetaDescription' )
                      && HasPostValue( 'MetaImagePath' ) )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_add_page_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'view' )
            {
                $page_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_page_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit' )
            {
                $page_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/edit_page_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit'
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'Route' )
                      && HasPostValue( 'TypeSlug' )
                      && HasPostValue( 'Number' )
                      && HasPostValue( 'LanguageCodeArray' )
                      && HasPostValue( 'IsActive' )
                      && HasPostValue( 'Title' )
                      && HasPostValue( 'Heading' )
                      && HasPostValue( 'Teaser' )
                      && HasPostValue( 'Text' )
                      && HasPostValue( 'ImagePath' )
                      && HasPostValue( 'ImageVerticalPosition' )
                      && HasPostValue( 'ImageHorizontalPosition' )
                      && HasPostValue( 'ImageFit' )
                      && HasPostValue( 'VideoPath' )
                      && HasPostValue( 'MetaTitle' )
                      && HasPostValue( 'MetaDescription' )
                      && HasPostValue( 'MetaImagePath' ) )
            {
                $page_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_edit_page_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $page_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/remove_page_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $page_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_remove_page_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $path_value_count >= 2
                  && $path_value_array[ 1 ] === 'block-type' )
        {
            if ( $it_is_get_request
                 && $path_value_count === 2 )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_block_types_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add' )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/add_block_type_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add'
                      && HasPostValue( 'Id' )
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'Name' ) )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_add_block_type_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'view' )
            {
                $block_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_block_type_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit' )
            {
                $block_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/edit_block_type_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit'
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'Name' ) )
            {
                $block_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_edit_block_type_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $block_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/remove_block_type_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $block_type_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_remove_block_type_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $path_value_count >= 2
                  && $path_value_array[ 1 ] === 'block' )
        {
            if ( $it_is_get_request
                 && $path_value_count === 2 )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_blocks_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add' )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/add_block_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add'
                      && HasPostValue( 'Id' )
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'PageId' )
                      && HasPostValue( 'TypeSlug' )
                      && HasPostValue( 'Number' )
                      && HasPostValue( 'LanguageCodeArray' )
                      && HasPostValue( 'MinimumHeight' )
                      && HasPostValue( 'Title' )
                      && HasPostValue( 'TitleArray' )
                      && HasPostValue( 'Teaser' )
                      && HasPostValue( 'TeaserArray' )
                      && HasPostValue( 'Text' )
                      && HasPostValue( 'TextArray' )
                      && HasPostValue( 'Route' )
                      && HasPostValue( 'RouteArray' )
                      && HasPostValue( 'ImageSide' )
                      && HasPostValue( 'ImageTitle' )
                      && HasPostValue( 'ImageTitleArray' )
                      && HasPostValue( 'ImagePath' )
                      && HasPostValue( 'ImagePathArray' )
                      && HasPostValue( 'ImageVerticalPosition' )
                      && HasPostValue( 'ImageVerticalPositionArray' )
                      && HasPostValue( 'ImageHorizontalPosition' )
                      && HasPostValue( 'ImageHorizontalPositionArray' )
                      && HasPostValue( 'ImageFit' )
                      && HasPostValue( 'VideoPath' )
                      && HasPostValue( 'VideoPathArray' )
                      && HasPostValue( 'DocumentPath' )
                      && HasPostValue( 'DocumentPathArray' )
                      && HasPostValue( 'KeyArray' )
                      && HasPostValue( 'ValueArray' ) )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_add_block_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'view' )
            {
                $block_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_block_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit' )
            {
                $block_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/edit_block_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit'
                      && HasPostValue( 'Slug' )
                      && HasPostValue( 'PageId' )
                      && HasPostValue( 'TypeSlug' )
                      && HasPostValue( 'Number' )
                      && HasPostValue( 'LanguageCodeArray' )
                      && HasPostValue( 'MinimumHeight' )
                      && HasPostValue( 'Title' )
                      && HasPostValue( 'TitleArray' )
                      && HasPostValue( 'Teaser' )
                      && HasPostValue( 'TeaserArray' )
                      && HasPostValue( 'Text' )
                      && HasPostValue( 'TextArray' )
                      && HasPostValue( 'Route' )
                      && HasPostValue( 'RouteArray' )
                      && HasPostValue( 'ImageSide' )
                      && HasPostValue( 'ImageTitle' )
                      && HasPostValue( 'ImageTitleArray' )
                      && HasPostValue( 'ImagePath' )
                      && HasPostValue( 'ImagePathArray' )
                      && HasPostValue( 'ImageVerticalPosition' )
                      && HasPostValue( 'ImageVerticalPositionArray' )
                      && HasPostValue( 'ImageHorizontalPosition' )
                      && HasPostValue( 'ImageHorizontalPositionArray' )
                      && HasPostValue( 'ImageFit' )
                      && HasPostValue( 'VideoPath' )
                      && HasPostValue( 'VideoPathArray' )
                      && HasPostValue( 'DocumentPath' )
                      && HasPostValue( 'DocumentPathArray' )
                      && HasPostValue( 'KeyArray' )
                      && HasPostValue( 'ValueArray' ) )
            {
                $block_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_edit_block_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $block_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/remove_block_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $block_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_remove_block_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $path_value_count >= 2
                  && $path_value_array[ 1 ] === 'contact' )
        {
            if ( $it_is_get_request
                 && $path_value_count === 2 )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_contacts_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add' )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/add_contact_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add'
                      && HasPostValue( 'Id' )
                      && HasPostValue( 'Name' )
                      && HasPostValue( 'Company' )
                      && HasPostValue( 'Email' )
                      && HasPostValue( 'Phone' )
                      && HasPostValue( 'Subject' )
                      && HasPostValue( 'Message' ) )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_add_contact_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'view' )
            {
                $contact_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_contact_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit' )
            {
                $contact_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/edit_contact_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit'
                      && HasPostValue( 'Name' )
                      && HasPostValue( 'Company' )
                      && HasPostValue( 'Email' )
                      && HasPostValue( 'Phone' )
                      && HasPostValue( 'Subject' )
                      && HasPostValue( 'Message' )
                      && HasPostValue( 'DateTime' ) )
            {
                $contact_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_edit_contact_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $contact_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/remove_contact_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $contact_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_remove_contact_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $path_value_count >= 2
                  && $path_value_array[ 1 ] === 'connection' )
        {
            if ( $it_is_get_request
                 && $path_value_count === 2 )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_connections_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add' )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/add_connection_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add'
                      && HasPostValue( 'Id' )
                      && HasPostValue( 'BrowserAddress' )
                      && HasPostValue( 'DateTime' )
                      && HasPostValue( 'IsFailed' )
                      && HasPostValue( 'AttemptCount' ) )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_add_connection_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'view' )
            {
                $connection_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_connection_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit' )
            {
                $connection_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/edit_connection_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit'
                      && HasPostValue( 'BrowserAddress' )
                      && HasPostValue( 'DateTime' )
                      && HasPostValue( 'IsFailed' )
                      && HasPostValue( 'AttemptCount' ) )
            {
                $connection_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_edit_connection_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $connection_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/remove_connection_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $connection_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_remove_connection_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $path_value_count >= 2
                  && $path_value_array[ 1 ] === 'user' )
        {
            if ( $it_is_get_request
                 && $path_value_count === 2 )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_users_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add' )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/add_user_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 3
                      && $path_value_array[ 2 ] === 'add'
                      && HasPostValue( 'Id' )
                      && HasPostValue( 'Email' )
                      && HasPostValue( 'Pseudonym' )
                      && HasPostValue( 'Password' )
                      && HasPostValue( 'Role' ) )
            {
                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_add_user_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'view' )
            {
                $user_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/view_user_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit' )
            {
                $user_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/edit_user_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'edit'
                      && HasPostValue( 'Email' )
                      && HasPostValue( 'Pseudonym' )
                      && HasPostValue( 'Password' )
                      && HasPostValue( 'Role' ) )
            {
                $user_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_edit_user_controller.php';
            }
            else if ( $it_is_get_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $user_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/remove_user_controller.php';
            }
            else if ( $it_is_post_request
                      && $path_value_count === 4
                      && $path_value_array[ 2 ] === 'remove' )
            {
                $user_id = $path_value_array[ 3 ];

                require_once __DIR__ . '/' . 'ADMINISTRATION/CONTROLLER/do_remove_user_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else
        {
            require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
        }
    }
    else
    {
        if ( $it_is_get_request )
        {
            if ( $path_value_count === 1
                 && $path_value_array[ 0 ] === 'captcha' )
            {
                require_once __DIR__ . '/' . 'CONTROLLER/get_captcha_image_controller.php';
            }
            else if ( $path_value_count >= 1
                      && ( $path_value_array[ 0 ] === 'home'
                           || $path_value_array[ 0 ] === 'articles'
                           || $path_value_array[ 0 ] === 'contact'
                           || $path_value_array[ 0 ] === 'privacy-policy'
                           || $path_value_array[ 0 ] === 'legal-notice' ) )
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_base_controller.php';
            }
            else if ( $path_value_count === 0 )
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_base_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
        else if ( $it_is_post_request )
        {
            if ( $path_value_count === 1
                 && $path_value_array[ 0 ] === 'contact'
                 && HasPostValue( 'Name' )
                 && HasPostValue( 'Company' )
                 && HasPostValue( 'Email' )
                 && HasPostValue( 'Phone' )
                 && HasPostValue( 'Subject' )
                 && HasPostValue( 'Message' )
                 && HasPostValue( 'Captcha' ) )
            {
                $name = GetPostValue( 'Name' );
                $company = GetPostValue( 'Company' );
                $email = GetPostValue( 'Email' );
                $phone = GetPostValue( 'Phone' );
                $subject = GetPostValue( 'Subject' );
                $message = GetPostValue( 'Message' );
                $captcha = GetPostValue( 'Captcha' );

                require_once __DIR__ . '/' . 'CONTROLLER/add_contact_controller.php';
            }
            else
            {
                require_once __DIR__ . '/' . 'CONTROLLER/show_error_controller.php';
            }
        }
    }
}

// -- STATEMENTS

// PrintRequest();
// ShowErrors();
Route( GetPath() );
