<?php include "header.php"; ?>
<?php
            error_reporting(0);
            if (!empty($_GET['notif'])) {
              if ($_GET['notif'] == 1) {
                echo '
                  <script>
                    Swal.fire({
                      icon: "success",
                      title: "Selamat!",
                      text: "Anda Berhasil Login!",
                      showConfirmButton: false,
                      timer: 2000
                    });
                  </script>
                ';
              }
            }
			?>

<?php
    	error_reporting(0);
        $today = date('Y-m');
    	$sql_1 = mysqli_query($conn,"SELECT SUM(jenis) as deposit FROM `tb_transaksi` WHERE status = 1 AND jenis = 1 AND date LIKE '$today%'") or die(mysqli_error());
        $s1 = mysqli_fetch_array($sql_1);
		$sql_depo = mysqli_query($conn,"SELECT SUM(total) as totaldeposit FROM `tb_transaksi` WHERE status = 1 AND jenis = 1 AND date LIKE '$today%'") or die(mysqli_error());
        $sd = mysqli_fetch_array($sql_depo);
    	$sql_wd = mysqli_query($conn,"SELECT SUM(total) as totalwithdraw FROM `tb_transaksi` WHERE status = 1 AND jenis = 2 AND date LIKE '$today%'") or die(mysqli_error());
        $sw = mysqli_fetch_array($sql_wd);
		$sql_2 = mysqli_query($conn,"SELECT SUM(jenis) as withdraw FROM `tb_transaksi` WHERE status = 1 AND jenis = 2 AND date LIKE '$today%'") or die(mysqli_error());
        $s2 = mysqli_fetch_array($sql_2);
        $sql_3 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE status = 1 AND level = 'user'") or die(mysqli_error());
        $s3 = mysqli_num_rows($sql_3);
        $sql_6 = mysqli_query($conn,"SELECT SUM(hits) as visitor FROM `tb_stat`") or die(mysqli_error());
        $s6 = mysqli_fetch_array($sql_6);
    ?>
<?php include "sidebar.php";?>
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
					</div>
				</div>
			</div>
		</div>
		<?php

