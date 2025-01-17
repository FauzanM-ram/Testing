<?php
include 'koneksi.php';

$no_faktur      = '';
$tgl_masuk      = '';
$batas_waktu    = '';
$tgl_bayar      = '';
$jumlah         = '';
$harga          = '';
$status         = '';
$dibayar        = '';
$jumlah_bayar   = '';

if(isset($_GET['ubah'])){
    $no_faktur = $_GET['ubah'];

    $query = "SELECT * FROM tb_transaksi WHERE no_faktur = '$no_faktur';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $id_cust        = $result['id_cust'];
    $tgl_masuk      = $result['tgl_masuk'];
    $batas_waktu    = $result['batas_waktu'];
    $tgl_bayar      = $result['tgl_bayar'];
    $jumlah         = $result['jumlah'];
    $harga          = $result['harga'];
    $status         = $result['status'];
    $dibayar        = $result['dibayar'];
    $id_user        = $result['id_user'];
    $jumlah_bayar   = $result['jumlah_bayar'];
}

// Query data customer 
$query_customer = "SELECT * FROM tb_customer";
$sql_customer = mysqli_query($conn, $query_customer);

// Query data user 
$query_user = "SELECT * FROM tb_user";
$sql_user = mysqli_query($conn, $query_user);
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
                Kelola Transaksi
            </a>
        </div>
    </nav>
	<div class="container mt-4">
		<form method="POST" action="proses_transaksi.php">
        <input type="hidden" value="<?php echo $no_faktur; ?>" name="no_faktur">
        <div class="mb-3 row">
                <label for="id_cust" class="col-sm-2 col-form-label">Pelanggan</label>
                <div class="col-sm-10">
                    <!-- Dropdown untuk ID Customer -->
                    <select required name="id_cust" class="form-control" id="id_cust">
                        <?php
                        // Loop untuk menampilkan data customer sebagai opsi pada dropdown
                        while($row_customer = mysqli_fetch_assoc($sql_customer)) {
                            echo "<option value='".$row_customer['id_cust']."' ".($row_customer['id_cust'] == $id_cust ? 'selected' : '').">".$row_customer['nama_cust']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-10">
                    <input required type="datetime-local" name="tgl_masuk" class="form-control" id="tgl_masuk" value="<?php echo $tgl_masuk; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="batas_waktu" class="col-sm-2 col-form-label">Batas Waktu</label>
                <div class="col-sm-10">
                    <input required type="datetime-local" name="batas_waktu" class="form-control" id="batas_waktu" value="<?php echo $batas_waktu; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tgl_bayar" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                <div class="col-sm-10">
                    <input required type="datetime-local" name="tgl_bayar" class="form-control" id="tgl_bayar" value="<?php echo $tgl_bayar; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input required type="number" name="jumlah" class="form-control" id="jumlah" value="<?php echo $jumlah; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input required type="text" name="harga" class="form-control" id="harga" value="<?php echo $harga; ?>">
                </div>
            </div>
            <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select required name="status" class="form-control" id="status">
                    <option value="baru" <?php echo $status == 'baru' ? 'selected' : ''; ?>>Baru</option>
                    <option value="proses" <?php echo $status == 'proses' ? 'selected' : ''; ?>>Proses</option>
                    <option value="selesai" <?php echo $status == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                    <option value="diambil" <?php echo $status == 'diambil' ? 'selected' : ''; ?>>Diambil</option>
                </select>
            </div>
            </div>            
            <div class="mb-3 row">
            <label for="dibayar" class="col-sm-2 col-form-label">Dibayar</label>
            <div class="col-sm-10">
                <select required name="dibayar" class="form-control" id="dibayar">
                    <option value="dibayar" <?php echo $dibayar == 'dibayar' ? 'selected' : ''; ?>>Dibayar</option>
                    <option value="belum_dibayar" <?php echo $dibayar == 'belum_dibayar' ? 'selected' : ''; ?>>Belum Dibayar</option>
                </select>
            </div>
            </div>
            <div class="mb-3 row">
                <label for="id_user" class="col-sm-2 col-form-label">Petugas</label>
                <div class="col-sm-10">
                    <select required name="id_user" class="form-control" id="id_user">
                        <?php
                        while($row_user = mysqli_fetch_assoc($sql_user)) {
                            echo "<option value='".$row_user['id_user']."' ".($row_user['id_user'] == $id_user ? 'selected' : '').">".$row_user['nama_user']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah_bayar" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                <div class="col-sm-10">
                    <input required type="number" name="jumlah_bayar" class="form-control" id="jumlah_bayar" value="<?php echo $jumlah_bayar; ?>">
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
					<a href="entri_transaksi.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						Batal
					</a>
				</div>
			</div>
		</form>
	</div>
    <script>
        function calculateJumlahBayar() {
            const jumlah = document.getElementById('jumlah').value;
            const harga = document.getElementById('harga').value;
            const jumlahBayar = document.getElementById('jumlah_bayar');

            // Hitung jumlah bayar
            jumlahBayar.value = jumlah * harga;
        }

        // Tambahkan event listener untuk mengupdate jumlah bayar saat jumlah atau harga berubah
        document.getElementById('jumlah').addEventListener('input', calculateJumlahBayar);
        document.getElementById('harga').addEventListener('input', calculateJumlahBayar);

        // Panggil fungsi calculateJumlahBayar sekali saat halaman dimuat untuk memastikan jumlah bayar benar
        window.onload = calculateJumlahBayar;
    </script>
</body>
</html>
