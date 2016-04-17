
    <html>
<head>
</head>
<body>
<?php
//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

$hodClient = new HODClient("4469e190-91be-48bc-852e-ea916adb1927");
$text = "Derek Jeter is awesome. He will be in New York on Monday.";
$data = array(
  'text' => $text,
  'entity_type' => ['people_eng', 'places_eng']
);
$hodClient->PostRequest($data, HODApps::ENTITY_EXTRACTION, REQ_MODE::SYNC, 'requestCompletedWithContent');
function requestCompletedWithContent($response) {
  print '<pre>';
  print_r($response);
  print '</pre>';
    print($response);
}
