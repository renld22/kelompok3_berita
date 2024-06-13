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

    .card:hover {
        transform: scale(1.05); /* Memperbesar card saat hover */
    }

    .card-img {
        border-top-right-radius: 8px; /* Sudut melengkung pada gambar */
        border-bottom-right-radius: 8px;
        object-fit: cover; /* Memastikan gambar terisi penuh di dalam area */
        height: auto; /* Tinggi gambar otomatis menyesuaikan lebar */
        max-width: 100%; /* Lebar gambar maksimum */
        max-height: 300px; /* Tinggi gambar maksimum */
    }

    .card-body {
        padding: 2rem;
    }

    .card-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 1rem;
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
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title"><?= $artikel['judul'] ?></h2>
                            <p class="card-text"><?= nl2br($artikel['konten']) ?></p>
                            <p class="card-text"><small class="text-muted">Penulis: <?= $artikel['name'] ?></small></p>
                            <a href="<?= base_url('berita') ?>" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center image-column">
                        <img src="<?= base_url('/gambar/') . $artikel['gambar'] ?>" class="card-img img-fluid rounded" alt="<?= $artikel['judul'] ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<!-- Bootstrap 5 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
