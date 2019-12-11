<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4 wow fadeIn">
      <!-- Card header -->
      <div class="card-header text-center">Tabel Kelengkapan DRM</div>

      <!--Card content-->
      <div class="card-body p-0">

        <table class="table table-hover text-center m-0">
          <thead class="blue-grey text-white">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Dokter</th>
              <th scope="col">Jumlah DRM Tidak Lengkap</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kelengkapan_drm as $k) { ?>
              <tr>
                <th><?php echo $k->nomor; ?></th>
                <td>dr. <?php echo $k->nama_dokter; ?></td>
                <td><?php echo $k->drm; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>

    </div>
  </div>

  <div class="col-md-6">
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body">

        <canvas id="myChart" height="250"></canvas>

      </div>

    </div>
  </div>
</div>

<?php
$chartLabels = [];
$chartValues = [];

foreach ($kelengkapan_drm as $k) {
  $chartLabels[] = 'dr. ' . $k->nama_dokter;
  $chartValues[] = $k->drm;
}
?>

<script type="text/javascript">
  // Line
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["<?php echo implode('", "', $chartLabels) ?>"],
      datasets: [{
        label: '# DRM Tidak Lengkap',
        data: [<?php echo implode(', ', $chartValues) ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>