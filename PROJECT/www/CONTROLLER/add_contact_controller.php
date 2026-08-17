<?php // -- IMPORTS

require_once __DIR__ . '/' . 'controller.php';
require_once __DIR__ . '/' . '../MODEL/contact_model.php';
require_once __DIR__ . '/' . '../MODEL/text_model.php';

// -- TYPES

class ADD_CONTACT_CONTROLLER extends CONTROLLER
{
    // -- CONSTRUCTORS

    function __construct(
        string $language_code,
        string $name,
        string $company,
        string $email,
        string $phone,
        string $subject,
        string $message,
        string $captcha
        )
    {
        parent::__construct( $language_code );

        if ( IsValidCaptcha( $captcha, $this->Session->Captcha ) )
        {
            AddDatabaseContact( GetRandomTuid(), $name, $company, $email, $phone, $subject, $message );
            $this->SendEmails( $name, $company, $email, $phone, $subject, $message );

            SetStatus( 201 );
        }
        else
        {
            SetStatus( 401 );
        }
    }

    // -- OPERATIONS

    function SendEmails(
        string $name,
        string $company,
        string $email,
        string $phone,
        string $subject,
        string $message
        )
    {
        try
        {
            SendEmail(
                'mail.spark-project.com',
                25,
                'contact@spark-project.com',
                'xyz',
                'contact@spark-project.com',
                $email,
                $this->GetTranslatedText( GetDatabaseTextBySlug( 'contact-mail-thanks-subject' )->Text ),
                ReplaceTexts(
                    $this->GetTranslatedText( GetDatabaseTextBySlug( 'contact-mail-thanks-text' )->Text ),
                    '<Name>',
                    $name
                    )
                );

            SendEmail(
                'mail.spark-project.com',
                25,
                'contact@spark-project.com',
                'xyz',
                'contact@spark-project.com',
                'contact@spark-project.com',
                'Contact request from ' . $email . ' about Spark Project',
                "Name : " . $name
                . "\nCompany : " . $company
                . "\nEmail : " . $email
                . "\nPhone : " . $phone
                . "\nSubject : " . $subject
                . "\nMessage : " . $message . "\n"
                );
        }
        catch ( Exception $exception )
        {
            PrintError( $exception->getMessage() );
        }
    }
}

// -- STATEMENTS

$add_contact_controller = new ADD_CONTACT_CONTROLLER( $language_code, $name, $company, $email, $phone, $subject, $message, $captcha );
