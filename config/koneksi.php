<?php
error_reporting(E_ALL);
$host="localhost"; 
$user="seobjatg_seobjatg"; 
$password="vuAQXZFkrSNP"; 
$database="seobjatg_seobjatg"; 
$conn=mysqli_connect($host,$user,$password,$database) or die(mysqli_error());
//cek koneksi 
if($conn){ 
//echo "berhasil koneksi"; 
}else{ 
echo "gagal koneksi"; 
} 
?>
