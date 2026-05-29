<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="assets/img/profile.jpg" alt="..."
						class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?php echo $username; ?>
							<span class="user-level"><?php echo $role; ?></span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>
					<div class="collapse in" id="collapseExample">						
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="/newbie/dashboard.php" data-toggle="collapse show" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php if($role == 'Superadmin'){ ?>
				 <li class="nav-item">
					<a href="/newbie/gameakses.php">
						<i class="fas fa-users"></i>
						<p>Game Lock</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="/newbie/saldomember.php">
						<i class="fas fa-money-bill"></i>
						<p>Inject Saldo Member</p>
					</a>
				</li>
				<?php } ?>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="icon-people"></i>
					</span>
					<h4 class="text-section">Kelola Member</h4>
				</li>
				<li class="nav-item">
					
					<a data-toggle="collapse" href="#member">
						<i class="fas fa-layer-group"></i>
						<p>Kelola Member</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="member">
						<ul class="nav nav-collapse">
						<?php if($role == 'Admin' || $role == 'Superadmin'){ ?>						
							<li>
								<a href="/newbie/member.php">
									<span class="sub-item">Member</span>
								</a>
							</li>
							<?php } ?>	
							<li>
								<a href="/newbie/lihatsaldomember.php">
									<span class="sub-item">Cek Saldo Member</span>
								</a>
							</li>																					
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#tables">
						<i class="fas fa-table"></i>
						<p>Transaksi</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="tables">
						<ul class="nav nav-collapse">
							<li>
								<a href="/newbie/request_depo.php">
									<span class="sub-item">Permintaan Deposit</span>
								</a>
							</li>
							<li>
								<a href="/newbie/request_withdraw.php">
									<span class="sub-item">Permintaan Withdraw</span>
								</a>
							</li>
							<li>
								<a href="/newbie/deposit.php">
									<span class="sub-item"> Riwayat Deposit</span>
								</a>
							</li>

							<li>
								<a href="/newbie/withdraw.php">
									<span class="sub-item"> Riwayat Withdraw</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<?php if($role == 'Superadmin'){ ?>

				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="icon-people"></i>
					</span>
					<h4 class="text-section">Admin User</h4>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#sidebarLayouts">
						<i class="fas fa-th-list"></i>
						<p>Kelola User Admin</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="sidebarLayouts">
						<ul class="nav nav-collapse">
							<li>
								<a href="/newbie/adminuser.php">
									<span class="sub-item">User Admin</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#forms">
						<i class="fas fa-pen-square"></i>
						<p>Setting Website</p>
						<span class="caret"></span>
						<span class="badge badge-danger">Wajib</span>
					</a>
					<div class="collapse" id="forms">
						<ul class="nav nav-collapse">
							<li>
								<a href="/newbie/general.php">
									<span class="sub-item">General</span>
								</a>
							</li>
							<li>
								<a href="/newbie/livechat.php">
									<span class="sub-item">Live Chat</span>
								</a>
							</li>
							<li>
								<a href="/newbie/popup.php">
									<span class="sub-item">Popup Homepage</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a href="/newbie/mt">
						<i class="fas fa-gamepad"></i>
						<p>MAINTENANCE</p>
					</a>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#charts">
						<i class="far fa-chart-bar"></i>
						<p>Rekening Deposit</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="charts">
						<ul class="nav nav-collapse">
							<li>
								<a href="/newbie/rekening.php">
									<span class="sub-item">Bank</span>
								</a>
							</li>
							<li>
								<a href="/newbie/qris.php">
									<span class="sub-item">QRIS</span>
									<span class="badge badge-success">New</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a href="/newbie/promosi.php">
						<i class="fas fa-gift"></i>
						<p>PROMOSI</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="/newbie/crm.php">
						<i class="fas fa-gift"></i>
						<p>CRM</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="/newbie/tema">
						<i class="fas fa-gift"></i>
						<p>Tema Web</p>
					</a>
				</li>

				<?php }?>
				<li class="nav-item">
					<a href="/newbie/logout.php">
						<i class="fas fa-signout"></i>
						<p>LOGOUT</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>