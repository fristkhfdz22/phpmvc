
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <?= $data['mhs']['nama']; ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="container mt-5">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $data['mhs']['nama']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['nis']; ?></h6>
    <p class="card-text"><?= $data['mhs']['email']; ?></p>
    <p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
    <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
  </div>
</div>
</div>
      </div>
    </div>
  </div>