<?php

session_start();
$url_array = explode('?', 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$url = $url_array[0];

require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_DriveService.php';
$client = new Google_Client();
$client->setClientId('1019727658067-t3gs64h5t574fm32r3ltehd2041eq4kq.apps.googleusercontent.com');
$client->setClientSecret('Jk8rOAtcVUUZCPaa0C7L9Wxc');
$client->setRedirectUri($url);
$client->setScopes(array('https://www.googleapis.com/auth/drive'));
if (isset($_GET['code'])) {
$_SESSION['accessToken'] = $client->authenticate($_GET['code']);
header('location:'.$url);
exit;
} elseif (!isset($_SESSION['accessToken'])) {
$client->authenticate();
}

if (!empty($_POST)) {
$client->setAccessToken($_SESSION['accessToken']);
$service = new Google_DriveService($client);
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$file = new Google_DriveFile();
$file_path = 'a.jpg';
$mime_type = finfo_file($finfo, $file_path);
$file->setTitle($file_name);
$file->setDescription('This is a '.$mime_type.' document');
$file->setMimeType($mime_type);
$service->files->insert(
$file,
 array(
'data' => file_get_contents($file_path),
 'mimeType' => $mime_type
)
);
finfo_close($finfo);
header('location:'.$url);
exit;
}
