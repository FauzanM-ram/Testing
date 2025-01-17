
<?php
include("koneksi.php"); // Mengambil file koneksi.php untuk menghubungkan ke database

if (isset($_POST['username']) && isset($_POST['password'])) { // Memeriksa apakah input username dan password telah dikirim via metode POST
    $username = $_POST['username']; // Mengambil nilai username dari input form
    $password = $_POST['password']; // Mengambil nilai password dari input form

    if (!empty($username) && !empty($password)) {
        $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$password';");
        
        $ketemu = mysqli_num_rows($sql); // Menghitung jumlah baris hasil query

        if ($ketemu == 1) { // Jika ditemukan satu baris data yang cocok
            session_start(); // Memulai sesi
            while ($user = mysqli_fetch_array($sql)) { // Memulai loop untuk mengambil data user dari hasil query
                $username = $user['username']; // Mengambil nilai username dari hasil query
                $password = $user['password']; // Mengambil nilai password dari hasil query

                $_SESSION['username'] = $username; // Menyimpan username ke dalam sesi
                $_SESSION['password'] = $password; // Menyimpan password ke dalam sesi
                Header("Location:dashboard.php");
            }
        } else {
            // Menampilkan pesan kesalahan dengan JavaScript jika username atau password tidak cocok
            echo "<script>alert('Username atau password yang Anda masukkan salah')</script>";
            // Mengarahkan kembali ke halaman login setelah menekan tombol OK pada pesan kesalahan
            echo "<script>window.location = 'login.php';</script>";
        }
    } else {
        // Menampilkan pesan kesalahan dengan JavaScript jika username atau password kosong
        echo "<script>alert('Silakan isi username dan password terlebih dahulu')</script>";
        // Mengarahkan kembali ke halaman login setelah menekan tombol OK pada pesan kesalahan
        echo "<script>window.location = 'login.php';</script>";
    }
}
?>
