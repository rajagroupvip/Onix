
<div class="mobilesite-footer">
    <div class="container">
        <style media="screen">
            .left-custom-livechat-code {
                bottom: 58px !important;
            }

            #chat-widget-container {
                bottom: 51px !important;
            }
        </style>
        <div class="menu-bottom">
            <nav class="navbar-inverse navbar-fixed-bottom">
                <div class=" ">
                    <div class="flex-row  text-center">
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
                        <div class="  footericon-single">
                            <a href="<?php echo $urlweb; ?>/m"><i class="icon-home"></i>
                                <div>HOME</div>
                            </a>
                        </div>
                        <div class="  footericon-single">
                            <a href="<?php echo $urlweb; ?>/m/promotion/"><i class="icon-gift"></i>
                                <div style="text-transform:uppercase;">Promo saya</div>
                            </a>
                        </div>

                        <div class=" footericon-single">
                            <a href="javascript:void(0);" class="text-uppercase togglemenu-trigger footer-funds"
                                data-showID="#fundshover_menu"><i class="icon-transfer"></i>
                                <div>Dana</div>
                            </a>
                            <ul class="list-inline horizontal-hover togglemenu-content" id="fundshover_menu">
                                <li>
                                    <a href="<?php echo $urlweb; ?>/m/account/deposit" (click)="closeNav($event);">
                                        <div class="fs-sm mt-1" i18n>Deposit</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $urlweb; ?>/m/account/withdrawal" (click)="closeNav($event);">
                                        <div class="fs-sm mt-1" i18n>Withdraw</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $urlweb; ?>/m/account/history" (click)="closeNav($event);">
                                        <div class="fs-sm mt-1" i18n="@History">Pernyataan &nbsp;</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class=" footericon-single">
                            <a href="<?php echo $urlweb; ?>/m/memo" style="position:relative;"><i
                                    class="icon-mail_outline"></i>
                                <div>MEMO</div>

                                <div class="mail_icon" style="display:none;">
                                    0
                                </div>

                            </a>
                        </div>
                        <div class=" footericon-single" style="position: relative">
                            <a href="javascript:void(0)" class="text-uppercase togglemenu-trigger"
                                data-showID="#livechathover_menu"><i class="icon-chat1"></i>
                                <div>LIVE CHAT</div>
                            </a>
                            <ul class="list-inline vertical-hover togglemenu-content" id="livechathover_menu">
                                <li>
                                    <a href="https://direct.lc.chat/<?php echo $sc['lc_mobile']; ?>"><i
                                            class="icon-chat1"></i></a>
                                </li>

                                <li>
                                    <a href="https://api.whatsapp.com/send?phone=+<?php echo $wa;?>" target="_blank "><i
                                            class="icon-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $tele;?>" target="_blank "><i class="icon-telegram"></i></a>
                                </li>
                            </ul>
                            <script type="text/javascript">
                                $(".togglemenu-trigger").click(function () {
                                    var currentToggle = $(this).attr("data-showID");
                                    if ($(currentToggle).hasClass("show")) {
                                        $(currentToggle).removeClass("show");
                                    } else {
                                        $(".togglemenu-content").removeClass("show");
                                        $(currentToggle).addClass("show");
                                    }

                                });
                            </script>
                            <?php } else { ?>
                            <div class="  footericon-single">
                                <a href="<?php echo $urlweb;?>/m/"><i class="icon-home"></i>
                                    <div>HOME</div>
                                </a>
                            </div>
                            <div class="  footericon-single">
                                <a href="<?php echo $urlweb; ?>/m/promotion"><i class="icon-gift"></i>
                                    <div>PROMOSI</div>
                                </a>
                            </div>
                            <div class=" footericon-single" style="position: relative">
                                <a href="javascript:void(0)" class="text-uppercase togglemenu-trigger"
                                    data-showID="#livechathover_menu"><i class="icon-chat1"></i>
                                    <div>LIVE CHAT</div>
                                </a>
                                <ul class="list-inline vertical-hover togglemenu-content" id="livechathover_menu">
                                    <li>
                                        <a href="https://direct.lc.chat/<?php echo $sc['lc_mobile']; ?>"><i
                                                class="icon-chat1"></i></a>
                                    </li>

                                    <li>
                                        <a href="https://api.whatsapp.com/send?phone=+<?php echo $wa; ?>"
                                            target="_blank "><i class="icon-whatsapp"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $tele; ?>" target="_blank "><i
                                                class="icon-telegram"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <script type="text/javascript">
                                $(".togglemenu-trigger").click(function () {
                                    var currentToggle = $(this).attr("data-showID");
                                    if ($(currentToggle).hasClass("show")) {
                                        $(currentToggle).removeClass("show");
                                    } else {
                                        $(".togglemenu-content").removeClass("show");
                                        $(currentToggle).addClass("show");
                                    }

                                });
                            </script>


                        </div>
                        <?php } ?>
                    </div>
            </nav>
        </div>
        <button class="btn btn-link" id="btn-wrap--goToTop" onclick="topFunction()">
            <i class="i-collapse icon-chevron-thin-up"></i>
        </button>
        <script type="text/javascript">
            $(".togglemenu-trigger").click(function () {
                var currentToggle = $(this).attr("data-showID");
                if ($(currentToggle).hasClass("show")) {
                    $(currentToggle).removeClass("show");
                } else {
                    $(".togglemenu-content").removeClass("show");
                    $(currentToggle).addClass("show");
                }

            });
        </script>
    </div>
