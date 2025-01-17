<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/logo.png">
    <link rel="stylesheet" href="css/styles.css">

    <title>Registrasi</title>
</head>
<body>
    <div class="MainColumn">
        <h1>Registrasi</h1>
        
        <!-- Gambar logo di bagian utama -->
        <form action="prosesregister.php" method="POST" class="Form-control" >
            <div class="form-group">
            <label for="nama_user">Nama user</label>
                    <input type="text" id="nama_user" name="nama_user" placeholder="Masukan nama user" required>
                <label for="Username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukan Username anda" required>
                <label for="Password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukan password anda" required>
                <label for="password_confirm">Konfirmasi Password</label>
                    <input type="password" id="password_confirm" name="password_confirm" placeholder="Konfirmasi password anda" required>
            </div>
              
            <div class="lower">
            <button type="submit" name="aksi" value="daftar" class="start-button">Daftar</button>
            <p>Sudah punya akun ? <a href="index.php">Login</a></p>
            </div>
        </form>        
    </div>
</body>
</html>
