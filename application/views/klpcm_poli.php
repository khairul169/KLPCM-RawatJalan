<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php if ($message) { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $message; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="modal-remove-rm" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Rekam Medis?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data rekam medis?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <a href="<?php echo site_url('klpcm_poli/remove/' . $id) ?>" class="btn btn-primary">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Content -->
<div class="card mb-4 wow fadeIn">
  <!-- Card header -->
  <div class="card-header text-center">Formulir Pengisian KLPCM Rawat Jalan</div>

  <div class="card-body">

    <div class="px-3">
      <?php echo form_open('klpcm_poli'); ?>
      <div class="form-row mt-2">
        <!-- Tanggal -->
        <div class="col-sm-4 mb-3">
          <label>Tanggal</label>
          <input type="text" name="tanggal" id="date" class="col form-control" placeholder="DD/MM/YYYY" value="<?php echo $tanggal; ?>" style="position: relative;" />
        </div>

        <!-- PPA -->
        <div class="col-sm-4 mb-3">
          <label>PPA</label>
          <select class="browser-default custom-select" name="dpjp">
            <option value="" <?php if (!$dpjp) echo 'selected'; ?> disabled hidden>Pilih PPA..</option>
            <?php foreach ($list_dokter as $d) { ?>
              <option value="<?php echo $d->id; ?>" <?php if ($dpjp == $d->id) echo 'selected'; ?>><?php echo $d->nama_dokter; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="form-row">
        <!-- No. RM -->
        <div class="col-sm-4 mb-3">
          <label>No. Rekam Medis</label>
          <input type="text" id="rekam-medis" name="no_rm" class="form-control" placeholder="Masukkan nomor RM.." value="<?php echo $no_rm; ?>" />
        </div>

        <!-- Poli -->
        <div class="col-sm-4 mb-3">
          <label>Poli</label>
          <select class="browser-default custom-select" name="poli">
            <option value="" <?php if (!$poli) echo 'selected'; ?> disabled hidden>Pilih poli..</option>
            <?php foreach ($list_poli as $p) { ?>
              <option value="<?php echo $p->id; ?>" <?php if ($poli == $p->id) echo 'selected'; ?>><?php echo $p->nama; ?></option>
            <?php } ?>
          </select>
        </div>


        <!-- Jenis RM -->
        <div class="col-sm-4 mb-3">
          <label>Jenis RM</label>
          <select class="browser-default custom-select" name="jenis_rm">
            <option value="1" <?php if ($jenis_rm == 1) echo 'selected'; ?>>Baru</option>
            <option value="2" <?php if ($jenis_rm == 2) echo 'selected'; ?>>Lama</option>
          </select>
        </div>

      </div>

      <hr class="my-4" />

      <div class="row">

        <div class="col-md-8">
          <div class="form-row mt-3 align-items-center">
            <!-- Identitas -->
            <div class="col-md-6 mb-3">
              <div class="row">
                <label class="col-8" for="identitas">Identitas</label>
                <div class="col-4 custom-control custom-checkbox">
                  <input type="checkbox" name="identitas" class="indikator custom-control-input" id="identitas" <?php if ($identitas == 1) echo 'checked'; ?> />
                  <label class="custom-control-label" for="identitas">Ada</label>
                </div>
              </div>
            </div>

            <!-- Diagnosa -->
            <div class="col-md-6 mb-3">
              <div class="row">
                <label class="col-8" for="diagnosa">Diagnosa</label>
                <div class="col-4 custom-control custom-checkbox">
                  <input type="checkbox" name="diagnosa" class="indikator custom-control-input" id="diagnosa" <?php if ($diagnosa == 1) echo 'checked'; ?> />
                  <label class="custom-control-label" for="diagnosa">Ada</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-row align-items-center">
            <!-- Anamnesa -->
            <div class="col-md-6 mb-3">
              <div class="row">
                <label class="col-8" for="anamnesa">Anamnesa</label>
                <div class="col-4 custom-control custom-checkbox">
                  <input type="checkbox" name="anamnesa" class="indikator custom-control-input" id="anamnesa" <?php if ($anamnesa == 1) echo 'checked'; ?> />
                  <label class="custom-control-label" for="anamnesa">Ada</label>
                </div>
              </div>
            </div>

            <!-- Terapi/Tindakan -->
            <div class="col-md-6 mb-3">
              <div class="row">
                <label class="col-8" for="terapi">Terapi/Tindakan</label>
                <div class="col-4 custom-control custom-checkbox">
                  <input type="checkbox" name="terapi" class="indikator custom-control-input" id="terapi" <?php if ($terapi == 1) echo 'checked'; ?> />
                  <label class="custom-control-label" for="terapi">Ada</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-row align-items-center">
            <!-- Pemeriksaan Fisik -->
            <div class="col-md-6 mb-3">
              <div class="row">
                <label class="col-8" for="pemeriksaan">Pemeriksaan Fisik</label>
                <div class="col-4 custom-control custom-checkbox">
                  <input type="checkbox" name="pemeriksaan" class="indikator custom-control-input" id="pemeriksaan" <?php if ($pemeriksaan == 1) echo 'checked'; ?> />
                  <label class="custom-control-label" for="pemeriksaan">Ada</label>
                </div>
              </div>
            </div>

            <!-- Paraf Dokter -->
            <div class="col-md-6 mb-3">
              <div class="row">
                <label class="col-8" for="paraf">Paraf Dokter</label>
                <div class="col-4 custom-control custom-checkbox">
                  <input type="checkbox" name="paraf" class="indikator custom-control-input" id="paraf" <?php if ($paraf == 1) echo 'checked'; ?> />
                  <label class="custom-control-label" for="paraf">Ada</label>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-4">
          <!-- Total Indikator -->
          <div class="align-items-center">
            <label>Total Indikator</label>
            <input type="email" id="total-indikator" class="form-control" value="0" readonly>
          </div>

          <!-- Nilai Kelengkapan -->
          <div class="align-items-center mt-3">
            <label>Nilai Kelengkapan</label>
            <input type="email" id="kelengkapan" class="form-control" value="-" readonly>
          </div>
        </div>
      </div>

      <!-- End of Input -->

      <div class="row mt-4">
        <button type="submit" name="<?php echo $id ? 'update' : 'insert'; ?>" value="<?php echo $id ? $id : '1'; ?>" class="col btn btn-success">Simpan</button>
        <?php if ($id) { ?>
          <button type="button" class="col btn btn-danger" data-toggle="modal" data-target="#modal-remove-rm">Hapus</a>
          <?php } else { ?>
            <button type="reset" class="col btn btn-danger">Hapus</button>
          <?php } ?>
      </div>

      <?php echo form_close(); ?>

    </div>
  </div>
</div>

<script>
  let indikator = [];

  $(document).ready(function() {
    // Calculate indicator
    function calculateIndicator() {
      const totalIndikator = indikator.length;
      $('#total-indikator').val(totalIndikator);
      $('#kelengkapan').val(totalIndikator >= 6 ? 'Lengkap' : '-');
    }

    // Load indicator
    $('.indikator').each((index, elem) => {
      const obj = $(elem);
      if (obj.prop('checked')) {
        indikator.push(obj.prop('name'));
        calculateIndicator();
      }
    });

    // On indicator updated
    $('.indikator').change(function() {
      if (!this.name) {
        return;
      }

      const index = indikator.indexOf(this.name);

      if (this.checked) {
        index === -1 && indikator.push(this.name);
      } else if (index !== -1) {
        indikator.splice(index, 1);
      }

      calculateIndicator();
    });
  });
</script>