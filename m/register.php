<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');
$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];
$date = date('Y-m-d');
$sql_banner = mysqli_query($conn,"SELECT * FROM `tb_banner` WHERE cuid = 1") or die(mysqli_error());
$ssb = mysqli_fetch_array($sql_banner);
$status = $ssb['status'];
if($status == true){
    $cekPopup = mysqli_query($conn,"SELECT * FROM `tb_popup` WHERE ip = '$ip'") or die(mysqli_error());
    $cpp = mysqli_num_rows($cekPopup);
    if($cpp == 0){
        $pop = mysqli_query($conn,"INSERT INTO `tb_popup` (`ip`, `date`, `status`) VALUES ('$ip', '$date', 0)") or die (mysqli_error());
        $lihat = $status;
    }
    else {
        $cp = mysqli_fetch_array($cekPopup);
        $statusnya = $cp['status'];
        if($statusnya == 0){
            $lihat = $status;
        }
        else {
            $lihat = 'false';
        }
    }
}
else {
    $lihat = $status;
}

include "header.php";
?>

<?php
error_reporting(0);

if (!empty($_GET['notif'])) {
    $popupContent = '';
    $popupIcon = 'info'; // Default icon

    switch ($_GET['notif']) {
        case 1:
            $popupContent = '<strong>Selamat!</strong> Akun Berhasil Dibuat! Silahkan Login';
            $popupIcon = 'success';
            break;
        case 2:
            $popupContent = 'Username Sudah Terdaftar, <a href="' . $urlweb . '/forgot/">Klik Disini</a> Apabila Anda Lupa dengan Password Anda!';
            $popupIcon = 'warning';
            break;
        case 3:
            $popupContent = 'Alamat Email Sudah Terdaftar!';
            $popupIcon = 'warning';
            break;
        case 4:
            $popupContent = 'No. Handphone Sudah Terdaftar!';
            $popupIcon = 'warning';
            break;
        case 5:
            $popupContent = 'Nomor Rekening Sudah Terdaftar!';
            $popupIcon = 'warning';
            break;
         }

    // Output JavaScript code to show SweetAlert
    echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: '$popupIcon',
                    title: 'Notification',
                    html: '$popupContent',
                });
            });
        </script>
    ";
}
?>

