<?php require "header.php"; ?>
<?php
if (isset($_SERVER['HTTP_REFERER'])) {
    $address = $_SERVER['HTTP_REFERER'];
    global $mysqlConnect;
    $sql = $mysqlConnect->prepare("CREATE TABLE IF NOT EXISTS `addresses1`
 ( `id` INT(11) NOT NULL AUTO_INCREMENT , 
 `address` TEXT NOT NULL , 
 `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
 PRIMARY KEY (`id`)) 
 COLLATE utf8_general_ci;");
    $sql->execute();
    $sql = $mysqlConnect->prepare("INSERT INTO `addresses` (`address`) VALUES (?)");
    $sql->bind_param("s", $address);
    $sql->execute();
}
?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Сайт task29.1</h3>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php"; ?>