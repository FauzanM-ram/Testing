<!DOCTYPE html>

<?php
include 'koneksi.php';

$id_cust = '';
$nama_cust = '';
$alamat = '';
$hp = '';
if(isset($_GET['ubah'])){
	$id_cust = $_GET['ubah'];

	$query = "SELECT * FROM tb_customer WHERE id_cust = '$id_cust';";
	$sql = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($sql);
	$nama_cust = $result['nama_cust'];
	$alamat = $result['alamat'];
	$hp = $result['hp'];

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
				Kelola Data Pelanggan
            </a>
        </div>
    </nav>
	<div class="container mt-4">
		<form method="POST" action="proses.php">
			<input type="hidden" value="<?php echo $id_cust; ?>" name="id_cust">
            <div class="mb-3 row">
				<label for="nama_cust" class="col-sm-2 col-form-label">
                    Nama Customer
				</label>
				<div class="col-sm-10">
					<input required type="text" name="nama_cust" class="form-control" id="nama_cust" placeholder="Masukan nama customer" value="<?php echo $nama_cust; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="alamat" class="col-sm-2 col-form-label">
					Alamat
				</label>
				<div class="col-sm-10">
					<input required type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan alamat customer" value="<?php echo $alamat; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="hp" class="col-sm-2 col-form-label">
					No hp
				</label>
				<div class="col-sm-10">
					<input required type="text" name="hp" class="form-control" id="hp" placeholder="Masukan no hp customer" value="<?php echo $hp; ?>">
				</div>
			</div>


			<div class="mb-3 row mt-4">
				<div class="col">
					<?php
					if(isset($_GET['ubah'])){
						?>
						<button type="submit" name="action" value="edit" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Simpan Perubahan
						</button>
						<?php
					} else {
						?>
						<button type="submit" name="action" value="add" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Tambahkan
						</button>
						<?php
					}
					?>
					<a href="data_pelanggan.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						Batal
					</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
