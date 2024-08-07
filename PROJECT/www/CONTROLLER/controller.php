<?php // -- IMPORTS

require_once __DIR__ . '/' . '../MODEL/session.php';

// -- TYPES

class CONTROLLER
{
    public
        $Session,
        $LanguageCode,
        $LanguageTag,
        $LanguageDecimalSeparator;

    // -- CONSTRUCTORS

    function __construct(
        string $language_code = DefaultLanguageCode
        )
    {
        $this->Session = new SESSION();

        $this->LanguageCode = $language_code;
        $this->LanguageTag = $language_code;
        $this->LanguageDecimalSeparator = GetLanguageDecimalSeparator( $this->LanguageCode );
    }

    // -- INQUIRIES

    function GetTranslatedText(
        string $text
        )
    {
        return GetTranslatedText( $text, $this->LanguageTag );
    }

    // ~~

    function GetTranslatedNumber(
        string $number
        )
    {
        return GetTranslatedNumber( $number, $this->LanguageDecimalSeparator );
    }

    // ~~

    function GetBareText(
        string $text
        )
    {
        return GetBareText( $this->GetTranslatedText( $text ) );
    }

    // ~~

    function GetProcessedText(
        string $text
        )
    {
        return GetProcessedText( $this->GetTranslatedText( $text ) );
    }

    // ~~

    function GetProcessedMultilineText(
        string $text
        )
    {
        return GetProcessedMultilineText( $this->GetTranslatedText( $text ) );
    }
}