try {
    // Panggil metode getbalanceagent untuk mendapatkan informasi saldo agen
    $balanceInfo = $WL->getbalanceagent();

    // Memeriksa status respon
    if ($balanceInfo['status'] === 'success') {
        // Memeriksa apakah ada data yang diterima
        if (isset($balanceInfo['data'])) {
            $data = $balanceInfo['data'];

            // Mendapatkan nilai yang diperlukan
            $agentBalance = $data['balance'];
            $agentCode = $data['agent_code'];
            $currency = $data['currency'];

            // Format balance
            $formattedBalance = number_format($agentBalance, 0, ',', '.');

            // Proses lebih lanjut...
        } else {
            throw new Exception("Agent balance information missing.");
        }
    } else {
        // Menangani kesalahan jika request gagal
        $errorMessage = isset($balanceInfo['msg']) ? $balanceInfo['msg'] : "Unknown error";
        throw new Exception("Failed to retrieve agent balance. Error: " . $errorMessage);
    }
} catch (Exception $e) {
    // Menangkap dan menampilkan kesalahan
    echo "Error: " . $e->getMessage();
}
?>

		<div class="page-inner mt--5">
			<div class="row row-card-no-pd mt--2">
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-users text-warning"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Total User</p>
										<h4 class="card-title"><?php echo number_format($s3); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-coins text-success"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Total Deposit</p>
										<h4 class="card-title"><?php echo number_format($sd['totaldeposit']); ?>
										</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-coins text-danger"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Total Withdraw</p>
										<h4 class="card-title">
											<?php echo number_format($sw['totalwithdraw']); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-users text-primary"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Saldo Tersisa</p>
										<h4 class="card-title"><?php echo $formattedBalance; ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xl-12 mb-4">
				<div class="card h-100">
					<div class="card-header d-flex justify-content-between">
						<div class="card-title m-0 me-2">
							<h5 class="m-0 me-2">Pengumuman</h5>
							<small class="text-muted">Tuliskan Pengumuman Disini</small>
						</div>
					</div>
					<div class="card-body">
						<form role="form" action="/newbie/tools/news.php" method="post">
							<div class="form-group mb-2">
								<label class="form-label">Konten Pengumuman :</label>
								<textarea class="form-control summernoteEditor" type="text" name="content"
									rows="10"><?php echo $s0['news']; ?></textarea>
							</div>
							<button type="submit" name="submit" class="btn btn-primary">Publish</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card full-height">
					<div class="card-body">
						<div class="card-title">Total PENDAPATAN</div>
						<div class="row py-3">
							<div class="col-md-4 d-flex flex-column justify-content-around">
								<div>
									<h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
									<h3 class="fw-bold">RP <?php echo number_format($sd['totaldeposit']); ?>
									</h3>
								</div>
								<div>
									<h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
									<h3 class="fw-bold">Rp
										<?php echo number_format($sw['totalwithdraw']); ?></h3>
								</div>
							</div>
							<div class="col-md-8">
								<div id="chart-container">
									<canvas id="totalIncomeChart"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-xl-12 mb-4">
				<div class="card h-100">
					<div class="card-header d-flex justify-content-between">
						<div class="card-title m-0 me-2">
							<h5 class="m-0 me-2">Transaksi Terakhir</h5>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr class="bg-info text-white">
										<th class="text-center" style="vertical-align: middle;">#</th>
										<th class="text-center" style="vertical-align: middle;">TrxID</th>
										<th class="text-center" style="vertical-align: middle;">Date</th>
										<th class="text-center" style="vertical-align: middle;">Username</th>
										<th class="text-center" style="vertical-align: middle;">Payment Method
										</th>
										<th class="text-center" style="vertical-align: middle;">Payment From
										</th>
										<th class="text-center" style="vertical-align: middle;">Amount</th>
										<th class="text-center" style="vertical-align: middle;">Note</th>
										<th class="text-center" style="vertical-align: middle;">Status</th>
										<th class="text-center" style="vertical-align: middle;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
                            $sql = mysqli_query($conn,"SELECT t.*, u.username, b1.akun AS metode_akun, b2.akun AS pay_from_akun
                                FROM `tb_transaksi` t
                                LEFT JOIN `tb_user` u ON t.userID = u.cuid
                                LEFT JOIN `tb_bank` b1 ON t.metode = b1.cuid
                                LEFT JOIN `tb_bank` b2 ON t.pay_from = b2.cuid
                                WHERE t.jenis = 1 AND t.status = 0
                                ORDER BY t.cuid DESC LIMIT 10") or die(mysqli_error());
                            $no = 0;
                            while($s1 = mysqli_fetch_array($sql)){
                                $no++;
                        ?>
									<tr>
										<td class="text-center" style="vertical-align: middle; font-size: 14px;">
											<?php echo $no; ?>
										</td>
										<td class="text-left"
											style="vertical-align: middle; white-space: normal; font-size: 14px;">
											<?php echo $s1['kd_transaksi']; ?>
										</td>
										<td class="text-center"
											style="vertical-align: middle; white-space: normal; font-size: 14px;">
											<?php echo date('Y-m-d', strtotime($s1['date'])); ?><br><?php echo date('H:i:s', strtotime($s1['date'])); ?>
										</td>
										<td class="text-center"
											style="vertical-align: middle; white-space: normal; font-size: 14px;">
											<?php echo $s1['username']; ?>
										</td>
										<td class="text-center"
											style="vertical-align: middle; white-space: normal; font-size: 14px;">
											<?php if($s1['metode'] == 0) { echo 'By Sistem'; } else { echo $s1['metode_akun']; } ?>
										</td>
										<td class="text-center"
											style="vertical-align: middle; white-space: normal; font-size: 14px;">
											<?php if($s1['pay_from'] == 0) { echo 'By Sistem'; } else { echo $s1['pay_from_akun']; } ?>
										</td>
										<td class="text-right"
											style="vertical-align: middle; white-space: normal; font-size: 14px; text-align: right;">
											<?php echo number_format($s1['total']); ?>
										</td>
										<td class="text-center"
											style="vertical-align: middle; white-space: normal; font-size: 14px;">
											<?php echo $s1['note']; ?>
										</td>
										<td class="text-center"
											style="vertical-align: middle; white-space: normal; font-size: 14px;">
											<?php
                                if($s1['status'] == 0){
                                    echo '<span class="badge-dot"><i class="bg-warning"></i> PENDING</span>';
                                } elseif($s1['status'] == 1){
                                    echo '<span class="badge-dot"><i class="bg-success"></i> PAID</span>';
                                } else {
                                    echo '<span class="badge-dot"><i class="bg-danger"></i> REJECT</span>';
                                }
                                ?>
										</td>
										<td class="text-center"
											style="vertical-align: middle; white-space: nowrap; font-size: 14px;">
											<?php if($s1['status'] == 0){ ?>
											<a href="<?php echo $urlweb; ?>/tools/proses_topup.php?cuid=<?php echo $s1['cuid']; ?>"
												class="btn btn-primary btn-sm">Proses</a>
											<a href="<?php echo $urlweb; ?>/tools/reject_topup.php?cuid=<?php echo $s1['cuid']; ?>"
												class="btn btn-danger btn-sm"
												onclick="return confirm('Are you sure want to Reject this Transaction?');">Reject</a>
											<?php } else { ?>
											<a href="#" class="btn btn-success btn-sm">Selesai</a>
											<?php } ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container-fluid">
			<nav class="pull-left">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="#">
							Newbie Dev
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							Help
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							Licenses
						</a>
					</li>
				</ul>
			</nav>
			<div class="copyright ml-auto">
				2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">Aloysius Indra</a>
			</div>
		</div>
	</footer>
</div>

<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
	<div class="title">Settings</div>
	<div class="custom-content">
		<div class="switcher">
			<div class="switch-block">
				<h4>Logo Header</h4>
				<div class="btnSwitch">
					<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
					<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
					<br />
					<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
				</div>
			</div>
			<div class="switch-block">
				<h4>Navbar Header</h4>
				<div class="btnSwitch">
					<button type="button" class="changeTopBarColor" data-color="dark"></button>
					<button type="button" class="changeTopBarColor" data-color="blue"></button>
					<button type="button" class="changeTopBarColor" data-color="purple"></button>
					<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
					<button type="button" class="changeTopBarColor" data-color="green"></button>
					<button type="button" class="changeTopBarColor" data-color="orange"></button>
					<button type="button" class="changeTopBarColor" data-color="red"></button>
					<button type="button" class="changeTopBarColor" data-color="white"></button>
					<br />
					<button type="button" class="changeTopBarColor" data-color="dark2"></button>
					<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
					<button type="button" class="changeTopBarColor" data-color="purple2"></button>
					<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
					<button type="button" class="changeTopBarColor" data-color="green2"></button>
					<button type="button" class="changeTopBarColor" data-color="orange2"></button>
					<button type="button" class="changeTopBarColor" data-color="red2"></button>
				</div>
			</div>
			<div class="switch-block">
				<h4>Sidebar</h4>
				<div class="btnSwitch">
					<button type="button" class="selected changeSideBarColor" data-color="white"></button>
					<button type="button" class="changeSideBarColor" data-color="dark"></button>
					<button type="button" class="changeSideBarColor" data-color="dark2"></button>
				</div>
			</div>
			<div class="switch-block">
				<h4>Background</h4>
				<div class="btnSwitch">
					<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
					<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
					<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
					<button type="button" class="changeBackgroundColor" data-color="dark"></button>
				</div>
			</div>
		</div>
	</div>
	<div class="custom-toggle">
		<i class="flaticon-settings"></i>
	</div>
</div>
<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="assets/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
<script>
	Circles.create({
		id: 'circles-1',
		radius: 45,
		value: < ? php echo number_format($s3); ? > ,
		maxValue : 1000,
		width: 7,
		text: '<?php echo number_format($s3); ?>',
		colors: ['#f1f1f1', '#FF9E27'],
		duration: 400,
		wrpClass: 'circles-wrp',
		textClass: 'circles-text',
		styleWrapper: true,
		styleText: true
	});

	Circles.create({
		id: 'circles-2',
		radius: 45,
		value: < ? php echo number_format($s1['deposit']); ? > ,
		maxValue : 1000,
		width: 7,
		text: '<?php echo number_format($s1['
		deposit ']); ?>',
		colors: ['#f1f1f1', '#2BB930'],
		duration: 400,
		wrpClass: 'circles-wrp',
		textClass: 'circles-text',
		styleWrapper: true,
		styleText: true
	});

	Circles.create({
		id: 'circles-3',
		radius: 45,
		value: < ? php echo number_format($s2['withdraw']); ? > ,
		maxValue : 100,
		width: 7,
		text: '<?php echo number_format($s2['
		withdraw ']); ?>',
		colors: ['#f1f1f1', '#F25961'],
		duration: 400,
		wrpClass: 'circles-wrp',
		textClass: 'circles-text',
		styleWrapper: true,
		styleText: true
	});


	var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

	var mytotalIncomeChart = new Chart(totalIncomeChart, {
		type: 'bar',
		data: {
			labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
			datasets: [{
				label: "Total Income",
				backgroundColor: '#ff9e27',
				borderColor: 'rgb(23, 125, 255)',
				data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
			}],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false,
			},
			scales: {
				yAxes: [{
					ticks: {
						display: false //this will remove only the label
					},
					gridLines: {
						drawBorder: false,
						display: false
					}
				}],
				xAxes: [{
					gridLines: {
						drawBorder: false,
						display: false
					}
				}]
			},
		}
	});

	$('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#ffa534',
		fillColor: 'rgba(255, 165, 52, .14)'
	});
</script>
</body>

</html>