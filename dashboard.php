<?php
include 'koneksi.php';
session_start();
if(!isset($_SESSION['username'])){
    header("location: index.html");
}
$username = $_SESSION['username'];
$query = "SELECT * FROM tb_user;";
$sql = mysqli_query($conn, $query);
$no = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laundry</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.min.css" rel="stylesheet">
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar text-white sidebar-dark accordion" id="accordionSidebar">
        
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon ">
              <!-- <img src="assets/icon.png" style="width: 55px;" > -->
            </div>
            <div class="sidebar-brand-text mx-2 font-weight-bold "style=" font-size: 24px;">Laundry</div>
        </a>
        
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Pengguna laundry</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="data_pelanggan.php">
            <i class="fas fa-fw fa-users"></i>
                <span>Data Pelanggan</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="entri_transaksi.php">
            <i class="fas fa-fw fa-folder-open"></i>
                <span>Entri Transaksi</span></a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                        <div class="text-light font-weight-bold "style=" font-size: 24px;">Data Pengguna</div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-white small"><?php echo "$username";?></span>
                                <img class="img-profile rounded-circle"
                                    src="assets/king_yuan.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="row">

                        <div class="container-fluid">
                        <div id="pageHeading" class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-dark"> <?php echo "Selamat Datang, $username!";?> </h1>
                        <a href="kelola.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Tambah data</a>
                    </div>
                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Data Pengguna</h6>
                        </div>
                            <div class="card-body">
                            <div class="table-responsive">
                            <form action="dashboard.php" method="get">
                            <label>Cari :</label>
		                    <input type="text" name="cari">
		                    <button type="submit" class="btn btn-sm btn-info " value="Cari">Cari</button>
		                    <button type="submit" class="btn btn-sm btn-secondary " value="kembali">Kembali</button>
	                        </form>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>id</th>
                                            <th>Nama user</th>
                                            <th>Username</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(isset($_GET['cari'])){
                                        $cari = $_GET['cari'];
                                        $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user LIKE '%".$cari."%' OR username LIKE '%".$cari."%' OR nama_user LIKE '%".$cari."%'");	
                                    } else {
                                        $query = mysqli_query($conn, "SELECT * FROM tb_user");
                                    }
                                    if(isset($_GET['kembali'])){
                                        $query = mysqli_query($conn, "SELECT * FROM tb_user");	
    
                                    }
                                    $no = 0;
                                    while ($result = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo ++$no; ?>.</td>
                                            <td><?php echo $result['id_user']; ?></td>
                                            <td><?php echo $result['nama_user']; ?></td>
                                            <td><?php echo $result['username']; ?></td>
                                            <td class="text-center"><a href="kelola.php?ubah=<?php echo $result['id_user']; ?>" type="button" class="btn btn-success btn-sm">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                            </a>								
                                            <a href="proses.php?hapus=<?php echo $result['id_user']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
								            <i class="fa fa-trash"></i> Hapus
								            </a></td>
                                        </tr>
                                    </tbody>  
                                    <?php 
                    }
                    ?>  
                            </div>
                        </div>                                                     
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah kamu yakin ingin keluar ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-primary" href="logout.php">Ya</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusModal<?php echo $result['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel<?php echo $result['id_user']; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel<?php echo $result['id_user']; ?>">Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data tersebut?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-primary" href="proses.php?hapus=<?php echo $result['id_user']; ?>">Ya</a>
            </div>
        </div>
    </div>
</div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
