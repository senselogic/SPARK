<?php
    $this->Session->Captcha = GetCaptchaText( 6 );
    $this->Session->Store();
?>














































































<div class="large-margined-container contact-form">
    <form name="ContactForm">
        <div class="contact-form-row">
            <input class="contact-form-input" name="Name" type="text" placeholder="Name"/>
        </div>
        <div class="contact-form-row">
            <input class="contact-form-input" name="Company" type="text" placeholder="Company"/>
        </div>
        <div class="contact-form-row">
            <input class="contact-form-input" name="Email" type="email" placeholder="Email"/>
        </div>
        <div class="contact-form-row">
            <input class="contact-form-input" name="Phone" type="tel" placeholder="Phone"/>
        </div>
        <div class="contact-form-row">
            <input class="contact-form-input" name="Subject" type="text" placeholder="Subject"/>
        </div>
        <div class="contact-form-row">
            <input class="contact-form-input" name="Message" type="text" placeholder="Message"/>
        </div>
        <div class="contact-form-row">
            <input class="contact-form-input" name="Captcha" type="text" placeholder="Captcha"/>
            <img class="contact-form-captcha-image" src="/captcha"/>
        </div>
        <div  class="contact-form-row">
            <div id="contact-form-send-button" class="contact-form-send-button">
                Send
            </div>
        </div>
        <div id="contact-form-thanks-text" class="contact-form-thanks-text display-hidden">
            Thanks !
        </div>
    </form>
</div>
<script>
    // -- FUNCTIONS

    <?php echo GetCaptchaCode( $this->Session->Captcha ); ?>

    // ~~

    function IsValidContactForm()
    {
        var
            contact_form,
            captcha_field,
            company_field,
            email_field,
            it_is_valid_contact_form,
            message_field,
            phone_field,
            subject_field;

        it_is_valid_contact_form = true;

        contact_form = document.ContactForm;
        name_field = contact_form.Name;
        company_field = contact_form.Company;
        email_field = contact_form.Email;
        phone_field = contact_form.Phone;
        subject_field = contact_form.Subject;
        message_field = contact_form.Message;
        captcha_field = contact_form.Captcha;

        if ( name_field.value !== "" )
        {
            name_field.classList.remove( "is-invalid" );
        }
        else
        {
            name_field.classList.add( "is-invalid" );

            it_is_valid_contact_form = false;
        }

        if ( company_field.value !== "" )
        {
            company_field.classList.remove( "is-invalid" );
        }
        else
        {
            company_field.classList.add( "is-invalid" );

            it_is_valid_contact_form = false;
        }

        if ( email_field.value !== ""
             && /^[a-z-.]+@[a-z-.]+\.[a-z]+$/g.test( email_field.value.toLowerCase() ) )
        {
            email_field.classList.remove( "is-invalid" );
        }
        else
        {
            email_field.classList.add( "is-invalid" );

            it_is_valid_contact_form = false;
        }

        if ( phone_field.value !== "" )
        {
            phone_field.classList.remove( "is-invalid" );
        }
        else
        {
            phone_field.classList.add( "is-invalid" );

            it_is_valid_contact_form = false;
        }

        if ( subject_field.value !== "" )
        {
            subject_field.classList.remove( "is-invalid" );
        }
        else
        {
            subject_field.classList.add( "is-invalid" );

            it_is_valid_contact_form = false;
        }

        if ( message_field.value !== "" )
        {
            message_field.classList.remove( "is-invalid" );
        }
        else
        {
            message_field.classList.add( "is-invalid" );

            it_is_valid_contact_form = false;
        }

        if ( captcha_field.value !== ""
             && IsValidCaptcha( captcha_field.value ) )
        {
            captcha_field.classList.remove( "is-invalid" );
        }
        else
        {
            captcha_field.classList.add( "is-invalid" );

            it_is_valid_contact_form = false;
        }

        return it_is_valid_contact_form;
    }

    // ~~

    function ClearContactForm(
        )
    {
        var
            contact_form;

        contact_form = document.ContactForm;
        contact_form.Name.value = "";
        contact_form.Company.value = "";
        contact_form.Email.value = "";
        contact_form.Phone.value = "";
        contact_form.Subject.value = "";
        contact_form.Message.value = "";
        contact_form.Captcha.value = "";
    }

    // ~~

    async function HandleContactFormSendButtonClickEvent(
        )
    {
        var
            contact_form,
            form_data,
            request;

        contact_form = document.ContactForm;

        if ( IsValidContactForm( contact_form ) )
        {
            form_data = new FormData();
            form_data.append( "Name", contact_form.Name.value );
            form_data.append( "Company", contact_form.Company.value );
            form_data.append( "Email", contact_form.Email.value );
            form_data.append( "Phone", contact_form.Phone.value );
            form_data.append( "Subject", contact_form.Subject.value );
            form_data.append( "Message", contact_form.Message.value );
            form_data.append( "Captcha", contact_form.Captcha.value );

            request = await SendRequest(
                "/<?php echo htmlspecialchars( $this->LanguageCode ); ?>/contact",
                "POST",
                form_data
                );

            if ( request.status === 200 )
            {
                ClearContactForm();
                GetElementById( "contact-form-thanks-text" ).RemoveClass( "display-hidden" );
            }
        }
    }

    // -- STATEMENTS

    GetElementById( "contact-form-send-button" ).AddEventListener(
        "click",
        function (
            event
            )
        {
            event.preventDefault();

            HandleContactFormSendButtonClickEvent();
        }
        );
</script>