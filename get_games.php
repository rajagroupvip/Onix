<?php

require 'config/koneksi.php';
//require 'config/koneksi.php'; //lokasi file koneksi database

$agent = "HCoOJVGeVo"; //agent backoffice
$password = "solbek@1"; //pass backoffice
$provider = "PR"; // Get Pragmatic, Cek Provider Code di Backoffice 
$sign = "001fc97b0aba7282a268e0d92b4182a2";//cek di backoffice

$url = "https://api.apimax.site/v2/GetGameList.aspx?agent_code=$agent&provider_code=$provider&signature=$sign";

$json = file_get_contents($url);
$decode = json_decode($json, true);

for($i=0; $i < count($decode['gamelist']); $i++){

$data = $decode['gamelist'][$i];

$game_code = $data['game_code'];
$game_name = $data['game_name'];
$game_provider = $data['game_provider'];
$game_type = $data['game_type'];
$game_image = $data['game_image'];
$game_status = $data['game_status'];

$gambar = "upload/game_pic/".$data['game_vendor'].".png";


$cek_game = mysqli_query($koneksi, "SELECT * FROM game_list WHERE game_name = '$game_name'");

if(mysqli_num_rows($cek_game) == 1){

$update = mysqli_query($koneksi, "UPDATE game_list SET game_code = '$game_code' WHERE game_name = '$game_name'");

if($update == true){
echo 'Sukses Update Game Bro!<br>';
} else {
echo mysqli_error();
}
}
}