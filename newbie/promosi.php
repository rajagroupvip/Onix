<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>ADMINISTRATOR || BY NEWBIEDEV</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/newbie/assets/img/icon.ico" type="image/x-icon" />
    <script src="/newbie/assets/js/plugin/webfont/webfont.min.js"></script>
    
    <!-- CSS Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap Selectpicker CSS CDN -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <!-- Bootstrap JS CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Bootstrap Selectpicker JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/i18n/defaults-en_US.min.js"></script>
</head>

	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
					"simple-line-icons"
				],
				urls: ['/newbie/assets/css/fonts.min.css']
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="/newbie/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/newbie/assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="/newbie/assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="dashboard/" class="logo">
					<img src="<?php echo $s0['image']; ?>" alt="navbar brand" class="navbar-brand"
						style="width: 150px;">

				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
					data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
								aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
								aria-expanded="false">
								<div class="avatar-sm">
									<img src="/newbie/assets/img/profile.jpg" alt="..."
										class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="u-text">
												<h4><?php echo $u['full_name']; ?></h4>
												<p class="text-muted"><?php echo $u['email']; ?></p><a href="profile/"
													class="btn btn-xs btn-secondary btn-sm">View
													Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="logout/">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

<?php 
include "sidebar.php";
?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Tambah Promosi</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                    <?php
                        error_reporting(0);

                        if (!empty($_GET['notif'])) {
                            $notif = $_GET['notif'];
                            $messages = [
                                1 => ['success', 'Well Done! Promotion Saved!'],
                                2 => ['warning', 'Max Image Size 2MB!'],
                                3 => ['warning', 'Only JPG or PNG!'],
                            ];

                            if (isset($messages[$notif])) {
                                list($type, $message) = $messages[$notif];
                                echo "<div class=\"alert alert-$type d-flex align-items-center\" role=\"alert\">
                                    <span class=\"alert-icon text-$type me-2\">
                                        <i class=\"ti ti-" . ($type == 'success' ? 'check' : 'bell') . " ti-xs\"></i>
                                    </span>
                                    <span><strong>$message</strong></span>
                                </div>";
                            }
                        }

                        if (isset($_GET['postID'])) {
                            $catID = $_GET['postID'];
                            $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE cuid = '$catID'") or die(mysqli_error());
                            $s2 = mysqli_fetch_array($sql_2);
                        }
                        ?>
                        <h2 class="text-primary">Tambah Promosi</h2>
                        <form action="tools/add-promo.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Link Image :</label>
                                <input id="image" class="form-control" type="text" name="image">
                            </div>
                            <div class="form-group">
                                <label for="title">Promotion Title :</label>
                                <input id="title" class="form-control" type="text" name="title" value="<?= isset($_GET['postID']) ? $s2['nama_page'] : ''; ?>" required>
                                <input type="hidden" name="postID" value="<?= isset($_GET['postID']) ? $s2['cuid'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="content">Description :</label>
                                <textarea id="content" class="form-control" name="content"><?= isset($_GET['postID']) ? $s2['content'] : ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Jenis Promo :</label>
                                <select id="kategori" name="kategori" class="form-control" required>
                                    <option> Pilih </option>
                                    <option value="0" <?= (isset($_GET['postID']) && $s2['kategori'] == 0) ? 'selected' : ''; ?>> Deposit </option>
                                    <option value="1" <?= (isset($_GET['postID']) && $s2['kategori'] == 1) ? 'selected' : ''; ?>> Lainnya </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="persen">Percentage (%) :</label>
                                <input id="persen" class="form-control" type="text" name="persen" value="<?= isset($_GET['postID']) ? $s2['persen'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan Turn Over :</label>
                                <select id="satuan" name="satuan" class="form-control" required>
                                    <option> Pilih </option>
                                    <option value="0" <?= (isset($_GET['postID']) && $s2['satuan'] == 0) ? 'selected' : ''; ?>> kali </option>
                                    <option value="1" <?= (isset($_GET['postID']) && $s2['satuan'] == 1) ? 'selected' : ''; ?>> Rupiah </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="min_to">Minimal Turn Over :</label>
                                <input id="min_to" class="form-control" type="text" name="min_to" value="<?= isset($_GET['postID']) ? $s2['min_to'] : ''; ?>">
                            </div>                            
                            <button type="submit" name="submit" class="btn btn-primary">Publish</button>
                            <a href="promosi.php" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- Invoice List Table -->
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <table id="default-datatable" class="invoice-list-table table border-top">
                            <thead>
                                <tr class="bg-info">
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Promotion Title</th>
                                    <th class="text-center">Jenis Promo</th>
                                    <th class="text-center">Min Turn Over</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_1 = mysqli_query($conn, "SELECT * FROM `tb_post` ORDER BY cuid ASC") or die(mysqli_error());
                                $no = 0;
                                while ($s1 = mysqli_fetch_array($sql_1)) {
                                    $no++;
                                    $idkategori = $s1['cuid'];
                                ?>
                                    <tr>
                                        <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                            <img src="<?= $s1['image']; ?>" alt="Promotion Image" style="max-width: 100px; max-height: 100px;">
                                        </td>

                                        <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                            <?= $s1['title']; ?>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                            <?php
                                            if ($s1['kategori'] == 0) {
                                                echo' Deposit';
                                            } else {
                                                echo 'Promo Web';
                                            }
                                            ?>
                                        </td>                                                                                
                                        <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                            <?php
                                            if ($s1['satuan'] == 0) {
                                                echo $s1['min_to'] . ' Kali';
                                            } else {
                                                echo number_format($s1['min_to']);
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; font-size: 14px;">
                                            <a href="promosi.php?postID=<?= $s1['cuid']; ?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="tools/del-post.php?cuid=<?= $s1['cuid']; ?>&jenis=1" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
    <?php include "footer.php";?>
    
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#content').summernote();
        });
    </script>
</body>

</html>
