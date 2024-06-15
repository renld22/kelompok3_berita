 <?= $this->extend('layout') ?>

 <?= $this->section('content') ?>
 <div class="col-12 grid-margin stretch-card">
     <div class="card">
         <div class="card-body">
             <h4 class="card-title">Tambah Data User</h4>
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
         <form class="forms-sample" action="<?= url_to('User::save') ?>" method="post">
             <div class="form-group">
                 <label for="exampleInputName1">Username</label>
                 <input type="text" name="username" class="form-control" id="username" placeholder="Name">
             </div>
             <div class="form-group">
                 <label for="exampleInputPassword4">Password</label>
                 <input type="password" name="password" class="form-control" id="password" placeholder="Password">
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail3">Nama Lengkap</label>
                 <input type="name" name="name" class="form-control" id="name" placeholder="Nama Lengkap">
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail3">Email address</label>
                 <input type="email" name="email" class="form-control" id="email" placeholder="Email">
             </div>
             <div class="form-group">
                 <label for="exampleSelectGender">Posisi</label>
                 <select class="form-control" id="posisi" name="hak_akses">
                     <option value="">Pilih</option>
                     <option value="1">Admin</option>
                     <option value="2">Author</option>
                 </select>
             </div>
             <button type="submit" class="btn btn-primary mr-2">Submit</button>
             <a href="<?= url_to('User::index') ?>" class="btn btn-light">Cancel</a>
             
         </form>
         </div>
     </div>
 </div>
 <?= $this->endSection() ?>