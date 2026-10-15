<?php

/**
 * Template for config.php (git-ignored).
 * Copy this file to config.php and fill in the values for your environment.
 * Environment-specific copies live in Config/ (also git-ignored).
 */
define("CONFIG", array(
    'MODE' => 'DEV', // DEV | QUALITY | PRODUCTION
    'BASE' => array(
        'SESSION_NAME' => '<session-name>',
        'URL' => 'http://localhost/',
        'PDFEXPORTUTIL' => '<path-to-wkhtmltopdf.exe>', // used by Libs/WorkFlow::PDFExport
    ),
    'MSSQL' => array(
        'HOST' => '<sql-server-host>',
        'USER' => '<sql-user>',
        'PASSWORD' => '<sql-password>',
        'DB' => '<database-name>',
        'PORT' => '1433'
    ),
    'SAP' => array(
        'HOST' => '<sap-application-server>',
        'USER' => '<rfc-user>',
        'PASSWORD' => '<rfc-password>',
        'SYSNR' => '<system-number>',
        'CLIENT' => '<client>',
    ),
    'AZURE' => array(
        'REDIRECTURI' => 'http://localhost/oauth.php',
        'CLIENTID' => '<azure-app-client-id>',
        'SECRET' => '<azure-app-client-secret>',
        'AUTHURL' => 'https://login.microsoftonline.com/<tenant-id>/oauth2/v2.0/authorize',
        'TOKENURL' => 'https://login.microsoftonline.com/<tenant-id>/oauth2/v2.0/token',
        'SCOPES' => 'openid profile email',
    ),
    'MONGO' => array(
        'DB_NAME' => '<mongo-db-name>', // used by Libs/MDB.php
    ),
));
