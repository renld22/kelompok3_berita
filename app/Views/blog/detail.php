<!-- File: app/Views/blog/detail.php -->
<?= $this->extend('portal') ?>

<?= $this->section('content') ?>
<style>
    /* Custom CSS styles */
    .card {
        border: none; /* Menghilangkan border pada card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan card */
        transition: transform 0.3s ease-in-out; /* Animasi saat hover */
    }


    .card-img {
        display: block;
margin-left: auto;
margin-right: auto;
        border-top-right-radius: 8px; /* Sudut melengkung pada gambar */
        border-bottom-right-radius: 8px;
        object-fit: cover; /* Memastikan gambar terisi penuh di dalam area */
        height: 300px; /* Tinggi gambar otomatis menyesuaikan lebar */
        width: auto; /* Lebar gambar maksimum */
    }

    .card-body {
        padding: 2rem;
    }

    .title-side {
        margin-bottom: 15px;
        color: #333;
    }
    
    .title-side a {
        color: inherit;
            /* Mengambil warna teks dari induknya */
            text-decoration: none;
            /* Menghapus garis bawah */
    }

    .title-side:hover {
        color: blue;
    }

    .card-text {
        font-size: 1.2rem;
        line-height: 1.6;
        color: #666;
    }

    .text-muted {
        font-size: 0.9rem;
        color: #999;
    }

    /* Custom padding for column containing image */
    .image-column {
        padding: 0 1.5rem; /* Adjust padding as needed */
    }

    .card-judul {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 1rem;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title card-judul"><?= $artikel['judul'] ?></h2>
                            <p class="card-text"><small class="text-muted">Penulis: <?= $artikel['name'] ?></small></p>
                            <img src="<?= base_url('/gambar/') . $artikel['gambar'] ?>" class="card-img img-fluid rounded" alt="<?= $artikel['judul'] ?>">
                            <p class="card-text"><?= nl2br($artikel['konten']) ?></p>
                            <a href="<?= base_url('berita') ?>" class="btn btn-primary">Kembali</a>
                        </div>
                    
            </div>
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
                                        <h5 class="card-title title-side"><a href="<?= url_to('Berita::detail', $artikel['id_artikel']); ?>"><?= $artikel['judul'] ?></a></h5>
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
<?= $this->endSection() ?>

<!-- Bootstrap 5 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
