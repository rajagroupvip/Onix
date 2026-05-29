<style>
    .icon-zalo .path1:before {
        content: "\e966";
        color: #e6eff4;
    }

    .icon-zalo .path2:before {
        content: "\e969";
        color: #b6d1dd;
        margin-left: -1em;
    }

    .icon-zalo .path3:before {
        content: "\e96e";
        color: #41a0d7;
        margin-left: -1em;
    }

    .icon-zalo .path4:before {
        content: "\e96f";
        color: #fff;
        margin-left: -1em;
    }

    .bottom-to-top {
        transform: none !important;
    }
</style>

<div class="floats floats-left">
    <div class="slider">
        <div class="fc">
            <div class="fc-left fs-lg">
                <div class="bg-2">
                    <a href="https://s3-ap-southeast-1.amazonaws.com/apkstore888.net/<?php echo $s0['instansi']; ?>/<?php echo $s0['instansi']; ?>.apk">
                        <div class="pt-2 text-center ">
                            <img class="fd-qr" src="https://wiki.cdot.senecacollege.ca/w/imgs/thumb/APK_Logo.png/250px-APK_Logo.png">
                        </div>
                        <div class="text-center">
                            <span class="icon-txt">
                                <i class="icon-android"></i>
                            </span>
                            <span>
                                Download
                            </span>
                        </div>
                    </a>

                </div>
            </div>
            <div class="fc-right text-center">

                <div class="center i-circle" style="padding-top:5px;">
                    <i class="icon-download"></i>
                </div>

                <div class="bottom-to-top center fs-lg" i18n="@DOWNLOAD">&nbsp;&nbsp;DOWNLOAD&nbsp;&nbsp;</div>
                <div class="center fs-md">
                    <i class="icon-double_arrow_l"></i>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- login form -->
<div class="modal-wrapper nifty-modal fade-in-scale" id="login-modal--layout" data-isnotcloseoverlay="true">
    <div class="md-content">
        <div class='md-body'>
            <style type="text/css">


            </style>
            <div class="modal-header text-center">
                <button class="btn btn-link pull-left" id="btn-close--login-modal"> X </button>
                <div style="width:100%;">
                    <h4 class="text-center modal-title">Login</h4>
                </div>
            </div>
            <div class="modal-body">
                <!--app_sub_skin != \Constants::onix  -->
                <form name="loginForm" action="<?php echo $urlweb; ?>/desktop/proses_login/"
                    method="POST">
                    <div class="form-group ">
                        <label for="username" class="fs-lg" i18n>Nama pengguna</label>
                        <div class="icon-input">
                            <input type="text" class="form-control input-l" maxlength="50" name="user"
                                autocomplete="off" required="required" id="user" aria-describedby="emailHelp"
                                placeholder="">
                            <i class="icon-user left"></i>

                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="password" class="fs-lg" i18n>Kata sandi</label>
                        <div class="icon-input">
                            <input type="password" class="form-control  input-l" maxlength="20" id="pass"
                                name="pass" required="required" autocomplete="current-password" />
                            <i class="icon-lock left"></i>
                            <i class="icon-eye toggle-password" input_id="#pwd--login"></i>
                        </div>
                    </div>
                    <div class="row  alert alert-danger message" _login-modal>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" *ngIf="!inProgress"
                            class="btn btn-block btn-primary fs-lg btn-submit">Login</button>
                        <button type="button" *ngIf="!inProgress" class="btn btn-link" id="forgotPwd-btn--login-modal"
                            i18n>
                            Lupa kata sandi? &nbsp;<i class="icon-redo"></i>
                        </button>

                        <app-ellipsis *ngIf="inProgress"></app-ellipsis>
                    </div>

                </form>

                <form class="form-horizontal" id="resetPwdForm" name="resetPwdForm" action="/apply-resetpwd"
                    method="post">
                    <input type="hidden" name="_token" value="zYfuAettv5ooKJKWkIJRDCNZn9QosiU0a4f0jQ6a">

                    <div class="form-group">
                        <label for="password" class="fs-lg" i18n>Alamat email</label>
                        <div class="icon-input">
                            <input type="email" class="form-control input-l" name="email" required="required" id="email"
                                aria-describedby="emailHelp" placeholder="">
                            <i class="icon-envelope left"></i>
                        </div>
                    </div>
                    <div class="form-group row no-gutters">
                        <div class="col-xs-8 col-md-8">
                            <input type="tel" id='registerCaptchaimg' class="form-control" name="forgotPwCaptchaimg"
                                maxlength="4" autocomplete="off" style="height: 50px;" placeholder="Captcha">
                        </div>
                        <button class="btn btn-refresh col-xs-4 col-md-4 text-left" type="button"
                            id="fogotrefreshCaptcha">
                            <img data-url="/captcha-image-forgotpw?v=1701192162" id="forgotPwCaptchaimgpath"
                                class="captcha_img" autocomplete="off">
                            <i class="icon-refresh"></i>
                        </button>
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
                <form class="form-horizontal text-center" id="pinForm" action="/validate-pin">

                    <div class="form-group ">
                        <h3>Kode Pin Aman</h3>
                        <p class="">Silakan Masukkan Kode Pin Aman Anda</p>
                    </div>
                    <div class="form-group ">
                        <div class="pin-in-grp" id="pin-in-grp">


                            <input type="password" maxlength="1" name="pincode[0]" required class="form-control pincode"
                                style="width:16.66%">


                            <input type="password" maxlength="1" name="pincode[1]" required class="form-control pincode"
                                style="width:16.66%">


                            <input type="password" maxlength="1" name="pincode[2]" required class="form-control pincode"
                                style="width:16.66%">


                            <input type="password" maxlength="1" name="pincode[3]" required class="form-control pincode"
                                style="width:16.66%">


                            <input type="password" maxlength="1" name="pincode[4]" required class="form-control pincode"
                                style="width:16.66%">


                            <input type="password" maxlength="1" name="pincode[5]" required class="form-control pincode"
                                style="width:16.66%">


                        </div>
                    </div>
                    <div class="form-group button-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="1">
                            </div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="4">
                            </div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="5">
                            </div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="9">
                            </div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="8">
                            </div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="2">
                            </div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="0">
                            </div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="6">
                            </div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="7">
                            </div>
                            <div class="col-xs-4">
                                <input id='back_bt' class="btn btn-warning btn-block  btn-round" type="button"
                                    value="RESET">
                            </div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-block  btn-round pinkey" type="button" value="3">
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-info btn-round btn-block waves-effect waves-light btn-submit"
                                    type="submit">Kirimkan</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-4"><a style="" class="btn btn-danger btn-round btn-block waves-effect "
                                    href="/logout" i18n="@Logout">LOGOUT</a></div>
                            <div class="col-xs-4"></div>
                        </div>
                    </div>
                    <div class="row  alert alert-danger message" _login-modal>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-center" id="footer--login-modal">
                <div class="footer-content">Tidak terdaftar? <a href="/desktop/register" i18n>Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='md-overlay'></div> <!-- END login form -->