<div class="container  ">
    <div class="row">
        <div class="col-xs-12">
            <div class="mb-1">
                <h3 class="d-inline-block">Daftar Akun
                </h3>
                <form class="register-form form form-horizontal " [formGroup]="register-form" id="registerForm1"
                    method="post" action="<?php echo $urlweb; ?>/m/proses_register.php" class="needs-validation">

                    <input type='hidden' name='stage_val' value="0" id='stage_val'>
                    <input type="hidden" name="_token" value="q4fdwl1p2c9bXXMHmkFC6ifWFw4ejIQi8HIL5O0U">

                    <input type="hidden" name="register_token" value="EUGEPAB-20231202215656-656ba828ee1f29.14144351">
                    <div class="register_form_one">
                        <div class="sub-title">Rincian Akun</div>
                        <div class="form-group  ">
                            <div class="col-md-5">
                                <label>Nama pengguna</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control " placeholder="" name="user" id="user_name"
                                    required autocomplete="nope">
                                <small class="text-left">* Nama akun harus 6-12 karakter, hanya menggunakan huruf
                                    dan/atau angka (0-9) dan tidak ada simbol (@#$~%&) <br> cth: <b>namaakun1</b>
                                </small>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <div class="col-md-5">
                                <label>Kata sandi</label>
                            </div>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="pass" id="password_1" placeholder=""
                                    required autocomplete="new-password">
                                <small class="text-left">* Minimal 8 karakter dan memiliki min 1 alfabet, 1 angka dan 1
                                    karakter khusus (!@#$%^&*()_+) <br> cth: <b>password1@</b> </small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label>Konfirmasi Sandi</label>
                            </div>
                            <div class="col-md-7">
                                <input type="password" class="form-control input_text" name="password_confirm"
                                    id="password_confirm" placeholder="" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="sub-title">Contact info</div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label>Alamat email</label>
                            </div>
                            <div class="col-md-7">
                                <input type="email" class="form-control " placeholder="" name="email" id="email"
                                    value="" required autocomplete="off">
                                <div class="loader-b" id="email-validate-loader"
                                    style="position: absolute; display: block; top: 3px; right: 23px; width: 10px; height: 10px; left: inherit; display:none;">
                                </div>
                                <small class="text-left">* Silakan isi alamat email yang benar </small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label>Nomor telepon</label>
                            </div>
                            <div class="col-md-7">
                                <input type="tel" class="form-control" placeholder="" id="mobile_no" name="no_hp"
                                    required autocomplete="off" maxlength="20">
                                <div class="loader-b" id="mobile-validate-loader"
                                    style="position: absolute; display: block; top: 3px; right: 23px; width: 10px; height: 10px; left: inherit; display:none;">
                                </div>
                            </div>
                        </div>
                        <?php
                            // Ambil nilai parameter 'reff' dari URL
                            $reff_code = isset($_GET['reff']) ? $_GET['reff'] : '';
                            $is_disabled = !empty($reff_code) ? 'disabled' : '';
                            $reff_value = !empty($reff_code) ? htmlspecialchars($reff_code, ENT_QUOTES, 'UTF-8') : '';                            
                            echo '
                            <div class="form-group" id="refCode_formgrp">
                                <div class="col-xs-5 col-md-5">
                                    <label>Kode Referensi / Afiliasi</label>
                                </div>
                                <div class="col-xs-7 col-md-7">
                                    <input type="text" class="form-control" id="refCodeInput" name="sponsor" maxlength="50" autocomplete="off" value="' . $reff_value . '">
                                    <small class="text-left">(Optional) Kosongkan jika tidak ada </small>
                                </div>
                            </div>';
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="1" name="isRegHasBank">
                        <div class="sub-title">Informasi bank</div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label>Nama Sesuai Rekening</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="name1" placeholder="" name="full_name"
                                    maxlength="100">
                                <small class="text-left">* Nama yang terdaftar harus sesuai dengan nama rekening bank
                                    yang digunakan untuk menyetor dan menarik dana.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5 ">
                                <label for="method" style="padding-top: 7.5px;">Jenis Akun Transaksi<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-xs-6 radio_2">
                                        <input class=" " name="method" id="radioBank5" checked type="radio" value="5">
                                        <label class=" " for="radioBank5">
                                            <span class="radio-title">
                                                Bank </span>
                                            <span class="marked">
                                                <i class="icon-checkmark"></i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-xs-6 radio_2">
                                        <input class=" " name="method" id="radioEwallet7" type="radio" value="7">
                                        <label class="" for="radioEwallet7">
                                            <span class="radio-title">
                                                E-wallet </span>
                                            <span class="marked">
                                                <i class="icon-checkmark"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="isShowBankOptions">
                            <div class="col-md-5">
                                <label>Bank</label>
                            </div>
                            <div class="col-md-7">
                                <select class="form-control" data-plugin="bank_list" id="bankOpts--register"
                                    name="akun">
                                    <option selected value>- Silahkan pilih -</option>
                                    <option value="BANK BCA" data-bcode="BCA">BANK BCA</option>
                                    <option value="BANK BRI" data-bcode="BRI">BANK BRI</option>
                                    <option value="BANK BNI" data-bcode="BNI">BANK BNI</option>
                                    <option value="BANK MANDIRI" data-bcode="MDR">BANK MANDIRI</option>
                                    <option value="BANK BSI" data-bcode="BSI">BANK BSI</option>
                                    <option value="BANK DANAMON" data-bcode="Other">BANK DANAMON</option>
                                    <option value="BANK CIMB" data-bcode="CIMBN">BANK CIMB</option>
                                    <option value="BANK JAGO" data-bcode="Other">BANK JAGO</option>
                                    <option value="BANK MAYBANK" data-bcode="MBBIN">BANK MAYBANK</option>
                                    <option value="BANK PERMATA" data-bcode="BPMT">BANK PERMATA</option>
                                    <option value="SEA BANK" data-bcode="SEABANK">SEA BANK</option>
                                    <option value="BANK LAIN" data-bcode="Other">BANK LAIN</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="isShowEwalletOptions" style="display:none;">
                            <div class="col-md-5">
                                <label>E-wallet</label>
                            </div>
                            <div class="col-md-7">
                                <select class="form-control" data-plugin="bank_list" id="ewalletOpts--register"
                                    name="akun" disabled>
                                    <option selected value>- Silahkan pilih -</option>

                                    <option value="DANA">DANA</option>
                                    <option value="OVO">OVO</option>
                                    <option value="GOPAY">GOPAY</option>
                                    <option value="LINKAJA">LINKAJA</option>
                                    <option value="SAKUKU">SAKUKU</option>
                                    <option value="SHOPEEPAY">SHOPEEPAY</option>
                                    <option value="JENIUS">JENIUS</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label id="isShowBankLable">No. Rekening Bank</label>
                                <label id="isShowEwalletLable" style="display:none;">No. E-Wallet</label>
                            </div>
                            <div class="col-md-7">
                                <input type="tel" class="form-control " placeholder="" name="no_rek" id="acc_no"
                                    required autocomplete="off" minlength="8" maxlength="20">
                                <div class="loader-b" id="accno-validate-loader"
                                    style="position: absolute; display: block; top: 3px; right: 23px; width: 10px; height: 10px; left: inherit; display:none;">
                                </div>
                                <small class="text-left">* Pastikan rekening anda Valid, Aktif, dan belum terdaftar di
                                    situs ini</small>
                            </div>
                        </div>
                        <div class="form-group form-check submit-box">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" id="terms" name="terms" value="on"> &nbsp;Dengan
                                        memilih tombol DAFTAR, saya menyatakan bahwa saya berusia 18 tahun atau lebih.
                                        Saya telah membaca dan menyetujui Syarat & Ketentuan. Lihat <a
                                            href="<?php echo $urlweb; ?>/info/terms-terms_conditions"
                                            target="_blank">Syarat & Ketentuan </a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4 text-right" style="padding-top:15px" id="register_form_two_prev_btn">
                                <button type="button" class="btn btn-tertiery prev_btn">Sebelumnya</button>
                            </div>
                            <div class="col-xs-8 text-right" style="padding-top:15px;"
                                id="register_form_two_submit_btn">
                                <button type="submit" class="btn btn-secondary">Daftar</button>
                            </div>
                        </div>
                    </div>
                </form>
</div>
                <script>
                    $(document).ready(function () {
                        $('input[name=method]').change(function () {
                            $('#bankOpts--register').val(null);
                            $('#ewalletOpts--register').val(null);
                            $("#acc_no").val(null);

                            if ($(this).val() == '7') {
                                $('#isShowBankOptions, #isShowBankLable').hide();
                                $('#isShowEwalletOptions, #isShowEwalletLable').show();

                                $('#bankOpts--register').prop('disabled', true);
                                $('#ewalletOpts--register').prop('disabled', false);
                                $("#acc_no").attr("minlength", '1');
                                $("#acc_no").attr("maxlength", "20");
                            } else {
                                $('#isShowBankOptions, #isShowBankLable').show();
                                $('#isShowEwalletOptions, #isShowEwalletLable').hide();
                                $('#bankOpts--register').prop('disabled', false);
                                $('#ewalletOpts--register').prop('disabled', true);
                                $("#acc_no").attr("minlength", window.accLength);
                            }
                        });
                    });
                </script>





                <?php include "footer.php"; ?>