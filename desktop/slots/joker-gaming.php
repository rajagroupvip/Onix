<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../../config/koneksi.php');
$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];
$pengguna = $s0['user'];
$sql_1a = mysqli_query($conn,"SELECT * FROM `tb_social` WHERE user = '$pengguna'") or die(mysqli_error());
$s1a = mysqli_fetch_array($sql_1a);
$sql_1b = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '$pengguna'") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1b);
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d');
$stat = mysqli_query($conn,"INSERT INTO `tb_stat` (`ip`, `date`, `hits`, `page`, `user`) VALUES ('$ip', '$date', 1, 'Beranda', '$pengguna')") or die (mysqli_error());
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

include "../../desktop/header.php";
?>
<div class="content my01">
     
     <!-- <div class="content-loader" *ngIf="subs.state$.requests.getAllGamesViewByCategory.inProgress; else content"><app-spinner></app-spinner> </div> -->
     
     <script type="text/javascript">
         var windowNames = JSON.parse( '{"lottery":"lottery","live":"king4d","togel":"king4d"}');
       
     </script>
     <div class="container pt-2 " > 
              <div class="scroll-wrapper row games-slider-menu">
         <div class="slider" style="overflow:hidden;">
         <div class="left"><button class="prev-btn btn" id="left-button"><i class="icon-keyboard_arrow_left"></i></button></div>
     
           <div class="row no-gutters text-center slider-content"  >
             <!--//hardcoded links.......-->
     
                     
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="<?php echo $urlweb; ?>/desktop/slots/pragmatic-play" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/images/ppslot.gif?v=1"  data-src="https://files.sitestatic.net/images/ppslot.gif?v=1" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> PRAGMATIC</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/reel-kingdom" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/reelkingdom_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/reelkingdom_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> REEL KINGDOM</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box" href="<?php echo $urlweb; ?>/desktop/slots/pgsoft" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/images/pgsoft.gif?v=0.2"  data-src="https://files.sitestatic.net/images/pgsoft.gif?v=0.2" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> PGSOFT</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box active" href="<?php echo $urlweb; ?>/desktop/slots/joker-gaming" rel="opener"  >
                                                                                <div class="hot-tag"></div>
                                                         <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/jk_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/jk_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> JOKER</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/habanero" rel="opener"  >
                                                                                <div class="hot-tag"></div>
                                                         <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/hb_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/hb_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> HABANERO</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/microgaming" rel="opener"  >
                                                                                <div class="hot-tag"></div>
                                                         <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/mg_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/mg_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> MICRO GAMING</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/hacksaw" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/hacksaw_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/hacksaw_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> HACKSAW</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/relax" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/relax_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/relax_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> RELAX GAMING</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/fastspin" rel="opener"  >
                                                                                <div class="hot-tag"></div>
                                                         <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/fastspin_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/fastspin_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> FASTSPIN</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/booongo" rel="opener"  >
                                                                                <div class="hot-tag"></div>
                                                         <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/booongo_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/booongo_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> BNG</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/playson" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ttg_playson_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ttg_playson_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> PLAYSON</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/booming" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ttg_booming_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ttg_booming_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> BOOMING</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/ygg" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/yggslot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/yggslot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> YGG</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/cq9" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/cq9_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/cq9_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> CQ9</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/playngo" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/playngo_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/playngo_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> PLAYNGO</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/spadegaming" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/sg_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/sg_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> SPADE GAMING</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/toptrend-gaming" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ttg_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ttg_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> TOPTREND GAMING</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/skywind" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/skywind_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/skywind_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> SKYWIND</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/playstar" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/playstar_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/playstar_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> PLAYSTAR</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                                              <div class="btn-box  maintenance-alert bg-um "  >
                                                                          <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/redtiger_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/redtiger_slot.png" *ngIf="showEle" height="70"  />
                         <div class="text-center  fs-md game-title">REDTIGER</div>
                     </div>
                                </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/evoplay" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/evoplay_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/evoplay_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> EVOPLAY</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                                              <div class="btn-box  maintenance-alert bg-um "  >
                                                                          <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/redtiger_net_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/redtiger_net_slot.png" *ngIf="showEle" height="70"  />
                         <div class="text-center  fs-md game-title">NETENT</div>
                     </div>
                                </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/nolimitcity" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/nolimitcity_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/nolimitcity_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> NOLIMITCITY</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/mancalagaming" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/mancalagaming_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/mancalagaming_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> MANCALA GAMING</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/eagaming" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/eagaming_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/eagaming_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> EA GAMING</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                                              <div class="btn-box  maintenance-alert bg-um "  >
                                                                          <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ais_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/ais_slot.png" *ngIf="showEle" height="70"  />
                         <div class="text-center  fs-md game-title">AIS GAMING</div>
                     </div>
                                </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/kagaming" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/kagaming_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/kagaming_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> KA GAMING</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/nagagames" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/nagagames_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/nagagames_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> NAGA GAMES</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                                              <div class="btn-box  maintenance-alert bg-um "  >
                                                                          <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/sbo_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/sbo_slot.png" *ngIf="showEle" height="70"  />
                         <div class="text-center  fs-md game-title">SBO</div>
                     </div>
                                </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/dragoonsoft" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/dragoon_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/dragoon_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> DRAGOON SOFT</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/reevo" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/reevo_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/reevo_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> REEVO</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/live22" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/live22_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/live22_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> LIVE22</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/fachai" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/fachai_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/fachai_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> FACHAI</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/bgaming" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/bgaming_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/bgaming_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> BGAMING</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/advantplay" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/advantplay_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/advantplay_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> ADVANTPLAY</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/apollo777" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/apollo777_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/apollo777_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> APOLLO777</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/jdb" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/jdb_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/jdb_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> JDB</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/jili" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/jili_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/jili_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> JILI</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/568win" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/sbo_568win_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/sbo_568win_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> 568 WIN</div>
                   </a>
                               </div>
     
                       
                      
                <div class="col"  >
                              
                   <a   class="btn-box " href="/slots/gmw" rel="opener"  >
                                                                      <img  alt="" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/gmw_slot.png"  data-src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/gmw_slot.png" *ngIf="showEle" height="70"  />
                     <div class="text-center fs-md game-title"> GMW</div>
                   </a>
                               </div>
     
                
           </div>
     
         <div class="right"><button class="next-btn btn" id="right-button"><i class="icon-keyboard_arrow_right"></i></button></div>
         </div>
     
       </div>
      
     </div>
     <div class="container sub-games">
           <div class="">
       <!--game category dynamic-->
     
       <div class="g_category-nav fixed nav nav-pills nav-fill clearfix">
         <div class="nav-item search_filter">
           <span class="srch_icon"><i class="icon-magnifier"></i></span>
           <input type="text" matInput placeholder="Cari Pesan Disini" [(ngModel)]="filterInput" maxlength="255"
             class="search" (change)="search($event)" i18n-placeholder="@Search">
           <button matSuffix class="btn srch_button" (click)="clearSearch($event)"><i class="icon-x-square"></i></button>
         </div>
     
         <div class="nav-item" data-filter="ALL">
           <a class="navlink" href="javascript:void(0);" [ngClass]="{'active': filterProperty== FilterType.All}"
             i18n="@ALL">
             SEMUA      </a>
         </div>
         <div class="nav-item" data-filter="TOP">
           <a class="navlink" href="javascript:void(0);" [ngClass]="{'active': filterProperty== FilterType.Top}"
             i18n="@TOP">
             TOP      </a>
         </div>
             <div class="nav-item" data-filter="NEW">
           <a class="navlink" href="javascript:void(0);" [ngClass]="{'active': filterProperty==FilterType.New}" i18n="@NEW">
             BARU      </a>
         </div>
         <div class="nav-item" _MORE>
           <a class="navlink" href="javascript:void(0);"
             [ngClass]="{'active': filterProperty== FilterType.More || (filterProperty && filterProperty!=FilterType.Top && filterProperty!=FilterType.New  && filterProperty!=FilterType.All) }">
             LEBIH        
           </a>
         </div>
     
     
       </div>
       <div class="g_category-nav nav nav-pills nav-fill hide" _MORE>
           </div>
       <br />
        <!-- List Game -->

        <div class="flex-row flex-wrap games pragmatic-play pp_slots">
                <?php
                    if(isset($_GET['provider'])){
                    $provider = $_GET['provider'];
                    $sql_provider = mysqli_query($conn,"SELECT * FROM `tb_provider` WHERE slug = '$provider'") or die(mysqli_error());
                    $sp = mysqli_fetch_array($sql_provider);
                    $providerID = $sp['providerid'];
                    $where = "`provider` = '".$providerID."' AND";
                    $pageLink = 'slot/'.$provider.'/';
                    }
                    else {
                    $where = "`provider` = 'joker' AND";
                    $pageLink = 'slot/?';
                    }
                    
                    $sql_3 = mysqli_query($conn,"SELECT * FROM `tb_gamelist` WHERE $where `datatype` = 'RNG' ORDER BY cuid ASC") or die(mysqli_error($conn));
                    while($s3 = mysqli_fetch_array($sql_3)){
                    if(isset($_SESSION['user'])){
                        $externalPlayerId = $_SESSION['user'];
                        $playUrl = $urlweb.'/gameplay/'.$s3['provider'].'/?gamecode='.$s3['gameid'].'&extplayer='.$externalPlayerId;
                    }
                    else {
                        $playUrl = $urlweb.'/login/';
                    }
                            
                ?>

            <div class="game-box text-center" data-jpid="" data-title="<?php echo $s3['gamename']; ?>"
                data-filter="ALL,Video Slots,TOP,Buy Bonus Feature" [ngClass]="{'flex-grow-2' : game.FlexGrow =='2'}"
                [id]="'gb-'+ i">
                <!--todo daily win tag here-->
                <div class="daily-wins-tag"> </div>

                <div class="image">
                    <!-- [delayMsec]="1500"-->
                    <img src="" data-src="<?php echo $urlweb . '/' . $s3['image']; ?>"
                        class="unveiled lazy" *ngIf="showEle">
                    <!--/*IMAGE MIN WIDTH MUST BE 146, MAX 6 game-box per row */-->

                </div>
                <div class="name">
                    <div class="opacity_content">
                        <div class="opacity_background">

                        </div>
                        <div class="title-wrap">
                            <div class="game-title fs-lg"><?php echo $s3['gamename']; ?></div>

                        </div>
                    </div>
                </div>
                <div class="amount_box" style="display:none;">
                </div>
                <div class="game-overlay game-has-try">
    <a class="btn game_button_play" href="javascript:void(0);" onclick="registerPopup({content:'Maintenance.'})"">
        MAIN SEKARANG
    </a>
    <input type="hidden" value="pp_slots" name="hiddenGameID-001" id="hiddenGameID-001">
</div>

                
            </div>
            <?php } ?>
  <?php include "../footer.php";?>