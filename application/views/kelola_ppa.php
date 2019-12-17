<?php
defined('BASEPATH') or exit('No direct script access allowed');
setlocale(LC_ALL, 'id');
?>

<!-- Modal hapus -->
<div class="modal fade" id="modal-remove-ppa" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus PPA?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus PPA ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-primary" id="hapusPpa">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="modal-add-ppa" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <?php echo form_open('kelola_ppa/insert'); ?>
      <div class="modal-header">
        <h5 class="modal-title">Tambah PPA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <label>Nama PPA</label>
        <input type="text" name="nama_dokter" class="col form-control" placeholder="Masukkan nama PPA.." value="" style="position: relative;" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-success" id="hapusPpa">Tambah</a>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Heading -->
<div class="card mb-4 wow fadeIn d-flex">

  <!--Card content-->
  <div class="card-body p-0">

    <div class="d-flex p-3 align-items-stretch">
      <p class="col font-weight-light text-center my-2">
        Kelola Profesional Pemberi Asuhan (PPA)
      </p>
      <button type="button" class="btn btn-primary btn-sm m-0" data-toggle="modal" data-target="#modal-add-ppa">Tambah PPA</button>
    </div>

    <table class="table table-hover text-center text-nowrap mb-0" style="border-bottom: 1px solid #ddd;">
      <thead class="stylish-color text-white">
        <tr>
          <th scope="col" style="width: 64px;">No</th>
          <th scope="col" class="text-left">Nama PPA</th>
          <th scope="col" style="width: 128px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!sizeof($items)) { ?>
          <tr>
            <td colspan="3">Tidak ada data.</td>
          </tr>
        <?php } else foreach ($items as $item) { ?>
          <tr>
            <th scope="row" style="width: 64px;">
              <?php echo $item->nomor; ?>
            </th>
            <td class="text-left"><?php echo $item->nama_dokter; ?></td>
            <td style="width: 128px;" class="p-0 align-middle">
              <div class="button-group d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-danger btn-sm btn-hapus" data-idppa="<?php echo $item->id; ?>">Hapus</button>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  let removePpaUrl = "<?php echo site_url('kelola_ppa/remove/') ?>";
  let currentPpaId = 0;

  $('.btn-hapus').on("click", function() {
    currentPpaId = $(this).data('idppa');
    $("#modal-remove-ppa").modal();
  });

  $('#hapusPpa').on("click", function() {
    document.location = removePpaUrl + currentPpaId;
  });
</script>