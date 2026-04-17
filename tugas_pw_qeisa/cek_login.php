<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']); 

$data = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['username'] = $username;
    header("location:form.php"); 
}else{
    header("location:login.php?pesan=gagal");
}
?>