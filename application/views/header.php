<?php
defined('BASEPATH') or exit('No direct script access allowed');

$title = "KLPCM Puskesmas Arjuno";

$navs = [
  ['Kelola PPA', 'kelola_ppa', 'fa-stethoscope'],
  ['KLPCM Poli', 'klpcm_poli', 'fa-file-medical'],
  ['Laporan Harian', 'laporan_harian', 'fa-calendar-day'],
  ['Laporan Bulanan', 'laporan_bulanan', 'fa-chart-line'],
  ['Laporan PPA', 'laporan_dpjp', 'fa-chart-pie'],
  ['Exit', 'logout', 'fa-lock']
];

foreach ($navs as $i => $nav) {
  $isCurrent = $nav[1] == $this->router->class;
  $navs[$i][1] = site_url($nav[1]);
  $navs[$i][3] = $isCurrent;

  if ($isCurrent) {
    $title = $nav[0] . " - " . $title;
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('mdb/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url('mdb/css/mdb.min.css'); ?>" rel="stylesheet">

  <title><?php echo $title; ?></title>

  <style>
    .sidebar-fixed {
      height: 100vh;
      width: 270px;
      -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
      z-index: 1040;
      background-color: #fff;
      padding: 0 1.5rem 1.5rem
    }

    .sidebar-fixed .list-group .active {
      -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
      -webkit-border-radius: 5px;
      border-radius: 5px
    }

    .sidebar-fixed .logo-wrapper {
      padding: 2.5rem
    }

    .sidebar-fixed .logo-wrapper img {
      max-height: 50px
    }

    @media (min-width:1200px) {

      .navbar,
      .page-footer,
      main {
        padding-left: 270px
      }
    }

    @media (max-width:1199.98px) {
      .sidebar-fixed {
        display: none
      }
    }

    body {
      background-color: #eee;
    }

    .map-container {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
    }

    .map-container iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
    }

    .nav-item.active .nav-link {
      border-radius: 3px;
    }
  </style>

  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo base_url('mdb/js/jquery.min.js'); ?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url('mdb/js/popper.min.js'); ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('mdb/js/bootstrap.min.js'); ?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('mdb/js/mdb.min.js'); ?>"></script>
</head>

<body>
  <div class="container-for-admin">
    <!--Main Navigation-->
    <header>
      <!-- Navbar -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

          <!-- Brand -->
          <a class="navbar-brand waves-effect ml-lg-3" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
            <strong class="blue-text">Puskesmas Arjuno</strong>
          </a>

          <!-- Collapse -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-lg-block d-xl-none ml-auto">
              <ul class="navbar-nav">
                <?php foreach ($navs as $nav) { ?>
                  <li class="nav-item <?php echo $nav[3] ? 'active' : ''; ?>">
                    <a class="nav-link waves-effect" href="<?php echo $nav[1]; ?>"><?php echo $nav[0]; ?></a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>

        </div>
      </nav>
      <!-- Navbar -->

      <!-- Sidebar -->
      <div class="sidebar-fixed position-fixed">
        <a class="waves-effect mt-4 mb-3 d-flex justify-content-center">
          <h5>Menu</h5>
        </a>

        <div class="list-group list-group-flush">
          <?php foreach ($navs as $nav) { ?>
            <a href="<?php echo $nav[1]; ?>" class="list-group-item <?php echo $nav[3] ? 'active' : 'list-group-item-action' ?> waves-effect">
              <i class="fa <?php echo $nav[2]; ?> mr-3"></i><?php echo $nav[0]; ?></a>
          <?php } ?>
        </div>

      </div>
      <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-3">
      <div class="container-fluid mt-4 mt-md-5">