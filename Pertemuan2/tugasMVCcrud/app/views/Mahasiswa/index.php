<div class="container mt-4">

<div class="row">
  <div class="col-md-6">
    <?php Flasher::flash(); ?>
</div>
  <div class="row">
    <div class="col-md-6">
      <h1>Daftar Mahasiswa</h1>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal">
        tambah mahasiswa
      </button>


      <!-- Modal -->
      <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="formModalLabel">Tambah Mahasiswa</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>/index.php?url=mahasiswa/tambah" method="post">
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
                </div>
                <div class="mb-3">
                  <label for="nrp" class="form-label">NRP</label>
                  <input type="text" class="form-control" id="nrp" placeholder="NRP" name="nrp">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                  <label for="jurusan" class="form-label">Jurusan</label>
                  <input type="text" class="form-control" id="jurusan" placeholder="Jurusan" name="jurusan">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <ul class="list-group mt-2">
        <?php foreach ($data['mhs'] as $mhs) : ?>
          <li class="list-group-item">
            <?= htmlspecialchars($mhs['nama'], ENT_QUOTES, 'UTF-8') ?>
            <div class="btn-group float-end" role="group" aria-label="Aksi Mahasiswa">
              <a href="<?= BASEURL; ?>/index.php?url=mahasiswa/detail/<?= $mhs['id'] ?>" class="badge text-bg-primary me-1">detail</a>
              <a href="<?= BASEURL; ?>/index.php?url=mahasiswa/ubah/<?= $mhs['id'] ?>" class="badge text-bg-warning me-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id'] ?>">ubah</a>
              <a href="<?= BASEURL; ?>/index.php?url=mahasiswa/hapus/<?= $mhs['id'] ?>" class="badge text-bg-danger" onclick="return confirm('yakin?')">hapus</a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>

    </div>
  </div>
</div>