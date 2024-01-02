<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();

$client->setAuthConfig('/Users/lakhman/Downloads/secreate.json'); 
// Replace with your client secret JSON file path
$client->setRedirectUri('http://localhost/food2/loginsystem/index.php'); // Replace with your redirect URI

// Set scopes - requesting access to user profile data
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);

if (!isset($_GET['code'])) {
    // Redirect to Google OAuth URL
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit;
   
} else {
    // Exchange authorization code for access token
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $accessToken = $client->getAccessToken();
    // Get user info
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();

    // Access user info
    $userId = $userInfo->getId();
    $userName = $userInfo->getName();
    $userEmail = $userInfo->getEmail();

    // Use this information for further authentication and authorization processes
    // For example, log in the user or create a session
    // ...
}
