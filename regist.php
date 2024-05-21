<?php
    session_start();

    include('conn.php'); // Pastikan koneksi database diimpor

    if (isset($_POST['daftar'])) {
        if (registrasi($_POST) > 0) {
            header('Location: index.php'); // Pengalihan ke halaman login
            exit(); // Pastikan skrip berhenti setelah pengalihan
        } else {
            $_SESSION['message']= "Username Sudah Ada";
            header('Location: registrasi.php?error=failed'); // Pengalihan ke halaman registrasi dengan parameter error
            exit();
        }
    }


    function registrasi($data) {
        global $conn; // Pastikan koneksi database global digunakan

        $username = strtolower(stripslashes($data["username"]));
        $useremail = strtolower(stripslashes($data["email"])); // Perbaikan variabel useremail
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // Cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT user_name FROM user WHERE user_name = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('Username sudah terdaftar!');</script>";
            return 0;
        }

        // Cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
            return 0;
        }

        // Enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO user (user_name, user_email, user_password) VALUES ('$username', '$useremail', '$password')"); // Perbaikan query

        return mysqli_affected_rows($conn);
    }
?>
