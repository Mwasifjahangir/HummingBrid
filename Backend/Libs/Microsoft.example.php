<?php
/**
 *  Reference skeleton for Backend/Libs/Microsoft.php (which is git-ignored
 *  because it holds the Azure AD app credentials).
 *
 *  Copy this file to Microsoft.php and fill in the values from the Azure AD
 *  app registration.
 *
 *  Based on: http://github.com/microsoftgraph/php-connect-rest-sample (MIT)
 */
namespace Microsoft\Graph\Connect;

/**
 *  Stores constant and configuration values used through the app
 */
class Constants
{
    const CLIENT_ID = '<azure-app-client-id>';
    const CLIENT_SECRET = '<azure-app-client-secret>';
    const REDIRECT_URI = 'http://localhost/oauth.php';
    const AUTHORITY_URL = 'https://login.microsoftonline.com/common';
    const AUTHORIZE_ENDPOINT = '/oauth2/v2.0/authorize';
    const TOKEN_ENDPOINT = '/oauth2/v2.0/token';
    const RESOURCE_ID = 'https://graph.microsoft.com';
    const SENDMAIL_ENDPOINT = '/v1.0/me/sendmail';
    const SCOPES='openid profile mail.send';
}
