<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }
            .footer {
                width: 100% !important;
            }
        }
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #ffffff; color: #718096; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color: #edf2f7; width: 100%; padding: 0; margin: 0;">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%; padding: 0; margin: 0;">
                <tr>
                    <td class="header" style="padding: 25px 0; text-align: center;">
                        <a href="https://www.linkscircle.com/" style="color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;">
                            <img src="https://www.linkscircle.com/images/logo.png" class="logo" alt="LinksCircle Affiliate Network" style="max-width: 100%; border: none;">
                        </a>
                    </td>
                </tr>
                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0" style="background-color: #edf2f7; padding: 0; border-top: 1px solid #edf2f7; width: 100%;">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="background-color: #ffffff; border-radius: 2px; box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015); margin: 0 auto; width: 570px;">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell" style="padding: 32px;">
                                    <h1 style="color: #3d4852; font-size: 18px; font-weight: bold;">Hello,</h1>

                                    <!-- Verification Section -->
                                    <h3 style="font-size: 16px; font-weight: bold; color: #3d4852;">Identity Verification Details</h3>
                                    <p style="font-size: 16px; line-height: 1.5em;">To update your payment method, please confirm your identity with the following details:</p>
                                    <ul style="font-size: 16px; line-height: 1.5em; padding-left: 20px;">
                                        <li>IP Address: {{ $data->ip_address }}</li>
                                        <li>Location: {{ $data->location }}</li>
                                        <li>Time: {{ \Carbon\Carbon::parse($data->created_at)->format("d-m-Y H:i:s") }}</li>
                                        <li>Account Email: {{ $data->user_email }}</li>
                                    </ul>

                                    <p style="font-size: 16px; line-height: 1.5em;">To verify your identity, please click the following link: <a href='{{ route("publisher.payments.payment-settings.verify-identity-code", ['identity' => $data->id]) }}'>Verify Identity</a></p>

                                    <p style="font-size: 16px; line-height: 1.5em;">Note: After verification, you will be able to update your payment method securely.</p>
                                    <p style="font-size: 16px; line-height: 1.5em;">Regards,<br>LinksCircle</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="text-align: center; width: 570px; margin: 0 auto;">
                            <tr>
                                <td class="content-cell" align="center" style="padding: 32px;">
                                    <p style="line-height: 1.5em; color: #b0adc5; font-size: 12px; text-align: center;">© {{ now()->format("Y") }} LinksCircle. All rights reserved.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
