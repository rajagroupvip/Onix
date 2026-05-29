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

$sql_1 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = 1") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1);

include "header.php";
?>
<div class="content my01">

    <style media="screen">
        .referral img {
            max-width: 100%;
        }
    </style>
    <div class="container pt-4">
        <div class="referral">

            <div class="" style="position:relative;min-height:4em;">

                <table class="table table-default">
                    <colgroup>
                        <col width="10%">
                        <col width="30%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th i18n>
                                Kelompok </th>
                            <th i18n>
                                Jumlah Bulanan Anggota Aktif Berdasarkan Game Turnover
                            </th>
                            <th i18n>Referral I</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr class="first-child">
                            <td>
                                <strong>Lottery</strong>
                            </td>
                            <td i18n>Tanpa Syarat &amp; Ketentuan </td>
                            <td>0.25%</td>
                        </tr>


                        <tr class="first-child">
                            <td>
                                <strong>Cockfight </strong>
                            </td>
                            <td i18n>Tanpa Syarat &amp; Ketentuan </td>
                            <td>0.25%</td>
                        </tr>


                        <tr class="first-child">
                            <td>
                                <strong>Poker</strong>
                            </td>
                            <td i18n>Tanpa Syarat &amp; Ketentuan </td>
                            <td>0.25%</td>
                        </tr>


                        <tr class="first-child">
                            <td>
                                <strong>Sportbook</strong>
                            </td>
                            <td i18n>Tanpa Syarat &amp; Ketentuan </td>
                            <td>0.25%</td>
                        </tr>


                        <tr class="first-child">
                            <td>
                                <strong>Livecasino</strong>
                            </td>
                            <td i18n>Tanpa Syarat &amp; Ketentuan </td>
                            <td>0.25%</td>
                        </tr>


                        <tr class="first-child">
                            <td>
                                <strong>Slot</strong>
                            </td>
                            <td i18n>Tanpa Syarat &amp; Ketentuan </td>
                            <td>0.25%</td>
                        </tr>


                        <tr class="first-child">
                            <td>
                                <strong>RNG</strong>
                            </td>
                            <td i18n>Tanpa Syarat &amp; Ketentuan </td>
                            <td>0.25%</td>
                        </tr>


                        <tr class="first-child">
                            <td>
                                <strong>Fishing</strong>
                            </td>
                            <td i18n>Tanpa Syarat &amp; Ketentuan </td>
                            <td>0.25%</td>
                        </tr>
                    </tbody>
                </table>





            </div>
            <div style='{}'>
                <h2>Syarat Dan Ketentuan Umum Referal</h2>
                <ul style='{style="list-style: disc; padding: 0 20px;"}'>
                    <li>Saya memberikan Informasi Pribadi yang akurat dan benar, serta mempertanggung jawabkan atas
                        ketidakbenaran data yang saya berikan</li>
                    <li>Saya berkomitmen untuk tidak melakukan Tindakan Phising . Phising adalah tindakan mempromosikan
                        salah satu website dengan mengunakan Nama website orang lain</li>
                    <li>Saya berkomitmen untuk tidak melakukan promosi atau membuat SEO / membuat tautan back link
                        dengan menggunakan situs Link Pemerintah atau metode apapun yang berkaitan dan aktifitas
                        merugikan lainnya.</li>
                    <li>Saya menyadari bahwa melanggar syarat dan ketentuan ini dapat mengakibatkan penutupan akun dan
                        pemblokiran data, serta saya bersedia menerima segala konsekuensi yang timbul akibat pelangaran
                        tersebut</li>
                    <li>Semua keputusan pihak Admin / penyenglenggara website adalah mutlak dan Admin website berhak
                        melakukan perubahan syarat dan ketentuan ini sewaktu- waktu, harap membaca dengan seksama
                        terkait syarat dan ketentuan ini dari waktu ke waktu.</li>
                </ul>
            </div>

            <div>
                <p>SYARAT DAN KETENTUAN :</p>
                <p>Promo berlaku untuk Seluruh Games</p>
                <table style="height: 119px; width: 373px;" border="1" width="362">
                    <tbody>
                        <tr style="height: 18px;">
                            <td style="height: 18px; width: 139.583px; text-align: center;"><strong>ROLLINGAN</strong>
                            </td>
                            <td style="height: 18px; width: 219.817px; text-align: center;"><strong>Minimal
                                    Bonus&nbsp;</strong></td>
                        </tr>
                        <tr style="height: 18px;">
                            <td style="height: 18px; width: 139.583px; text-align: center;"><strong>0.25 %</strong></td>
                            <td style="height: 18px; width: 219.817px; text-align: center;"><strong>1 ribu ( 1.000
                                    )</strong></td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <ol>
                    <li>Bonus Referral terhitung dari turnover / rolinggan downline (teman) dari periode selama 1
                        bulan<br><br></li>
                    <li>Minimal ada 1 member yang aktif setiap bulannya<br><br></li>
                    <li>Minimal mendapatkan bonus sudah dirincikan di tabel di atas (Jika hasil perkalian cashback
                        dibawah yang ditulis tidak terhitung bonus)<br><br></li>
                    <li>Tidak ada batas berapa bonus yang diberikan , berapapun bonus tetap kami proses<br><br></li>
                    <li>Bonus akan diberikan tanggal 6 setiap bulannya<br><br></li>
                    <li>Misalnya : periode 1 - 28 Februari akan dibagikan bonus referral pada tanggal 6 Maret jam 4 sore
                        dalam bentuk saldo game yang bebas di withdraw ataupun bisa dimainkan lagi<br><br></li>
                    <li>Syarat dan peraturan dapat berubah sewaktu-waktu tanpa ada pemberitahuan terlebih dahulu, oleh
                        karena itu Member yang mengikuti program Bonus referral disarankan membaca syarat dan peraturan
                        secara berkala<br><br></li>
                    <li>Kami berhak membatalkan bonus apabila ada tindakan manipulasi baik individu maupun kelompok /
                        sindikat terutama <strong>BONUS HUNTER</strong>&nbsp;dan keputusan kami adalah mutlak.</li>
                </ol>
            </div>
        </div>
        </ng-container>
        </ng-container>
    </div>

</div>

<div class="site-footer">
    <div class="container">
    </div>
</div>
<?php include "footer.php";?>