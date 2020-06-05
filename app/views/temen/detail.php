<div class="container">
   <div class="card" style="width: 18rem;">
      <div class="card-body">
         <h5 class="card-title"><?= $data['tmn']['nama']; ?></h5>
         <h6 class="card-subtitle mb-2 text-muted"><?= $data['tmn']['nim']; ?></h6>
         <p class="card-text"><?= $data['tmn']['jurusan']; ?></p>
         <a href="<?= BASEURL; ?>/temen" class="card-link">Kembali</a>
      </div>
   </div>
</div>