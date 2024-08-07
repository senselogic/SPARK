<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../MODEL/session.php';
require_once __DIR__ . '/' . '../MODEL/text_model.php';

// -- TYPES

class VIEW_CONTROLLER extends CONTROLLER
{
    // -- ATTRIBUTES

    public
        $BrowserAddress,
        $BrowserLocation,
        $LanguageTag,
        $TextArray,
        $TextBySlugMap;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code
        )
    {
        parent::__construct( $language_code );

        if ( HasQueryValue( 'testip' ) )
        {
            $this->BrowserAddress = GetQueryValue( 'testip' );
        }
        else
        {
            $this->BrowserAddress = GetBrowserAddress();
        }

        if ( HasQueryValue( 'testcountry' ) )
        {
            $this->BrowserLocation = GetCountryLocation( GetQueryValue( 'testcountry' ) );
        }
        else
        {
            $this->BrowserLocation = GetBrowserLocation( $this->BrowserAddress );
        }

        $this->LanguageTag = $language_code . '-' . $this->BrowserLocation->CountryCode . '/' . $this->BrowserLocation->ContinentSlug;
        $this->TextArray = GetDatabaseTextArray();
        $this->TextBySlugMap = GetTextBySlugMap( $this->TextArray );
    }

    // -- INQUIRIES

    function GetTranslatedNumberBySlug(
        string $slug
        )
    {
        return $this->GetTranslatedNumber( $this->TextBySlugMap[ $slug ] );
    }

    // ~~

    function GetProcessedTextBySlug(
        string $slug
        )
    {
        return $this->GetProcessedText( $this->TextBySlugMap[ $slug ] );
    }

    // ~~

    function GetProcessedMultilineTextBySlug(
        string $slug
        )
    {
        return $this->GetProcessedMultilineText( $this->TextBySlugMap[ $slug ] );
    }
}
