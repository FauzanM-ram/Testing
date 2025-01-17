<?php
	include 'koneksi.php';

	function tambah_data($data){
		$nama_user = $data['nama_user'];
		$username = $data['username'];
		$password = $data['password'];
	
		$query_last_id = "SELECT id_user FROM tb_user ORDER BY id_user DESC LIMIT 1";
		$result_last_id = mysqli_query($GLOBALS['conn'], $query_last_id);
		$last_row = mysqli_fetch_assoc($result_last_id);
		
		$next_id = ($last_row) ? intval(substr($last_row['id_user'], 2)) + 1 : 1;
		
		$new_id = 'us' . str_pad($next_id, 3, '0', STR_PAD_LEFT);
		
		$query = "INSERT INTO tb_user VALUES('$new_id', '$nama_user', '$username', '$password')";
		$sql = mysqli_query($GLOBALS['conn'], $query);
	
		return true;
	}
	

	function ubah_data($data){
		$id_user = $data['id_user'];
		$nama_user = $data['nama_user'];
		$username = $data['username'];
		$password = $data['password'];

		$queryShow = "SELECT * FROM tb_user WHERE id_user = '$id_user';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		$query = "UPDATE tb_user SET nama_user='$nama_user', username='$username', password='$password' WHERE id_user='$id_user';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
    

	function hapus_data($data){
		$id_user = $data['hapus'];

		$queryShow = "SELECT * FROM tb_user WHERE id_user = '$id_user';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);


		$query = "DELETE FROM tb_user WHERE id_user = '$id_user';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function tambah_data_pl($data){
		$nama_cust = $data['nama_cust'];
		$alamat = $data['alamat'];
		$hp = $data['hp'];
	

		$query_last_id = "SELECT id_cust FROM tb_customer ORDER BY id_cust DESC LIMIT 1";
		$result_last_id = mysqli_query($GLOBALS['conn'], $query_last_id);
		$last_row = mysqli_fetch_assoc($result_last_id);
		

		$next_id = ($last_row) ? intval(substr($last_row['id_cust'], 2)) + 1 : 1;
		
		$new_id = 'pl' . str_pad($next_id, 3, '0', STR_PAD_LEFT);
		
		$query = "INSERT INTO tb_customer VALUES('$new_id', '$nama_cust', '$alamat', '$hp')";
		$sql = mysqli_query($GLOBALS['conn'], $query);
	
		return true;
	}
	

	function ubah_data_pl($data){
		$id_cust = $data['id_cust'];
		$nama_cust = $data['nama_cust'];
		$alamat = $data['alamat'];
		$hp = $data['hp'];

		$queryShow = "SELECT * FROM tb_customer WHERE id_cust = '$id_cust';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		$query = "UPDATE tb_customer SET nama_cust='$nama_cust', alamat='$alamat', hp='$hp' WHERE id_cust='$id_cust';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
    function hapus_pl($data){
		$id_cust = $data['hapuspl'];

		$queryShow = "SELECT * FROM tb_customer WHERE id_cust = '$id_cust';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);


		$query = "DELETE FROM tb_customer WHERE id_cust = '$id_cust';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
?>