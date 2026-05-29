<?php
      $sql_chat = mysqli_query($conn,"SELECT * FROM `tb_livechat` WHERE cuid = 1") or die(mysqli_error());
      $sc = mysqli_fetch_array($sql_chat);
                $sql = "SELECT * FROM tb_social";
                $result = $conn->query($sql);

                // Menampilkan hasil query
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $wa = $row['wa'];   
                        $tele = $row['tele']; 
                        $fb = $row['facebook'];
                        $ig = $row['instagram'];
                    }
                } else {
                    echo "Tidak ada data WhatsApp ditemukan";
                }   
            ?>
            <?php
$sql = "SELECT status FROM maintenance WHERE id = 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $status = $row["status"];

    if ($status == 1) {
        // Mengarahkan pengguna kembali ke halaman sebelumnya
        header("Location: /mt");
        exit();
    } else {
        // Tindakan lain jika status bukan 1
    }
} else {
    // Tindakan lain jika tidak ada hasil dari query
}
?>
<!DOCTYPE html>
<html lang="id-ID">

<head>
    <title><?php echo $s0['instansi']; ?></title>
    <meta name="description" content="<?php echo $s0['deskripsi']; ?>">
    <meta name="keywords" content="<?php echo $s0['keyword']; ?>">
    <meta property="og:title" content="<?php echo $s0['instansi']; ?>" />
    <meta property="og:description" content="<?php echo $s0['deskripsi']; ?>" />
    <meta property="og:url" content="<?php echo $urlweb; ?>" />
    <meta property="og:image" content="<?php echo $s0['image']; ?>" />
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="author" content="<?php echo $urlweb; ?>" />
    <meta name="contact" content="<?php echo $urlweb; ?>" />
    <meta name="copyright" content="Copyright (c) <?php echo $urlweb; ?>. All Rights Reserved." />
    <meta name="robots" content="index, nofollow">
    <meta name="author" content="superhoki77">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo $s0['urlweb']; ?>">
    <link rel="icon" type="image/png" href="<?php echo $s0['image']; ?>">

    <meta property="og:type" content="website">
    <meta name="revisit-after" content="1 days">
    <meta name="google-site-verification" content="kode-verifikasi">
    <meta name="google-site-verification" content="TXMelfP-fF1nbe9_KqVXHSHvzW03f_qfFy6CAdpPWPQ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
        crossorigin="anonymous"   />
    <!-- Meta Pixel Code -->
    <script>
        ! function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1008275913534968');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1008275913534968&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="zYfuAettv5ooKJKWkIJRDCNZn9QosiU0a4f0jQ6a">
    <script src="https://cdn.sitestatic.net/assets/jquery/jquery.min.js"></script>
    <script src="https://cdn.sitestatic.net/assets/bootstrap/bootstrap.min.js"></script>
    <link rel="preload" href="/fonts/ugsports/icomoon/fonts/icomoon.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $urlweb; ?>/fonts/ugsports/icomoon/style.min.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="<?php echo $urlweb; ?>/css/ugsports/swiper.css" />

    <?php
        $query = "SELECT * FROM tb_theme WHERE status = '1'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tema =$row['path'];
        } else {
            echo "No active theme found";
        }
    ?>

    <link type="text/css" rel="stylesheet" href="<?php echo $urlweb; ?>/css/ugsports/theme-20/d/<?php echo $tema; ?>">
    <script src="https://cdn.sitestatic.net/assets/jquery/sweet_alert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.sitestatic.net/assets/jquery/jquery-ui.min.css">
    <script src="https://cdn.sitestatic.net/assets/jquery/jquery-ui.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.sitestatic.net/assets/jquery/jquery.ui.touch-punch.min.js" defer>
    </script>
</head>

