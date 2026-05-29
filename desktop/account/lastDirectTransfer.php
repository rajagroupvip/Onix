<?php 
include "../session.php";
include "../header.php";
?>
<div class="content my01">
    <script type="text/javascript" src="https://cdn.sitestatic.net/assets/jquery/jquery.price_format.min.js?v=2">
    </script>
    <div class="container-wrapper acc">
        <div class="container container-box">
            <div class="row">
                <div class="col-md-8">
                    <div class="box-wrapper">
                        <div class="title" style="padding: 5px 0">
                            <div class="d-inline-block" style="padding-left:15px" i18n>Keamanan Akun: Normal</div>
                            <div class="d-inline-block text-right" style="float:right;padding-right:15px">Anda memiliki
                                <span class="txt_mail_cnt">0</span> pesan baru yang belum dibaca dari kami.</div>
                        </div>

                        <div class="mdc-wrapper">
                            <a href="<?php echo $urlweb; ?>/desktop/account/deposit" class="mdc-items ">Deposit</a>
                            <a href="<?php echo $urlweb; ?>/desktop/account/withdrawal" class="mdc-items ">Withdraw</a>
                            <a href="<?php echo $urlweb; ?>/desktop/account/lastDirectTransfer" class="mdc-items active ">5
                                Transaksi
                                Terakhir </a>
                            <a href="<?php echo $urlweb; ?>/desktop/account/history" class="mdc-items ">Pernyataan</a>

                        </div>
                    </div>
                    <div style="padding-right: 15px;  padding-left: 15px;">
                        <div class="row history">
                            <link rel="stylesheet" type="text/css"
                                href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
                            <div class="row d-flex flex-column align-items-center">

                                <div class="col-md-12 d-flex flex-wrap">
                                    <div class="font-weight-bold m-15">

                                    </div>
                                </div>
                                <div class="col-md-12 d-flex flex-wrap">
                                <?php
                                    $sql = "SELECT tb_transaksi.*, tb_bank.no_rek
                                            FROM tb_transaksi
                                            INNER JOIN tb_bank ON tb_transaksi.userID = tb_bank.userID
                                            WHERE tb_transaksi.userID = '$userID' AND tb_transaksi.jenis IN (1,2,7)
                                            ORDER BY tb_transaksi.cuid DESC";

                                    $result = $conn->query($sql);
                                ?>
                                    <table
                                        class="table table-bordered table-hover toggle-circle dataTable no-footer table-striped table-responsive"
                                        role="grid" aria-describedby="historyDataTable_info" id="transaction-table">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Tanggal Transaksi </th>
                                                <th>Jenis </th>
                                                <th> Status </th>
                                                <th> Keterangan </th>
                                                <th> Jumlah </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                        $nomor_urut = 1;

                                                        // Menggabungkan hasil query dari kedua tabel
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $tanggal = $row['date'];
                                                                $nominal = $row['total'];
                                                                $status = $row['status'];
                                                                $jenis = $row['jenis'];
                                                                $note = $row['note'];
                                                                $norek = $row['no_rek'];
                                                                echo "<tr>";
                                                                echo "<td class='text-left'>$nomor_urut</td>";
                                                                echo "<td class='text-left'>$tanggal</td>";
                                                                echo "<td class='text-left'>" . ($jenis == 1 ? 'Deposit' : ($jenis == 2 ? 'Withdraw' : ($jenis == 7 ?'VOID' :'VOID'))) ."</td>";
                                                                echo "<td class='text-center'>" . 
                                                                ($status == 0 ? 'Diproses' : ($status == 1 ? 'Berhasil' : ($status == 2 ? 'Rejected' : 'Rejected'))) ."</td>";
                                                                echo "<td class='text-left'>$note</td>";
                                                                echo "<td class='text-left'>Rp. $nominal</td>";
                                                                $nomor_urut++;
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='6' class='text-center'>Tidak ada data yang ditemukan.</td></tr>";
                                                        }
                                                        ?>
                                                </tbody>
                                            </div>
                                        </div>
                                    </div>
                                    <?php include "../footer.php";?>
