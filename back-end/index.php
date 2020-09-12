<?php
    require_once 'connection.php';
    session_start();
    if (!isset($_COOKIE['user'])) {
        header('Location: ../front-end/login.html');
    }
    $sesi = $_COOKIE['user'];
    $user = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$sesi' LIMIT 1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <script src="../front-end/js/jquery.js"></script>
    <script src="../front-end/js/moment.js"></script>
    <style>
        .time-frame {
            background-color: #000000;
            color: #ffffff;
            width: 300px;
            font-family: Arial;
        }

        .time-frame>div {
            width: 100%;
            text-align: center;
        }

        #date-part {
            font-size: 1.2em;
        }

        #time-part {
            font-size: 2em;
        }
    </style>
</head>

<body>
    <ul>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <?php  foreach ($user as $value) { ?>
        <!-- <h1>echo $value['username'];</h1> -->
        <h1>Hai <?php echo $value['username']; ?>, waktu login anda <span id='time'></span></h1>
    <?php } ?>
    <h2></h2>
    <!-- <div class='time-frame'>
        <div id='date-part'></div>
        <div id='time-part'></div>
    </div> -->
    <br>

    <script>
        $(document).ready(function () {
            var interval = setInterval(function () {
                var momentNow = moment();
                // $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' ' +
                //     momentNow.format('dddd')
                //     .substring(0, 3).toUpperCase());
                // $('#time-part').html(momentNow.format('A hh:mm:ss'));
                $('#time').text(momentNow.format('A hh:mm:ss'));
            }, 100);
        });
    </script>
</body>

</html>