<body class="desktop home">
    <div style="display:none;"> 20</div>
    <div class="top_navbar">
        <div class="header-wrapper">
            <div id="masthead" class="main-header container">
                <div class="inner-header flex-row logo-left md-logo-center">
                    <div id="logo" class="flex-col logo">
                        <a href="/" title="">
                            <!--TODO put site tile-->
                            <img class="img-fluid" alt="Logo"
                                src="<?php echo $s0['image']; ?>"
                                style="max-width: 270px;" />
                        </a>
                    </div>

                    <!-- Mobile Left Elements -->
                    <div class="flex-col show-for-medium flex-left  fs-lg ">
                        <i class="icon-bars"></i>
                    </div>
                    <!-- Left Elements -->
                    <div class="flex-col hide-for-medium flex-left flex-grow">
                    </div>
                    <!-- Desktop Right Elements -->
                    <div class="flex-col hide-for-medium flex-right">
                        <div class="flex-row top text-right">
                            <span class="text-right time"></span>
                            <div class=" line"></div>
                            <div class="social-icons fade-in" id="blk-socialIcons--top-bar" style="flex-wrap:nowrap;">
                                <a href="https://www.facebook.com/" target="_blank"
                                    i18n-tooltip="@Follow-FB" tooltip="Ikuti di Facebook" data-toggle="tooltip"
                                    data-placement="top" title="Follow on Facebook!"
                                    class="facebook button icon circle ">
                                    <i class="icon-facebook"></i>
                                </a>
                                <!--
  -->
                                <a href="https://" target="_blank" i18n-tooltip="@Tweet-us" data-toggle="tooltip"
                                    data-placement="top" title="Tweet us!" class="twitter  button icon circle  "><i
                                        class="icon-twitter "></i></a>
                                <!--
  -->
                                <a href="https://www.instagram.com/" target="_blank"
                                    i18n-tooltip="@Instagram-us" data-toggle="tooltip" data-placement="top"
                                    title="Instagram us!" class="instagram  button icon circle "><i
                                        class="icon-instagram"></i></a>
                                <!--
  -->
                                <a href="https://" target="_blank" i18n-tooltip="@See-our-youtube" data-toggle="tooltip"
                                    data-placement="top" title="See our youtube video to know more!"
                                    class=" youtube button icon circle "><i class="icon-youtube-play"></i></a>

                            </div>
                            <button class="btn button icon circle share" style="" id="btn-showSocialIcons--top-bar">
                                <i class="icon-share" style="left:-1px;"></i>
                                <i class="icon-close hide"></i>
                            </button>
                            <div class=" line"></div>

                            <a class="country_detail" href="javascript:void(0);" data-trigger='nifty'
                                data-target='#langModal-mobile'>
                                <span class="d-inline-block circle-id"></span>
                                <span class="contry_name">Indonesia</span>
                                <span class='dot'></span>
                                <span class="lang_name">indonesian</span>
                            </a>
                            <div class="  line"></div>
                        </div>
                        <!-- Sudah Login -->
                        <?php
                            if(isset($_SESSION['user'])){
                                $user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE username = '".$_SESSION['user']."'") or die (mysqli_error());
                                $u = mysqli_fetch_array($user);
                                $users = $u['username'];
                                $userid = $u['username'];
                                $id_user = $u['cuid'];
                                $userID = $u['cuid'];
                                $token_id = isset($u['token_id']) ? $u['token_id'] : false;
                                $level = isset($u['level']) ? $u['level'] : false;

                                $sql_balance = mysqli_query($conn,"SELECT * FROM `tb_balance` WHERE userID = '$userID'") or die(mysqli_error());
                                $sb = mysqli_fetch_array($sql_balance);
                        ?>
                        <div class="flex-row text-right mid">
                            <a class="enlarge" href="<?php echo $urlweb; ?>/desktop/profile/member-level">
                                <div class="member_leavel">
                                    <p class="member_leavel_name">Regular</p>
                                    <span class=" icon_logo bg_bronze"></span>
                                </div>
                            </a>
                            <div class="line"></div>
                            <a href="<?php echo $urlweb; ?>/desktop/profile" class="enlarge user-account">
                                <div>
                                    <i class="icon-user-o" style="font-size:1.2rem;"></i>
                                </div>
                                <div class="text-center">
                                    <br>
                                    <span><?php echo $u['username']; ?></span>
                                </div>
                            </a>
                            <div class="line"></div>
                            <a class="pointer button icon" href="/memo" data-toggle="tooltip" data-placement="top"
                                title="Pesan">
                                <i class="icon-mail_outline"></i>
                                <div class="mail_icon" style="display:none;">
                                    0
                                </div>
                            </a>
                            <div class="line"></div>
                            <a class="pointer" href="javascript:void(0)"
                                onclick="openLiveChat('https://direct.lc.chat/<?php echo $sc['lc_mobile']; ?>')"
                                data-toggle="tooltip" data-placement="top" title="Obrolan Langsung">
                                <i class="icon-chat1"></i>
                            </a>
                            <div class="  line"></div>

                            <div class="social-icons info_toggle fade-in" id="blk-helpIcons--nexttop-bar"
                                style="flex-wrap:nowrap;">
                                <a class="pointer button twitter icon circle"
                                    href="<?php echo $urlweb; ?>/info/how-sportsbook" data-toggle="tooltip"
                                    data-placement="top" title="Cara bermain">
                                    <i class="icon-help-circle"></i>
                                </a>
                                <a class="pointer button twitter icon circle"
                                    href="<?php echo $urlweb; ?>/info/faq-general" data-toggle="tooltip"
                                    data-placement="top" title="Pusat Info">
                                    <i class="icon-info"></i>
                                </a>
                            </div>
                            <button class="btn button icon circle share" style="" id="btn-showhelpIcons--nexttop-bar">
                                <i class="icon-bars"></i>
                                <i class="icon-close hide"></i>
                            </button>
                            <a style="" class="btn btn-primary" href="<?php echo $urlweb; ?>/desktop/logout"
                                style="margin-right: 0;" i18n="@Logout">KELUAR</a>
                        </div>
                        <div class="acc-panel flex-row last">
                        <div class="dropdown">
                            <button class="btn btn-link enlarge wallet btn-getbalance" onclick="refreshBalance()">
                                <i class="icon-wallet"></i>
                                <span id="mainBalance" class="mainBalance">IDR <?php echo number_format($sb['active']); ?></span>
                                
                                <i class="icon-refresh-2"></i>
                            </button>
                        </div>

                            <script>
                                function refreshBalance() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('GET', '/getBal.php', true);
                                    xhr.onload = function () {
                                        if (xhr.status >= 200 && xhr.status < 400) {
                                            // Perbarui nilai saldo dengan data baru
                                            document.getElementById('mainBalance').innerHTML = 'IDR ' + xhr
                                                .responseText;
                                        } else {
                                            console.error('Gagal memuat ulang saldo');
                                        }
                                    };
                                
                                    xhr.onerror = function () {
                                        console.error('Gagal memuat ulang saldo');
                                    };
                                    // Kirim permintaan
                                    xhr.send();
                                }
                            </script>
                            <div class="dropdown enlarge">
                            </div>
                            <div class="dropdown enlarge">
                                <button class="btn btn-clear btn-collapse-balances pull-right animation"
                                    id="transaction-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Transaksi &nbsp; <i class="icon-chevron-thin-down"></i>
                                </button>
                                <div class="dropdown-menu transaction-dropdown" aria-labelledby="transaction-dropdown">
                                    <ul class="drop_link" style="margin-bottom:0">

                                        <li><a href="<?php echo $urlweb; ?>/desktop/account/deposit"> <i class="icon-pig"></i>
                                                <span>Deposit</span></a>
                                        </li>

                                        <li><a href="<?php echo $urlweb; ?>/desktop/account/withdrawal"><i
                                                    class="icon-transfer"></i>
                                                <span>Withdraw</span></a></li>

                                        <li><a href="<?php echo $urlweb; ?>/desktop/account/history"><i class="icon-history"></i>
                                                <span i18n="@History">Pernyataan</span></a></li>
                                        <li style="border-bottom: 0"><a href="<?php echo $urlweb; ?>/referral-downline"><i
                                                    class="icon-users"></i>
                                                <span>Referral</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <a href="<?php echo $urlweb; ?>/desktop/promo/my-promo" class="enlarge"><i class="icon-gift"
                                    style="font-size:1.2rem;"></i><span>Promo saya</span></a>

                        </div>

                    </div>
                    <?php } else { ?>
                    <!-- Belum Login -->
                    <div class="flex-row text-right mid">

                        <a class="pointer button twitter icon" href="/info/how-sportsbook" data-toggle="tooltip"
                            data-placement="top" title="Cara bermain">
                            <i class="icon-help-circle"></i>
                        </a>
                        <div class="line"></div>


                        <a class="pointer button twitter icon" href="/info/faq-general" data-toggle="tooltip"
                            data-placement="top" title="Pusat Info">
                            <i class="icon-info"></i>
                        </a>
                        <div class="  line"></div>
                        <a class="pointer" href="javascript:void(0)"
                            onclick="openLiveChat('https://direct.lc.chat/<?php echo $sc['lc_mobile']; ?>' , '')" data-toggle="tooltip"
                            data-placement="top" title="Obrolan Langsung">
                            <i class="icon-chat1"></i>
                        </a>
                        <div class="  line"></div>
                        <button type="button" class="btn fix btn-tertiery green_over" _ajaxLForm data-trigger='nifty'
                            data-target='#login-modal--layout'><span>LOGIN</span></button>

                        <a type="button" class="btn fix  btn-accent yellow_over" style="margin-right: 0;" i18n="@Join"
                            href="<?php echo $urlweb; ?>/desktop/register" routerLinkActive="link-active"><span>DAFTAR</span></a>

                    </div>


                </div>

                <!-- MObile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <div class="flex-row  text-right" style="justify-content: flex-end;">
                        <button style="" type="button" class="btn btn-primary btnLogin" _ajaxLForm _ajaxLForm
                            data-trigger='nifty' data-target='#login-modal--layout'>LOGIN</button>
                        <!--<a *ngIf="!isLogin" class="btn btn-secondary" (click)="register.emit()" routerLink="#" routerLinkActive="link-active">Join</a>-->
                        <a style="" type="button" class="btn btn-tertiery" href="<?php echo $urlweb; ?>/desktop/register">DAFTAR</button>
                            <a style="display:none" class="btn btn-primary" href="/logout">KELUAR</a>
                    </div>
                </div>
                <?php } ?>
                </ng-container>
            </div>
        </div>

    </div>
    <!--Main Nav-->
    <div class="main nav-wrapper">
        <div>
            <div class="main-nav nav nav-pills nav-fill ">

                <div class="nav-item">


                    <div class="nav-item-content ">
                        <div class="container">
                            <div class="flex-row">


                                <div class="auto-box text-center active  " style="flex: 0 0 15%;">
                                    <a href="/info/faq-general" target=_blank>
                                        <div class="text-center  ">
                                            <img src="/assets/images/nav_imgs/Sub-InfoCentre.png" class="  img-fluid   "
                                                alt="info">

                                        </div>
                                        <div class="menu-item-title ">Pusat Info</div>

                                    </a>

                                </div>

                                <div class="auto-box text-center active  " style="flex: 0 0 15%;">
                                    <a href="/contact-us" target=_blank>
                                        <div class="text-center  ">
                                            <img src="/assets/images/nav_imgs/Sub-ContactUs.png" class="  img-fluid  "
                                                alt="Hubungi kami">

                                        </div>
                                        <div class="menu-item-title">Hubungi kami</div>

                                    </a>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item ">
                    <!--*ngFor="let menuItem of arrMenu"-->
                    <a class="navlink" href="<?php echo $urlweb; ?>/desktop/slots/">
                        <!--[routerLink]="['/games/slots',menuItem.MenuTitle]"-->
                        <div class="nav-icon ">
                            <span>
                                <i *ngIf="menuItem.MenuTitleCode==MenuTitleCode.SLOTS" class="icon-slot"></i>
                            </span>
                            <span class="hot">HOT</span>

                        </div>
                        <div class="nav-title">
                            slots </div>
                    </a>
                    <div class="nav-item-content ">
                        <div class="container">
                        <div class="flex-row">
                            <?php
                            // Query untuk mengambil data penyedia permainan dari database
                            $query = mysqli_query($conn, "SELECT * FROM provider WHERE provider_type = 'sl' and provider_status = 1");
                            $count = 0; // Variabel untuk menghitung jumlah elemen pada baris
                            while ($provider = mysqli_fetch_assoc($query)) {
                                $provider_name = $provider['provider_name'];
                                $provider_image = $provider['image'];
                                $provider_url = '/desktop/slots/game/?provider=' . $provider['provider_code']; // Sesuaikan dengan URL sesuai kebutuhan
                            ?>
                            <div class="auto-box text-center active <?php echo strtolower(str_replace(' ', '-', $provider_name)); ?>" [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                <a rel="opener" href="<?php echo $provider_url; ?>">
                                    <img alt="<?php echo $provider_name; ?>" src="<?php echo $provider_image; ?>" data-src="<?php echo $provider_image; ?>" *ngIf="showEle" height="90" />
                                    <div class="menu-item-title"><?php echo $provider_name; ?></div>
                                </a>
                            </div>
                            <?php 
                                $count++;
                                // Jika sudah mencapai 6 elemen, tutup div flex-row dan buka yang baru
                                if ($count == 6) {
                                    echo '</div><div class="flex-row">';
                                    $count = 0; // Reset count
                                }
                            }
                            ?>
            </div>

                        </div>
                    </div>
                </div>
                <div class="nav-item ">
                    <!--*ngFor="let menuItem of arrMenu"-->
                    <a class="navlink" href="<?php echo $urlweb; ?>/desktop/sports">
                        <!--[routerLink]="['/games/slots',menuItem.MenuTitle]"-->
                        <div class="nav-icon ">
                            <span>
                                <i *ngIf="menuItem.MenuTitleCode==MenuTitleCode.SPORTS" class="icon-soccer"></i>
                            </span>
                        </div>
                        <div class="nav-title">
                            sports </div>
                    </a>
                    <div class="nav-item-content ">
                        <div class="container">
                            <div class="flex-row">
                            <?php
                            // Query untuk mengambil data penyedia permainan dari database
                            $query = mysqli_query($conn, "SELECT * FROM provider WHERE provider_type = 'sb' and provider_status = 1");
                            $count = 0; // Variabel untuk menghitung jumlah elemen pada baris
                            while ($provider = mysqli_fetch_assoc($query)) {
                                $provider_name = $provider['provider_name'];
                                $provider_image = $provider['image'];
                                $provider_url = '/desktop/sport/game/?provider=' . $provider['provider_code']; // Sesuaikan dengan URL sesuai kebutuhan
                            ?>
                            <div class="auto-box text-center active <?php echo strtolower(str_replace(' ', '-', $provider_name)); ?>" [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                <a rel="opener" href="<?php echo $provider_url; ?>">
                                    <img alt="<?php echo $provider_name; ?>" src="<?php echo $provider_image; ?>" data-src="<?php echo $provider_image; ?>" *ngIf="showEle" height="90" />
                                    <div class="menu-item-title"><?php echo $provider_name; ?></div>
                                </a>
                            </div>
                            <?php 
                                $count++;
                                // Jika sudah mencapai 6 elemen, tutup div flex-row dan buka yang baru
                                if ($count == 6) {
                                    echo '</div><div class="flex-row">';
                                    $count = 0; // Reset count
                                }
                            }
                            ?>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="nav-item ">
                    <!--*ngFor="let menuItem of arrMenu"-->
                    <a class="navlink" href="<?php echo $urlweb; ?>/desktop/casino">
                        <!--[routerLink]="['/games/slots',menuItem.MenuTitle]"-->
                        <div class="nav-icon ">
                            <span>
                                <i *ngIf="menuItem.MenuTitleCode==MenuTitleCode.CASINO" class="icon-casino"></i>
                            </span>
                        </div>
                        <div class="nav-title">
                            casino </div>
                    </a>

                    <div class="nav-item-content ">
                        <div class="container">
                            <div class="flex-row">

                            <?php
                            // Query untuk mengambil data penyedia permainan dari database
                            $query = mysqli_query($conn, "SELECT * FROM provider WHERE provider_type = 'lc' and provider_status = 1");
                            $count = 0; // Variabel untuk menghitung jumlah elemen pada baris
                            while ($provider = mysqli_fetch_assoc($query)) {
                                $provider_name = $provider['provider_name'];
                                $provider_image = $provider['image'];
                                $provider_url = '/desktop/casino/game/?provider=' . $provider['provider_code']; // Sesuaikan dengan URL sesuai kebutuhan
                            ?>
                            <div class="auto-box text-center active <?php echo strtolower(str_replace(' ', '-', $provider_name)); ?>" [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                <a rel="opener" href="<?php echo $provider_url; ?>">
                                    <img alt="<?php echo $provider_name; ?>" src="<?php echo $provider_image; ?>" data-src="<?php echo $provider_image; ?>" *ngIf="showEle" height="90" />
                                    <div class="menu-item-title"><?php echo $provider_name; ?></div>
                                </a>
                            </div>
                            <?php 
                                $count++;
                                // Jika sudah mencapai 6 elemen, tutup div flex-row dan buka yang baru
                                if ($count == 6) {
                                    echo '</div><div class="flex-row">';
                                    $count = 0; // Reset count
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item ">
                    <!--*ngFor="let menuItem of arrMenu"-->
                    <a class="navlink" href="<?php echo $urlweb; ?>/desktop/poker">
                        <!--[routerLink]="['/games/slots',menuItem.MenuTitle]"-->
                        <div class="nav-icon ">
                            <span>
                                <i *ngIf="menuItem.MenuTitleCode==MenuTitleCode.P2P" class="icon-menu-poker-01"></i>
                            </span>
                        </div>
                        <div class="nav-title">
                            p2p </div>
                    </a>

                    <div class="nav-item-content ">
                        <div class="container">
                            <div class="flex-row">
                            <?php
                            // Query untuk mengambil data penyedia permainan dari database
                            $query = mysqli_query($conn, "SELECT * FROM provider WHERE provider_type = 'PK' and provider_status = 1");
                            $count = 0; // Variabel untuk menghitung jumlah elemen pada baris
                            while ($provider = mysqli_fetch_assoc($query)) {
                                $provider_name = $provider['provider_name'];
                                $provider_image = $provider['image'];
                                $provider_url = '/desktop/slots/game/?provider=' . $provider['provider_code']; // Sesuaikan dengan URL sesuai kebutuhan
                            ?>
                            <div class="auto-box text-center active <?php echo strtolower(str_replace(' ', '-', $provider_name)); ?>" [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                <a rel="opener" href="<?php echo $provider_url; ?>">
                                    <img alt="<?php echo $provider_name; ?>" src="<?php echo $provider_image; ?>" data-src="<?php echo $provider_image; ?>" *ngIf="showEle" height="90" />
                                    <div class="menu-item-title"><?php echo $provider_name; ?></div>
                                </a>
                            </div>
                            <?php 
                                $count++;
                                // Jika sudah mencapai 6 elemen, tutup div flex-row dan buka yang baru
                                if ($count == 6) {
                                    echo '</div><div class="flex-row">';
                                    $count = 0; // Reset count
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item ">
                    <!--*ngFor="let menuItem of arrMenu"-->
                    <a class="navlink" href="<?php echo $urlweb; ?>/desktop/lottery">
                        <!--[routerLink]="['/games/slots',menuItem.MenuTitle]"-->
                        <div class="nav-icon ">
                            <span>
                                <i class="icon-lottery"></i>
                            </span>
                            <span class="hot new">NEW</span>

                        </div>
                        <div class="nav-title">
                            LOTRE </div>
                    </a>

                    <div class="nav-item-content ">
                        <div class="container">
                            <div class="flex-row">
                            <?php
                            // Query untuk mengambil data penyedia permainan dari database
                            $query = mysqli_query($conn, "SELECT * FROM game_list WHERE game_type = 'lk' and game_status = 1");
                            $count = 0; // Variabel untuk menghitung jumlah elemen pada baris
                            while ($provider = mysqli_fetch_assoc($query)) {
                                $provider_name = $provider['game_name'];
                                $provider_image = $provider['game_image'];
                                $provider_url = '/gameplay/opengame/?gamecode=' . $provider['game_code']; // Sesuaikan dengan URL sesuai kebutuhan
                            ?>
                            <div class="auto-box text-center active <?php echo strtolower(str_replace(' ', '-', $provider_name)); ?>" [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                <a rel="opener" href="<?php echo $provider_url; ?>">
                                    <img alt="<?php echo $provider_name; ?>" src="<?php echo $provider_image; ?>" data-src="<?php echo $provider_image; ?>" *ngIf="showEle" height="90" />
                                    <div class="menu-item-title"><?php echo $provider_name; ?></div>
                                </a>
                            </div>
                            <?php 
                                $count++;
                                // Jika sudah mencapai 6 elemen, tutup div flex-row dan buka yang baru
                                if ($count == 6) {
                                    echo '</div><div class="flex-row">';
                                    $count = 0; // Reset count
                                }
                            }
                            ?>                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item ">
                    <!--*ngFor="let menuItem of arrMenu"-->
                    <a class="navlink" href="<?php echo $urlweb; ?>/desktop/fishing/game/">
                        <!--[routerLink]="['/games/slots',menuItem.MenuTitle]"-->
                        <div class="nav-icon ">
                            <span>
                                <i *ngIf="menuItem.MenuTitleCode==MenuTitleCode.FISHHUNTER"
                                    class="icon-fish_hunter"></i>
                            </span>
                        </div>
                        <div class="nav-title">
                            tembak ikan </div>
                    </a>

                    <div class="nav-item-content ">
                        <div class="container">
                            <div class="flex-row">
                               <?php
                            // Query untuk mengambil data penyedia permainan dari database
                            $query = mysqli_query($conn, "SELECT * FROM provider WHERE provider_type = 'FH' and provider_status = 1");
                            $count = 0; // Variabel untuk menghitung jumlah elemen pada baris
                            while ($provider = mysqli_fetch_assoc($query)) {
                                $provider_name = $provider['provider_name'];
                                $provider_image = $provider['image'];
                                $provider_url = '/desktop/fishing/game/?provider=' . $provider['provider_code']; // Sesuaikan dengan URL sesuai kebutuhan
                            ?>
                            <div class="auto-box text-center active <?php echo strtolower(str_replace(' ', '-', $provider_name)); ?>" [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                <a rel="opener" href="<?php echo $provider_url; ?>">
                                    <img alt="<?php echo $provider_name; ?>" src="<?php echo $provider_image; ?>" data-src="<?php echo $provider_image; ?>" *ngIf="showEle" height="90" />
                                    <div class="menu-item-title"><?php echo $provider_name; ?></div>
                                </a>
                            </div>
                            <?php 
                                $count++;
                                // Jika sudah mencapai 6 elemen, tutup div flex-row dan buka yang baru
                                if ($count == 6) {
                                    echo '</div><div class="flex-row">';
                                    $count = 0; // Reset count
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item ">
                    <!--*ngFor="let menuItem of arrMenu"-->
                    <a class="navlink" href="<?php echo $urlweb; ?>/desktop/e-games">
                        <!--[routerLink]="['/games/slots',menuItem.MenuTitle]"-->
                        <div class="nav-icon ">
                            <span>
                                <i class="icon-others"></i>
                            </span>
                        </div>
                        <div class="nav-title">
                            e-games </div>
                    </a>

                    <div class="nav-item-content ">
                        <div class="container">
                            <div class="flex-row">

                                <div class="auto-box text-center active jili"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <a rel="opener" href="<?php echo $urlweb; ?>/desktop/e-games/jili">
                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/jili_rng.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/jili_rng.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">JILI</div>

                                    </a>

                                </div>
                                <div class="auto-box text-center active bola-tangkas"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/bola_blind_1.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/bola_blind_1.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Bola Tangkas</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active classic-bola-tangkas"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/classic_bola_blind_1.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/classic_bola_blind_1.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Classic Bola Tangkas</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active ultimate-keno"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/keno_1.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/keno_1.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Ultimate Keno</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active classic-8-keno"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/keno_2.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/keno_2.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Classic Keno 8</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active classic-15-keno"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/keno_3.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/keno_3.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Classic Keno 10</div>
                                    </div>


                                </div>
                            </div>
                            <div class="flex-row">

                                <div class="auto-box text-center active stud-poker"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/poker_1.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/poker_1.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Caribbean Stud Poker</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active baccarat"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/baccarat_1.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ug_rng/baccarat_1.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Baccarat</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active pp-baccarat"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bca.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bca.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Baccarat</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active multihand-blackjack"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bjma.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bjma.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Multihand Blackjack</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active dragon-tiger"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bndt.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bndt.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Dragon Tiger</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active dragon-bonus-baccarat"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bnadvanced.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bnadvanced.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Dragon Bonus Baccarat</div>
                                    </div>


                                </div>
                            </div>
                            <div class="flex-row">

                                <div class="auto-box text-center active roulette"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/rla.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/rla.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Roulette</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active american-blackjack"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bjmb.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/bjmb.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">American Blackjack</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active spaceman"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/1302.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/1302.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Spaceman</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active big-bass-crash"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/1320.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/pp_rng/1320.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">Big Bass Crash</div>
                                    </div>


                                </div>
                                <div class="auto-box text-center active hide_this_sec"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <a rel="opener" href"//" target="_blank">
                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title"></div>

                                    </a>

                                </div>
                                <div class="auto-box text-center active hide_this_sec"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <div class="a-disabledLink  login-alert">

                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title"></div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item ">
                    <!--*ngFor="let menuItem of arrMenu"-->
                    <a class="navlink" href="<?php echo $urlweb; ?>/desktop/cockfight">
                        <!--[routerLink]="['/games/slots',menuItem.MenuTitle]"-->
                        <div class="nav-icon ">
                            <span>
                                <i *ngIf="menuItem.MenuTitleCode==MenuTitleCode.COCKFIGHT" class="icon-cockfight"></i>
                            </span>
                        </div>
                        <div class="nav-title">
                            sabung ayam </div>
                    </a>

                    <div class="nav-item-content ">
                        <div class="container">
                            <div class="flex-row">

                                <div class="auto-box text-center active sv388"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <a rel="opener" href="/cockfight/sv388" target="_blank">
                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/sv388_cf.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/sv388_cf.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title">SV388</div>

                                    </a>

                                </div>
                                <div class="auto-box text-center active hide_this_sec"
                                    [ngClass]="{'flex-grow-2' : item.FlexGrow =='2'}">
                                    <a rel="opener" href="//" target="_blank">
                                        <img alt=""
                                            src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/.png"
                                            data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/.png"
                                            *ngIf="showEle" height="90" />
                                        <div class="menu-item-title"></div>

                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item ">
                    <a class="navlink " href="<?php echo $urlweb; ?>/desktop/promotion">
                        <div class="nav-icon">
                            <span><i class="icon-gift"></i></span>
                        </div>
                        <div class="nav-title" i18n="@PROMOS">PROMOSI</div>
                    </a>
                </div>

                <div class="nav-item ">
                    <a class="navlink " href="<?php echo $urlweb; ?>/desktop/referral">
                        <div class="nav-icon">
                            <span>
                                <i class="icon-users"></i>
                            </span>
                        </div>
                        <div class="nav-title" i18n="@REFERRAL">REFERRAL</div>
                    </a>
                </div>



            </div>
        </div>

    </div>
    <!--END main nav-->
    </div>
    <div class="floats floats-right">
        <div class="slider">
            <div class="fc">
                <div class="fc-left text-center">
                    <div class="center i-circle" style="padding-top:5px;">
                        <i class="icon-phone"></i>
                    </div>
                    <div class="bottom-to-top center fs-lg" i18n="@CONTACT-US-"> &nbsp;HUBUNGI KAMI &nbsp;</div>
                    <div class="center fs-md">
                        <i class="icon-double_arrow_r"></i>
                    </div>
                </div>
                <div class="fc-right center fs-lg">
                    <div class="bg-1">
                        <div class="text-center"> <span class="txt-xxl"><i
                                    class="icon-24-7 icon-sun-moon"></i><span>24x7</span></span> </div>
                        <div class="row no-gutters">
                            <div class="col-xs-6">
                                <a class="btn btn-block btn-accent green_over" href="javascript:void(0)"
                                    onclick="openLiveChat('https://direct.lc.chat/<?php echo $sc['lc_mobile']; ?>' , '')" id="btn-joinNow"
                                    i18n="@LIVE-HELP">LIVE HELP</a>
                            </div>
                            <div class="col-xs-6">
                                <a class="btn btn-block btn-tertiery yellow_over" href="<?php echo $urlweb; ?>/desktop/register" id="btn-joinNow"
                                    i18n>JOIN NOW</a>
                            </div>
                        </div>
                        <div class="box flex flex-align-top ">
                            <i class="icon-clock"></i>
                            <div class="pl-2 font-size-sm "><span i18n>Quick Easy Deposit</span><br /><span
                                    i18n="@Fast-withdraw">Fast withdraw</span></div>
                        </div>
                    </div>
                    <div class="bg-2 fs-lg text-left">
                        <a class="btn btn-block box btn-primary contact-values"
                            href="https://api.whatsapp.com/send?phone=<?php echo $wa;?>" target="_blank">
                            <span class="dis_flex">
                                <span class="icon-txt"><i
                                        class="icon-whatsapp"></i></span><span><?php echo $wa; ?></span>
                            </span>
                        </a>
                        <a class="btn btn-block box btn-primary contact-values"
                            href="https://api.whatsapp.com/send?phone=<?php echo $wa; ?>" target="_blank">
                            <span class="dis_flex">
                                <span class="icon-txt"><i
                                        class="icon-whatsapp"></i></span><span><?php echo $wa; ?></span>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Popup -->
    <script>
    // Fungsi untuk menampilkan SweetAlert2
    function registerPopup(options) {
      Swal.fire({
        title: 'Game Sedang Maintenance',
        text: options.content,
        icon: 'error',
        confirmButtonText: 'Tutup'
      });
    }
  </script>
  <!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window._lc = window._lc || {};
    window._lc.license = <?php echo $sc['lc_mobile']; ?>;
    window.__lc = window.__lc || {};
    window.__lc.license = window._lc.license;
    ;(function(n,t,c){function i(n){return e.h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n._lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/<?php echo $sc['lc_mobile']; ?>/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->
