<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Juru Data</title>
    <link rel="icon" href="path/to/favicon.ico" type="image/x-icon">
    <script src="js/sign-in.js"></script>
    <style>
        body {
            display: flex;
            align-items: center;
            margin-right: 100px;
            height: 100vh;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        .profil {
            flex: 1;
            background-color: #f0f0f0;
            background-image: url('img/image_1.jpg');
            background-size: cover;
            background-position: left;
            background-repeat: no-repeat;
            padding: 100px;
            padding-top: 500px;
        }

        .form {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
        }

        table {
            width: 50vh;

        }

        td,
        button {
            width: 100%;
        }

        button {
            margin-top: 10px;
            padding: 20px;
            background-color: #001D49;
            color: aliceblue;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #001535;
        }

        button:active {
            transform: scale(0.95);
        }

        input {
            width: 100%;
            height: 50px;
            box-sizing: border-box;
            margin-top: 10px;
            background-color: #EEEEEE;
            border: none;
            padding-left: 15px;
        }

        img {
            width: 300px;
        }
    </style>
</head>

<body>
    <div class="profil">
        <table>
            <tr>
                <img src="img/logo_1.png" alt="Logo Juru Data">
            </tr>
        </table>
    </div>
    <div class="form">
        <form method="post" action="">
            <table align="center">
                <tr>
                    <td>
                        <h3>Sign In</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="email_user" name="email_user" required placeholder="Email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" id="kata_sandi" name="kata_sandi" required placeholder="Password">
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <button type="submit" value="Login"><strong>Masuk</strong></button>
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <strong>
                            <p>Belum Punya Akun? <a href="sign-up.html">Sign Up</a></p>
                        </strong>
                    </td>
                </tr>
            </table>
        </form>
        <p id="message"></p>
    </div>
</body>

</html>

<?php
session_start();
include 'connection/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username_email = $_POST['email_user'];
    $input_password = $_POST['kata_sandi'];

    $sql = "SELECT * FROM user WHERE email_user=? AND kata_sandi=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $input_username_email, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Pengguna ditemukan, ambil data pengguna
        $user = $result->fetch_assoc();
        // Simpan peran pengguna dalam sesi
        $_SESSION['role_user'] = $user['role_user'];
        $_SESSION['id_user'] = $user['id_user']; // Mengatur id_user dalam sesi
        $_SESSION['email_user'] = $user['email_user'];

        // Redirect berdasarkan peran pengguna
        if ($_SESSION['role_user'] == 'Admin') {
            header("Location: admin_page/user_control.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        $error_message = "Email atau password salah!";
    }

    $stmt->close();
}
$conn->close();
?>