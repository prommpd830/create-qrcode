<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $title ?></title>
  </head>
  <body class="bg-dark">

    <!-- Form Register -->
	<div class="container">
		<div class="my-5 py-5">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="card border-none shadow p-5">
						<div class="text-center">
							<h1 class="display-5">Register</h1>
						</div>
						<form class="px-md-5 py-5 px-0" action="<?= base_url('register') ?>" method="post">
							<!-- Alert -->
							<?php if(!empty(session()->getFlashdata('error'))) { ?>
		                    <div class="alert alert-danger text-center" role="alert">
		                        <?php echo session()->getFlashdata('error');?>
		                    </div>
		                    <?php } ?>
		                    <!-- End Alert --> 
							<div class="input-group mb-3">
								<input type="text" name="name" class="form-control form-control-lg fs-6 rounded <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" placeholder="Name" value="<?= old('name') ?>">
								<div class="invalid-feedback text-danger"><?= $validation->getError('name'); ?></div>
							</div>
							<div class="input-group mb-3">
								<input type="text" name="email" class="form-control form-control-lg fs-6 rounded <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?= old('email') ?>">
								<div class="invalid-feedback text-danger"><?= $validation->getError('email'); ?></div>
							</div>
							<div class="input-group mb-3">
								<input type="password" name="password" class="form-control form-control-lg fs-6 rounded <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Passoword" value="<?= old('password') ?>">
								<div class="invalid-feedback text-danger"><?= $validation->getError('password'); ?></div>
							</div>
							<div class="my-3 text-center">
								<button class="btn btn-danger btn-lg w-100" type="submit">Register</button>
							</div>
							<div class="my-3 text-center">
								<a href="<?= base_url('login') ?>" class="text-decoration-none">Already have a account? Login</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Form -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>