<?php
session_start();
require 'functions.php';


// Cek session
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

// Proses login
if (isset($_POST["login"])) {
    $nama = $_POST["Nama"];
    $password = $_POST["Password"];

    $result = mysqli_query($conn, "SELECT * FROM admin");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // if (password_verify($password, $row["Password"])) {
        if ($password === $row['Password']) {
            // Login berhasil
            $_SESSION["login"] = true;
            $_SESSION["AdminID"] = $row["AdminID"];
            $_SESSION['Nama'] = $row['Nama'];


            // Redirect ke halaman index
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/style-login.css">
</head>

<body>
    <div class="container">
        <h1>Login</h1>

        <?php if (isset($error)) : ?>
            <p class="error-message">Nama atau password salah!</p>
        <?php endif; ?>

        <form action="" method="post">
            <ul>
                <li>
                    <label for="Nama">Nama</label>
                    <input type="text" name="Nama" id="Nama" autocomplete="off" required>
                </li>
                <li>
                    <label for="Password">Password</label>
                    <input type="password" name="Password" id="Password" required>
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>

    </div>
</body>

</html>