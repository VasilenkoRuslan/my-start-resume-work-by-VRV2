<?php include('init_db.php'); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <title>vrvtask</title>
</head>
<body>
<div id="toTop"><i class="fas fa-chevron-up"></i></div>
<header class="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-md-12">
                <nav class="navbar navbar-expand-sm bg-white navbar-light d-flex justify-content-between">
                    <img src="img/logo.png" alt="logo" class="logo navbar-brand float-left">
                    <button class="navbar-toggler btn btn-info bg-info" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav align-self-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle menu__item" href="#" data-toggle="dropdown">
                                    Tasks 1-5
                                </a>
                                <div class="dropdown-menu">
                                    <?php for ($task_number = 1; $task_number < 6; $task_number++) {
                                        echo '<a href="task' . $task_number . '.php" class="dropdown-item text-body">Task ' . $task_number . '</a>';
                                    } ?>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle menu__item" href="#" data-toggle="dropdown">
                                    Tasks 6-10
                                </a>
                                <div class="dropdown-menu">
                                    <?php for ($task_number = 6; $task_number < 11; $task_number++) {
                                        echo '<a href="task' . $task_number . '.php" class="dropdown-item text-body">Task ' . $task_number . '</a>';
                                    } ?>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle menu__item" href="#" data-toggle="dropdown">
                                    Tasks 11-15
                                </a>
                                <div class="dropdown-menu">
                                    <?php for ($task_number = 11; $task_number < 16; $task_number++) {
                                        echo '<a href="task' . $task_number . '.php" class="dropdown-item text-body">Task ' . $task_number . '</a>';
                                    } ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="navbar-nav align-self-end">
                            <li class="nav-item menu__item"><a href="/" class="nav-link"><i class="fas fa-search text-body"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
