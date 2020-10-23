<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/fonts.css" >
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <script src="js/jquery.min.js"></script>
    <title>vrvtask</title>
</head>
<body>
<div id="toTop"><i class="fas fa-chevron-up"></i></div>
<header class="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 logo-bar">
                <img src="img/logo.png" alt="logo" class="logo">
                <button class="menu-icon"><i class="fas fa-bars"></i></button>
            </div>
            <div class="col-xl-8 col-md-9 ml-auto align-self-center">
                <nav>
                    <ul class="menu d-flex justify-content-end">
                        <li class="menu__item"><a href="/"><i class="fas fa-home"></i></a></li>
                        <?php for($task_number=1;$task_number<7;$task_number++) {
                            echo '<li class="menu__item"><a href="task'.$task_number.'.php">Task №'.$task_number.'</a></li>';
                        }?>
                        <li class="menu__item"><i class="fas fa-search"></i></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
