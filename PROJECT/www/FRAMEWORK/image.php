<?php // -- FUNCTIONS

function IsOpaqueImage(
    $image
    )
{
    imagepalettetotruecolor( $image );

    $width = imagesx( $image );
    $height = imagesy( $image );

    for ( $x = 0; $x < $width; ++$x )
    {
        for ( $y = 0; $y < $height; ++$y )
        {
            $color = imagecolorat( $image, $x, $y );
            $transparency = ( $color >> 24 ) & 0x7F;

            if ( $transparency !== 0 )
            {
                return false;
            }
        }
    }

    return true;
}

// ~~

function EnableImageTransparency(
    $image
    )
{
    imagealphablending( $image, false );
    imagesavealpha( $image, true );
}

// ~~

function DisableImageTransparency(
    $image
    )
{
    imagealphablending( $image, true );
    imagesavealpha( $image, false );
}

// ~~

function CreateImage(
    int $width,
    int $height,
    bool $image_has_alpha = false
    )
{
    $image = imagecreatetruecolor( $width, $height );

    if ( $image_has_alpha )
    {
        EnableImageTransparency( $image );
    }

    return $image;
}

// ~~

function CreateCopiedImage(
    $image,
    bool $image_has_alpha = false
    )
{
    $width = imagesx( $image );
    $height = imagesy( $image );
    $new_image = CreateImage( $width, $height, $image_has_alpha );

    imagecopyresampled(
        $new_image,
        $image,
        0,
        0,
        0,
        0,
        $width,
        $height,
        $width,
        $height
        );

    return $new_image;
}

// ~~

function CreateResizedImage(
    $image,
    int $new_width,
    int $new_height,
    bool $image_has_alpha = false
    )
{
    $old_width = imagesx( $image );
    $old_height = imagesy( $image );
    $new_image = CreateImage( $new_width, $new_height, $image_has_alpha );

    imagecopyresampled(
        $new_image,
        $image,
        0,
        0,
        0,
        0,
        $new_width,
        $new_height,
        $old_width,
        $old_height
        );

    return $new_image;
}

// ~~

function CreateCappedImage(
    $image,
    int $maximum_width,
    int $maximum_height,
    bool $image_has_alpha = false,
    bool $image_can_be_upscaled = false
    )
{
    $old_width = imagesx( $image );
    $old_height = imagesy( $image );

    if ( $old_width > 0
         && $old_height > 0 )
    {
        $new_width = $old_width;
        $new_height = $old_height;

        $aspect_ratio = $old_width / $old_height;

        if ( $image_can_be_upscaled
             || $new_width > $maximum_width )
        {
            $new_width = $maximum_width;
            $new_height = intval( $new_width / $aspect_ratio );
        }

        if ( $new_height > $maximum_height )
        {
            $new_height = $maximum_height;
            $new_width = intval( $new_height * $aspect_ratio );
        }

        if ( $new_width < 1 )
        {
            $new_width = 1;
        }

        if ( $new_height < 1 )
        {
            $new_height = 1;
        }

        $new_image = CreateImage( $new_width, $new_height, $image_has_alpha );

        imagecopyresampled(
            $new_image,
            $image,
            0,
            0,
            0,
            0,
            $new_width,
            $new_height,
            $old_width,
            $old_height
            );

        return $new_image;
    }
    else
    {
        return CreateImage( 0, 0, $image_has_alpha );
    }
}

// ~~

function CreateConstrainedImage(
    $image,
    int $minimum_width = 0,
    int $maximum_width = 32768,
    int $minimum_height = 0,
    int $maximum_height = 32768,
    bool $image_has_alpha = false
    )
{
    $old_width = imagesx( $image );
    $old_height = imagesy( $image );

    if ( $old_width > 0
         && $old_height > 0 )
    {
        $new_width = $old_width;
        $new_height = $old_height;

        if ( $new_width < $minimum_width )
        {
            $new_width = $minimum_width;
            $new_height = GetInteger( $old_height * $new_width / $old_width );
        }
        else if ( $new_width > $maximum_width )
        {
            $new_width = $maximum_width;
            $new_height = GetInteger( $old_height * $new_width / $old_width );
        }

        if ( $new_height < $minimum_height )
        {
            $new_height = $minimum_height;
            $new_width = GetInteger( $old_width * $new_height / $old_height );
        }
        else if ( $new_height > $maximum_height )
        {
            $new_height = $maximum_height;
            $new_width = GetInteger( $old_width * $new_height / $old_height );
        }

        $new_image = CreateImage( $new_width, $new_height, $image_has_alpha );

        imagecopyresampled(
            $new_image,
            $image,
            0,
            0,
            0,
            0,
            $new_width,
            $new_height,
            $old_width,
            $old_height
            );

        return $new_image;
    }
    else
    {
        return CreateImage( 0, 0, $image_has_alpha );
    }
}

