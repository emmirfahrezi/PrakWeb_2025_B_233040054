<div class="container mt-6">
  <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
    <div class="card-header">detail</div>
    <div class="card-body">
      <h5 class="card-title"><?= $data['mhs']['nama'] ?></h5>
      <p class="card-text"><?= $data['mhs']['email'] ?></p>
      <p class="card-text"><?= $data['mhs']['jurusan'] ?></p>
      <p class="card-text"><?= $data['mhs']['nrp'] ?></p>

  <a href="<?= BASEURL; ?>/index.php?url=mahasiswa" class="badge text-bg-primary">kembali</a>

    </div>
  </div>
</div>