<?php
session_start();

// Username dan password bisa kamu ubah sesuai keinginan
$valid_username = 'admin';
$valid_password = '12345';

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    header("Location: index.html");
} else {
    echo "<script>alert('Login gagal! Username atau password salah.');window.location='login.html';</script>";
}
?>
