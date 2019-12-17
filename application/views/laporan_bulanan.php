<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<style type="text/css">
  @media print {
    @page {
      size: landscape;
    }

    body {
      -webkit-transform: scale(0.85);
      /* Saf3.1+, Chrome */
      -moz-transform: scale(0.85);
      /* FF3.5+ */
      -ms-transform: scale(0.85);
      /* IE9 */
      -o-transform: scale(0.85);
      /* Opera 10.5+ */
      transform: scale(0.85);
      margin: -80px -100px 0;
      /* big hack to reposition the page top the top and left of the viewer control */
    }
  }
</style>

<!-- Heading -->
<div class="card mb-4 wow fadeIn d-flex">

  <!--Card content-->
  <div class="card-body p-0">
    <p class="h5 text-center mb-2 mt-4">
      Kelengkapan Dokumen Rekam Medis
    </p>
    <p class="text-center mb-3">
      Bulan <?php echo strftime('%B %Y'); ?>
    </p>

    <div class="table-responsive">
      <table class="table table-hover text-center text-nowrap mb-0">
        <thead class="stylish-color text-white">
          <tr>
            <th scope="col" rowspan="2" class="align-middle">No</th>
            <th scope="col" rowspan="2" class="align-middle">Tanggal</th>
            <th scope="col" colspan="4" class="py-2 align-middle">Bulan</th>
            <th scope="col" colspan="2" class="py-2 align-middle">Mutu</th>
            <th scope="col" rowspan="2" class="align-middle">Lainnya</th>
          </tr>
          <tr class="stylish-color-dark">
            <th scope="col" class="py-2 align-middle">Lengkap</th>
            <th scope="col" class="py-2 align-middle">Tidak Lengkap</th>
            <th scope="col" class="py-2 align-middle">Jumlah</th>
            <th scope="col" class="py-2 align-middle">Mutu</th>
            <th scope="col" class="py-2 align-middle">Lengkap</th>
            <th scope="col" class="py-2 align-middle">Tidak Lengkap</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($items as $item) { ?>
            <tr>
              <th scope="row">
                <?php echo $item->nomor; ?>
              </th>
              <td><?php echo $item->tanggal; ?></td>
              <td><?php echo $item->lengkap; ?></td>
              <td><?php echo $item->tidak_lengkap; ?></td>
              <td><?php echo $item->jumlah; ?></td>
              <td><?php echo number_format($item->mutu, 1, ',', ''); ?></td>
              <td><?php echo number_format($item->mutu, 1, ',', ''); ?></td>
              <td><?php echo number_format($item->mutu_tl, 1, ',', ''); ?></td>
              <td></td>
            </tr>
          <?php } ?>
          <tr class="green accent-4 text-white">
            <td></td>
            <td>Jumlah</td>
            <td><?php echo $jumlah['lengkap']; ?></td>
            <td><?php echo $jumlah['tidak_lengkap']; ?></td>
            <td><?php echo $jumlah['lengkap'] + $jumlah['tidak_lengkap']; ?></td>
            <td><?php echo number_format($jumlah['mutu'], 1, ',', ''); ?></td>
            <td><?php echo number_format($jumlah['mutu'], 1, ',', ''); ?></td>
            <td><?php echo number_format($jumlah['mutu_tl'], 1, ',', ''); ?></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>

<div class="d-flex justify-content-end">
  <button type="button" class="btn btn-primary m-0" id="print-btn"><i class="fa fa-print mr-3"></i>Print</button>
</div>

<script>
  $('#print-btn').on('click', function() {
    window.print();
  })
</script>