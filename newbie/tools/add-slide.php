<?php
require_once('session.php');

$users = $u['user'];
$deskripsi = $_POST['deskripsi'];
$sort = $_POST['sort'];
$catID = $_POST['postID'];
$status = $_POST['status'];
$image = $_POST['image']; // Assuming the image link is provided in the form

function redirectToGeneral($catID, $notif)
{
    $location = '../general.php';
    if (!empty($catID)) {
        $location .= '?catID=' . $catID;
    }
    if (!empty($notif)) {
        $location .= '?notif=' . $notif;
    }
    header('Location: ' . $location);
    exit();
}

if ($catID == '') {
    $query = mysqli_query($conn, "INSERT INTO `tb_slide` (`image`, `deskripsi`, `sort`, `user`, `status`) VALUES ('$image', '$deskripsi', '$sort', '$users', '$status')") or die(mysqli_error($conn));
    redirectToGeneral('', 1);
} else {
    $query = mysqli_query($conn, "UPDATE `tb_slide` SET `image` = '$image', `deskripsi` = '$deskripsi', `sort` = '$sort' WHERE cuid = '$catID'") or die(mysqli_error());
    redirectToGeneral($catID, 1);
}
?>
