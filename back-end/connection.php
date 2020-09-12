<?php

$koneksi = mysqli_connect("localhost","root","","db_test_mulia_magna_karsa");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}