<?php
require_once 'connection.php';
$username = $_POST['username'];
$password = $_POST['password'];
$query = mysqli_query($koneksi, "SELECT * FROM users where username='$username'");
if (!empty($query)) {
    foreach ($query as $value) {
            if (password_verify($password, $value['password'])) {
                setcookie('user', $username, time() + (86400 * 30), "/");
                $data = array(
                    'status' => true,
                    'message' => 'successfully !',
                );
                echo json_encode($data);
                exit();
            } else {
                $data = array(
                    'status' => false,
                    'message' => 'password not valid !',
                );
                echo json_encode($data);
                exit();
            }
    }
}
$data = array(
    'status' => false,
    'message' => 'username not valid !',
);
echo json_encode($data);



