<?php 

$CURL = CURL_INIT();
CURL_SETOPT($CURL, CURLOPT_URL, $URL);
CURL_SETOPT($CURL, CURLOPT_SSL_VERIFYPEER, TRUE);
CURL_SETOPT($CURL, CURLOPT_REFERER, 'http://www.example.com/1');
CURL_SETOPT($CURL, CURLOPT_RETURNTRANSFER, FALSE);
CURL_SETOPT($CURL, CURLOPT_HEADER, TRUE);
CURL_SETOPT($CURL, CURLOPT_POST, TRUE);
CURL_SETOPT($CURL, CURLOPT_POSTFIELDS, http_build_query($data));
CURL_SETOPT($CURL, CURLOPT_COOKIEJAR, $file);
CURL_SETOPT($CURL, CURLOPT_COOKIEFILE, $file);
if (!CURL_ERRNO($CURL)) {
	$INFO = CURL_GETINFO($CURL);
}
$EXEC = CURL_EXEC($CURL);
CURL_CLOSE($CURL);
dd($EXEC);

$CURL = CURL_INIT();
CURL_SETOPT_ARRAY($CURL, [
	CURLOPT_URL => 'http://echo.com/channel/call',
	CURLOPT_REFERER => REFERER_TOKEN,
	CURLOPT_RETURNTRANSFER => TRUE,
	CURLOPT_HEADER => FALSE,
]);

$EXEC = CURL_EXEC($CURL);
CURL_CLOSE($CURL);



$CURL = CURL_INIT();
CURL_SETOPT($CURL, CURLOPT_URL, 'http://echo.com');
$EXEC = CURL_EXEC($CURL);
CURL_CLOSE($CURL);
dd($EXEC);