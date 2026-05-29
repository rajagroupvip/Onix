<?php
include '../config/koneksi.php';
$query = "SELECT jenis FROM tb_transaksi WHERE jenis IN ('1', '2') AND status = 0 LIMIT 1";
$result = mysqli_query($conn, $query);

$notification = '';

if (mysqli_num_rows($result) > 0) {
    $notification .= '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
    $notification .= '<strong>Ada Transaksi baru yang belum diproses:</strong><br>';
    
    $row = mysqli_fetch_assoc($result);
    $jenis = ($row['jenis'] == '1') ? 'Deposit' : 'Withdraw';
    $page = ($row['jenis'] == '1') ? '/newbie/request_depo.php' : '/newbie/request_withdraw.php';
    $notification .= "Klik Disini <a href='" . $page . "'>" . $jenis . "</a><br>";
    
    $notification .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    $notification .= '</div>';
}

echo json_encode(['notification' => $notification]);
?>
