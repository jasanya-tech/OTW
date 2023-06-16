<style>
	.navbar-brand {
		position: absolute;
		left: 16px;
		display: flex;
		align-items: center;
		gap: 12px;
	}

	.navbar-brand>h4 {
		font-style: italic;
	}

	.avatar {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.avatar span{
		margin: 12px;
	}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url('home'); ?>">
			<img src="<?= base_url('assets\img\logo-otw.jpg') ?>" class="rounded-circle" width="50" height="50" alt="" srcset="">
			<h4>OTW</h4>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			</ul>
			<div class="d-flex position-relative">
				<div class="d-flex align-items-center gap-2 dropdown-toggle" data-bs-toggle="dropdown">
					<div class="nama text-capitalize fw-bold h-4">
						<?= $this->session->userdata('nama'); ?>
					</div>
					<div class="bg-warning rounded-circle avatar" style="width: 50px;height: 50px;">
						<span class="h6">A</span>
					</div>
				</div>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>
