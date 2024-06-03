<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data User</h4>
            <p class="card-description">
                <?php if (!empty(session()->getFlashdata('message'))) : ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>
                    <?php echo session()->getFlashdata('message'); ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif ?>
        </p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $user) : ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['hak_akses'] ?></td>
                            <td class="text-center">
                                <a href="<?= url_to('User::edit', $user['id_user']); ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                <a href="<?= url_to('User::hapus', $user['id_user']); ?>" class=" btn btn-danger fa fa-trash-o"> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>