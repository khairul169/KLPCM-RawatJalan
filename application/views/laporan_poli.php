<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Heading -->
<div class="card mb-4 wow fadeIn">

  <!--Card content-->
  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-striped text-center text-nowrap">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">No. RM</th>
            <th scope="col">DPJP</th>
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
          <?php foreach ($items as $item) { ?>
            <tr>
              <th scope="row">
                <a href="<?php echo site_url('klpcm_poli/index/' . $item->id); ?>">
                  <?php echo $item->id; ?>
                </a>
              </th>
              <td><?php echo $item->tanggal; ?></td>
              <td><?php echo $item->no_rm; ?></td>
              <td><?php echo $item->dpjp; ?></td>
              <td><?php echo $item->poli; ?></td>
              <td><?php echo $item->jenis_rm; ?></td>
              <td class="info-color text-white">
                <strong><?php echo $item->indikator; ?></strong>
              </td>
              <td class="<?php echo $item->kelengkapan ? 'success-color' : 'danger-color'; ?>">
                <a href="<?php echo site_url('klpcm_poli/index/' . $item->id); ?>" class="text-white">
                  <strong><?php echo $item->kelengkapan ? 'Lengkap' : 'Tidak Lengkap'; ?></strong>
                </a>
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