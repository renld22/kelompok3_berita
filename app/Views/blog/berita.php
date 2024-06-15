<?= $this->extend('portal') ?>

<?= $this->section('content') ?>

<style>
    .card-title a {
            color: inherit;
            /* Mengambil warna teks dari induknya */
            text-decoration: none;
            /* Menghapus garis bawah */
    }
    
    .card-title {
        margin-bottom: 15px;
        color: #333;
    }

    .card-berita:hover {
        transform: scale(1.05);
        /* Memperbesar card saat hover */
    }

    .card-title:hover {
        color: blue;
    }
    .carousel {
        background: #f0f0f0;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php foreach ($latest as $index => $artikel) : ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
                    <?php endforeach ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($latest as $index => $artikel) : ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <img src="<?= base_url("/gambar/") . $artikel['gambar'] ?>" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-dark shadow d-inline"><?= $artikel['judul'] ?></h5>
                                <br>
                                <p class="text-dark shadow d-inline"><?= $artikel['name'] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="row p-2">
                <div class="col-lg-8">
                    <?php foreach ($data as $index => $artikel) : ?>
                        <div class="card card-berita mb-3 mt-4">
                            <div class="row g-2">
                                <div class="col-md-4 mr-2">
                                <a class="artikel-judul" href="<?= url_to('Berita::detail', $artikel['id_artikel']); ?>"><img src="<?= base_url("/gambar/") . $artikel['gambar'] ?>" class="img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="..."></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title card-judul"><a class="artikel-judul" href="<?= url_to('Berita::detail', $artikel['id_artikel']); ?>"><?= $artikel['judul'] ?></a></h5>
                                        <p class="card-text"><?= $artikel['ringkasan'] ?></p>
                                        <p class="card-text"><small class="text-muted"><?= $artikel['name'] ?> | </small><small class="text-muted"><?= $artikel['tanggal'] ?></p>
                                        <p class="card-text"></small></p>
                                        <p class="card-text"><small class="text-muted"><i class="fa-regular fa-eye"></i> <?= $artikel['view'] ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <?= $pager->links('berita', 'pagers') ?>
                </div>
                <div class="col-lg-4 mt-4">
                    <div id="calendar"></div>
                    <div class="card align-items-center mt-4">
                        <h4 class="card-title">Social Media</h4>
                        <a href="https://github.com/renld22/kelompok3_berita.git" class="github-link">
                            <i class="fab fa-github github-icon"></i> GitHub Repository
                        </a>
                    </div>
                    <div class="card mt-4">
                        <h4 class="card-title text-center">Sering dilihat</h4>

                        <div class="card-body">
                            <?php foreach ($frequent as $artikel) : ?>
                                <div class=" d-flex flex-row justify-content-start align-items-center w-100">
                                    <img src="<?= base_url("/gambar/") . $artikel['gambar'] ?>" class="img-fluid flex-1 me-2" style="width: 100px; max-height:100px; object-fit: cover;" alt="...">
                                    <div class="d-flex flex-column">
                                        <h5 class="card-title"><a href="<?= url_to('Berita::detail', $artikel['id_artikel']); ?>"><?= $artikel['judul'] ?></a></h5>
                                        <p class="card-text"><small class="text-muted"><?= $artikel['tanggal'] ?></small></p>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<?= $this->endSection() ?>