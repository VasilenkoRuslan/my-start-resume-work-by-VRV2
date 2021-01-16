<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <title>vrvtask</title>
</head>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="col justify-content-center">
            <?php
            $docRoot = $_SERVER['SERVER_NAME'];

            if (isset($_GET["delete"])) {
                $id_delete = ["id" => $_GET["delete"]];
                $url2 = "http://$docRoot/task32/api.php";
                $ch2 = curl_init();
                curl_setopt($ch2, CURLOPT_URL, $url2);
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch2, CURLOPT_POST, 1);
                curl_setopt($ch2, CURLOPT_POSTFIELDS, $id_delete);
                $output2 = curl_exec($ch2);
                if ($output2 === FALSE) {
                    echo 'cURL Error: ' . curl_error($ch2);
                }
                $output2 = json_decode($output2, true);
                curl_close($ch2);
                echo $output2["message"];
            }

            $ch = curl_init();
            $url = "http://$docRoot/task32/api.php?users";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            if ($output === FALSE) {
                echo 'cURL Error: ' . curl_error($ch);
            }
            $output = json_decode($output, true);
            curl_close($ch);

            if (isset($output)) {
                foreach ($output as $string) {
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">login: <?php echo $string['login']; ?> </h5>
                            <p class="card-text">password: <?php echo $string['pass'] ?> </p>
                            <button class="btn btn-danger"><a href="?delete=<?php echo $string['id']; ?>">DELETE</a>
                            </button>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

