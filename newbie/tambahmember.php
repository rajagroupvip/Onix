<?php
include "header.php";
include "sidebar.php";
?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Tambah Member</h2>
                    </div>
                </div>
            </div>
        </div>
        <?php
error_reporting(0);

if (!empty($_GET['notif'])) {
    $popupContent = '';
    $popupIcon = 'info'; // Default icon

    switch ($_GET['notif']) {
        case 1:
            $popupContent = '<strong>Selamat!</strong> Akun Berhasil Dibuat!';
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
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="tools/addmember.php" class="register-form"
                        id="registerForm1">
                        <input type="hidden" name="register_token"
                            value="A3MMMAC-20231129055234-6566d1a2b07d94.64151421">

                        <div class="register_form_one">
                            <div class="sub-title">Rincian Akun</div>

                            <div class="form-group">
                                <label for="user_name">Nama pengguna</label>
                                <input type="text" class="form-control" name="user" id="user_name" required
                                    autocomplete="nope">
                                <small class="text-left">* Nama akun harus 6-12 karakter, hanya huruf dan/atau angka
                                    (0-9) tanpa
                                    simbol</small>
                            </div>

                            <div class="form-group">
                                <label for="password_1">Kata sandi</label>
                                <input type="password" class="form-control" name="pass" id="password_1" required
                                    autocomplete="new-password">
                                <small class="text-left">* Minimal 8 karakter, harus memiliki 1 huruf, 1 angka, dan 1
                                    karakter
                                    khusus</small>
                            </div>

                            <div class="form-group">
                                <label for="password_confirm">Konfirmasi Sandi</label>
                                <input type="password" class="form-control" name="password_confirm"
                                    id="password_confirm" required autocomplete="new-password">
                            </div>

                            <div class="sub-title">Contact info</div>

                            <div class="form-group">
                                <label for="email">Alamat email</label>
                                <input type="email" class="form-control" name="email" id="email" required
                                    autocomplete="off">
                                <small class="text-left">* Silakan isi alamat email yang benar</small>
                            </div>

                            <div class="form-group">
                                <label for="mobile_no">Nomor telepon</label>
                                <input type="tel" class="form-control" id="mobile_no" name="no_hp" required
                                    autocomplete="off" maxlength="20">
                            </div>

                            <div class="form-group" id="refCode_formgrp">
                                <label for="refCodeInput">Kode Referensi / Afiliasi</label>
                                <input type="text" class="form-control" id="refCodeInput" name="uplineID" maxlength="50"
                                    autocomplete="off">
                                <small class="text-left">(Optional) Kosongkan jika tidak ada</small>
                            </div>

                            <!-- Informasi bank -->
                            <div class="form-group">
                                <input type="hidden" value="1" name="isRegHasBank">
                                <div class="sub-title">Informasi bank</div>

                                <div class="form-group">
                                    <label for="full_name">Nama Sesuai Rekening</label>
                                    <input type="text" class="form-control" id="name1" name="full_name" maxlength="100">
                                    <small class="text-left">* Nama yang terdaftar harus sesuai dengan nama rekening
                                        bank</small>
                                </div>

                                <div class="form-group">
                                    <label for="method">Jenis Akun Transaksi<span class="text-danger">*</span></label>
                                    <div class="radio_2">
                                        <input class="" name="method" id="radioBank5" checked type="radio" value="5">
                                        <label class="" for="radioBank5">Bank</label>
                                    </div>
                                    <div class="radio_2">
                                        <input class="" name="method" id="radioEwallet7" type="radio" value="7">
                                        <label class="" for="radioEwallet7">E-wallet</label>
                                    </div>
                                </div>

                                <div class="form-group" id="isShowBankOptions">
                                    <label for="bankOpts--register">Bank</label>
                                    <select class="form-control" data-plugin="bank_list" id="bankOpts--register"
                                        name="akun">
                                        <option selected value="-">- Silahkan pilih -</option>
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
                                        <!-- List bank options -->
                                    </select>
                                </div>

                                <div class="form-group" id="isShowEwalletOptions" style="display:none;">
                                    <label for="ewalletOpts--register">E-wallet</label>
                                    <select class="form-control" data-plugin="bank_list" id="ewalletOpts--register"
                                        name="akun" disabled>
                                        <option selected value="-">- Silahkan pilih -</option>
                                        <option value="DANA">DANA</option>
                                        <option value="OVO">OVO</option>
                                        <option value="GOPAY">GOPAY</option>
                                        <option value="LINKAJA">LINKAJA</option>
                                        <option value="SAKUKU">SAKUKU</option>
                                        <option value="SHOPEEPAY">SHOPEEPAY</option>
                                        <option value="JENIUS">JENIUS</option>
                                        <!-- List e-wallet options -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label id="isShowBankLable">No. Rekening Bank</label>
                                    <label id="isShowEwalletLable" style="display:none;">No. E-Wallet</label>
                                    <input type="tel" class="form-control" name="no_rek" id="acc_no" required
                                        autocomplete="off" minlength="8" maxlength="20">
                                    <small class="text-left">* Pastikan rekening anda Valid, Aktif, dan belum terdaftar
                                        di situs
                                        ini</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
        <?php include "footer.php";?>