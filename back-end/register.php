<?php
session_start();
require_once 'connection.php';

$options = [
    'cost' => 12,
];

$user = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
$repeat_password = password_hash($_POST['repeat_password'], PASSWORD_BCRYPT, $options);

if ($_POST['password'] == $_POST['repeat_password']) {
    mysqli_query($koneksi,"insert into users values('','$user','$password','$repeat_password')");
    $data = array(
        'status' => true,
        'message' => 'berhasil registrasi',
    );
    // $_SESSION['user'] = $user;
    // setcookie('user', $user, time() + (86400 * 30), "/");
    echo json_encode($data);
} else {
    echo 'gagal, ushakan password sama dengan repeat password !';
}

