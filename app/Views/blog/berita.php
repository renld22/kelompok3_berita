<?= $this->extend('portal') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php foreach ($data as $index => $artikel) : ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
                    <?php endforeach ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($data as $index => $artikel) : ?>
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
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

            <div class="row p-2">
                <?php foreach ($data as $index => $artikel) : ?>
                    <div class="card mb-3 mt-4" style="max-width: 800px;">
                        <div class="row g-2">
                            <div class="col-md-4 mr-2">
                                <img src="<?= base_url("/gambar/") . $artikel['gambar'] ?>" class="img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="<?= url_to('Artikel::index') ?>"><?= $artikel['judul'] ?></a></h5>
                                    <p class="card-text"><?= $artikel['ringkasan'] ?></p>
                                    <p class="card-text"><small class="text-muted"><?= $artikel['name'] ?></small></p>
                                    <p class="card-text"><small class="text-muted"><i class="fa-regular fa-eye"></i></small></p>
                                </div>
                                <a href="<?= base_url('berita/detail/' . $artikel['id_artikel']) ?>" class="btn btn-success">Detail</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4">
                        <div id="calendar"></div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- <div class="col-md-4 mt-4">
                <div id="calendar"></div>
            </div> -->
            <!-- <div class="row">
                <div class="col-md-4 mt-2 grid-margin stretch-card">
                    <div class="card h-100">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            dayCellClassNames: function(arg) {
                var today = new Date();
                if (arg.date.getFullYear() === today.getFullYear() && arg.date.getMonth() === today.getMonth() && arg.date.getDate() === today.getDate()) {
                    return ['today'];
                }
                return [];
            },
            // events: [
            //     // Tambahkan event kalender di sini
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
        // Menandai tanggal hari ini
        var today = new Date();
        var dateString = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
        var todayCell = calendarEl.querySelector('.fc-day[data-date="' + dateString + '"]');
        if (todayCell) {
            todayCell.classList.add('today');
        }
    });
</script>

<?= $this->endSection() ?>