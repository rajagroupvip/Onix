<!DOCTYPE html>
<html lang="id-ID">

<head>
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
    <title><?php echo $s0['instansi']; ?></title>
    <meta name="description" content="<?php echo $s0['deskripsi']; ?>">
    <meta name="keywords" content="<?php echo $s0['keyword']; ?>">
    <meta property="og:title" content="<?php echo $s0['instansi']; ?>" />
    <meta property="og:description" content="<?php echo $s0['deskripsi']; ?>" />
    <meta property="og:url" content="<?php echo $urlweb; ?>" />
    <meta property="og:image" content="<?php echo $urlweb; ?>/upload/<?php echo $s0['image']; ?>" />
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="author" content="<?php echo $urlweb; ?>" />
    <meta name="contact" content="<?php echo $urlweb; ?>" />
    <meta name="copyright" content="Copyright (c) <?php echo $urlweb; ?>. All Rights Reserved." />
    <meta name="robots" content="index, nofollow">
    <meta property="og:image" content="https://files.sitestatic.net/banners/645731708fb1b_tumi123-freebet-1920x430.jpg">

    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="author" content="<?php echo $s0['instansi']; ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo $s0['urlweb']; ?>">
    <meta property="og:type" content="website">
    <meta name="revisit-after" content="1 days">
    <meta name="google-site-verification" content="TXMelfP-fF1nbe9_KqVXHSHvzW03f_qfFy6CAdpPWPQ">
    <link rel="icon" type="image/png" href="<?php echo $s0['image']; ?>">

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

    <meta charset="utf-8">

    <meta name="csrf-token" content="Ohsf8q2CXEI97FMGjTPzKL6QKvW8nrMQiuOtxJui">

    <script src="https://cdn.sitestatic.net/assets/jquery/jquery.min.js"></script>
    <script src="https://cdn.sitestatic.net/assets/bootstrap/bootstrap.min.js"></script>

    <link rel="preload" href="/fonts/ugsports/icomoon/fonts/icomoon.woff2?fx18yi" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="stylesheet" href="/fonts/ugsports/icomoon/style.min.css" media="print" onload="this.media='all'">

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

    <link type="text/css" rel="stylesheet" href="<?php echo $urlweb; ?>/css/ugsports/theme-20/m/<?php echo $tema; ?>">
    <script src="https://cdn.sitestatic.net/assets/jquery/sweet_alert2.min.js"></script>


    <link rel="stylesheet" href="https://cdn.sitestatic.net/assets/jquery/jquery-ui.min.css" media="print"
        onload="this.media='all'">
    <script src="https://cdn.sitestatic.net/assets/jquery/jquery-ui.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.sitestatic.net/assets/jquery/jquery.ui.touch-punch.min.js" defer>
    </script>

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
  <script>
    window._lc = window._lc || {};
    window._lc.license = <?php echo $sc['lc_mobile']; ?>;
    window.__lc = window.__lc || {};
    window.__lc.license = window._lc.license;
    ;(function(n,t,c){function i(n){return e.h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n._lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/<?php echo $sc['lc_mobile']; ?>/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->
  
</head>
<script>
function callBackgroundPage() {
    var url = "/getBal.php";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
           
        }
    };
    xhr.send();
}
callBackgroundPage();
</script>
<body class="mobile">
    <div class="full-container layout">
        <div id="sideNav" class="side-nav">
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
            $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = '$userID'") or die(mysqli_error());
            $sbk = mysqli_fetch_array($sql_bank);
        ?>
            <nav class="nav-content">
                <ul class="side-nav-items">
                    <li class="nav-item">
                        <a class="navlink" href="<?php echo $urlweb; ?>/m" onclick="closeNav(-1);">
                            <div><i class="icon-home"></i></div>
                            <!--routerLinkActiveOptions for root URL-->
                            <div class="nav-title" i18n="@HOME">HOME</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="navlink has-sub" onclick="openNavItem(0);"
                            [ngclass]="{'active':isOpenNavContent[0], '':   !isOpenNavContent[0]}">
                            <div><i class="icon-coins"></i></div>
                            <div class="nav-title" i18n="@Funds">Dana</div>
                        </a>
                        <div class="nav-item-content" [ngclass]="{'open':isOpenNavContent[0], '':!isOpenNavContent[0]}">
                            <ul class="submenu account">
                                <li>
                                    <a href="<?php echo $urlweb; ?>/m/account/deposit" (click)="closeNav($event);">
                                        <div><span class="circle"><i class="icon-pig"></i></span></div>
                                        <div class="fs-sm mt-1" i18n="">Deposit</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $urlweb; ?>/m/account/withdrawal" (click)="closeNav($event);">
                                        <div><span class="circle"><i class="icon-transfer"></i></span></div>
                                        <div class="fs-sm mt-1" i18n="">Withdraw</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $urlweb; ?>/m/account/history" (click)="closeNav($event);">
                                        <div><span class="circle"><i class="icon-history"></i></span></div>
                                        <div class="fs-sm mt-1" i18n="@History">Pernyataan &nbsp;</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $urlweb; ?>/m/referral-downline" (click)="closeNav($event);">
                                        <div><span class="circle"><i class="icon-users"></i></span></div>
                                        <div class="fs-sm mt-1" i18n="">Referral &nbsp;</div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="navlink has-sub" onclick="openNavItem(1);"
                            [ngclass]="{'active':isOpenNavContent[1], '':   !isOpenNavContent[1]}">
                            <div><i class="icon-videogame_asset"></i></div>
                            <div class="nav-title" i18n="">PERMAINAN</div>
                        </a>
                        <div class="nav-item-content games"
                            [ngclass]="{'open':isOpenNavContent[1], '':!isOpenNavContent[1]}">
                            <ul class="submenu">
                                <li> <a href="<?php echo $urlweb; ?>/m/slots/" (click)="closeNav(-1);">
                                        <div class="">
                                            <span class="circle">
                                                <i class="icon-slot"></i>

                                            </span>
                                            <span class="hot sub" style="">HOT</span>
                                        </div>
                                        <div class="fs-sm mt-1">SLOTS</div>
                                    </a>
                                </li>
                                <li> <a href="<?php echo $urlweb; ?>/m/sports" (click)="closeNav(-1);">
                                        <div class="">
                                            <span class="circle">
                                                <i class="icon-soccer"></i>
                                            </span>
                                        </div>
                                        <div class="fs-sm mt-1">SPORTS</div>
                                    </a>
                                </li>
                                <li> <a href="<?php echo $urlweb; ?>/m/casino" (click)="closeNav(-1);">
                                        <div class="">
                                            <span class="circle">
                                                <i class="icon-casino"></i>
                                            </span>
                                        </div>
                                        <div class="fs-sm mt-1">CASINO</div>
                                    </a>
                                </li>
                                <li> <a href="<?php echo $urlweb; ?>/m/poker" (click)="closeNav(-1);">
                                        <div class="">
                                            <span class="circle">
                                                <i class="icon-menu-poker-01"></i>
                                            </span>
                                        </div>
                                        <div class="fs-sm mt-1">P2P</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $urlweb; ?>/m/lottery" (click)="closeNav(-1);">
                                        <div class="">
                                            <span class="circle">
                                                <i class="icon-lottery"></i>

                                            </span>
                                            <span class="hot sub new ">NEW</span>
                                        </div>
                                        <div class="fs-sm mt-1">LOTRE</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $urlweb; ?>/m/fish-hunter">
                                        <div class="">
                                            <span class="circle">
                                                <i class="icon-fish_hunter"></i>
                                            </span>
                                        </div>
                                        <div class="fs-sm mt-1">TEMBAK IKAN</div>
                                    </a>
                                </li>
                                <li> <a href="<?php echo $urlweb; ?>/m/e-games" (click)="closeNav(-1);">
                                        <div class="">
                                            <span class="circle">
                                                <i class="icon-others"></i>
                                            </span>
                                        </div>
                                        <div class="fs-sm mt-1">E-GAMES</div>
                                    </a>
                                </li>
                                <li> <a href="<?php echo $urlweb; ?>/m/cockfight" (click)="closeNav(-1);">
                                        <div class="">
                                            <span class="circle">
                                                <i class="icon-cockfight"></i>
                                            </span>
                                        </div>
                                        <div class="fs-sm mt-1">SABUNG AYAM</div>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">

                        <a class="navlink" href="<?php echo $urlweb; ?>/m/promotion" onclick="closeNav(-1);">
                            <div><i class="icon-gift"></i></div>
                            <!--routerLinkActiveOptions for root URL-->
                            <div class="nav-title" i18n="@PROMOS">PROMOSI</div>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a class="navlink" href="<?php echo $urlweb; ?>/m/referral" onclick="closeNav(-1);">
                            <div><i class="icon-users"></i></div>
                            <!--routerLinkActiveOptions for root URL-->
                            <div class="nav-title" i18n="@REFERRAL">REFERRAL</div>
                        </a>

                    </li>



                    <li class="nav-item">

                        <a class="navlink" href="<?php echo $urlweb; ?>/m/info" onclick="closeNav(-1);">
                            <div><i class="icon-info"></i></div>
                            <!--routerLinkActiveOptions for root URL-->
                            <div class="nav-title" i18n="@INFO">INFO</div>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="navlink" href="<?php echo $urlweb; ?>/m/contact-us" onclick="closeNav(-1);">
                            <div><i class="icon-address-book"></i></div>
                            <!--routerLinkActiveOptions for root URL-->
                            <div class="nav-title" i18n="">HUBUNGI KAMI</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="navlink" onclick="closeNav();" data-trigger="nifty"
                            data-target="#langModal-mobile">
                            <div><i class="icon-language"></i></div>
                            Bahasa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="navlink" href="<?php echo $urlweb; ?>desktop" onclick="closeNav(-1);">
                            <div><i class="icon-display"></i></div>
                            <!--routerLinkActiveOptions for root URL-->
                            <div class="nav-title">Desktop View</div>
                        </a>
                    </li>
                    <li class="nav-item"><a href="javascript:void(0);" class="navlink" onclick="closeNav();"> <i
                                class="icon-double_arrow_l"></i></a></li>
                    <?php }else{ ?>
                    <nav class="nav-content">
                        <ul class="side-nav-items">
                            <li class="nav-item">
                                <a class="navlink" href="<?php echo $urlweb;?>" onclick="closeNav(-1);">
                                    <div><i class="icon-home"></i></div>
                                    <!--routerLinkActiveOptions for root URL-->
                                    <div class="nav-title" i18n="@HOME">HOME</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="navlink has-sub" onclick="openNavItem(0);"
                                    [ngClass]="{'active':isOpenNavContent[1], '':   !isOpenNavContent[1]}">
                                    <div><i class="icon-videogame_asset"></i></div>
                                    <div class="nav-title" i18n>PERMAINAN</div>
                                </a>
                                <div class="nav-item-content games"
                                    [ngClass]="{'open':isOpenNavContent[1], '':!isOpenNavContent[1]}">
                                    <ul class="submenu">
                                        <li> <a href="<?php echo $urlweb; ?>/m/slots/" (click)="closeNav(-1);">
                                                <div class="">
                                                    <span class="circle">
                                                        <i class="icon-slot"></i>

                                                    </span>
                                                    <span class='hot sub' style="">HOT</span>
                                                </div>
                                                <div class="fs-sm mt-1">SLOTS</div>
                                            </a>
                                        </li>
                                        <li> <a href="<?php echo $urlweb; ?>/m/sports" (click)="closeNav(-1);">
                                                <div class="">
                                                    <span class="circle">
                                                        <i class="icon-soccer"></i>
                                                    </span>
                                                </div>
                                                <div class="fs-sm mt-1">SPORTS</div>
                                            </a>
                                        </li>
                                        <li> <a href="<?php echo $urlweb; ?>/m/casino" (click)="closeNav(-1);">
                                                <div class="">
                                                    <span class="circle">
                                                        <i class="icon-casino"></i>
                                                    </span>
                                                </div>
                                                <div class="fs-sm mt-1">CASINO</div>
                                            </a>
                                        </li>
                                        <li> <a href="<?php echo $urlweb; ?>/m/poker" (click)="closeNav(-1);">
                                                <div class="">
                                                    <span class="circle">
                                                        <i class="icon-menu-poker-01"></i>
                                                    </span>
                                                </div>
                                                <div class="fs-sm mt-1">P2P</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $urlweb; ?>/m/lottery" (click)="closeNav(-1);">
                                                <div class="">
                                                    <span class="circle">
                                                        <i class="icon-lottery"></i>

                                                    </span>
                                                    <span class="hot sub new ">NEW</span>
                                                </div>
                                                <div class="fs-sm mt-1">LOTRE</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $urlweb; ?>/m/fishing" (click)="closeNav(-1);">
                                                <div class="">
                                                    <span class="circle">
                                                        <i class="icon-fish_hunter"></i>
                                                    </span>
                                                </div>
                                                <div class="fs-sm mt-1">TEMBAK IKAN</div>
                                            </a>
                                        </li>
                                        <li> <a href="<?php echo $urlweb; ?>/m/e-games" (click)="closeNav(-1);">
                                                <div class="">
                                                    <span class="circle">
                                                        <i class="icon-others"></i>
                                                    </span>
                                                </div>
                                                <div class="fs-sm mt-1">E-GAMES</div>
                                            </a>
                                        </li>
                                        <li> <a href="<?php echo $urlweb; ?>/m/cockfight" (click)="closeNav(-1);">
                                                <div class="">
                                                    <span class="circle">
                                                        <i class="icon-cockfight"></i>
                                                    </span>
                                                </div>
                                                <div class="fs-sm mt-1">SABUNG AYAM</div>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">

                                <a class="navlink" href="<?php echo $urlweb; ?>/m/promotion" onclick="closeNav(-1);">
                                    <div><i class="icon-gift"></i></div>
                                    <!--routerLinkActiveOptions for root URL-->
                                    <div class="nav-title" i18n="@PROMOS">PROMOSI</div>
                                </a>
                            </li>

                            <li class="nav-item">

                                <a class="navlink" href="<?php echo $urlweb; ?>/m/referral" onclick="closeNav(-1);">
                                    <div><i class="icon-users"></i></div>
                                    <!--routerLinkActiveOptions for root URL-->
                                    <div class="nav-title" i18n="@REFERRAL">REFERRAL</div>
                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="navlink" href="<?php echo $urlweb; ?>/m/info" onclick="closeNav(-1);">
                                    <div><i class="icon-info"></i></div>
                                    <!--routerLinkActiveOptions for root URL-->
                                    <div class="nav-title" i18n="@INFO">INFO</div>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="navlink" href="<?php echo $urlweb; ?>/m/contact-us" onclick="closeNav(-1);">
                                    <div><i class="icon-address-book"></i></div>
                                    <!--routerLinkActiveOptions for root URL-->
                                    <div class="nav-title" i18n>HUBUNGI KAMI</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="navlink" onclick="closeNav();" data-trigger='nifty'
                                    data-target='#langModal-mobile'>
                                    <div><i class="icon-language"></i></div>
                                    Bahasa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="navlink" href="<?php echo $urlweb; ?>/desktop"
                                    onclick="closeNav(-1);">
                                    <div><i class="icon-display"></i></div>
                                    <!--routerLinkActiveOptions for root URL-->
                                    <div class="nav-title">Desktop View</div>
                                </a>
                            </li>
                            <li class="nav-item"><a href="javascript:void(0);" class="navlink" onclick="closeNav();"> <i
                                        class="icon-double_arrow_l"></i></a></li>
                        </ul>
                        <?php }?>
                    </nav>
                    <script>
                        var arr = [0, 0];

                        function openNavItem(index) {
                            $('.nav-item-content').removeClass('open');
                            $('.navlink.has-sub').removeClass('active');
                            if (index >= 0) {
                                $('.nav-item-content').eq(index).addClass('open');
                                $('.navlink.has-sub').eq(index).addClass('active');
                                $("#mainContent").addClass("navContentOpen");
                                $("#sideNav").addClass("navContentOpen");
                            }
                        }

                        function closeNav() {
                            $('.nav-item-content').removeClass('open');
                            $('.navlink.has-sub').removeClass('active');

                            $("#sideNav").removeClass("navContentOpen");
                            $("#sideNav").removeClass("open");
                            $("#mainContent").removeClass("navContentOpen");
                            $("#mainContent").removeClass("sideNavOpen");

                        }
                    </script>
        </div>
        <div class="main-content" id="mainContent">
            <div class="backdrop" id="mainContentContainer">
                <div class="top-bar">
                    <div class="inner-header flex-row ">

                        <button id="btnToggleSideNav" class="btn btn-link">
                            <i class="icon-bars"></i>
                        </button>
                        <a href="<?php echo $urlweb;?>" title="" class="logo">
                            <div><img class="img-fluid" alt="Logo"
                                    src="<?php echo $s0['image']; ?>" />
                            </div>
                        </a>

                        <a id="btnToggleRSideNav">
                            <i class="icon-user-o"></i>
                        </a>
                    </div>
                </div>
                <div class="content my01">
                    <div class="apk-down-bar" id="apk-down-bar" style="">
            <table>
                <tbody><tr>
                    <td rowspan="2" style="width:18%; " class="clearfix">
                        <button class="btn btn-link" id="btn-close--apk">X</button>
                        <span class="fs-lg android-wrap"><i class="icon-android"></i></span>
                    </td>
                                        <td style="width:100%; ">
                        <div>Aplikasi Lite Download</div>
                    </td>
                    <td rowspan="2">
                        <a href="#" class="btn btn-link">
                            <i class="icon-download" style="font-size:1.8em;"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div><small>Fast, Light &amp; Secure</small></div>
                    </td>
                </tr>
            </tbody></table>
        </div>
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
                    <!-- Letakkan kode tombol refresh dalam elemen HTML -->
