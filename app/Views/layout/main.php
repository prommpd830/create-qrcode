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
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-secondary py-3">
      <div class="container">
        <span class="navbar-brand fw-bold">QR Code</span>
        <div class="ms-auto">
          <?php if (!$user) { ?>
          <a href="<?= base_url('login') ?>" class="btn btn-danger fw-bold">Login</a>
          <a href="<?= base_url('register') ?>" class="btn btn-light fw-bold">Register</a>
          <?php } else { ?>
          <div class="dropdown">
            <a class="text-decoration-none text-white dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?= base_url('assets/img/'.$user['img']) ?>" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownMenuButton1">
              <li class="text-center">
                <form method="post" action="<?= base_url('logout') ?>">
                    <button class="dropdown-item d-block" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </div>          
          <?php } ?>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <div class="bg-secondary p-5">
      <div class="container-fluid text-center">
        <span class="text-white">Copyright &copy; <?= date('Y') ?> - Prommpd830</span>
      </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>