</div>
</div>
</div>

<div id="r-side-bar">
    <div class="side-bar-content container">

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
    $sbk = mysqli_fetch_array($sql_bank)
?>
        <div class="container-wrapper profile-head">
            <div class="container container-box noSidePadding">
                <div class="title fs-lg clearfix">
                    <button class="btn btn-link " id="btn-close--login-modal"> X
                    </button>&nbsp;&nbsp;
                    <span class="skew">
                        <span>Profil</span>
                    </span>
                    <a href="<?php echo $urlweb; ?>/m/logout" class="btn-logout" *ngif="isMobile"><i
                            class="icon-logout"></i></a>
                </div>
                <div class="head-content">
                    <div class="row no-gutters">
                        <div class="col-xs-12 col-sm-6 col-md-7">
                            <div class="row no-gutters">
                                <div class="clearfix col-xs-12 col-md-7">
                                    <div class="acc_safety_info ">
                                        <div class="flex-row  text-center icon_menu">
                                            <div class="icon-single">
                                                <a href="<?php echo $urlweb; ?>/m/referral-downline.php">
                                                    <i class="icon-user1"></i>
                                                    <div>Referral</div>
                                                </a>
                                            </div>
                                            <div class="icon-single">
                                                <a href="<?php echo $urlweb; ?>/m/memo " class="mail_link">
                                                    <i class="icon-envelope"></i>
                                                    <div>Memo</div>
                                                    <div class="mail_icon" style="display:none;">
                                                        0
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="icon-single">
                                                <a href="<?php echo $urlweb; ?>/m/member-level" class="mail_link ">
                                                    <i class="icon-users"></i>
                                                    <div>Member Level</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5  mt-4  mt-md-2">

                        </div>
                        <div class="col-xs-12 swiper-initialized swiper-horizontal swiper-ios" id="wallet-slider">
                            <div class="swiper-wrapper" id="swiper-wrapper-1a9eea5a9442d79e" aria-live="polite"
                                style="transition-duration: 0ms; transform: translate3d(29px, 0px, 0px);">
                                <div class="bal-box swiper-slide swiper-slide-active" role="group" aria-label="1 / 2">
                                    <button class="btn btn-clear btn-refresh-wallet">
                                        <div class="row no-gutters">
                                            <label for="inputWalletBal" class="col-2 col-form-label"><i
                                                    class="icon-wallet"></i></label>
                                            <div class="col-xs-12">
                                                <div class="d-flex" style="align-items:center">
                                                    <span class="bal-txt fs-lg">IDR
                                                        <?php echo number_format($sb['active']); ?></span>
                                                    &nbsp;
                                                    <i class="i-refresh icon-refresh-2"></i>
                                                </div>
                                                <div class="bal-title">
                                                    Dompet Permainan </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div class="col-xs-12  mt-3  ">
                            <div class="mdc-tab-bar" role="tablist">
                                <div class="mdc-tab-scroller">
                                    <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll"
                                        style="margin-bottom: 0px;">
                                        <div class="mdc-tab-scroller__scroll-content">
                                            <!---->
                                            <a role="tab" href="<?php echo $urlweb; ?>/m/profile/edit" data-tabname=""
                                                data-active="profileedit" class="mdc-tab active" aria-selected="false"
                                                tabindex="-1" id="">
                                                <span class="mdc-tab__content">
                                                    <span class="mdc-tab__text-label">
                                                        <!---->Detail
                                                        <!----></span>

                                                </span>

                                                <span class="mdc-tab-indicator active">
                                                    <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
                                                </span>

                                                <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                    style="--mdc-ripple-fg-size:91px; --mdc-ripple-fg-scale:1.8648; --mdc-ripple-fg-translate-start:76px, -10.5px; --mdc-ripple-fg-translate-end:30.6563px, -21.5px;"></span>
                                            </a>
                                            <!---->
                                            <a href="<?php echo $urlweb; ?>/m/profile/change-password.php">Tukar kata
                                                sandi</a>


                                            <span class="mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
                                            </span>

                                            <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                style="--mdc-ripple-fg-size:93px; --mdc-ripple-fg-scale:1.85613; --mdc-ripple-fg-translate-start:48.6875px, -6.5px; --mdc-ripple-fg-translate-end:31.1875px, -22.5px;"></span>
                                            </a>
                                            <!---->

                                            <!---->

                                            <a role="tab" href="<?php echo $urlweb; ?>/m/profile/referral-downline"
                                                data-tabname="referral-downline" data-active="profilereferral-downline"
                                                class="mdc-tab ref_down" aria-selected="false" tabindex="-1"
                                                id="goog_2098347606-FIXED-3">
                                                <span class="mdc-tab__content">

                                                    <span class="mdc-tab__text-label">
                                                        <!---->Referral Downline
                                                        <!----></span>

                                                </span>

                                                <span class="mdc-tab-indicator">
                                                    <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
                                                </span>

                                                <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                    style="--mdc-ripple-fg-size:102px; --mdc-ripple-fg-scale:1.83267; --mdc-ripple-fg-translate-start:-44.1875px, -35px; --mdc-ripple-fg-translate-end:34.1484px, -27px;"></span>
                                            </a>
                                            <!---->
                                            <a role="tab" href="<?php echo $urlweb; ?>/m/profile/member-level"
                                                data-tabname="member-level" data-active="profilemember-level"
                                                class="mdc-tab ref_down" aria-selected="false" tabindex="-1"
                                                id="goog_2098347606-FIXED-4">
                                                <span class="mdc-tab__content">

                                                    <span class="mdc-tab__text-label">
                                                        <!---->Tingkat Anggota
                                                        <!----></span>

                                                </span>

                                                <span class="mdc-tab-indicator">
                                                    <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
                                                </span>

                                                <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                    style="--mdc-ripple-fg-size:102px; --mdc-ripple-fg-scale:1.83267; --mdc-ripple-fg-translate-start:-44.1875px, -35px; --mdc-ripple-fg-translate-end:34.1484px, -27px;"></span>
                                            </a>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="outlet tab-content">
                        <div class="container-b3">
                            <div class="row profile-edit">
                                <div class="col-lg-5 col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-4 noSidePadding">
                                            <p class="_label" i18n="">Nama pengguna :</p>
                                        </div>
                                        <div class="col-xs-8 noSidePadding">
                                            <p><?php echo $u['username']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 noSidePadding">
                                            <p class="_label" i18n="">Tingkat Anggota :</p>
                                        </div>
                                        <div class="col-xs-8 noSidePadding">
                                            <div class="memer_leavel">
                                                <p class="d-flex"><span>Regular</span> &nbsp;
                                                    <span class=" i-star bg_bronze"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 noSidePadding">
                                            <p class="_label" i18n="">Nama Sesuai Rekening :</p>
                                        </div>
                                        <div class="col-xs-8 noSidePadding">
                                            <p><?php echo $sbk['pemilik']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 noSidePadding">
                                            <p class="_label" i18n="">Alamat email :</p>
                                        </div>
                                        <div class="col-xs-8 noSidePadding">
                                            <p><?php echo $u['email']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-12 ">
                                    <div class="row">
                                        <div class="col-xs-4 noSidePadding">
                                            <p class="_label" i18n="">Nomor Kontak. :</p>
                                        </div>
                                        <div class="col-xs-8 noSidePadding">
                                            <p><?php echo $u['phone_number']; ?></p>
                                        </div>
                                        <!--(//TODO masked)-->
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 noSidePadding">
                                            <p class="_label" i18n="">Refferal Kode :</p>
                                        </div>
                                        <div class="col-xs-8 noSidePadding">
                                            <p>
                                                <a class="" href="#">
                                                    <span class="kyc-label verified"><i class="icon-info"></i>
                                                    </span>
                                                    <span><?php echo $s0['urlweb']; ?>/m/register/?reff=<?php echo $u['referral_code']; ?></span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 noSidePadding">
                                            <p class="_label" i18n="">Pin kedua :</p>
                                        </div>
                                        <div class="col-xs-8 noSidePadding">
                                            <p>
                                                <span class="switch_lable">OFF</span>
                                                <label class="switch">
                                                    <input type="checkbox" id="" name="is_on_second_pin" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                                <span class="switch_lable">ON</span>
                                                <a href="<?php echo $urlweb; ?>/m/setup-pin" class="btn btn-secondary"
                                                    id="btn-reset2ndpin" style="display:none;">Reset sini</a>
                                            </p>
                                        </div>


                                    </div>
                                </div>

                            </div>


                            <script>
                                $(document).ready(function () {
                                    /*set domain based ref url*/
                                    // var base_url = window.location.origin;
                                    var ref_url = $("#hidenRefUrl").html();
                                    // var ref_final_url = base_url + ref_url;
                                    var ref_final_url = ref_url;
                                    $("#elCopyText").val(ref_final_url);
                                    // console.log(ref_final_url);
                                    /*set domain based ref url end*/
                                });
                            </script>
                        </div>

                        <?php }else { ?>
                        <div class="modal-header text-center">
                            <button class="btn btn-link pull-left" id="btn-close--login-modal"> X </button>
                            <div style="width:100%;">
                                <h4 class="text-center modal-title">Login</h4>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form name="loginForm" action="<?php echo $urlweb; ?>/m/proses_login/" method="POST">
                                <div class="form-group ">
                                    <label for="password" class="fs-lg" i18n>Nama pengguna</label>
                                    <div class="icon-input">
                                        <input type="text" class="form-control input-l" maxlength="50" name="user"
                                            autocomplete="off" required="required" id="UserName"
                                            aria-describedby="emailHelp" placeholder="">
                                        <i class="icon-user left"></i>

                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="password" class="fs-lg" i18n>Kata sandi</label>
                                    <div class="icon-input">
                                        <input type="password" class="form-control  input-l" maxlength="20"
                                            id="pwd--login" name="pass" required="required"
                                            autocomplete="current-password" />
                                        <i class="icon-lock left"></i>
                                        <i class="icon-eye toggle-password" input_id="#pwd--login"></i>
                                    </div>
                                </div>
                                <div class="row  alert alert-danger message" _login-modal>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit"
                                        class="btn btn-block btn-primary fs-lg btn-submit">Login</button>
                                    <button type="button" *ngIf="!inProgress" class="btn btn-link"
                                        id="forgotPwd-btn--login-modal" i18n>
                                        Lupa kata sandi? &nbsp;<i class="icon-redo"></i>
                                    </button>
                                </div>

                            </form>

                            <form class="form-horizontal" id="resetPwdForm" name="resetPwdForm" action="/apply-resetpwd"
                                method="post">
                                <input type="hidden" name="_token" value="P0CsVuqQ4p4PaMD65odfkl2sHXJWwqTniCcAxvBI">

                                <div class="form-group">
                                    <label for="phoneNumber" class="fs-lg" i18n>Nomor Telepon (WhatsApp)</label>
                                    <div class="icon-input">
                                        <input type="tel" class="form-control input-l" name="phoneNumber"
                                            required="required" id="phoneNumber" aria-describedby="phoneHelp"
                                            placeholder="">
                                        <i class="icon-phone left"></i>
                                    </div>
                                </div>

                                <div class="row alert alert-danger message" _login-modal>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-block btn-primary fs-lg">Reset</button>
                                    <button type="button" id="btn-back--login-modal" class="btn btn-link" i18n>
                                        <i class="icon-undo"></i>&nbsp; Kembali untuk masuk </button>
                                    <app-ellipsis *ngIf="inProgress"></app-ellipsis>
                                </div>
                            </form>
                            <form class="form-horizontal text-center" id="pinForm"
                                action="<?php echo $urlweb; ?>/m/validate-pin">

                                <div class="form-group ">
                                    <h3>Kode Pin Aman</h3>
                                    <p class="">Silakan Masukkan Kode Pin Aman Anda</p>
                                </div>
                                <div class="form-group ">
                                    <div class="pin-in-grp" id="pin-in-grp">


                                        <input type="password" maxlength="1" name="pincode[0]" required
                                            class="form-control pincode" style="width:16.66%">


                                        <input type="password" maxlength="1" name="pincode[1]" required
                                            class="form-control pincode" style="width:16.66%">


                                        <input type="password" maxlength="1" name="pincode[2]" required
                                            class="form-control pincode" style="width:16.66%">


                                        <input type="password" maxlength="1" name="pincode[3]" required
                                            class="form-control pincode" style="width:16.66%">


                                        <input type="password" maxlength="1" name="pincode[4]" required
                                            class="form-control pincode" style="width:16.66%">


                                        <input type="password" maxlength="1" name="pincode[5]" required
                                            class="form-control pincode" style="width:16.66%">


                                    </div>
                                </div>
                                <div class="form-group button-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-round btn-block pinkey" type="button"
                                                value="0">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-round btn-block pinkey" type="button"
                                                value="9">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-round btn-block pinkey" type="button"
                                                value="8">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-round btn-block pinkey" type="button"
                                                value="5">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-round btn-block pinkey" type="button"
                                                value="7">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-round btn-block pinkey" type="button"
                                                value="1">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-round btn-block pinkey" type="button"
                                                value="2">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-round btn-block pinkey" type="button"
                                                value="3">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-round btn-block pinkey" type="button"
                                                value="6">
                                        </div>
                                        <div class="col-xs-4">
                                            <input id='back_bt' class="btn btn-warning btn-block  btn-round"
                                                type="button" value="RESET">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="btn btn-primary btn-block  btn-round pinkey" type="button"
                                                value="4">
                                        </div>
                                        <div class="col-xs-4">
                                            <button
                                                class="btn btn-info btn-round btn-block waves-effect waves-light btn-submit"
                                                type="submit">Kirimkan</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4"></div>
                                        <div class="col-xs-4"><a style=""
                                                class="btn btn-danger btn-round btn-block waves-effect "
                                                href="<?php echo $urlweb; ?>/m/logout" i18n="@Logout">LOGOUT</a>
                                        </div>
                                        <div class="col-xs-4"></div>
                                    </div>
                                </div>
                                <div class="row  alert alert-danger message" _login-modal>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer text-center" id="footer--login-modal">
                            <div class="footer-content">Tidak terdaftar? <a href="<?php echo $urlweb; ?>/m/register"
                                    i18n>Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!--loading modal -->
        <div class="nifty-modal fade-in-scale" id="loading--layout" style="z-index:1000001;"
            data-isnotcloseoverlay="true">
            <div class="md-content">
                <div class='md-body'>

                    <div class="loader-b large"></div>
                </div>
            </div>
        </div>
        <div class='md-overlay' style="z-index:1000000;"></div>
        <!--END loading modal -->

        <!-- APK download ||Transfer Wallet  modal start-->
        <div class="nifty-modal slide-in-bottom downloadapk-modal" id="apk-modal">
            <div class="md-content">
                <div class="modal-header">
                    <button class="pull-right md-close"><i class="icon-x fs-lg"></i></button>
                    <h3 id="downloadgame-title"></h3>
                </div>
                <div class="md-body">
                    <!--region Transfer Wallet Menu -->
                    <div class="row no-gutters" id="trans_to_game_menu__game-modal">
                        <form action="" method="post" id="tw_transfer_form" class="tw_transfer_form">
                            <input type="hidden" name="_token" value="P0CsVuqQ4p4PaMD65odfkl2sHXJWwqTniCcAxvBI">
                            <div class="form-group">
                                <label for="mainwallet_amount">From Main Wallet</label>
                                <input type="text" class="form-control" readonly name="mainwallet_amount"
                                    id="mainwallet_amount" value="" />

                            </div>
                            <div class="text-center">
                                <span class="vertical"><i class="icon-arrow-long-right"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="mainwallet_amount">Transfer to <span id="gamename"></span>
                                        Wallet</label>
                                    <div class="form-group">

                                        <div class="customrange-slider">
                                            <div id="slider" overflow-scroll="false"
                                                class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                <span tabindex="0"
                                                    class="ui-slider-handle ui-corner-all ui-state-default"
                                                    style="left: 0%;"></span>
                                                <div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min"
                                                    style="width: 0%;"></div>
                                            </div>
                                            <div class="decrease-btn cusbtn">
                                                <div id="tw_decrease_btn"> <span class="minus-icon custom-icon">-</span>
                                                </div>

                                                <div class="minmax-label">Min</div>
                                                <div class="minmax-value">
                                                    5000
                                                </div>
                                                <input type="hidden" name="twminval" id="twminval" value="5000" />
                                            </div>
                                            <div class="increase-btn cusbtn">
                                                <div id="tw_increase_btn">
                                                    <span class="plus-icon custom-icon">+</span>
                                                </div>

                                                <div class="minmax-label">Max</div>
                                                <div class="minmax-value" id="maxSliderApk"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                                        <div class="form-group">
                                            <input type="text" readonly class="form-control" name="transfer_amount"
                                                id="transfer_amount" placeholder="0.00" value="00.00" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="SUBMIT" />
                            </div>
                        </form>
                    </div>
                    <!--endregion Transfer Wallet Menu -->

                    <div class="row no-gutters">
                        <div class="col-xs-12 text-center">
                            <a href="#" id="launchurl" class="url-link" target="_blank">
                                <img class="img-fluid" src="<?php echo $urlweb; ?>assets/images/log_html5.png"
                                    alt="play-in-browser">
                                <div class="download-caption text-center">
                                    Play now in your browser
                                </div>
                                <div class="download-linkbtn text-center">
                                    <img class="img-fluid" src="  <?php echo $urlweb; ?>assets/images/btn_playnow.png"
                                        alt="play-now-in-browser">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-wrapper nifty-modal fade-in-scale" id="live-draw-modal" data-isnotcloseoverlay="true">
            <div class="md-content">
                <div class='md-body'>
                    <div class="modal-header">
                        <h4 class="modal-title">Live Draw</h4>
                        <button class="btn btn-link pull-left " id="btn-close--live-draw-modal"> <i
                                class="icon icon-close"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div id='live_draw_table'>

                        </div>
                        <div id='img_details'>
                            <img src="" class="draw_img" id='draw_img'>
                            <div class="details">

                                <p class="tickte_id">undian berikutnya: <span id='ticket_id'></span></p>
                            </div>

                            <div class="close_btn_section">
                                <button class="btn btn-close" id='img--section-closebtn'
                                    onclick="closeImageSection()">Kembali</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="md-overlay"></div>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mainContentContainer").click(function () {
                    // Kode penutupan lainnya...
                });

                // Mengganti fungsi untuk menangani klik pada tombol close login modal
                $(document).on('click', '#btn-close--login-modal', function (event) {
                    // Menutup modal dengan menghilangkan kelas 'open'
                    $('#r-side-bar').removeClass('open');
                    $("#mainContent").removeClass("rightSideBarOpen");

                    // Hanya menghentikan event tanpa melakukan tindakan penutupan
                    event.preventDefault();
                    event.stopPropagation();
                    return false;
                });

                $(document).on('click', '.btn-collapse-balances', function () {
                    // Kode lain untuk menangani klik pada tombol collapse balances
                    if (!$('#other-game-bals').is(':visible')) {
                        $('#other-game-bals').slideDown();
                        window.getAllGameBal();
                    } else {
                        $('#other-game-bals').slideUp();
                    }
                    return false;
                });
            });
        </script>

        <script type="text/javascript" src="https://cdn.sitestatic.net/assets/jquery-validation/jquery.validate.min.js">
        </script>
        <script type="text/javascript"
            src="https://cdn.sitestatic.net/assets/jquery-validation/additional-methods.min.js">
        </script>
        <link rel="stylesheet" href="https://cdn.sitestatic.net/assets/fancybox/jquery.fancybox.min.css">


        <script type="text/javascript" src="https://cdn.sitestatic.net/assets/fancybox/jquery.fancybox.min.js"></script>
        <script>
            window.isAuth = '1' ? false : true;
            window.currencyCode = 'IDR';
            window.lang = "id";
            window.agentCode = 'IDWIN';
            window.sweetAlert = function (msg, type, title, showCancelBtn) {
                //check CF error
                var dateNow = "2023-12-01 19:54:55";

                if (msg.indexOf('cloudflare') >= 0) {
                    msg = transMsgs.cfTimeout + ' (error time: ' + dateNow + ')';
                    title = " ";
                }
                return Swal.fire({
                    title: !title ? "Warning" : title,
                    text: msg,
                    icon: !type ? "error" : type,
                    buttons: {
                        confirm: {
                            text: "OK",
                            value: true,
                            visible: true,
                            className: "",
                            closeModal: true
                        },
                        cancel: {
                            text: "Cancel",
                            value: false,
                            visible: showCancelBtn ? true : false,
                            className: "",
                            closeModal: true,
                        }
                    }
                });
            }
            console.log('window.name ' + window.name);
            window.name = !window.name ? "parent" + Date.now() + Math.floor(Math.random() * 100000000) : window.name;
            console.log('window.name ' + window.name);
            window.formatNumber = function (n) {
                // format number 1000000 to 1,234,567
                return n.replace(/[^0-9\-]/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }
            window.convertToNumber = function (value) {

                if (!value) {
                    return 0;
                }
                if (value.indexOf(".") >= 0) {
                    var decimal_pos = value.indexOf(".");
                    value = value.substring(0, decimal_pos);

                }
                var number = value.replace(/[^0-9.-]+/g, "");
                if (isNaN(number)) {
                    number = 0;
                }
                return number;
            }

            window.formatCurrency = function (value) {
                const symbol = ""; //"$"
                // get input value
                var input_val = value;

                if (typeof value !== 'string') {
                    var input_val = value.toString();
                }
                if (input_val === "") {
                    return;
                }

                var original_len = input_val.length;


                if (input_val.indexOf(".") >= 0) {

                    var decimal_pos = input_val.indexOf(".");
                    var left_side = input_val.substring(0, decimal_pos);
                    var right_side = input_val.substring(decimal_pos + 1);

                    left_side = formatNumber(left_side);

                    right_side += "00";

                    right_side = right_side.substring(0, 2);

                    input_val = symbol + left_side + "." + right_side;

                } else {
                    input_val = formatNumber(input_val);
                    input_val = symbol + input_val + ".00";;

                }

                return input_val;
            }

            window.prize = 0;
            window.ajax_jackpot = function () {
                $.ajax({
                    url: "<?php echo $urlweb; ?>getPokerJackpotAmt",
                    type: 'post',
                    data: {
                        _token: $('meta[name=csrf-token]').attr('content')
                    },
                    success: function (data) {
                        prize = (data / 2000.000) * 2000.000;
                        $('.jackpot_numbers_home').html(
                            `IDR <span id="jackpot_amount">${ commaSeparateNumber(prize) }</span>`)

                        //$('.jackpot_numbers_home').html(`IDR ` + commaSeparateNumber(data.prize));
                    }
                });
            }

            var newI = 0;
            window.popitup = function (url, gameid) {
                //alert(gameid);
                newwindow = window.open(url, window.agentCode + '_gameWindow' + gameid + newI,
                    'toolbar=0,width=1200,height=750');
                newI++;
                if (window.focus) {
                    newwindow.focus()
                }
                return false;
            }

            window.popup = function (mylink, windowname) {
                if (!window.focus) return true;
                var href;
                if (typeof (mylink) == 'string')
                    href = mylink;
                else
                    href = mylink.href;
                window.open(href, windowname, 'width=600,height=800,scrollbars=yes');
                return false;
            }
            window.commaSeparateNumber = function (val, isJP) {
                while (/(\d+)(\d{3})/.test(val.toString())) {

                    if (window.currencyCode == 'VND' && isJP) {
                        val = val.toFixed(0);
                    } else {
                        val = Number(val).toFixed(2);
                    }
                    val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                }
                return val;
            }

            window.getRandomIntInclusive = function (min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) +
                    min; //The maximum is inclusive and the minimum is inclusive
            }

            /*bank acc min and maxlength limitation */
            window.accLength = parseInt("8");
            window.bankAccLength = function (selectedBank, default_minlength, default_maxlength) {
                console.log(selectedBank, default_minlength, default_maxlength);
                var custom_minLength, custom_maxLength;
                if (selectedBank == 'MDR') {
                    custom_minLength = 13;
                    custom_maxLength = 13;
                } else if (selectedBank == 'BNI' || selectedBank == 'BCA' || selectedBank == 'DMN' ||
                    selectedBank == 'BSI' || selectedBank == 'BLA') {
                    custom_minLength = 10;
                    custom_maxLength = 10;
                } else if (selectedBank == 'BRI') {
                    custom_minLength = 15;
                    custom_maxLength = 15;
                } else if (selectedBank == 'CIMBN' || selectedBank == 'BANKJAGO' || selectedBank == 'MDRLV') {
                    custom_minLength = 12;
                    custom_maxLength = 12;
                } else {
                    custom_minLength = default_minlength;
                    custom_maxLength = default_maxlength;
                }

                return {
                    'min_len': custom_minLength,
                    'max_len': custom_maxLength
                }
            }
            /*bank acc min and maxlength limitation end*/


            $(document).ready(function () {
                //suspend-alert
                // login-alert
                // promo-disabled-alert
                // "maintenance-alert";
                // "comingsoon-alert";
                window.alertLogin = function (e) {
                    e.preventDefault();
                    sweetAlert(transMsgs.plsLogin);
                    return false;
                }

                $(".suspend-alert").click(function (e) {
                    e.preventDefault();
                    sweetAlert(transMsgs.blockedFrGame);
                    return false;
                });

                $(".login-alert").click(function (e) {
                    if ($("#login-modal--layout").length && !$('#loginForm').hasClass(
                            'js-inline-form')) {
                        $("#login-modal--layout").nifty("show")
                    } else {
                        alertLogin(e);
                    }

                    return false;
                });

                $(".maintenance-alert").click(function (e) {
                    e.preventDefault();
                    sweetAlert(transMsgs.gameMaintenance);
                    return false;
                });

                $(".comingsoon-alert").click(function (e) {
                    e.preventDefault();
                    sweetAlert(transMsgs.gameComingSoon);
                    return false;
                });

                $(".promo-disabled-alert").click(function (e) {
                    e.preventDefault();
                    sweetAlert(transMsgs.gamePromoBlock);
                    return false;
                });
            });
            $("input").focus(function () {
                $("body").addClass("input-focused");
            });
            $("input").focusout(function () {
                $("body").removeClass("input-focused");
            });
        </script>

        <script type="text/javascript" src="/js/ugsports/app-mobile.js"> </script>
        <!--Language Option Modal -->
        <div class="nifty-modal slide-in-bottom " id="langModal-mobile">
            <div class="md-content">
                <div class="md-body">
                    <div class="wrap language">
                        <div class="title">Wilayah dan bahasa</div>
                        <table class="table-borderless">

                            <tr>
                                <td class="country">Indonesia</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="flag-wrap">
                                    <div class="circle-id"></div>
                                </td>
                                <td class="i  ">
                                    <a href="javascript:void(0)" onclick='change_lang("id")'> indonesian</a>
                                </td>

                                <td class="i b-line ">
                                    <a href="javascript:void(0)" onclick='change_lang("en")'> English</a>
                                </td>

                                <td class="i b-line ">
                                    <a href="javascript:void(0)" onclick='change_lang("cn")'> Mandarin</a>
                                </td>

                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="md-overlay"></div>
        <!--END Language Option Modal -->
        <script>
            $('.btn-refresh-captcha').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                var $captchaImg = $(this).parent().find('img');
                var curCapUrl = $captchaImg.attr("data-url");
                var url = curCapUrl + Date.now() + Math.floor(Math.random() * 100000000);
                $captchaImg.attr("src", url);

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                if (window.location.href.indexOf('reLogin=yes') >= 0 && !window.isAuth) {
                    $("#btnToggleRSideNav").trigger('click');
                }
            });
        </script>

        <script type="text/javascript">
            $(".togglemenu-trigger").click(function () {
                var currentToggle = $(this).attr("data-showID");
                if ($(currentToggle).hasClass("show")) {
                    $(currentToggle).removeClass("show");
                } else {
                    $(".togglemenu-content").removeClass("show");
                    $(currentToggle).addClass("show");
                }

            });
        </script>

        </body>

        </html>