// ~~

function CreateLimitedImage(
    $image,
    int $maximum_pixel_count,
    bool $image_has_alpha = false
    )
{
    $old_width = imagesx( $image );
    $old_height = imagesy( $image );

    if ( $old_width > 0
         && $old_height > 0 )
    {
        $new_width = $old_width;
        $new_height = $old_height;
        $old_pixel_count = $old_width * $old_height;

        if ( $old_pixel_count > $maximum_pixel_count )
        {
            $new_size_ratio = sqrt( $maximum_pixel_count / $old_pixel_count );
            $new_width = intval( $old_width * $new_size_ratio );
            $new_height = intval( $old_height * $new_size_ratio );
        }

        if ( $new_width < 1 )
        {
            $new_width = 1;
        }

        if ( $new_height < 1 )
        {
            $new_height = 1;
        }

        $new_image = CreateImage( $new_width, $new_height, $image_has_alpha );

        imagecopyresampled(
            $new_image,
            $image,
            0,
            0,
            0,
            0,
            $new_width,
            $new_height,
            $old_width,
            $old_height
            );

        return $new_image;
    }
    else
    {
        return CreateImage( 0, 0, $image_has_alpha );
    }
}

// ~~

function CreateCoveredImage(
    $image,
    int $new_width,
    int $new_height,
    bool $image_has_alpha = false
    )
{
    $old_width = imagesx( $image );
    $old_height = imagesy( $image );

    if ( $old_width > 0
         && $old_height > 0 )
    {
        if ( $new_width < 1 )
        {
            $new_width = 1;
        }

        if ( $new_height < 1 )
        {
            $new_height = 1;
        }

        $copied_width = $old_width;
        $copied_height = $old_height;

        $old_aspect_ratio = $old_width / $old_height;
        $new_aspect_ratio = $new_width / $new_height;

        $copied_width = $old_width;
        $copied_height = $old_height;

        if ( $new_aspect_ratio < $old_aspect_ratio )
        {
            $copied_height = intval( $old_width / $new_aspect_ratio + 0.5 );
        }
        else if ( $new_aspect_ratio > $old_aspect_ratio )
        {
            $copied_width = intval( $old_height * $new_aspect_ratio + 0.5 );
        }

        $copied_x = intval( ( $old_width - $copied_width ) / 2 );
        $copied_y = intval( ( $old_height - $copied_height ) / 2 );

        $new_image = CreateImage( $new_width, $new_height, $image_has_alpha );

        imagecopyresampled(
            $new_image,
            $image,
            0,
            0,
            $copied_x,
            $copied_y,
            $new_width,
            $new_height,
            $copied_width,
            $copied_height
            );

        return $new_image;
    }
    else
    {
        return CreateImage( 0, 0, $image_has_alpha );
    }
}

// ~~

function ReleaseImage(
    $image
    )
{
    return imagedestroy( $image );
}

// ~~

function GetImageColor(
    $image,
    float $color_red,
    float $color_green,
    float $color_blue,
    float $color_opacity
    )
{
    if ( $color_opacity === 255 )
    {
        return imagecolorallocate( $image, $color_red, $color_green, $color_blue );
    }
    else
    {
        return imagecolorallocatealpha( $image, $color_red, $color_green, $color_blue, ( 255 - $color_opacity ) * 127 / 255 );
    }
}

// ~~

