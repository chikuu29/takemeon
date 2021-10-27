<?php


require_once ('google-api-php-client--PHP7.4/vendor/autoload.php');

$googleClient = new google_Client();

$googleClient->setClientId("728375797608-kkmmlfs9igevj795bf6gtbhr4r1eg7gq.apps.googleusercontent.com");
$googleClient->setClientSecret("YwiaEbS4A9IH3fN0ILJVjNbF");
$googleClient->setApplicationName("Takemeon");
$googleClient->setRedirectUri("http://localhost/takemeon.in/php/save-google-data.php");
$googleClient->addScope('email');

$googleClient->addScope('profile');

$login_url=$googleClient->createAuthUrl();





?>
