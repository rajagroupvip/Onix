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

include "header.php";
?>

<?php
error_reporting(0);

$validNotifications = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

if (!empty($_GET['notif']) && in_array($_GET['notif'], $validNotifications)) {
    $popupContent = '';
    $popupIcon = 'info'; // Default icon

    switch ($_GET['notif']) {
        case 1:
            $popupContent = '<strong>Username atau Password Salah</strong>';
            $popupIcon = 'warning';
            break;
        case 2:
            $popupContent = 'Username atau Password Salah';
            $popupIcon = 'warning';
            break;
        case 3:
            $popupContent = 'Username Atau Password Salah!';
            $popupIcon = 'warning';
            break;
        case 4:
            $popupContent = 'Login Berhasil';
            $popupIcon = 'success';
            break;
        case 5:
            $popupContent = 'Logout Berhasil';
            $popupIcon = 'success';
            break;
        case 6:
            $popupContent = 'Silahkan Login Terlebih Dahulu';
            $popupIcon = 'warning';
            break;
        case 7:
            $popupContent = 'Mohon Maaf Halaman / Provider Sedang Maintenance';
            $popupIcon = 'error';
            break;
        case 8:
            $popupContent = 'Permintaan Deposit Berhasil Dikirimkan';
            $popupIcon = 'success';
            break;
        case 9:
            $popupContent = 'Permintaan Penarikan Berhasil Dikirimkan';
            $popupIcon = 'success';
            break;
        case 10:
            $popupContent = 'Mohon Maaf Akun Anda Sedang Terkunci Silahkan Menghubungi Admin / Livechat';
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
<section class="carousel-fixed-height">
    <div id="carousel-fixed-height" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $sql_21 = mysqli_query($conn, "SELECT * FROM `tb_slide` ORDER BY sort ASC") or die(mysqli_error());
            $nos = 0;
            while ($s21 = mysqli_fetch_array($sql_21)) {
                $nos++;
                $a = $nos - 1;
            ?>
            <li data-target="#carousel-fixed-height" data-slide-to="<?php echo $a; ?>" <?php if ($nos == 1) {
                                                                                                echo ' class="active"';
                                                                                            } ?>></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php
            $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_slide` ORDER BY sort ASC") or die(mysqli_error());
            $nos = 0;
            while ($s2 = mysqli_fetch_array($sql_2)) {
                $nos++;
            ?>
            <div class="item <?php if ($nos == 1) { echo 'active'; } ?>">
                <a href="#">
                    <img class="slider-size" src="<?php echo $s2['image']; ?>"
                        style="display: block; width: 100%; max-height: 500px;  min-height: 130px;" alt="Slide">
                </a>
            </div>
            <?php } ?>
        </div>
        <a class="left carousel-control" href="#carousel-fixed-height" role="button" data-slide="prev">
            <span class="fas fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-fixed-height" role="button" data-slide="next">
            <span class="fas fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('#carousel-fixed-height', {
                loop: true, // Enable continuous loop
                autoplay: {
                    delay: 2000, // Time in milliseconds between slides
                },
                pagination: {
                    el: '.carousel-indicators',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.carousel-control.right',
                    prevEl: '.carousel-control.left',
                },
            });
        });
    </script>
</section>
<!-- Check if the user is not logged in -->
<?php if (!isset($_SESSION['user'])) { ?>
<div class="btns-log row no-gutters">
    <div class="col-xs-6">
        <button type="button" class="btn btn-tertiery btn-block" id="btnLogin--home">LOGIN</button>
    </div>
    <div class="col-xs-6">
        <a class="btn btn-accent btn-block" href="<?php echo $urlweb; ?>/m/register">DAFTAR</a>
    </div>
</div>
<?php } ?>

<!-- END Login Buttons-->
<div class="container">
    <div class="ann-wrapper">
        <div class="clearfix pt-2">
            <div class="pull-left pointer">
                <div>
                    <i class="icon-megaphone"></i>
                </div>
            </div>
            <div class="ann-content">
                <marquee scrollamount="5">
                    <?php echo $s0['news']; ?>
                </marquee>
            </div>
        </div>
    </div>
</div>
<!--Shorcut Menu -->
<div class="scroll-wrapper no-gutters" _home>
    <div style="overflow:hidden; " class="scroller">
        <div class="  no-gutters text-center slider-content" #scrollContent>
            <!--//hardcoded links.......-->
            <div class="col">
                <a class="btn-box" href="<?php echo $urlweb; ?>/m/slots/">
                    <i class="icon-slot"></i>
                    <div>SLOTS</div>
                    <span class='hot'>HOT</span>
                </a>
            </div>
            <div class="col">
                <a class="btn-box" href="<?php echo $urlweb; ?>/m/sports/">
                    <i class="icon-soccer"></i>
                    <div>SPORTS</div>
                </a>
            </div>
            <div class="col">
                <a class="btn-box" href="<?php echo $urlweb; ?>/m/casino/">
                    <i class="icon-casino"></i>
                    <div>CASINO</div>
                </a>
            </div>
            <div class="col">
                <a class="btn-box" href="<?php echo $urlweb; ?>/m/poker/">
                    <i class="icon-menu-poker-01"></i>
                    <div>P2P</div>
                </a>
            </div>
            <div class="col">
                <a class="btn-box" href="<?php echo $urlweb; ?>/m/lottery/">
                    <i class="icon-lottery"></i>
                    <div>LOTRE</div>

                    <span class="hot new ">NEW</span>
                </a>
            </div>
            <div class="col">
                <a class="btn-box" href="<?php echo $urlweb; ?>/m/fish-hunter/">
                    <i class="icon-fish_hunter"></i>
                    <div>TEMBAK IKAN</div>
                </a>
            </div>
            <div class="col">
                <a class="btn-box" href="<?php echo $urlweb; ?>/m/e-games/">
                    <i class="icon-others"></i>
                    <div>E-GAMES</div>
                </a>
            </div>
            <div class="col">
                <a class="btn-box" href="<?php echo $urlweb; ?>/m/cockfight/">
                    <i class="icon-cockfight"></i>
                    <div>SABUNG AYAM</div>
                </a>
            </div>
        </div>
    </div>

</div>
<div class="app-wrapper container">
    <div class="jackpot">
        <img class="img-fluid" src="https://sentosa138.org/wp-content/themes/maxwin88/images/jackpot.gif"
            alt="jackpot" />
        <div class="txt-overlay">
            <div class="text-content">
                
            </div>
        </div>
    </div>
    <div class="mobile-border"></div>
    <div class="row">
        <div class="gListSection">

            <div class="g-slider-wrapper">
                <h4 class="title">GAME TERPOPULAR</h4>
                <ul>
                    <?php
                                            // Query untuk mengambil data dari database (gantilah dengan query sesuai kebutuhan)
                                                $sql = "SELECT * FROM game_list where game_provider = 'pr' LIMIT 10";
                                                $result = $conn->query($sql);

                                                // Loop untuk menampilkan data
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<li style="margin-top: 5px; margin-left: 5px;">
                                                            <a class="game-box" href="/gameplay/opengame?gamecode='. $row["game_code"] .'&providercode='.$row['game_provider'].' ">
                                                                <!--[ngTemplateOutlet]="gameItemContent" -->
                                                                <div class="hot-game-tag"></div>
                                                                <img class="lazy"
                                                                    alt="' . $row["game_name"] . '"
                                                                    src=""
                                                                    alt="' . $row["game_title"] . '"
                                                                    data-src="' . $row["game_image"] . '" />
                                                                <!--TODO alt text-->
                                                                <div class="loader-b" *ngIf="!showEle"></div>
                                                                <div class="text-center game-title">' . $row["game_title"] . '</div>
                                                            </a>
                                                        </li>';
                                                }
                                                ?>
            </div>
            <!--games-slider-->

            <div class="mobile-border"></div>
            <div class="g-slider-wrapper">
                <h4 class="title">slots</h4>
                <ul>
                    <?php                                             
                                                // Query untuk mengambil data dari tabel tb_provider
                                                $sqlProvider = "SELECT * FROM tb_wprovider where type ='slot' and status =1";
                                                $resultProvider = $conn->query($sqlProvider);

                                                // Loop untuk menampilkan data
                                                while ($rowProvider = $resultProvider->fetch_assoc()) {
                                                    echo '<li>
                                                            <a href="/m/slots/' . $rowProvider["provider_slug"] . '" class="game-box">
                                                                <!--[ngTemplateOutlet]="gameItemContent" -->
                                                                <img class="lazy"
                                                                    alt="' . $rowProvider["providername"] . '"
                                                                    src=""
                                                                    data-src="' . $rowProvider["image"] . '" />
                                                                <!--TODO alt text-->
                                                                <div class="loader-b" *ngIf="!showEle"></div>
                                                                <div class="text-center game-title">' . $rowProvider["providername"] . '</div>
                                                                <!--</ng-container> -->
                                                            </a>
                                                        </li>';
                                                }
                                                ?>
                </ul>
            </div>

            <div class="mobile-border"></div>
            <div class="g-slider-wrapper">
                <h4 class="title">casino</h4>
                <ul>
                    <?php                                             
                // Query untuk mengambil data dari tabel tb_provider
                    $sqlProvider = "SELECT * FROM provider where provider_type ='LC' and provider_status =1";
                        $resultProvider = $conn->query($sqlProvider);
                        // Loop untuk menampilkan data
                            while ($rowProvider = $resultProvider->fetch_assoc()) {
                             echo '<li>
                                    <a href="/m/casino/' . $rowProvider["provider_slug"] . '" class="game-box">
                                        <!--[ngTemplateOutlet]="gameItemContent" -->
                                        <img class="lazy"
                                        alt="' . $rowProvider["providername"] . '"
                                        src=""
                                        data-src="' . $rowProvider["image"] . '" />
                                        <!--TODO alt text-->
                                        <div class="loader-b" *ngIf="!showEle"></div>
                                        <div class="text-center game-title">' . $rowProvider["providername"] . '</div>
                                        <!--</ng-container> -->
                                    </a>
                                    </li>';
                                                }
                        ?>
                </ul>
            </div>

            <div class="mobile-border"></div>
            <div class="g-slider-wrapper">
                <h4 class="title">p2p</h4>
                <ul>
                <?php                                             
                // Query untuk mengambil data dari tabel tb_provider
                    $sqlProvider = "SELECT * FROM provider where provider_type ='PK' and provider_status =1";
                        $resultProvider = $conn->query($sqlProvider);
                        // Loop untuk menampilkan data
                            while ($rowProvider = $resultProvider->fetch_assoc()) {
                             echo '<li>
                                    <a href="/m/poker/' . $rowProvider["provider_slug"] . '" class="game-box">
                                        <!--[ngTemplateOutlet]="gameItemContent" -->
                                        <img class="lazy"
                                        alt="' . $rowProvider["providername"] . '"
                                        src=""
                                        data-src="' . $rowProvider["image"] . '" />
                                        <!--TODO alt text-->
                                        <div class="loader-b" *ngIf="!showEle"></div>
                                        <div class="text-center game-title">' . $rowProvider["providername"] . '</div>
                                        <!--</ng-container> -->
                                    </a>
                                    </li>';
                                                }
                        ?>
                </ul>
            </div>

            <div class="mobile-border"></div>
            <div class="g-slider-wrapper">
                <h4 class="title">tembak ikan</h4>
                <ul>
                    <li>
                        <a href="/m/fish-hunter/joker-gaming" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="JOKER" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/fishing_joker.jpg?v=9" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">JOKER</div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>
                        <a href="/m/fish-hunter/playstargame" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="PLAYSTAR" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/playstar.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">PLAYSTAR
                            </div>
                            <!--</ng-container> -->
                        </a>
                    </li>
                    <li>

                        <a href="/fish-hunter/spadegaming" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="SPADE GAMING" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/fishing_spade.jpg?v=9" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">SPADE GAMING
                            </div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>




                        <a href="/fish-hunter/cq9" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="CQ9" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/fishing_cq9.jpg?v=9" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">CQ9</div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>




                        <a href="/fish-hunter/skywind" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="SKYWIND" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/fishing_skywind.jpg?v=0.1" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">SKYWIND
                            </div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>
                        <a href="/fish-hunter/dragoonsoft_fishing" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="DRAGOON SOFT" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/fishing_dragoonsoft.jpg?v=1.0" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">DRAGOON SOFT
                            </div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>




                        <a href="/fish-hunter/kagaming_fishing" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="KA GAMING" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/KA_Gaming_Fishing.jpg?v=1.0" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">KA GAMING
                            </div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>




                        <a href="/fish-hunter/fastspin_fishing" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="FASTSPIN" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/fastspin.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">FASTSPIN
                            </div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>




                        <a href="/fish-hunter/live22_fishing" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="LIVE22" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/live22.jpg?v=0.3" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">LIVE22</div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>




                        <a href="/fish-hunter/fachai_fishing" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="FACHAI" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/fishing_fa_chai.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">FACHAI</div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>




                        <a href="/fish-hunter/jdb_fishing" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="JDB" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/jdb_fishing.png" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">JDB</div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                    <li>




                        <a href="/fish-hunter/jili" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="JILI" src=""
                                data-src="https://files.sitestatic.net/GameImage/FishingProviders/thumbnail/normal/jili.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">JILI</div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                </ul>
            </div>

            <div class="mobile-border"></div>
            <div class="g-slider-wrapper">
                <h4 class="title">e-games</h4>
                <ul>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="GEMINI" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/gemini.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">GEMINI</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="JILI" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/jili.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">JILI</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Classic Bola Tangkas" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/rng_cbt.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Classic Bola
                                Tangkas</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Baccarat" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/rng_baccarat.jpg?v=2" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Baccarat
                            </div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Caribbean Stud Poker" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/rng_cpoker.jpg?v=2" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Caribbean
                                Stud Poker</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Classic Keno 10" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/rng_ckeno15.jpg?v=3" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Classic Keno
                                10</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Classic Keno 8" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/rng_ckeno8.jpg?v=3" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Classic Keno
                                8</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Ultimate Keno" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/rng_ukeno.jpg?v=2" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Ultimate
                                Keno</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Bola Tangkas" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/rng_bt.jpg?v=2" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Bola Tangkas
                            </div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Multihand Blackjack" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/multihand_blackjack.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Multihand
                                Blackjack</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Big Bass Crash" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/big-bass-crash.jpg?v=0.11" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Big Bass
                                Crash</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Spaceman" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/spaceman.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Spaceman
                            </div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="American Blackjack" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/american_blackjack.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">American
                                Blackjack</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Roulette" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/slot_prag_roulette.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Roulette
                            </div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Dragon Bonus Baccarat" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/slot_prag_dragon.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Dragon Bonus
                                Baccarat</div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Dragon Tiger" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/dragon_tiger.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Dragon Tiger
                            </div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                    <li>


                        <div class="game-box login-alert">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="Baccarat" src=""
                                data-src="https://files.sitestatic.net/GameImage/RngProviders/thumbnail/normal/baccarat.jpg" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">Baccarat
                            </div>
                            <!--</ng-container> -->
                        </div>


                    </li>
                </ul>
            </div>

            <div class="mobile-border"></div>
            <div class="g-slider-wrapper">
                <h4 class="title">sabung ayam</h4>
                <ul>
                    <li>




                        <a href="/cockfight/sv388" target="_blank" class="game-box">
                            <!--[ngTemplateOutlet]="gameItemContent"> -->
                            <img class="lazy" alt="SV388" src=""
                                data-src="https://files.sitestatic.net/GameImage/CFProviders/thumbnail/normal/cock_sv388.jpg?v=1.0" />
                            <!--TODO alt text-->
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="text-center game-title">SV388</div>
                            <!--</ng-container> -->

                        </a>


                    </li>
                </ul>
            </div>
            <!--games-slider END-->
        </div>
    </div>
    <section class="common-section">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- Last deposit -->
                <div class="lw-horizontal-slider lates-deposit-section">
                    <div class="text-center">
                        <div class="title-wrapper ">
                            <h4 class="common-title text-center"><span
                                    class="ovo-game-heading ovo-game-heading-color Poppins-font ">Setoran
                                    Terakhir</span></h4>
                        </div>
                    </div>
                    <div class="g-slider-wrapper trx-slider-y gradient-bg">
                        <div class="flex-display lw-loop-content">
                            <ul style="position: absolute;" id="list-container-deposit" data-count="20">
                                <!-- Daftar akan ditambahkan secara dinamis di sini -->
                            </ul>
                        </div>

                        <script>
                            // Skrip untuk menambahkan item setoran acak
                            function getRandomDepositData() {
                                // Fungsi ini menghasilkan data deposit acak
                                const names = ["Budi", "Susi", "Joko", "Lina", "Dewi", "Andi", "Rina", "Adi", "Rudi",
                                    "Putri", "Dian", "Ani", "Dedi", "Lia", "Agus", "Sari", "Rina", "Agung", "Fitri",
                                    "Hadi"
                                ];
                                const amounts = ["IDR 50K", "IDR 25K", "IDR 30K", "IDR 100K"];
                                const randomNameIndex = Math.floor(Math.random() * names.length);
                                const originalName = names[randomNameIndex];

                                // Ubah nama dengan menambahkan karakter acak di tengah
                                const firstHalf = originalName.substring(0, Math.floor(originalName.length / 2));
                                const secondHalf = originalName.substring(Math.floor(originalName.length / 2));
                                const newName = firstHalf + "***********";

                                const randomAmount = amounts[Math.floor(Math.random() * amounts.length)];
                                const date = new Date();
                                const randomDate =
                                    `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')} ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;
                                return {
                                    name: newName,
                                    amount: randomAmount,
                                    date: randomDate
                                };
                            }

                            function addRandomDepositItems() {
                                const listContainer = document.getElementById('list-container-deposit');
                                const itemCount = parseInt(listContainer.dataset.count);

                                for (let i = 0; i < itemCount; i++) {
                                    const depositData = getRandomDepositData();

                                    const depositListItem = document.createElement('li');
                                    depositListItem.innerHTML = `
                <div class="flex-start  LW-div">
                    <div>
                        <img class="wd-item__avatar lazy ui avatar image"
                            data-src="https://files.sitestatic.net/AvatarImages/lw_avathar_circle.png"
                            src="">
                    </div>
                    <div class="flex-space-btw">
                        <div>
                            <span class="flex-display lato-font LW-font fw-bold">
                                ${depositData.name} </span>
                            <span class="flex-display lato-font LW-date-font">
                                Deposit, ${depositData.date}</span>
                        </div>
                        <span class="LW-btn lato-font LW-date-fontCurrency">
                            ${depositData.amount} </span>
                    </div>
                </div>
            `;
                                    listContainer.appendChild(depositListItem);
                                }
                            }

                            addRandomDepositItems();
                        </script>


                    </div>
                </div>
                <div class="lw-horizontal-slider ">
                    <div class="text-center">
                        <div class="title-wrapper ">

                            <h4 class="common-title text-center"><span
                                    class="ovo-game-heading ovo-game-heading-color Poppins-font ">Penarikan
                                    Terakhir</span></h4>

                        </div>
                    </div>

                    <div class="g-slider-wrapper  trx-slider-y gradient-bg">

                        <div class="flex-display lw-loop-content">
                            <ul style="position: absolute;" id="list-container" data-count="20">
                                <!-- Daftar akan ditambahkan secara dinamis di sini -->
                            </ul>
                        </div>

                        <script>
                            function getRandomData() {
                                // Fungsi ini menghasilkan data acak
                                const names = ["John", "Jane", "Alice", "Bob", "Charlie", "David", "Emily", "Frank",
                                    "Grace", "Henry"
                                ];
                                const amounts = ["IDR 50K", "IDR 100K", "IDR 200K", "IDR 500K"];
                                const randomNameIndex = Math.floor(Math.random() * names.length);
                                const originalName = names[randomNameIndex];

                                // Ubah nama dengan menambahkan karakter acak di tengah
                                const firstHalf = originalName.substring(0, Math.floor(originalName.length / 2));
                                const secondHalf = originalName.substring(Math.floor(originalName.length / 2));
                                const newName = firstHalf + "********";

                                const randomAmount = amounts[Math.floor(Math.random() * amounts.length)];
                                const date = new Date();
                                const randomDate =
                                    `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')} ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;
                                return {
                                    name: newName,
                                    amount: randomAmount,
                                    date: randomDate
                                };
                            }

                            function addRandomListItems() {
                                const listContainer = document.getElementById('list-container');
                                const itemCount = parseInt(listContainer.dataset.count);

                                for (let i = 0; i < itemCount; i++) {
                                    const data = getRandomData();
                                    const listItem = document.createElement('li');
                                    listItem.innerHTML = `
                    <div class="flex-start  LW-div">
                        <div>
                            <img class="wd-item__avatar lazy ui avatar image"
                                data-src="https://files.sitestatic.net/AvatarImages/lw_avathar_circle.png"
                                src="">
                        </div>
                        <div class="flex-space-btw">
                            <div>
                                <span class="flex-display lato-font LW-font fw-bold">
                                    ${data.name} </span>
                                <span class="flex-display lato-font LW-date-font LW-date-fontWithdraw">
                                    Withdraw, ${data.date}</span>
                            </div>
                            <span class="LW-btn lato-font">
                                ${data.amount} </span>
                        </div>
                    </div>
                `;
                                    listContainer.appendChild(listItem);
                                }
                            }

                            addRandomListItems();
                        </script>
                    </div>
                </div>
                <!--END Last withdraw -->
            </div>
        </div>
    </section>

    <?php
    $sql = "SELECT image FROM tb_banner WHERE cuid = 1";
    $result = $conn->query($sql);
    
    // Periksa apakah ada hasil dari query
    if ($result->num_rows > 0) {
        // Loop melalui hasil query
        while($row = $result->fetch_assoc()) {
            // Tampilkan gambar
            $image = $row['image'];
        }
    } else {
        echo "Tidak ada gambar yang ditemukan dengan status aktif.";
    }
    ?>
    <script>
        $(document).ready(function () {

            console.log((!document.referrer.includes('__cf')))
            if (document.referrer.indexOf(location.protocol + "//" +
                    location.host) ===
                0 && (!document.referrer.includes('__cf'))) {
                sessionStorage.setItem('isClosedPopUp', 'true');
            }
            var isClosedPopUp = sessionStorage.getItem(
                'isClosedPopUp');

            if (isClosedPopUp !== "true") {
                var popUpInst = $.fancybox.open({
                    src: `<a href="/" class="d-inline-block"><img src="<?php echo $image;?>" class="img-fluid" ></a>`,
                    type: 'html',
                    opts: {
                        afterShow: function (instance,
                            current) {
                            console.log(document
                                .referrer.indexOf(
                                    location
                                    .protocol +
                                    "//" + location
                                    .host));
                            console.log(location
                                .protocol + "//" +
                                location
                                .host);
                            console.log(document
                                .referrer);
                            console.log((!document
                                .referrer
                                .includes(
                                    '__cf')))
                            if (document.referrer
                                .indexOf(location
                                    .protocol + "//" +
                                    location.host) ===
                                0 && (!document.referrer
                                    .includes('__cf'))
                            ) {
                                sessionStorage.setItem(
                                    'isClosedPopUp',
                                    'true');
                            }
                        }
                    }
                });
            }
            ajax_jackpot();

            setInterval(function () {
                prize += getRandomIntInclusive(80000000, 3470)
                prize = parseFloat(prize);
                prize = prize;
                $('#jackpot_amount').html(window
                    .currencyCode + ' ' +
                    commaSeparateNumber(prize, true));
            }, 751);

        });
    </script>
    
    <div class="app-info row">
    <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border">
        <h4 class="title">KELEBIHAN LAYANAN</h4>
        <div class="ml-md-2 mt-2 ">
            <div class="row center no-gutters">
                <div class="col-xs-8">
                    <div class="fs-md">DEPOSIT</div>
                    <div>Waktu rata-rata</div>
                </div>
                <div class="col-xs-4 text-right">
                    <div class="mb-0 progressNumber">1<span class="fs-sm">Mins</span></div>
                </div>
                <div class="col-xs-12">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 1%" aria-valuenow="1"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 center no-gutters">
                <div class="col-xs-8">
                    <div class="fs-md">WITHDRAW</div>
                    <div>Waktu rata-rata</div>
                </div>
                <div class="col-xs-4 text-right">
                    <div class="mb-0 progressNumber">3<span class="fs-sm">Mins</span></div>
                </div>
                <div class="col-xs-12">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 3%" aria-valuenow="3"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <p class="mt-3 fs-sm">
                *Referensi Waktu Rata-rata tidak berlaku jika bank offline, gangguan koneksi, dan informasi yang tidak
                lengkap disediakan </p>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border">
        <h4 class="title">JENIS PERMAINAN</h4>

        <section class="carousel-fixed-height">
            <div id="pagination-info" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#pagination-info" data-slide-to="0" class="active">
                    </li>
                    <li data-target="#pagination-info" data-slide-to="1" class="">
                    </li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="item active">

                        <div class="d-block mb-3 pointer text-left">
                            <div class="mb-0 font-weight-bold">1G P2P</div>
                            <div style="white-space: normal;">Tuan rumah hingga 10 game P2P luar biasa dengan pemain
                                sungguhan dan tanpa bot. </div>
                        </div>

                        <div class="d-block mb-3 pointer text-left">
                            <div class="mb-0 font-weight-bold">TEMBAK IKAN</div>
                            <div style="white-space: normal;">Game memancing yang sangat sederhana namun mengasyikkan,
                                petualangan dengan banyak fitur yang akan dinikmati banyak orang. </div>
                        </div>

                        <div class="d-block mb-3 pointer text-left">
                            <div class="mb-0 font-weight-bold">SLOTS</div>
                            <div style="white-space: normal;">Lebih dari 10 merek slot terkenal untuk dipilih dengan
                                lebih dari 1000+ permainan slot dengan sistem suara dan grafik yang realistis. </div>
                        </div>

                    </div>
                    <div class="item">

                        <div class="d-block mb-3 pointer text-left">
                            <div class="mb-0 font-weight-bold">SPORTSBOOK</div>
                            <div style="white-space: normal;">Ribuan peluang setiap hari untuk semua jenis taruhan
                                olahraga di seluruh dunia. </div>
                        </div>

                        <div class="d-block mb-3 pointer text-left">
                            <div class="mb-0 font-weight-bold">RNG</div>
                            <div style="white-space: normal;">Menangkan lebih banyak dengan bertaruh dengan lebih banyak
                                pilihan nomor di keno klasik dan pamungkas kami! </div>
                        </div>

                        <div class="d-block mb-3 pointer text-left">
                            <div class="mb-0 font-weight-bold">LIVE CASINO</div>
                            <div style="white-space: normal;">Rasakan pengalaman dan adrenalin yang sama seperti di
                                kasino sungguhan. </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border">
        <h4 class="title">PUSAT INFO</h4>
        <div class="ml-md-3 mt-md-4">
            <div class="pointer mb-md-4 mb-3"><a href="<?php echo $urlweb; ?>"><i
                        class="i-stop icon-stop2"></i>&nbsp;&nbsp; Cara Bermain SportsBook &nbsp;</a></div>
            <div class="pointer mb-md-4 mb-3"><i class="i-stop icon-stop2"></i><a
                    href="<?php echo $urlweb; ?>">&nbsp;&nbsp; Cara Melakukan Deposit &nbsp;</a></div>
            <div class="pointer "><i class="i-stop icon-stop2"></i><a href="<?php echo $urlweb; ?>">&nbsp;&nbsp; Cara
                    Melakukan Withdraw&nbsp;</a></div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border">
        <h4 class="title">KONTAK LAYANAN PELANGGAN</h4>
        <section class="carousel-fixed-height">
            <div id="pagination-contacts" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#pagination-contacts" data-slide-to="0" class="active" style="margin-right:5px">
                    </li>
                </ol>

                <div class="carousel-inner member-service" role="listbox">

                    <div class="item active">
                        <div class="content-item"><a class="d-block clearfix  mb-3 "
                                href="https://direct.lc.chat/<?php echo $sc['lc_mobile']; ?>" target="_blank">
                                <div class="row no-gutters text-center text-lg-left">
                                    <div class="col-xs-12 col-lg-3 ">
                                        <i class="icon-comment"></i>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 mobile-text">
                                        <div class="mb-0 font-weight-bold">Obrolan Langsung</div>
                                        <div>Klik disini</div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="content-item"> <a class="d-block clearfix  mb-3"
                                href="https://wa.me/<?php echo $wa;?>" target="_blank">
                                <div class="row no-gutters text-center text-lg-left">
                                    <div class="col-xs-12 col-lg-3">
                                        <i class="icon-whatsapp"></i>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 mobile-text">
                                        <div class="mb-0 font-weight-bold">WhatsApp</div>
                                        <div>Klik disini</div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="content-item"> <a class="d-block clearfix  mb-3" href="<?php echo $tele;?>"
                                target="_blank">
                                <div class="row no-gutters text-center text-lg-left">
                                    <div class="col-xs-12 col-lg-3">
                                        <i class="icon-telegram"></i>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 mobile-text">
                                        <div class="mb-0 font-weight-bold">TELEGRAM</div>
                                        <div>Klik disini</div>
                                    </div>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<div class="footerlink version-sec">
    <ul class="clearfix">
        <li>
            <div class="copyright">
                @2024 Seluruh hak cipta | 18+ | v1.55
            </div>
        </li>
    </ul>
</div>

<div class=" text-left footerlink mt-4  ">
    <div class="small">
        Platform Penyedia Layanan </div>
    <div class="mt-2 footer_btm_logo_img">
        <img class="footer_logimg" style="max-height: 50px;" alt="IDWIN" src="<?php echo $s0['image']; ?>">
    </div>
</div>
<div class=" text-left footerlink mt-2">
    <div class="small">
        Cara Pembayaran </div>
    <div class="payment_imgs mt-2">
        <img class="img-fluid mb-3" style="width: 150px; border-radius:10px;border: 1px solid currentColor;"
            src="https://files.sitestatic.net/sprites/bank_logos/bank_col.jpg?v=3">

        <img class="img-fluid mb-3" style="width: 150px; border-radius:10px;border: 1px solid currentColor;"
            src="https://files.sitestatic.net/sprites/bank_logos/ewallet_col.jpg?v=3">

        <img class="img-fluid mb-3" style="width: 150px; border-radius:10px;border: 1px solid currentColor;"
            src="https://files.sitestatic.net/sprites/bank_logos/pulsa_col.jpg?v=3">


    </div>
</div>

    
    <?php include "footer.php";?>