<?= $this->extend('portal') ?>

<?= $this->section('content') ?>

<style>
    .today {
        background-color: #ffcc00 !important;
    }

    .card-title a {
        color: inherit;
        /* Mengambil warna teks dari induknya */
        text-decoration: none;
        /* Menghapus garis bawah */
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* text-align: center; */
    }

    .card-title {
        margin-bottom: 15px;
        color: #333;
    }

    .github-link {
        text-decoration: none;
        color: #0366d6;
        /* Warna teks sesuaikan dengan warna resmi GitHub */
    }

    .github-icon {
        font-size: 24px;
        margin-right: 5px;
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
                        <div class="card mb-3 mt-4" style="max-width: 800px;">
                            <div class="row g-2">
                                <div class="col-md-4 mr-2">
                                    <img src="<?= base_url("/gambar/") . $artikel['gambar'] ?>" class="img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="<?= url_to('Berita::detail', $artikel['id_artikel']); ?>"><?= $artikel['judul'] ?></a></h5>
                                        <p class="card-text"><?= $artikel['ringkasan'] ?></p>
                                        <p class="card-text"><small class="text-muted"><?= $artikel['name'] ?></small></p>
                                        <p class="card-text"><small class="text-muted"><?= $artikel['tanggal'] ?></small></p>
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
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'title',
                center: '',
                right: 'today,prev,next'
            },
            dayCellClassNames: function(arg) {
                var today = new Date();
                if (arg.date.getFullYear() === today.getFullYear() && arg.date.getMonth() === today.getMonth() && arg.date.getDate() === today.getDate()) {
                    return ['today'];
                }
                return [];
            },
            // events: [
            //     // Add calendar events here
            //     {
            //         title: 'Event 1',
            //         start: '2024-06-10'
            //     },
            //     {
            //         title: 'Event 2',
            //         start: '2024-06-15'
            //     }
            // ]
        });
        calendar.render();

        // Highlight today's date
        var today = new Date();
        var dateString = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
        var todayCell = calendarEl.querySelector('.fc-day[data-date="' + dateString + '"]');
        if (todayCell) {
            todayCell.classList.add('today');
        }
    });
</script>

<?= $this->endSection() ?>