function DrawLine(
    $image,
    float $first_column,
    float $first_row,
    float $last_column,
    float $last_row,
    float $color_red,
    float $color_green,
    float $color_blue,
    float $color_opacity = 255
    )
{
    imageline(
        $image,
        $first_column,
        $first_row,
        $last_column,
        $last_row,
        GetImageColor( $image, $color_red, $color_green, $color_blue, $color_opacity )
        );
}

// ~~

function DrawRectangle(
    $image,
    float $first_column,
    float $first_row,
    float $last_column,
    float $last_row,
    float $color_red,
    float $color_green,
    float $color_blue,
    float $color_opacity = 255
    )
{
    imagerectangle(
        $image,
        $first_column,
        $first_row,
        $last_column,
        $last_row,
        GetImageColor( $image, $color_red, $color_green, $color_blue, $color_opacity )
        );
}

// ~~

function DrawFilledRectangle(
    $image,
    float $first_column,
    float $first_row,
    float $last_column,
    float $last_row,
    float $color_red,
    float $color_green,
    float $color_blue,
    float $color_opacity = 255
    )
{
    imagefilledrectangle(
        $image,
        $first_column,
        $first_row,
        $last_column,
        $last_row,
        GetImageColor( $image, $color_red, $color_green, $color_blue, $color_opacity )
        );
}

// ~~

function DrawBox(
    $image,
    $box,
    float $color_red,
    float $color_green,
    float $color_blue,
    float $color_opacity = 255
    )
{
    imagerectangle(
        $image,
        $box->Column,
        $box->Row,
        $box->Column + $box->Width - 1,
        $box->Row + $box->Height - 1,
        GetImageColor( $image, $color_red, $color_green, $color_blue, $color_opacity )
        );
}

// ~~

function DrawStretchedImage(
    $target_image,
    float $target_column,
    float $target_row,
    float $target_width,
    float $target_height,
    $source_image,
    float $source_column,
    float $source_row,
    float $source_width,
    float $source_height
    )
{
    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column,
        $target_row,
        $source_column,
        $source_row,
        $target_width,
        $target_height,
        $source_width,
        $source_height
        );
}

// ~~

function DrawCoveredImage(
    $target_image,
    float $target_column,
    float $target_row,
    float $target_width,
    float $target_height,
    $source_image,
    float $source_column,
    float $source_row,
    float $source_width,
    float $source_height
    )
{
    $cropped_source_column = 0;
    $cropped_source_row = 0;
    $cropped_source_width = $source_width;
    $cropped_source_height = $source_height;
    $source_aspect_ratio = $source_width / $source_height;
    $target_aspect_ratio = $target_width / $target_height;

    if ( $source_aspect_ratio > $target_aspect_ratio )
    {
        $cropped_source_width = floor( $source_height * $target_aspect_ratio );
        $cropped_source_column = floor( ( $source_width - $cropped_source_width ) * 0.5 );
    }
    else if ( $source_aspect_ratio < $target_aspect_ratio )
    {
        $cropped_source_height = floor( $source_width / $target_aspect_ratio );
        $cropped_source_row = floor( ( $source_height - $cropped_source_height ) * 0.5 );
    }

    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column,
        $target_row,
        $source_column + $cropped_source_column,
        $source_row + $cropped_source_row,
        $target_width,
        $target_height,
        $cropped_source_width,
        $cropped_source_height
        );
}

// ~~

