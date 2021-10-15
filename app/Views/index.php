
<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-5" style="background-color: gainsboro;">
	<div class="text-center">
		<h1 class="display-3">Create Your QR Code</h1>
		<p class="lead">The QR code generator built to optimize your QR code projects​</p>
	</div>
</div>

<!-- QR Qode -->
<div class="container p-5">
	<div class="row align-items-center">
		<div class="col-lg-6 col-12">
			<div class="py-5">
				<h2 class="display-4">Easily Create and Manage QR Codes</h2>
				<p class="lead">Save time having your QR codes under watch. Find in one place all the functionalities that you need to improve your QR code Campaigns conversions. Redirect your QR codes to new contents, perform batch actions, design your QR codes and more.</p>
			</div>
		</div>
		<div class="col-lg-2 col-md-4 mb-4 mb-md-0">
			<div id="loading" class="text-center d-none">
			  <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
			    <span class="visually-hidden">Loading...</span>
			  </div>
			</div>
			<img id="qr-qode" src="" class="img-fluid d-block mx-auto" data-href="<?= base_url('qrcode') ?>">
		</div>
		<div class="col-lg-4 col-md-8">
			<div class="d-flex flex-column">
				<form class="generate-code">
					<div class="my-3">
						<div class="row align-items-center">
							<div class="input-group">
							  <button class="btn btn-lg btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
							  <ul class="dropdown-menu">
							    <li><a class="dropdown-item" href="https://">Link</a></li>
							    <li><a class="dropdown-item" href="Create Your QR Code!">Text</a></li>
							  </ul>
							  <input type="text" class="form-control" name="data" placeholder="Some Text">
							</div>
						</div>
					</div>
					<div class="my-3">
						<div class="d-flex align-items-center">
							<button class="btn btn-danger text-white w-100" type="submit">Generate Code</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End QR qode -->

<!-- My JS -->
<script type="text/javascript" src="<?= base_url() ?>/assets/js/qr.js"></script>
<?= $this->endSection() ?>