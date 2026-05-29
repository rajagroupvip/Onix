<?php

$privateKey = 'private_key_anda';

// ambil data json callback notifikasi
$json = file_get_contents('php://input');
$signature = hash_hmac('sha256', $json, $privateKey);

// result
// 9f167eba844d1fcb369404e2bda53702e2f78f7aa12e91da6715414e65b8c86a

?>