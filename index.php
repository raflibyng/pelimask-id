<?php include 'connect.php'; ?>
<!-- tes-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PELIMASK.ID</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/pelimaskicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

    </head>
    <body id="page-top">
<!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                 <img src="assets/img/logonav.png" class="img-fluid" alt="...">
                <a class="navbar-brand" href="#page-top">PELIMASK.ID</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"                     aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#beranda">Beranda</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Tentang Kami</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#lokasi">Lokasi</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#grafik">Grafik</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#artikel">Artikel</a></li>
                        <?php if (! empty($_SESSION['username'])) {?>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="formadmin.php">Daftar Admin</a></li>
                        <?php }?>
                    </ul>
<!-- Tombol Login sama Log out-->
                    <?php if (empty($_SESSION['username'])) { ?>
            
                    <a href="formlogin.php" class="btn btn-light">Masuk Admin</a>

                    <?php } else { ?>

                     <a href="logout.php" class="btn btn-danger">Keluar</a>

            <?php } ?>
                </div>
            </div>
        </nav>
<!-- Masthead-->
        <header class="masthead bg-primary text-white text-center" id="beranda">
            <div class="container d-flex align-items-center flex-column">
<!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">PELIMASK.ID</h1>
<!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
<!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Pengepul Limbah Masker</p>
            </div>
        </header>
<!-- About Section-->
        <section class="page-section bg-light text-black text-center mb-0" id="about">
                <div class="container">
<!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-dark">TENTANG KAMI</h2>
<!-- Icon Divider-->
                <div class="divider-custom divider-dark">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>     
           
