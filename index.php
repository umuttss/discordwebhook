<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discord WebHook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="post">
        <p><label class="label" for="webhook">WebHook URL Giriniz.</label></p>
        <input id="webhook" class="input webhook" type="text" name="webhook">
        <br>
        <p><label class="label" for="username">WebHook Username Giriniz.</label></p>
        <input id="username" class="input username" type="text" name="username">
        <br>
        <p><label class="label" for="msg">Mesaj Giriniz:</label></p>
        <textarea id="msg" name="msg" rows="12" cols="50"></textarea>
        <br>
        <input type="submit" class="btn" value="Gönder">
      </form>

      

</body>
</html>
<?php

if ($_POST) {
    $webhookurl = $_POST["webhook"];
}


$timestamp = date("c", strtotime("now"));

if ($_POST) {
    $username = $_POST["username"];
    $msg = $_POST["msg"];

$json_data = json_encode([
         

    "username" => $username,
    "content" => $msg


], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

curl_close( $ch );

}
?>