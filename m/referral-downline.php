<?php
include 'session.php';
include 'header.php';?>

<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container-b3">
        <div class="row history">
            <div class="pb-4 pb-md-0 col-md-9">
                <form id="searchhistory" class="needs-validation searchhistory">
                    <input type="hidden" name="_token" value="0h0Dzk9wOu3wG1UoJB7UalGgKSDrGn54muX74zHe">
                    <div class="box-wrapper plr-15">
                        <div class="row d-flex align-items-center">
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-md-3 col-xs-4  "></div>
                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                <button type="submit" class="btn btn-primary m-15">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="historySearchResult" class="m-tb-15">
    <div class="table-responsive">
        <table class="table table-bordered table-hover toggle-circle dataTable no-footer table-striped" role="grid" aria-describedby="historyDataTable_info" id="referral-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Deposit</th>
                    <!--<th>Total Transaksi</th>-->
                    <th>Tanggal Transaksi Pertama</th>
                    <th>Tanggal Transaksi Terakhir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config/koneksi.php';
                session_start();
                if(isset($_SESSION['user'])) {
                    $user = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE username = '".$_SESSION['user']."'") or die(mysqli_error());
                    $u = mysqli_fetch_array($user);
                    $userID = $u['cuid'];

                    $sql = "SELECT u.*, 
                                   IFNULL(SUM(t.total), '-') AS total_transaksi,
                                   IFNULL(MIN(t.date), '-') AS tanggal_transaksi_pertama,
                                   IFNULL(MAX(t.date), '-') AS tanggal_transaksi_terakhir
                            FROM tb_user u
                            LEFT JOIN tb_transaksi t ON u.cuid = t.userID AND t.jenis = 1
                            WHERE u.referral_user_id = '$userID'
                            GROUP BY u.cuid";

                    // Menjalankan query
                    $result = $conn->query($sql);

                    // Memeriksa apakah hasil query menghasilkan baris data
                    if ($result->num_rows > 0) {
                        // Output data dari setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo "<tr style='color: red; font-weight: bold;'>"; // Mengubah warna teks menjadi kuning
                            echo "<td>" . $row["username"]. "</td>";
                            // Deposit
                            $deposit = ($row["total_transaksi"] !== '-') ? "Sudah" : "Belum";
                            echo "<td>$deposit</td>";
                            // Total Transaksi
                            // $total_transaksi = ($row["total_transaksi"] !== '-') ? "Rp " . number_format($row["total_transaksi"], 0, ',', '.') : "-";
                            // echo "<td>$total_transaksi</td>";
                            // Tanggal Transaksi Pertama
                            $tanggal_transaksi_pertama = ($row["tanggal_transaksi_pertama"] !== '-') ? $row["tanggal_transaksi_pertama"] : "-";
                            echo "<td>$tanggal_transaksi_pertama</td>";
                            // Tanggal Transaksi Terakhir
                            $tanggal_transaksi_terakhir = ($row["tanggal_transaksi_terakhir"] !== '-') ? $row["tanggal_transaksi_terakhir"] : "-";
                            echo "<td>$tanggal_transaksi_terakhir</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data pengguna dalam referral_user_id.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Session user belum di-set</td></tr>";
                }
                // Menutup koneksi ke database
                ?>
            </tbody>
        </table>
    </div>
</div>


        <?php include 'footer.php';?>