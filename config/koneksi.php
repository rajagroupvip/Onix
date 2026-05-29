<?php
error_reporting(E_ALL);
$host="localhost"; 
$user="jasawebkuduabiz_db"; 
$password="jasawebkuduabiz_db"; 
$database="jasawebkuduabiz_db"; 
$conn=mysqli_connect($host,$user,$password,$database) or die(mysqli_error());
//cek koneksi 
if($conn){ 
//echo "berhasil koneksi"; 
}else{ 
echo "gagal koneksi"; 
} 
?>