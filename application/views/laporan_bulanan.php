<?php
defined('BASEPATH') or exit('No direct script access allowed');
setlocale(LC_ALL, 'id');
?>
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
      <table class="table table-hover text-center text-nowrap">
        <thead class="stylish-color text-white">
          <tr>
            <th scope="col" rowspan="2" class="align-middle">No</th>
            <th scope="col" rowspan="2" class="align-middle">Tanggal</th>
            <th scope="col" colspan="4">Bulan</th>
            <th scope="col" colspan="2">Mutu</th>
            <th scope="col" rowspan="2" class="align-middle">Lainnya</th>
          </tr>
          <tr class="stylish-color-dark">
            <th scope="col">Lengkap</th>
            <th scope="col">Tidak Lengkap</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Mutu</th>
            <th scope="col">Lengkap</th>
            <th scope="col">Tidak Lengkap</th>
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
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>
</div>