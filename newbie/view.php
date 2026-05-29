<?php
include "header.php";
include "sidebar.php";
$postID = $_GET['postID'];
$getUser = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = '$postID'") or die(mysqli_error());
$gu = mysqli_fetch_array($getUser);
$getBank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = '$postID'") or die(mysqli_error());
$gb = mysqli_fetch_array($getBank);
?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail Member</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                    <?php
                        error_reporting(0);
                        if (!empty($_GET['notif'])) {
                            if ($_GET['notif'] == 1) {
                                echo '
                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                        <span class="alert-icon text-success me-2">
                                            <i class="ti ti-check ti-xs"></i>
                                        </span>
                                        <span><strong>Selamat!</strong> Profil Tersimpan!</span>
                                    </div>
                                ';
                            }
                            if ($_GET['notif'] == 2) {
                                echo '
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <span class="alert-icon text-warning me-2">
                                            <i class="ti ti-bell ti-xs"></i>
                                        </span>
                                        <span><strong>Peringatan!</strong> Ukuran Gambar Maksimal 2MB!</span>
                                    </div>
                                ';
                            }
                            if ($_GET['notif'] == 3) {
                                echo '
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <span class="alert-icon text-warning me-2">
                                            <i class="ti ti-bell ti-xs"></i>
                                        </span>
                                        <span><strong>Peringatan!</strong> Hanya JPG atau PNG yang diperbolehkan!</span>
                                    </div>
                                ';
                            }
                        }
                    ?>

                    <?php if($role == 'Superadmin'){ ?>
                        <form role="form" action="tools/edit-member.php" method="post"
                            enctype="multipart/form-data">
                            <div class="card-title" style="font-weight: 700;">Informasi Pribadi</div>
                            <div class="form-group mb-2">
                                <label class="form-label">Username :</label>
                                <input class="form-control" type="text" name="user" value="<?php echo $gu['username']; ?>"
                                    readonly>
                                <input class="form-control" type="hidden" name="postID"
                                    value="<?php echo $gu['cuid']; ?>" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Password :</label>
                                <input class="form-control" type="password" name="pass"
                                    value="<?php echo $gu['re_pass']; ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Alamat Email :</label>
                                <input class="form-control" type="text" name="email" value="<?php echo $gu['email']; ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label class="form-label">No. Handphone / Whatsapp :</label>
                                <input class="form-control" type="number" name="no_hp" value="<?php echo $gu['phone_number']; ?>" placeholder="No. Handphone">                               
                            </div>

                            <div class="card-title" style="font-weight: 700;">Informasi Rekening</div>
                            <div class="form-group mb-2">
                                <label class="form-label">Nama Bank :</label>
                                <select class="form-control input-shadow" style="height: 50px;" name="akun" required>
                                    <option value=""><?php echo $gu['akun']; ?></option>
                                    <option value="BANK BCA"
                                        <?php if($gb['akun'] == 'BANK BCA') { echo ' selected=selected'; } ?>>BANK BCA
                                    </option>
                                    <option value="BANK BNI"
                                        <?php if($gb['akun'] == 'BANK BNI') { echo ' selected=selected'; } ?>>BANK BNI
                                    </option>
                                    <option value="BANK TABUNGAN NEGARA"
                                        <?php if($gb['akun'] == 'BANK TABUNGAN NEGARA') { echo ' selected=selected'; } ?>>
                                        BANK TABUNGAN NEGARA</option>
                                    <option value="BANK MANDIRI"
                                        <?php if($gb['akun'] == 'BANK MANDIRI') { echo ' selected=selected'; } ?>>BANK
                                        MANDIRI</option>
                                    <option value="BANK MASPION"
                                        <?php if($gb['akun'] == 'BANK MASPION') { echo ' selected=selected'; } ?>>BANK
                                        MASPION</option>
                                    <option value="BANK SINARMAS"
                                        <?php if($gb['akun'] == 'BANK SINARMAS') { echo ' selected=selected'; } ?>>BANK
                                        SINARMAS</option>
                                    <option value="BANK MAYORA"
                                        <?php if($gb['akun'] == 'BANK MAYORA') { echo ' selected=selected'; } ?>>BANK
                                        MAYORA</option>
                                    <option value="BANK BRI"
                                        <?php if($gb['akun'] == 'BANK BRI') { echo ' selected=selected'; } ?>>BANK BRI
                                    </option>
                                    <option value="BANK BCA SYARIAH"
                                        <?php if($gb['akun'] == 'BANK BCA SYARIAH') { echo ' selected=selected'; } ?>>
                                        BANK BCA SYARIAH</option>
                                    <option value="BANK MUAMALAT INDONESIA"
                                        <?php if($gb['akun'] == 'BANK MUAMALAT INDONESIA') { echo ' selected=selected'; } ?>>
                                        BANK MUAMALAT INDONESIA</option>
                                    <option value="BANK OCBC NISP"
                                        <?php if($gb['akun'] == 'BANK OCBC NISP') { echo ' selected=selected'; } ?>>BANK
                                        OCBC NISP</option>
                                    <option value="BANK UOB"
                                        <?php if($gb['akun'] == 'BANK UOB') { echo ' selected=selected'; } ?>>BANK UOB
                                    </option>
                                    <option value="BANK PERMATA"
                                        <?php if($gb['akun'] == 'BANK PERMATA') { echo ' selected=selected'; } ?>>BANK
                                        PERMATA</option>
                                    <option value="BANK DANAMON"
                                        <?php if($gb['akun'] == 'BANK DANAMON') { echo ' selected=selected'; } ?>>BANK
                                        DANAMON</option>
                                    <option value="BANK BUKOPIN"
                                        <?php if($gb['akun'] == 'BANK BUKOPIN') { echo ' selected=selected'; } ?>>BANK
                                        BUKOPIN</option>
                                    <option value="BANK CIMB NIAGA"
                                        <?php if($gb['akun'] == 'BANK') { echo ' selected=selected'; } ?>>BANK CIMB
                                        NIAGA</option>
                                    <option value="BANK SYARIAH INDONESIA"
                                        <?php if($gb['akun'] == 'BANK SYARIAH INDONESIA') { echo ' selected=selected'; } ?>>
                                        BANK SYARIAH INDONESIA</option>
                                    <option value="BANK ARTHA GRAHA"
                                        <?php if($gb['akun'] == 'BANK ARTHA GRAHA') { echo ' selected=selected'; } ?>>
                                        BANK ARTHA GRAHA</option>
                                    <option value="BANK ARTOS"
                                        <?php if($gb['akun'] == 'BANK ARTOS') { echo ' selected=selected'; } ?>>BANK
                                        ARTOS</option>
                                    <option value="BANK BJB"
                                        <?php if($gb['akun'] == 'BANK BJB') { echo ' selected=selected'; } ?>>BANK BJB
                                    </option>
                                    <option value="BANK BTPN"
                                        <?php if($gb['akun'] == 'BANK BTPN') { echo ' selected=selected'; } ?>>BANK BTPN
                                    </option>
                                    <option value="BANK COMMONWEATLH"
                                        <?php if($gb['akun'] == 'BANK COMMONWEATLH') { echo ' selected=selected'; } ?>>
                                        BANK COMMONWEATLH</option>
                                    <option value="BANK DBS"
                                        <?php if($gb['akun'] == 'BANK DBS') { echo ' selected=selected'; } ?>>BANK DBS
                                    </option>
                                    <option value="BANK DKI"
                                        <?php if($gb['akun'] == 'BANK DKI') { echo ' selected=selected'; } ?>>BANK DKI
                                    </option>
                                    <option value="BANK HSBC"
                                        <?php if($gb['akun'] == 'BANK HSBC') { echo ' selected=selected'; } ?>>BANK HSBC
                                    </option>
                                    <option value="BANK JATIM"
                                        <?php if($gb['akun'] == 'BANK JATIM') { echo ' selected=selected'; } ?>>BANK
                                        JATIM</option>
                                    <option value="BANK MAYBANK"
                                        <?php if($gb['akun'] == 'BANK MAYBANK') { echo ' selected=selected'; } ?>>BANK
                                        MAYBANK</option>
                                    <option value="BANK MEGA"
                                        <?php if($gb['akun'] == 'BANK MEGA') { echo ' selected=selected'; } ?>>BANK MEGA
                                    </option>
                                    <option value="BANK NAGARI"
                                        <?php if($gb['akun'] == 'BANK NAGARI') { echo ' selected=selected'; } ?>>BANK
                                        NAGARI</option>
                                    <option value="OVO"
                                        <?php if($gb['akun'] == 'OVO') { echo ' selected=selected'; } ?>>OVO</option>
                                    <option value="GOPAY"
                                        <?php if($gb['akun'] == 'GOPAY') { echo ' selected=selected'; } ?>>GOPAY
                                    </option>
                                    <option value="DANA"
                                        <?php if($gb['akun'] == 'DANA') { echo ' selected=selected'; } ?>>DANA</option>
                                    <option value="LINKAJA"
                                        <?php if($gb['akun'] == 'LINKAJA') { echo ' selected=selected'; } ?>>LINKAJA
                                    </option>
                                    <option value="SAKUKU"
                                        <?php if($gb['akun'] == 'SAKUKU') { echo ' selected=selected'; } ?>>SAKUKU
                                    </option>
                                    <option value="SHOPEEPAY"
                                        <?php if($gb['akun'] == 'SHOPEEPAY') { echo ' selected=selected'; } ?>>SHOPEEPAY
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Nama Direkening :</label>
                                <input class="form-control" type="text" name="full_name"
                                    value="<?php echo $gu['full_name']; ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">No. Rekening :</label>
                                <input class="form-control" type="text" name="no_rek"
                                    value="<?php echo $gb['no_rek']; ?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Edit Profile</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <?php
                            $hitungDepo = mysqli_query($conn,"SELECT COUNT(*) as totalDepo, SUM(total) as jmlDepo FROM `tb_transaksi` WHERE userID = '$postID' AND jenis = 1 AND status = 1") or die(mysqli_error());
                            $hd = mysqli_fetch_array($hitungDepo);
                            $hitungWede = mysqli_query($conn,"SELECT COUNT(*) as totalWede, SUM(total) as jmlWede FROM `tb_transaksi` WHERE userID = '$postID' AND jenis = 2 AND status = 1") or die(mysqli_error());
                            $hw = mysqli_fetch_array($hitungWede);
                            $hitungTO = mysqli_query($conn,"SELECT * FROM `tb_turnover` WHERE userID = '$postID' AND status = 1") or die(mysqli_error());
                            $ht = mysqli_fetch_array($hitungTO);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Status Akun</td>
                                        <td class="text-right" style="text-align: right;">

                                            <?php
                                                if($gu['status'] == 0){
                                                    echo 'Nonaktif';
                                                }
                                                else if($gu['status'] == 1){
                                                    echo 'Aktif';
                                                }
                                            ?> <button class="btn btn-primary btn-modal" data-toggle="modal"
                                                data-target="#ubahStatusModal">Ubah Status</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Mendaftar</td>
                                        <td class="text-right" style="text-align: right;">
                                            <?php echo $gu['join_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Terakhir Login</td>
                                        <td class="text-right" style="text-align: right;">
                                            <?php echo $gu['last_login']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Deposit</td>
                                        <td class="text-right" style="text-align: right;">
                                            <?php echo $hd['totalDepo']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Deposit (Rp)</td>
                                        <td class="text-right" style="text-align: right;">
                                            <?php echo number_format($hd['jmlDepo']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Withdraw</td>
                                        <td class="text-right" style="text-align: right;">
                                            <?php echo $hw['totalWede']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Withdraw (Rp)</td>
                                        <td class="text-right" style="text-align: right;">
                                            <?php echo number_format($hw['jmlWede']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>TurnOver (Rp)</td>
                                        <td class="text-right" style="text-align: right;">
                                            <?php echo number_format($ht['sisa_to']); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php $postID = $_GET['postID'];?>

                                            </a>
                                        </td>
                                    </tr>
                                    <script>
                                        // Fungsi untuk membuka modal
                                        function openModal() {
                                            $('#ubahStatusModal').modal('show');
                                        }

                                        // Fungsi untuk menutup modal
                                        function closeModal() {
                                            $('#ubahStatusModal').modal('hide');
                                        }
                                    </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="modal fade" id="ubahStatusModal" tabindex="-1" role="dialog" aria-labelledby="ubahStatusModalLabel"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Isi formulir -->
                <form action="ubah_status.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ubahStatusModalLabel">Ubah Status Blokir</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="cuid" value="<?php echo $postID; ?>">
                        <label for="status">Status Blokir:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Blokir</option>
                            <option value="1">Buka Blokir</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <!-- Tombol untuk menutup modal -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">OKE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include "footer.php"?>