<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">

    <title>Login</title>
</head>
<body>
    <div class="MainColumn">
        <h1>Selamat Datang</h1>
        <img src="assets/login.png" class="LogoKolom">
        <form action="proseslogin.php" method="post" class="Form-control" >
            <div class="form-group">
                <label for="Username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukan Username anda" required>
                <label for="Password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukan password anda" required>
            </div>            
            <div class="lower">
            <button type="submit" class="start-button">Login</button>
            <p>Belum punya akun ?<a href="register.php"> Daftar sekarang</a></p>
            </div>
        </form>        
    </div>
</body>
</html>