function DrawSlicedImage(
    $target_image,
    float $target_column,
    float $target_row,
    float $target_width,
    float $target_height,
    float $target_border,
    $source_image,
    float $source_column,
    float $source_row,
    float $source_width,
    float $source_height,
    float $source_border
    )
{
    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column,
        $target_row,
        $source_column,
        $source_row,
        $target_border,
        $target_border,
        $source_border,
        $source_border
        );    // upper left corner

    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column + $target_width - $target_border,
        $target_row,
        $source_column + $source_width - $source_border,
        $source_row,
        $target_border,
        $target_border,
        $source_border,
        $source_border
        );    // upper right corner

    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column,
        $target_row + $target_height - $target_border,
        $source_column,
        $source_row + $source_height - $source_border,
        $target_border,
        $target_border,
        $source_border,
        $source_border
        );    // lower left corner

    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column + $target_width - $target_border,
        $target_row + $target_height - $target_border,
        $source_column + $source_width - $source_border,
        $source_row + $source_height - $source_border,
        $target_border,
        $target_border,
        $source_border,
        $source_border
        );    // lower right corner

    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column,
        $target_row + $target_border,
        $source_column,
        $source_row + $source_border,
        $target_border,
        $target_height - $target_border * 2,
        $source_border,
        $source_height - $source_border * 2
        );    // left edge

    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column + $target_width - $target_border,
        $target_row + $target_border,
        $source_column + $source_width - $source_border,
        $source_row + $source_border,
        $target_border,
        $target_height - $target_border * 2,
        $source_border,
        $source_height - $source_border * 2
        );    // right edge

    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column + $target_border,
        $target_row,
        $source_column + $source_border,
        $source_row,
        $target_width - $target_border * 2,
        $target_border,
        $source_width - $source_border * 2,
        $source_border
        );    // upper edge

    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column + $target_border,
        $target_row + $target_height - $target_border,
        $source_column + $source_border,
        $source_row + $source_height - $source_border,
        $target_width - $target_border * 2,
        $target_border,
        $source_width - $source_border * 2,
        $source_border
        );    // lower edge

    imagecopyresampled(
        $target_image,
        $source_image,
        $target_column + $target_border,
        $target_row + $target_border,
        $source_column + $source_border,
        $source_row + $source_border,
        $target_width - $target_border * 2,
        $target_height - $target_border * 2,
        $source_width - $source_border * 2,
        $source_height - $source_border * 2
        );    // middle
}

// ~~

function DrawText(
    $image,
    float $column,
    float $row,
    float $angle,
    string $text,
    string $font_path,
    string $font_size,
    float $color_red,
    float $color_green,
    float $color_blue,
    float $color_opacity = 255
    )
{
    return
        imagettftext(
            $image,
            $font_size,
            $angle,
            $column,
            $row,
            GetImageColor( $image, $color_red, $color_green, $color_blue, $color_opacity ),
            $font_path,
            $text
            );
}

// ~~

