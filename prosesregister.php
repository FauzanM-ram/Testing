<?php
include 'koneksi.php';

if (isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];

    if ($aksi == "daftar") {
        if (isset($_POST['nama_user'], $_POST['username'], $_POST['password'], $_POST['password_confirm'])) {
            $nama_user = mysqli_real_escape_string($conn, $_POST['nama_user']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password_confirm = mysqli_real_escape_string($conn, $_POST['password_confirm']);

            $query_last_id = "SELECT id_user FROM tb_user ORDER BY id_user DESC LIMIT 1";
            $result_last_id = mysqli_query($GLOBALS['conn'], $query_last_id);
            $last_row = mysqli_fetch_assoc($result_last_id);
            
            $next_id = ($last_row) ? intval(substr($last_row['id_user'], 2)) + 1 : 1;
            
            $new_id = 'us' . str_pad($next_id, 3, '0', STR_PAD_LEFT);
            // Periksa apakah username atau nama user sudah terdaftar
            $check_query = "SELECT * FROM tb_user WHERE username = '$username' OR nama_user = '$nama_user'";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo '<script>alert("Username atau nama user telah terdaftar.");</script>';
                echo '<script>window.location = "register.php";</script>';
                exit(); 
            }

            if ($password !== $password_confirm) {
                $_SESSION['nama_user'] = $nama_user; 
                $_SESSION['username'] = $username;
                echo '<script>alert("Password dan konfirmasi password tidak cocok.");</script>';
                echo '<script>window.location = "register.php";</script>';
                exit(); 
            } 

            // Tambahkan data user ke dalam tabel
            $sql = "INSERT INTO tb_user (id_user ,nama_user, username, password) VALUES ('$new_id','$nama_user', '$username', '$password')";

            if (mysqli_query($conn, $sql)) {
                header("location: index.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>
