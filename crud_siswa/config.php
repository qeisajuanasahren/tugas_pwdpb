<?php
$servername = "localhost";
$username = "root"; // default XAMPP/WAMP username
$password = ""; // default XAMPP/WAMP password
$dbname = "sekolah";
// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
// Cek koneksi
if ($conn->connect_error) {
 die("Koneksi gagal: " . $conn->connect_error);
}
?>