
<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('609039111706-4mhtphrm164pso357tq0of9imco93snc.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/mintstore/check.php');
//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>