<!-- Loading modal -->
<div class="nifty-modal fade-in-scale" id="loading--layout" style="z-index:1000001;" data-isnotcloseoverlay="true">
    <div class="md-content">
        <div class='md-body'>

            <div class="loader-b large"></div>
        </div>
    </div>
</div>
<div class='md-overlay' style="z-index:1000000;"></div>
<!-- END Loading modal-->

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
                    <input type="hidden" name="_token" value="zYfuAettv5ooKJKWkIJRDCNZn9QosiU0a4f0jQ6a">
                    <div class="form-group">
                        <label for="mainwallet_amount">From Main Wallet</label>
                        <input type="text" class="form-control" readonly name="mainwallet_amount" id="mainwallet_amount"
                            value="" />

                    </div>
                    <div class="text-center">
                        <span class="vertical"><i class="icon-arrow-long-right"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="mainwallet_amount">Transfer to <span id="gamename"></span> Wallet</label>
                            <div class="form-group">

                                <div class="customrange-slider">
                                    <div id="slider" overflow-scroll="false"
                                        class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
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
                            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
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
                        <img class="img-fluid" src="/assets/images/log_html5.png" alt="play-in-browser">
                        <div class="download-caption text-center">
                            Play now in your browser
                        </div>
                        <div class="download-linkbtn text-center">
                            <img class="img-fluid" src="  /assets/images/btn_playnow.png" alt="play-now-in-browser">
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
                <button class="btn btn-link pull-left " id="btn-close--live-draw-modal"> <i class="icon icon-close"></i>
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
<!-- APK download modal end-->
<script type="text/javascript" src="https://cdn.sitestatic.net/assets/jquery-validation/jquery.validate.min.js">
</script>
<script type="text/javascript" src="https://cdn.sitestatic.net/assets/jquery-validation/additional-methods.min.js">
</script>
<link rel="stylesheet" href="https://cdn.sitestatic.net/assets/fancybox/jquery.fancybox.min.css">


<script type="text/javascript" src="https://cdn.sitestatic.net/assets/fancybox/jquery.fancybox.min.js"></script>
<script>
    window.isAuth = '1' ? false : true;
    window.currencyCode = 'IDR';
    window.lang = "id";
    window.agentCode = '<?php echo $s0['instansi']; ?>';
    window.sweetAlert = function (msg, type, title, showCancelBtn) {
        //check CF error
        var dateNow = "2023-11-29 01:22:42";

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
            url: "/getPokerJackpotAmt",
            type: 'post',
            data: {
                _token: $('meta[name=csrf-token]').attr('content')
            },
            success: function (data) {
                prize = (data / 2000.000) * 2000.000;
                $('.jackpot_numbers_home').html(
                    `IDR <span id="jackpot_amount">${commaSeparateNumber(prize)}</span>`)

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
        } else if (selectedBank == 'BNI' || selectedBank == 'BCA' || selectedBank == 'DMN' || selectedBank ==
            'BSI' || selectedBank == 'BLA') {
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
            if ($("#login-modal--layout").length && !$('#loginForm').hasClass('js-inline-form')) {
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

<script type="text/javascript" src="/js/ugsports/app-desktop.js"> </script>
<!--Language Option Modal -->
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
<script>
    if (window.location.href.indexOf('reLogin=yes') >= 0 && !window.isAuth) {
        if ($("#login-modal--layout").length) {
            $("#login-modal--layout").nifty("show")
        }
    }

    $('#dropdownothergameblc').click(function () {
        window.getAllGameBal();
    });
</script>
</body>

</html>