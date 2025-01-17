<?php
	include 'koneksi.php';

    function tambah_data($data){
        $id_cust        = $data['id_cust'];
        $tgl_masuk      = $data['tgl_masuk'];
        $batas_waktu    = $data['batas_waktu'];
        $tgl_bayar      = $data['tgl_bayar'];
        $jumlah         = $data['jumlah'];
        $harga          = $data['harga'];
        $status         = $data['status'];
        $dibayar        = $data['dibayar'];
        $id_user        = $data['id_user'];
        $jumlah_bayar   = $data['jumlah_bayar'];
    
        $query = "INSERT INTO tb_transaksi (id_cust, tgl_masuk, batas_waktu, tgl_bayar, jumlah, harga, status, dibayar, id_user, jumlah_bayar) VALUES ('$id_cust','$tgl_masuk','$batas_waktu','$tgl_bayar','$jumlah','$harga','$status','$dibayar','$id_user','$jumlah_bayar')";
        $sql = mysqli_query($GLOBALS['conn'], $query);
    
        if ($sql) {
            return true;
        } else {
            return false;
        }
    }

    
	function ubah_data($data){
            $no_faktur      = $data['no_faktur'];
            $id_cust        = $data['id_cust'];
            $tgl_masuk      = $data['tgl_masuk'];
            $batas_waktu    = $data['batas_waktu'];
            $tgl_bayar      = $data['tgl_bayar'];
            $jumlah         = $data['jumlah'];
            $harga          = $data['harga'];
            $status         = $data['status'];
            $dibayar        = $data['dibayar'];
            $id_user        = $data['id_user'];
            $jumlah_bayar   = $data['jumlah_bayar'];

		$query = "UPDATE tb_transaksi SET id_cust='$id_cust', tgl_masuk='$tgl_masuk', batas_waktu='$batas_waktu', tgl_bayar='$tgl_bayar', jumlah='$jumlah', harga='$harga', status='$status', dibayar='$dibayar', id_user='$id_user', jumlah_bayar='$jumlah_bayar' WHERE no_faktur='$no_faktur'";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
    

	function hapus_data($data){
		$no_faktur = $data['hapus'];

		$query = "DELETE FROM tb_transaksi WHERE no_faktur='$no_faktur'";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
?>