<div class="container wallet-bal">
    <div class="row text-left">
        <div class="col-xs-6">
            <!-- Tombol refresh dengan class btn-refresh-wallet -->
            <button class="btn btn-clear btn-refresh-wallet">
                <i class="icon-currency-dollar fs-lg i-dollar"></i>
                &nbsp;&nbsp;
                <!-- Gunakan class balance-txt untuk menampilkan saldo -->
                <span class="balance-txt">IDR <?php echo number_format($sb['active']); ?></span>
            </button>
        </div>
        <div class="col-xs-6 noSidePadding i-refresh">
            <!-- Tombol refresh -->
            <button class="btn btn-clear btn-refresh-wallet pull-right"><i class="icon-refresh-2"></i></button>
        </div>
    </div>
    <div class="row game-bals" id="other-game-bals" style="display:none;">
    </div>
</div>

<!-- Tambahkan jQuery untuk melakukan panggilan AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Ketika tombol refresh diklik
        $('.btn-refresh-wallet').click(function() {
            // Panggil file /getBal.php dengan AJAX
            $.ajax({
                url: '/getBal.php',
                type: 'GET',
                success: function(data) {
                    // Setelah menerima respons, perbarui tampilan saldo
                    $('.balance-txt').text('IDR ' + data);
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika panggilan gagal
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<?php }else{}?>
