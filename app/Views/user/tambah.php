 <?= $this->extend('layout') ?>

 <?= $this->section('content') ?>
 <div class="col-12 grid-margin stretch-card">
     <div class="card">
         <div class="card-body">
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
             <h4 class="card-title">Basic form elements</h4>
             <p class="card-description">
                 Basic form elements
             </p>
             <form class="forms-sample">
                 <div class="form-group">
                     <label for="exampleInputName1">Username</label>
                     <input type="text" class="form-control" id="username" placeholder="Name">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputPassword4">Password</label>
                     <input type="password" class="form-control" id="password" placeholder="Password">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail3">Email address</label>
                     <input type="email" class="form-control" id="email" placeholder="Email">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail3">Nama Lengkap</label>
                     <input type="name" class="form-control" id="name" placeholder="Nama Lengkap">
                 </div>
                 <div class="form-group">
                     <label>File upload</label>
                     <input type="file" name="img[]" class="file-upload-default">
                     <div class="input-group col-xs-12">
                         <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                         <span class="input-group-append">
                             <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                         </span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="exampleInputCity1">City</label>
                     <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                 </div>
                 <div class="form-group">
                     <label for="exampleTextarea1">Textarea</label>
                     <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                 </div>
                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                 <button class="btn btn-light">Cancel</button>
             </form>
         </div>
     </div>
 </div>
 <?= $this->endSection() ?>