function DrawJustifiedText(
    $image,
    float $canvas_column,
    float $canvas_row,
    float $canvas_width,
    float $canvas_height,
    string $text,
    bool $text_has_tags,
    string $font_path,
    string $bold_font_path,
    string $italic_font_path,
    string $bold_italic_font_path,
    string $font_size,
    float $color_red,
    float $color_green,
    float $color_blue,
    float $color_opacity = 255,
    int $word_alignment = -1,
    int $column_alignment = -1,
    int $row_alignment = -1,
    float $line_height_factor = 1,
    float $space_width_factor = 1
    )
{
    if ( $text_has_tags )
    {
        do
        {
            $old_text = $text;
            $text = preg_replace( '/<([^>]*?) +([^>]*?)>/', '<$1¨$2>', $old_text );
        }
        while ( $text !== $old_text );

        $text
            = str_replace(
                  [ '<', '>', '&lt;', '&gt;' ],
                  [ ' <', '> ', '<', '>' ],
                  $text
                  );
    }

    $box = new stdClass();
    $box->Column = 0;
    $box->Row = 0;
    $box->Width = 0;
    $box->Height = 0;

    $space_bounding_box = imagettfbbox( $font_size, 0, $font_path, ' ' );
    $space_width = $space_bounding_box[ 2 ] * $space_width_factor;

    $text_bounding_box = imagettfbbox( $font_size, 0, $font_path, 'AMWbdfhkltjgpqy' );
    $letter_upper_height = -$text_bounding_box[ 7 ];
    $letter_lower_height = $text_bounding_box[ 1 ];
    $letter_height = ( $text_bounding_box[ 1 ] - $text_bounding_box[ 7 ] );
    $line_height = $letter_height * $line_height_factor;

    $line_index = 0;
    $line_width_array = [];
    $line_width_array[ $line_index ] = 0;

    $word_column = 0;
    $word_row = 0;
    $word_text_array = explode( ' ', $text );
    $word_count = 0;
    $word_array = [];
    $word_is_bold = false;
    $word_is_italic = false;

    foreach ( $word_text_array as $word_text )
    {
        if ( $text_has_tags
             && $word_text === '<b>' )
        {
            $word_is_bold = true;
        }
        else if ( $text_has_tags
                  && $word_text === '</b>' )
        {
            $word_is_bold = false;
        }
        else if ( $text_has_tags
                  && $word_text === '<i>' )
        {
            $word_is_italic = true;
        }
        else if ( $text_has_tags
                  && $word_text === '</i>' )
        {
            $word_is_italic = false;
        }
        else if ( $text_has_tags
                  && ( $word_text === '<u>'
                       || $word_text === '</u>'
                       || $word_text === '<sub>'
                       || $word_text === '</sub>'
                       || $word_text === '<sup>'
                       || $word_text === '</sup>'
                       || $word_text === '<div>'
                       || $word_text === '</div>' ) )
        {
        }
        else if ( $text_has_tags
                  && ( $word_text === '<br>'
                       || $word_text === '<br/>' ) )
        {
            ++$line_index;
            $line_width_array[ $line_index ] = 0;

            $word_column = 0;
            $word_row += $line_height;

            $box->Height = $word_row + $letter_height;
        }
        else if ( !$text_has_tags
                  || $word_text !== '' )
        {
            $word = new stdClass();
            $word->Text = $word_text;
            $word->ColorRed = $color_red;
            $word->ColorGreen = $color_green;
            $word->ColorBlue = $color_blue;
            $word->ColorOpacity = $color_opacity;
            $word->FontSize = $font_size;

            if ( $word_is_bold )
            {
                if ( $word_is_italic )
                {
                    $word->FontPath = $bold_italic_font_path;
                }
                else
                {
                    $word->FontPath = $bold_font_path;
                }
            }
            else
            {
                if ( $word_is_italic )
                {
                    $word->FontPath = $italic_font_path;
                }
                else
                {
                    $word->FontPath = $font_path;
                }
            }

            $word_bounding_box = imagettfbbox( $word->FontSize, 0, $word->FontPath, $word->Text );
            $word->Width = $word_bounding_box[ 2 ];
            $word->Height = $word_bounding_box[ 1 ];

            if ( $word_column + $word->Width > $canvas_width )
            {
                ++$line_index;
                $line_width_array[ $line_index ] = 0;

                $word_column = 0;
                $word_row += $line_height;
            }

            if ( $word_row + $word->Height <= $canvas_height )
            {
                $box_height = $word_row + $letter_height;

                if ( $box_height > $box->Height )
                {
                    $box->Height = $box_height;
                }

                $line_width = $word_column + $word->Width;
                $line_width_array[ $line_index ] = $line_width;

                if ( $line_width > $box->Width )
                {
                    $box->Width = $line_width;
                }

                $word->Column = $word_column;
                $word->Row = $word_row;
                $word->LineIndex = $line_index;

                $word_array[ $word_count ] = $word;
                ++$word_count;

                $word_column += $word->Width + $space_width;
            }
        }
    }

    if ( $column_alignment === -2 )
    {
        $box->Column = $canvas_column - $box->Width;
    }
    else if ( $column_alignment === -1 )
    {
        $box->Column = $canvas_column;
    }
    else if ( $column_alignment === 0 )
    {
        $box->Column = $canvas_column + ( $canvas_width - $box->Width ) * 0.5;
    }
    else if ( $column_alignment === 1 )
    {
        $box->Column = $canvas_column + $canvas_width - $box->Width;
    }
    else if ( $column_alignment === 2 )
    {
        $box->Column = $canvas_column + $canvas_width;
    }

    if ( $row_alignment === -2 )
    {
        $box->Row = $canvas_row - $box->Height;
    }
    else if ( $row_alignment === 0 )
    {
        $box->Row = $canvas_row + ( $canvas_height - $box->Height ) * 0.5;
    }
    else if ( $row_alignment === -1 )
    {
        $box->Row = $canvas_row;
    }
    else if ( $row_alignment === 1 )
    {
        $box->Row = $canvas_row + $canvas_height - $box->Height;
    }
    else if ( $row_alignment === 2 )
    {
        $box->Row = $canvas_row + $canvas_height;
    }

    if ( $image !== null )
    {
        foreach ( $word_array as $word )
        {
            if ( $word->Text !== '' )
            {
                if ( $word_alignment === -1 )
                {
                    $word_column = $box->Column + $word->Column;
                }
                else if ( $word_alignment === 0 )
                {
                    $word_column = $box->Column + $word->Column + ( $box->Width - $line_width_array[ $word->LineIndex ] ) * 0.5;
                }
                else if ( $word_alignment === 1 )
                {
                    $word_column = $box->Column + $word->Column + $box->Width - $line_width_array[ $word->LineIndex ];
                }

                $word_row = $box->Row + $word->Row;

                imagettftext(
                    $image,
                    $word->FontSize,
                    0,
                    $word_column,
                    $word_row + $letter_upper_height,
                    GetImageColor( $image, $word->ColorRed, $word->ColorGreen, $word->ColorBlue, $word->ColorOpacity ),
                    $word->FontPath,
                    $word->Text
                    );
            }
        }
    }

    return $box;
}

