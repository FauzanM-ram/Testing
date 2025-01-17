<!DOCTYPE html>

<?php
include 'koneksi.php';

$id_user = '';
$username = '';
$password = '';
$nama_user = '';
if(isset($_GET['ubah'])){
	$id_user = $_GET['ubah'];

	$query = "SELECT * FROM tb_user WHERE id_user = '$id_user';";
	$sql = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($sql);
    $nama_user = $result['nama_user'];
	$username = $result['username'];
	$password = $result['password'];

}
?>

<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	
	<title>Kelola Data</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                Kelola Data User
            </a>
        </div>
    </nav>
	<div class="container mt-4">
		<form method="POST" action="proses.php">
			<input type="hidden" value="<?php echo $id_user; ?>" name="id_user">
            <div class="mb-3 row">
				<label for="nama_user" class="col-sm-2 col-form-label">
                    Nama user
				</label>
				<div class="col-sm-10">
					<input required type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Masukan nama user" value="<?php echo $nama_user; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="username" class="col-sm-2 col-form-label">
					Username
				</label>
				<div class="col-sm-10">
					<input required type="text" name="username" class="form-control" id="username" placeholder="Masukan Username" value="<?php echo $username; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="password" class="col-sm-2 col-form-label">
					Password
				</label>
				<div class="col-sm-10">
					<input required type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" value="<?php echo $password; ?>">
				</div>
			</div>

			<div class="mb-3 row mt-4">
				<div class="col">
					<?php
					if(isset($_GET['ubah'])){
						?>
						<button type="submit" name="aksi" value="edit" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Simpan Perubahan
						</button>
						<?php
					} else {
						?>
						<button type="submit" name="aksi" value="add" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Tambahkan
						</button>
						<?php
					}
					?>
					<a href="dashboard.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						Batal
					</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
