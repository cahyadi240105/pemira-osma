<?php
  // memanggil folder auth
  require_once 'auth/config.php';
  include 'auth/title.php';
  require_once 'auth/function.php';
  session_start();

  $totalPemilih = countWhere($pdo, 'users', 'role', 'user');
  $totalSudahMemilih = countWhere($pdo, 'users', 'role', 'status_vote', 'sudah');
  $totalBelumMemilih = countWhere($pdo, 'users', 'role', 'user', 'status_vote', 'belum');
  $totalKandidat = countRows($pdo, 'calon');
  $totalSuaraMasuk = countRows($pdo, 'vote_logs');

  $partisipasi = $totalPemilih > 0 ? round(($totalSudahMemilih / $totalPemilih) * 100, 2) : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- icon -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5 <?= $current_page == 'index.php' ? 'active' : ''; ?>" href="index.php"><img src="images/logo.svg" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini <?= $current_page == 'index.php' ? 'active' : ''; ?>" href="index.php"><img src="images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include 'partials/_sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome To Pemira - Osma</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php if (isAdmin()): ?>
              <div class="col-md-6 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4">Total Pemilih Terdaftar</p>
                        <p class="fs-30 mb-2"><?= $totalPemilih;?> </p>
                        <p>Data semua pemilih</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4">Total Sudah Memilih</p>
                        <p class="fs-30 mb-2"> <?= $totalSudahMemilih;?> </p>
                        <p>Jumlah yang sudah memberikan suara</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4">Belum Memilih</p>
                        <p class="fs-30 mb-2"><?= $totalBelumMemilih ;?></p>
                        <p>Masih menunggu memilih</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4">Jumlah Kandidat</p>
                        <p class="fs-30 mb-2"><?= $totalKandidat ;?> </p>
                        <p>Calon yang tersedia</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-light-warning bg-warning">
                      <div class="card-body">
                        <p class="mb-4">Total Suara Masuk</p>
                        <p class="fs-30 mb-2"> <?= $totalSuaraMasuk ;?> </p>
                        <p>Akumulasi semua suara</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-light-success bg-success">
                      <div class="card-body">
                        <p class="mb-4">Persentase Partisipasi</p>
                        <p class="fs-30 mb-2"><?= $partisipasi; ?> </p>
                        <p>Partisipasi pemilih</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <?php endif; ?>
            <!-- Bagian Kanan: Pie Chart -->
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pie chart</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include 'partials/_footer.php' ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- <script src="vendors/datatables.net/jquery.dataTables.js"></script> -->
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/chart.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- <script>
    const ctx = document.getElementById('pieChart').getContext('2d');
    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Today’s Bookings', 'Total Bookings', 'Meetings', 'Clients'],
        datasets: [{
          data: [4006, 61344, 34040, 47033],
          backgroundColor: [
            '#f39c12', // card-tale (kuning)
            '#34495e', // card-dark-blue
            '#3498db', // card-light-blue
            '#e74c3c'  // card-light-danger
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  </script> -->
</body>

</html>