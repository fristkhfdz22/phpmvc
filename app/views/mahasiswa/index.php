
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
        <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahdata" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Tambah Data 
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
     <form action="<?= BASEURL;?>/mahasiswa/cari" method="post">
        
<div class="input-group ">
  <input type="text" class="form-control" placeholder="Cari..." name="keyword" id="keyword">
  <button class="btn btn-primary" type="submit" id="tombolCari" autocomplete="off">Cari</button>
</div>
     </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            
            <h3>Daftar </h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= htmlspecialchars($mhs['nama']); ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= htmlspecialchars($mhs['id']); ?>" class="badge bg-primary float-end ">Detail</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= htmlspecialchars($mhs['id']); ?>" class="badge bg-warning float-end tampilModalUbah"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?=$mhs ['id']; ?>">ubah</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= htmlspecialchars($mhs['id']); ?>" class="badge bg-danger float-end " onclick="return confirm('yakin?');">Hapus</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="judulmodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulmodalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formMahasiswa" action="<?= BASEURL;?>/mahasiswa/tambah" method="post">
                    <!-- Hidden input untuk ID -->
                    <input type="hidden" name="id" id="id">
                    
                    <!-- Form Fields -->
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                    
                    <label class="form-label">Nis</label>
                    <input type="text" inputmode="numeric" class="form-control" id="nis" name="nis">
                    
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="PPLG">PPLG</option>
                            <option value="AKL">AKL</option>
                            <option value="TKJT">TKJT</option>
                            <option value="BP">BP</option>
                            <option value="PM">PM</option>
                            <option value="MPLB">MPLB</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