<!-- About Section Content-->
                <?php
                    $sql = 'SELECT * FROM tentangkami';

                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_object($query)) {
                ?>
                
                <tr>
                    <td><?php echo $row->isi; ?></td>
                </tr>

                <?php
                    } if (!mysqli_num_rows($query)) {
                        echo '<tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>';
                    }
                ?>
                </div>
                <?php if (! empty($_SESSION['username'])) {?>
                    <?php 

                        $act = 'add';
                        
                        if(! empty($_GET['id'])) {
                            $sql = 'SELECT * FROM tentangkami WHERE id="'.$_GET['id'].'"';
                            
                            $query = mysqli_query($conn, $sql);
                    
                            if(mysqli_num_rows($query)) {
                                $act = 'edit';

                                $row = mysqli_fetch_object($query);
                            }
                        }
                    ?>

                <div class="container mt-5">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">Tambah | Ubah | Hapus Info</button>
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah | Ubah | Hapus Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="savetentangkami.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Informasi</label>
                                        <input type="text" class="form-control" name="isi" placeholder="Masukkan Informasi | Kosongkan untuk menghapus" value="<?php if ($act == 'edit') echo $row->isi; ?>">
                                        <label class="form-label">Id Informasi</label>
                                        <input type="text" class="form-control" name="id" placeholder="Ketik Angka '1'"value="<?php if ($act == 'edit') echo $row->id; ?>">
                                    </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>              
                <?php }?>
        </section>

 <!-- Lokasi Section-->
        <section class="page-section bg-primary lokasi text-white text-center" id="lokasi">
            <div class="container">
                <!-- Lokasi Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 text-white">Lokasi Kami</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <?php
                    $sql = 'SELECT * FROM lokasi';

                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_object($query)) {
                ?>
                
                <tr>
                    <td><?php echo $row->alamat; ?></td>
                </tr>

                <?php
                    } if (!mysqli_num_rows($query)) {
                        echo '<tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>';
                    }
                ?>

                <br>
                <?php if (! empty($_SESSION['username'])) {?>
                    <a type="button" class="btn btn-warning mt-5" href="formlokasi.php">Tambah | Ubah | Hapus Alamat</a>
                <?php }?>

                <!-- Google Map-->
                <div class="container mt-5">
                    <div class="container-fluid">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.462867783972!2d106.80393147976501!3d-6.589245166270456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d2e602b501%3A0x25a12f0f97fac4ee!2sSekolah%20Vokasi%20Institut%20Pertanian%20Bogor!5e0!3m2!1sid!2sid!4v1667357128367!5m2!1sid!2sid" width="100%" height="540" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="col-xs-12"></iframe>

                    </div>
                </div>
                <?php if (! empty($_SESSION['username'])) {?>
                       

                <?php }?>
                
        </section>

        <!-- Grafik Section-->
        <section class="page-section bg-light text-dark mb-0 text-center" id="grafik">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-dark">Grafik Pengumpulan Masker</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-dark">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="row">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Grafik Jumlah Masker per-Minggu</div>
                            <div class="panel-body"><iframe src="doughnut.php" width="100%" height="300"></iframe></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <?php if (! empty($_SESSION['username'])) {?>
            
            <a href="formchart.php" class="btn btn-sm btn-info mb-3">Tambah</a>
    
            <?php }?>
    
            <table class="table mt-3 mb-3 container">
                <thead class="table-info">
                    <tr>
                        <th>Minggu-Ke</th>
                        <th>Jumlah Masker</th>
    
                        <?php if (! empty($_SESSION['username'])) {?>
    
                        <th>Aksi</th>
    
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        $sql = 'SELECT * FROM t_sampah';
    
                        $query = mysqli_query($conn, $sql);
    
                        while ($row = mysqli_fetch_object($query)) {
                    ?>
                    
                    <tr>
                        <td><?php echo $row->minggu_ke; ?></td>
                        <td><?php echo $row->jumlah_masker; ?></td>
    
                        <?php if (! empty($_SESSION['username'])) {?>
                        <td>
                            <a href="formchart.php?id_sampah=<?php echo $row-> id_sampah; ?>" class="btn btn-sm btn-warning">Ubah</a>
                            <a href="deletechart.php?id_sampah=<?php echo $row-> id_sampah; ?>" class="btn btn-sm btn-danger"
                            onclick = "return confirm('Apakah Anda Yakin Menghapus Data?');">Hapus</a>
                        </td>
    
                        <?php }?>
                    </tr>
    
                    <?php
                        } if (!mysqli_num_rows($query)) {
                            echo '<tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>';
                        }
                    ?>
    
                </tbody>
            </table>
            <br>
        </section>
        
        <!--ARTIKEL-->
        <section class="page-section bg-primary text-dark mb-0 text-center lokasi" id="artikel">
        <div class="container">
            <!-- artikel Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 text-white">Artikel</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>

        <?php if (! empty($_SESSION['username'])) {?>
            <a href="formarticle.php" class="btn btn-sm btn-info mb-3">Tambah</a>
        <?php }?>

        <table class="table mt-3 mb-3 container">
            <thead class="table-info">
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Gambar</th>

                    <?php if (! empty($_SESSION['username'])) {?>
                    <th>Aksi</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM t_artikel ORDER BY id_artikel ASC";
                    $result = mysqli_query($conn, $query);

                    if(!$result) {
                        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
                    }
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['judul']; ?></td>
                    <td><img style="width: 150px" src="assets/img/gambar-artikel/<?php echo $row['gambar']; ?>"></td>

                    <?php if (! empty($_SESSION['username'])) {?>
                    <td>
                        <a href="formeditarticle.php?id_artikel=<?php echo $row['id_artikel']; ?>" class="btn btn-sm btn-warning">Ubah</a>
                        <a href="deletearticle.php?id_artikel=<?php echo $row['id_artikel']; ?>" class="btn btn-sm btn-danger"
                            onclick = "return confirm('Apakah Anda Yakin Menghapus Data?');">Hapus</a>
                    </td>
                    <?php }?>
                </tr>
                <?php
                    $no++;
                }
                ?>

            </tbody>
        </table>

        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Lokasi Kami</h4>
                        <p class="lead mb-0">
                            Sekolah Vokasi IPB University
                            <br />
                            Jl. Kumbang No.14, RT.02/RW.06, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Sosial Media Kami</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/pelimask.id/" target="_blank"><i class="fab fa-fw fa-instagram"></i></a>
                    </div>
                    <!-- Tim Kami-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Tim Kami</h4>
                        <p class="lead mb-0">
                            Firdayanti
                            <br />
                            Irman Maulana
                            <br />
                            Kukuh Wijanarko
                            <br />
                            Rafli Buyung Surya
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Pelimask.id Dev.</small></div>
        </div>
        <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Log Cabin</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cabin.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Tasty Cake</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cake.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Circus Tent</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/circus.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Controller</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/game.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" aria-labelledby="portfolioModal5" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Locked Safe</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/safe.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" aria-labelledby="portfolioModal6" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Submarine</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/submarine.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>