<?php
	include 'fungsi.php';
	session_start();

	if(isset($_POST['aksi'])){
		if($_POST['aksi'] == "add"){
			
			$berhasil = tambah_data($_POST);

			if($berhasil){			
				header("location: dashboard.php");
			} else {
				echo $berhasil;
			}

		} else if($_POST['aksi'] == "edit"){

			$berhasil = ubah_data($_POST);
			
			if($berhasil){			
				header("location: dashboard.php");
			} else {
				echo $berhasil;
			}
		}
	}
	if(isset($_POST['action'])){
		if($_POST['action'] == "add"){
			
			$berhasil = tambah_data_pl($_POST);

			if($berhasil){			
				header("location: data_pelanggan.php");
			} else {
				echo $berhasil;
			}

		} else if($_POST['action'] == "edit"){

			$berhasil = ubah_data_pl($_POST);
			
			if($berhasil){			
				header("location: data_pelanggan.php");
			} else {
				echo $berhasil;
			}
		}
	}
	if(isset($_GET['hapus'])){

		$berhasil = hapus_data($_GET);

		if($berhasil){
			header("location: dashboard.php");
		} else {
			echo $berhasil;
		}
	}
	if(isset($_GET['hapuspl'])){

		$berhasil = hapus_pl($_GET);

		if($berhasil){
			header("location: data_pelanggan.php");
		} else {
			echo $berhasil;
		}
	}


?>