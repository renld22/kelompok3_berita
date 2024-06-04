<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Artikel</h4>
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
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Ringkasan</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>Author</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $artikel) : ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $artikel['judul'] ?></td>
                            <td><?php echo strip_tags($artikel['konten']) ?></td>
                            <td><?php echo $artikel['ringkasan'] ?></td>
                            <td><img src="<?= base_url('gambar/').$artikel['gambar']?>" alt=""></td>
                            <td><?php echo $artikel['tanggal'] ?></td>
                            <td><?php echo $artikel['name'] ?></td>
                            <td class="text-center">
                                <a href="<?= url_to('Artikel::edit', $artikel['id_artikel']); ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                <a href="<?= url_to('Artikel::hapus', $artikel['id_artikel']); ?>" class=" btn btn-danger fa fa-trash-o"> Hapus</a>
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