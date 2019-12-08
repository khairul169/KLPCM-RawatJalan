<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
  <link href="mdb/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="mdb/css/mdb.min.css" rel="stylesheet">

  <title>KLPCM Rawat Jalan Puskesmas Arjuno</title>

  <style>
    html,
    body {
      height: 100%;
    }

    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      height: 100%;
      max-width: 512px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2 class="mb-5 text-center">Puskesmas Arjuna</h1>

      <!--Card-->
      <div class="card">
        <div class="card-body mx-4">
          <!--Header-->
          <div class="mt-2 text-center">
            <h4 class="dark-grey-text">
              <i class="fas fa-lock deep-purple-text"></i> <strong>Login</strong>
              </h3>
          </div>
          <hr class="mb-2 mt-4">

          <!--Form-->
          <form action="">
            <div class="md-form">
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" id="username" class="form-control">
              <label for="username">Username</label>
            </div>

            <div class="md-form pb-3">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="password" class="form-control">
              <label for="password">Password</label>
            </div>

            <div class="row mb-3">
              <div class="form-check ml-3 col align-self-center">
                <input type="checkbox" class="form-check-input" id="remember" checked>
                <label class="form-check-label" for="remember">Remember me</label>
              </div>

              <div class="text-center col">
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>

  <!-- JQuery -->
  <script type="text/javascript" src="mdb/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="mdb/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="mdb/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="mdb/js/mdb.min.js"></script>
</body>

</html>