<!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="format-detection" content="date=no">
    <meta name="format-detection" content="telephone=no">
    <style type="text/CSS"></style>
    <style @import url('https://dopplerhealth.com/fonts/BasierCircle/basiercircle-regular-webfont.woff2');></style>
    
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: 'Basier Circle', 'Roboto', 'Helvetica', 'Arial', sans-serif;
        }

        @media screen and (max-width: 530px) {
            .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #cbb26a;
                text-decoration: none !important;
                font-weight: bold;
            }

            .button {
                min-height: 42px;
                line-height: 42px;
            }

            .col-lge {
                max-width: 100% !important;
            }
        }

        @media screen and (min-width: 531px) {
            .col-sml {
                max-width: 27% !important;
            }

            .col-lge {
                max-width: 73% !important;
            }
        }
    </style>
</head>

<body style="margin:0;padding:0;word-spacing:normal;background-color:#cbb26a;">
	<div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#cbb26a;">
		<table role="presentation" style="width:100%;border:none;border-spacing:0;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:'Basier Circle', 'Roboto', 'Helvetica', 'Arial', sans-serif;font-size:1em;line-height:1.37em;color:#384049;">
                        <tr>
                            <td style="padding:40px 30px 30px 30px;text-align:center;font-size:1.5em;font-weight:bold;">
                                <a href="{{env('APP_URL_MAIL')}}" style="text-decoration:none;">
                                    <img width="2170" alt="{{env('APP_NAME')}}" style="width:170px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;" src="https://legalize.ci/images/logo-email.png">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <h1 style="margin-top:0;margin-bottom:1.38em;font-size:1.50em;line-height:1.3;font-weight:bold;letter-spacing:-0.02em;">
                                    Bonjour Mr / Mme {{ $user->name }}
                                </h1>
                                
                                @yield('mail')
                                
                                <p style="text-align: center;margin: 2.5em auto; margin-top: 30px; margin-bottom: 30px;">
                                    <a class="button" href="{{env('APP_URL_MAIL')}}" style="background: #063e31; text-decoration: none; padding: 1em 1.5em; color: #ffffff; border-radius: 10px; mso-padding-alt:0; text-underline-color:#063e31">
                                        <span style="mso-text-raise:10pt;font-weight:bold;">Se connecter</span>
                                    </a>
                                </p>
                                <p>
                                    Cordialement,
                                </p>
                                <p style="font-weight: bolder; color: #063e31;">
                                    La team,  {{env('APP_NAME')}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;text-align:center;font-size: 0.75em;background-color: #063e31 ;color:#384049;border: 1em solid #cbb26a;">
                                <p style="margin:0 0 0.75em 0;line-height: 0; text-align:center !important">
                                    <a href="https://www.linkedin.com/company/legalize-ci/" style="display:inline-block;text-decoration:none;margin: 0 5px; color: #0072b1 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/legalizeci" style="display:inline-block;text-decoration:none;margin: 0 5px; color: #4267B2;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                        </svg>
                                    </a>
                                </p>
                                
                                <p style="margin:0;font-size:.95rem;line-height:1.5em;text-align: center; color: #fff; font-weight: bold;">
                                    {{-- Adresse : {{env('APP_ADRESS')}} --}}
                                    <br>
                                    {{-- Tel   : {{env('APP_PHONE')}} <br> --}}
                                    Email : {{env('APP_EMAIL')}}<br>
                                    Site  : {{env('APP_URL')}}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
