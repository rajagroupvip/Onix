<?php
require_once('session.php');

if (isset($_GET['selectedUser'])) {
    $selectedUser = $_GET['selectedUser'];

    // Query untuk mendapatkan data pengguna dengan referral_user_id yang sama
    $query = "SELECT username, email, phone_number FROM tb_user WHERE referral_user_id = '$selectedUser'";
    $result = mysqli_query($conn, $query);
    $userData = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $userData[] = $row;
    }
    echo json_encode($userData);
} else {
    echo "Tidak ada data yang ditemukan.";
}
?>
