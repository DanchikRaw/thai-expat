<?php
function getForumInfo() {
    $apiKey = 'b661e46f46f1c492ee3ae3dfce66a2ea';
    $curl = curl_init('https://forum.thai-expat.org/api/index.php?/forums/topics&perPage=6');

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        CURLOPT_USERPWD => "{$apiKey}:"
    ));
    $response = curl_exec($curl);

    $obj = json_decode($response);

    if (isset($obj->results)) {
        return $obj->results;
    } else {
        return false;
    }
}