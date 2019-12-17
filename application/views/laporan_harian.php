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
      <?php echo strftime('%A, %e %B %Y'); ?>
    </p>

    <div class="table-responsive">
      <table class="table table-hover text-center text-nowrap mb-0">
        <thead class="stylish-color text-white">
          <tr>
            <th scope="col">No</th>
            <th scope="col">No. RM</th>
            <th scope="col">PPA</th>
            <th scope="col">Poli</th>
            <th scope="col">Jenis RM</th>
            <th scope="col">Total Indikator</th>
            <th scope="col">Nilai Kelengkapan</th>
            <th scope="col">Identitas</th>
            <th scope="col">Anamnesa</th>
            <th scope="col">Pemeriksaan</th>
            <th scope="col">Diagnosa</th>
            <th scope="col">Terapi</th>
            <th scope="col">Paraf</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!sizeof($items)) { ?>
            <tr>
              <td colspan="14">Tidak ada data.</td>
            </tr>
          <?php } else foreach ($items as $item) { ?>
            <tr style="cursor: pointer;" data-href="<?php echo site_url('klpcm_poli/index/' . $item->id); ?>">
              <th scope="row">
                <?php echo $item->nomor; ?>
              </th>
              <td><?php echo $item->no_rm; ?></td>
              <td><?php echo $item->nama_dokter; ?></td>
              <td><?php echo $item->nama_poli; ?></td>
              <td><?php echo $item->jenis_rm; ?></td>
              <td><?php echo $item->indikator; ?></td>
              <td>
                <span class="text-white <?php echo $item->kelengkapan ? 'success-color' : 'danger-color'; ?>" style="padding: 5px 6px; border-radius: 3px;">
                  <strong><?php echo $item->kelengkapan ? 'Lengkap' : 'Tidak Lengkap'; ?></strong>
                </span>
              </td>
              <td><?php echo $item->identitas; ?></td>
              <td><?php echo $item->anamnesa; ?></td>
              <td><?php echo $item->pemeriksaan; ?></td>
              <td><?php echo $item->diagnosa; ?></td>
              <td><?php echo $item->terapi; ?></td>
              <td><?php echo $item->paraf; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

<div class="d-flex justify-content-end">
  <button type="button" class="btn btn-primary m-0" id="print-btn"><i class="fa fa-print mr-3"></i>Print</button>
</div>

<script>
  $('tr[data-href]').on("click", function() {
    document.location = $(this).data('href');
  });

  $('#print-btn').on('click', function() {
    window.print();
  })
</script>