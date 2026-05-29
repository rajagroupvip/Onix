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
include "../desktop/header.php";
?>
<div class="content my01">

    <div class="container promo-view">
        <div class="promo-list ml-lg-5 mr-lg-5">
            <style>
                ::-webkit-scrollbar {
                    width: 6px;
                    height: 6px;
                }

                /* Track */
                ::-webkit-scrollbar-track {
                    background: #e5e5e5;
                }

                /* Handle */
                ::-webkit-scrollbar-thumb {
                    background: #7e7e7e;
                    border-radius: 5px;
                }

                /* Handle on hover */
                ::-webkit-scrollbar-thumb:hover {
                    background: #555;
                }

                .time-remaining-wraper {
                    padding: 0;
                }

                .mobile .promotion-modal .panel-body {
                    background: transparent !important;
                }
            </style>
            <div class="promotion-page">
                <div class="g_category-nav fixed nav nav-pills nav-fill clearfix">
                    <div class="nav-item" data-filter="ALL">
                        <a class="navlink" href="javascript:void(0);">
                            SEMUA

                        </a>
                    </div>
                    <div class="nav-item" data-filter="Special">
                        <a class="navlink" href="javascript:void(0);">
                            Khusus
                        </a>
                    </div>
                    <div class="nav-item" data-filter="Sports">
                        <a class="navlink" href="javascript:void(0);">
                            sports
                        </a>
                    </div>
                    <div class="nav-item" data-filter="Slot">
                        <a class="navlink" href="javascript:void(0);">
                            slots
                        </a>
                    </div>
                    <div class="nav-item" data-filter="Casino">
                        <a class="navlink" href="javascript:void(0);">
                            casino
                        </a>
                    </div>
                    <div class="nav-item" data-filter="Others">
                        <a class="navlink" href="javascript:void(0);">
                            others
                        </a>
                    </div>
                </div>
                <?php
                    $sql_promo = mysqli_query($conn, "SELECT * FROM `tb_post` ORDER BY cuid DESC") or die(mysqli_error());
                    $no = 0;
                ?>
                <?php while ($sp = mysqli_fetch_array($sql_promo)) : ?>
                <?php $no++; ?>
                <div class="promotion-group" id="promotion-group">

                    <div class="promotion-single" data-filter="ALL,ALL,Special">
                        <div class="row d-flex">
                            <div class="col-md-4 col-sm-4 col-xs-12 ">
                                <img src="<?php echo $sp['image']; ?>"
                                    alt="Promosi" class="img-fluid " />
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12 m-t-10">

                                <div class="col-md-8 col-sm-8 col-xs-12 text-left">
                                    <h3 class="title">
                                        <div>
                                        <?php echo $sp['title']; ?>
                                        </div>
                                    </h3>
                                    <div class="m-t-10">
                                        <a href="javascript:void(0);" class="btn btn-secondary" data-trigger="nifty"
                                            data-target="#promo-modal-<?php echo $no; ?>">Rincian</a>
                                        <!--<a href="$applynow_url" class="btn btn-primary">__lang('::lang.Apply Now')</a>   -->
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 m-t-10 time-remaining-wraper">
                                    <div class="time-remaining">
                                        <i class="icon-clock"></i> &nbsp; Waktu yang tersisa </div>
                                    <div class="time-remaining-value">
                                        <h4>
                                            <span>Tanpa Batas Waktu</span>
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php
                    $sql_promo = mysqli_query($conn, "SELECT * FROM `tb_post` ORDER BY cuid DESC") or die(mysqli_error());
                    $no = 0;
                    ?>
                    <?php while ($sp = mysqli_fetch_array($sql_promo)) : ?>
                      <?php $no++; ?>
                    <div class="nifty-modal slide-in-bottom modal-lg promotion-modal" id="promo-modal-<?php echo $no; ?>">
                        <div class="md-content">
                            <div class='md-head'>
                                <div class="md-close">X</div>
                            </div>
                            <div class="promotionmodal_content">

                                <div class="md-body">
                                    <div class="row">

                                        <div class="col-md-5 col-sm-5 col-xs-12 promobanner_img">
                                            <img src="<?php echo $sp['image']; ?>"
                                                alt="promo" class="img-fluid " />
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <h3 class="title m-t-10">
                                                <div>
                                                <?php echo $sp['title']; ?>
                                                </div>
                                            </h3>
                                            <div class="time-remaining">
                                                <i class="icon-clock"></i> &nbsp; Waktu yang tersisa </div>
                                            <div class="time-remaining-value">
                                                <h4>
                                                    <span>Tanpa Batas Waktu</span>
                                                </h4>
                                            </div>
                                            <div class="m-t-10">
                                                <!-- <a href="$applynow_url" class="btn btn-primary">__lang('::lang.Apply Now')</a> -->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="m-t-10 ">
                                        <p><strong><br>SYARAT DAN KETENTUAN :</strong></p>
                                        <ol>
                                            <li>
                                            <?php echo $sp['content']; ?>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php
  include "../desktop/footer.php";
?>