// ~~

function ReadAvifImage(
    string $image_url,
    bool $image_has_alpha = false
    )
{
    $image = imagecreatefromavif( $image_url );

    if ( $image_has_alpha )
    {
        EnableImageTransparency( $image );
    }

    return $image;
}

// ~~

function WriteAvifImage(
    $image,
    $image_file_path = null,
    int $quality = -1,
    int $speed = -1
    )
{
    imageavif( $image, $image_file_path, $quality, $speed );
}

// ~~

function ReadJpegImage(
    string $image_url
    )
{
    return imagecreatefromjpeg( $image_url );
}

// ~~

function WriteJpegImage(
    $image,
    $image_file_path = null,
    int $quality = -1
    )
{
    imageinterlace( $image, 1 );
    imagejpeg( $image, $image_file_path, $quality );
}

// ~~

function ReadPngImage(
    string $image_url,
    bool $image_has_alpha = false
    )
{
    $image = imagecreatefrompng( $image_url );

    if ( $image_has_alpha )
    {
        EnableImageTransparency( $image );
    }

    return $image;
}

// ~~

function WritePngImage(
    $image,
    $image_file_path = null,
    int $quality = -1
    )
{
    imagepng( $image, $image_file_path, $quality );
}

// ~~

function ReadWebpImage(
    string $image_url,
    bool $image_has_alpha = false
    )
{
    $image = imagecreatefromwebp( $image_url );

    if ( $image_has_alpha )
    {
        EnableImageTransparency( $image );
    }

    return $image;
}

// ~~

function WriteWebpImage(
    $image,
    $image_file_path = null,
    int $quality = -1
    )
{
    imagewebp( $image, $image_file_path, $quality );
}

// ~~

function ReadImage(
    string $image_url,
    bool $image_has_alpha = false
    )
{
    if ( HasSuffix( $image_url, '.avif' ) )
    {
        $image = imagecreatefromavif( $image_url );
    }
    else if ( HasSuffix( $image_url, '.jpg' ) )
    {
        $image = imagecreatefromjpeg( $image_url );
    }
    else if ( HasSuffix( $image_url, '.png' ) )
    {
        $image = imagecreatefrompng( $image_url );
    }
    else if ( HasSuffix( $image_url, '.webp' ) )
    {
        $image = imagecreatefromwebp( $image_url );
    }
    else
    {
        PrintError( 'Invalid image file extension : ' + image_file_path );
    }

    if ( $image_has_alpha )
    {
        EnableImageTransparency( $image );
    }

    return $image;
}

// ~~

function WriteImage(
    $image,
    $image_file_path = null,
    int $quality = -1,
    int $speed = -1
    )
{
    if ( $image_file_path === null )
    {
        PrintError( 'Null image file path' );
    }
    else if ( HasSuffix( $image_file_path, '.avif' ) )
    {
        imageavif( $image, $image_file_path, $quality, $speed );
    }
    else if ( HasSuffix( $image_file_path, '.jpg' ) )
    {
        imagejpeg( $image, $image_file_path, $quality );
    }
    else if ( HasSuffix( $image_file_path, '.png' ) )
    {
        imagepng( $image, $image_file_path, $quality );
    }
    else if ( HasSuffix( $image_file_path, '.webp' ) )
    {
        imagewebp( $image, $image_file_path, $quality );
    }
    else
    {
        PrintError( 'Invalid image file extension : ' + $image_file_path );
    }
}
