<?php
session_start();

// Lakukan koneksi ke database
include('../config/koneksi.php');

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirimkan melalui form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan query ke database untuk mencari user dengan username yang sesuai
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah username ditemukan
    if (mysqli_num_rows($result) == 1) {
        // Ambil data dari database
        $row = mysqli_fetch_assoc($result);
        // Periksa kecocokan password
        if (password_verify($password, $row['password'])) {
            // Password cocok, set sesi dan redirect ke halaman admin
            $_SESSION['admin_id'] = $row['cuid'];
            $_SESSION['admin_username'] = $username;
            // Anda mungkin ingin menetapkan timestamp untuk lastlogin
            $current_time = date('Y-m-d H:i:s');
            mysqli_query($conn, "UPDATE admin SET lastlogin = '$current_time' WHERE cuid = {$row['cuid']}");
            // Redirect ke halaman admin
            header("Location: /newbie/dashboard.php?notif=1");
            exit;
        } else {
            // Password tidak cocok
            $error_message = "Password salah.";
        }
    } else {
        // Username tidak ditemukan
        $error_message = "Username tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <?php if(isset($error_message)) { ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Username:</label><br>
            <input type="text" name="username"><br>
            <label>Password:</label><br>
            <input type="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

