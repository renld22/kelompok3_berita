<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/feather/feather.css">
    <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/images/4.png" />
    <!-- summernote -->
    <link rel="stylesheet" href="/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/summernote/summernote-image-list.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5 w-100" href="<?= url_to('Home::index') ?>"><img src="/images/2.png" style="width: 300px; object-fit: cover;" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?= url_to('Home::index') ?>"><img src="/images/1.png" style="width: 300px; object-fit: cover; alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile">
                        <?= session()->get('name'); ?>
                    </li>
                    <li class=" nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="/images/faces/face.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <?php
                            if (session()->get('hak_akses') == 2) :
                            ?>
                                <a href="<?= url_to('Profil::edit') ?>" class="dropdown-item">
                                    <i class="ti-user text-primary"></i>
                                    Profil
                                </a>
                                <?php endif; ?>


                            <a class="dropdown-item" href="<?= url_to('Login::logout') ?>">
                                <i class=" ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('Home::index') ?>">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <?php
                    if (session()->get('hak_akses') == 1) :
                    ?>
                        
                        <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('User::index') ?>">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">User</span>
                        </a>
                    </li>
                        <?php endif; ?>

                     <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('Artikel::index') ?>">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Artikel</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome <?= session()->get('name'); ?></h3>
                                    <h6 class="font-weight-normal mb-0 text-primary">
                                        <?php if (session()->get('hak_akses') == 1) :  ?>
                                            Admin
                                        <?php elseif (session()->get('hak_akses') == 2) : ?>
                                            Author
                                        <?php endif; ?>
                                    </h6>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- content-wrapper ends -->
                        <?= $this->renderSection('content'); ?>
                    </div>
                </div>

                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. Kelompok 3 <a href="" target="_blank">Pemrograman 4</a></span>
                    </div>
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Angkatan 14</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->



    <!-- plugins:js -->
    <script src="/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/vendors/chart.js/Chart.min.js"></script>
    <script src="/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/js/off-canvas.js"></script>
    <script src="/js/hoverable-collapse.js"></script>
    <script src="/js/template.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/js/dashboard.js"></script>
    <script src="/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
    <!-- summernote -->
    <script src="/summernote/summernote-bs4.min.js"></script>
    <script src="/summernote/summernote-image-list.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/36a2be5478.js" crossorigin="anonymous"></script>

<script>
    $('.alert').alert()
</script>

    <script>
        $(document).ready(function() {
            $('#konten').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'imageList', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                dialogsInBody: true,
                imageList: {
                    endpoint: "<?php echo site_url('artikel/listGambar') ?>",
                    fullUrlPrefix: "<?php echo base_url('uploads/berkas') ?>/",
                    thumbUrlPrefix: "<?php echo base_url('uploads/berkas') ?>/"
                },
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete: function(target) {
                        $.delete(target[0].src);
                    }
                }
            });
        });
        $.upload = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: '<?php echo site_url('artikel/uploadGambar') ?>',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('#konten').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };

        // $.delete = function(src) {
        //     $.ajax({
        //         method: 'POST',
        // url: '',
        //         cache: false,
        //         data: {
        //             src: src
        //         },
        //         success: function(response) {
        //             console.log(response);
        //         }

        //     });
        // };

        $.delete = function(src) {
            $.ajax({
                method: 'POST',
                url: '<?php echo site_url('artikel/deleteGambar') ?>',
                cache: false,
                data: {
                    src: src
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + status + " " + error);
                }
            });
        };
    </script>
</body>

</html>