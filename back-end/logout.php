<?php
session_start();
setcookie('user', $username, time() - (86400 * 30), "/");
header('Location: ../front-end/login.html');