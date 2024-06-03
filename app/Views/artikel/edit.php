 <?= $this->extend('layout') ?>

 <?= $this->section('content') ?>
 <div class="col-12 grid-margin stretch-card">
     <div class="card">
         <div class="card-body">
             <h4 class="card-title">Tambah Data artikel</h4>
             <p class="card-description">
                 <?php if (!empty(session()->getFlashdata('success'))) : ?>

             <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>
                     <?php echo session()->getFlashdata('success'); ?>
                 </strong>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

         <?php endif ?>
         <?php if (!empty(session()->getFlashdata('message'))) : ?>

             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong>
                     <ul class="mb-0">
                         <?php foreach (session()->getFlashdata('message') as $data) : ?>
                             <li>
                                 <?= $data ?>
                             </li>
                         <?php endforeach ?>
                     </ul>

                 </strong>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

         <?php endif ?>
         </p>
         <form class="forms-sample" action="<?= url_to('Artikel::update', $artikel['id_artikel']) ?>" method="post" enctype="multipart/form-data">
             <div class="form-group">
                 <label for="exampleInputJudul">Judul</label>
                 <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul" value="<?= $artikel['judul'] ?>">
             </div>
             <div class=" form-group">
                 <label for="exampleInputKonten">Konten</label>
                 <input type="text" name="konten" class="form-control" id="konten" placeholder="konten">
             </div>
             <div class=" form-group">
                 <label for="exampleInputRingkasan">Ringkasan</label>
                 <input type="text" name="ringkasan" class="form-control" id="ringkasan" placeholder="Ringkasan" value="<?= $artikel['ringkasan'] ?>">
             </div>
             <div class="form-group">
                 <label>File upload</label>
                 <input type="file" name="gambar" class="file-upload-default" style="display: none;">
                 <div class="input-group col-xs-12">
                     <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                     <span class="input-group-append">
                         <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                     </span>
                 </div>
             </div>
             <div class=" form-group">
                 <label for="exampleInputTanggal">Tanggal</label>
                 <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="tanggal">
             </div>
             <button type="submit" class="btn btn-primary mr-2">Submit</button>
             <button class="btn btn-light">Cancel</button>
         </form>
         </div>
     </div>
 </div>
 <script>
     document.querySelector('.file-upload-browse').addEventListener('click', function() {
         document.querySelector('.file-upload-default').click();
     });

     document.querySelector('.file-upload-default').addEventListener('change', function() {
         var fileName = this.files[0].name;
         document.querySelector('.file-upload-info').value = fileName;
     });
 </script>
 <?= $this->endSection() ?>