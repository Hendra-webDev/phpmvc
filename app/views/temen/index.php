<div class="container mt-5">
   <div class="row">
      <div class="col-lg-6">
         <?php Flasher::flash(); ?>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-6">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#forModal">
            Tambah Temen Brengs*k
         </button>
         <h3>Daftar Temen Brengsek</h3>

         <?php foreach ($data['tmn'] as $tmn) : ?>
            <ul class="list-group">
               <li class="list-group-item "><?= $tmn['nama']; ?>
                  <a href="<?= BASEURL; ?>/temen/hapus/<?= $tmn['id']; ?>" class="badge badge-danger float-right ml-2" onclick="return confirm('yakin mau dihapus ??');">hapus</a>
                  <a href="<?= BASEURL; ?>/temen/detail/<?= $tmn['id']; ?>" class="badge badge-info float-right ml-2">detail</a>
               </li>
            </ul>
         <?php endforeach; ?>
      </div>
   </div>
</div>



<div class="modal fade" id="forModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="judulModal">Input Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="<?= BASEURL; ?>/temen/tambah" method="post">
               <div class="form-group">
                  <label for="nama">Nama </label>
                  <input type="text" class="form-control" id="nama" name="nama">
               </div>
               <div class="form-group">
                  <label for="nim">Nim</label>
                  <input type="text" class="form-control" id="nim" name="nim">
               </div>
               <div class="form-group">
                  <label for="jurusn">Jurusan</label>
                  <select class="form-control" id="jurusan" name="jurusan">
                     <option value="Sistem Komputer">Sistem Komputer</option>
                     <option value="Sistem Informasi">Sistem Informasi</option>
                  </select>
               </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Save </button>
            </form>
         </div>
      </div>
   </div>
</div>