<div class="container mt-5">
   <div class="row">
      <div class="col-6">
         <h3>Daftar Temen Brengsek</h3>

         <?php foreach ($data['tmn'] as $tmn) : ?>
            <ul>
               <li><?= $tmn['nama']; ?></li>
               <li><?= $tmn['nim']; ?></li>
               <li><?= $tmn['jurusan']; ?></li>
            </ul>
         <?php endforeach; ?>
      </div>
   </div>
</div>