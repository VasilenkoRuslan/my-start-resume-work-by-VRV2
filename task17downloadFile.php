<?php require "header.php"; ?>
<?php
$pathToDir = "filesForDownload";
function getAddressFile($pathToDir)
{
    $pictures = [];
    if (file_exists($pathToDir)) {
        $dir = opendir($pathToDir);
        while (($file = readdir($dir)) !== false) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $pictures[] = $pathToDir . '/' . $file;
        }
        closedir($dir);
    }
    return $pictures;
}

function showFile($pathToFile)
{ ?>
    <option value="<?= $pathToFile; ?>"><?= $pathToFile; ?></option>
    <?php
}

?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row justify-content-center">
            <form action="" method="POST">
                <label for="">Выберите файл из каталога<br>
                    <select name="addressFileDownload">
                        <option></option>
                        <?php
                        $pictures = getAddressFile($pathToDir);
                        foreach ($pictures as $pic) {
                            showFile($pic);
                        }
                        ?>
                    </select>
                </label>
                <input type="submit" value="Скачать файл" class="btn btn-outline-info">
            </form>
            <br>
            <?php
            if (isset($_POST["addressFileDownload"]) && $_POST["addressFileDownload"] !== "") { ?>
                <div class="col-sm-12 jumbotron text-left">
                    <h3>Ссылка для скачивания файла <?= substr($_POST["addressFileDownload"], -15); ?></h3>
                    <a href="<?= $_POST["addressFileDownload"]; ?>" class="btn btn-success col-sm-12"
                       download><?= substr($_POST["addressFileDownload"], -15); ?></a>
                </div>
                <?php
            }
            ?>

        </div>
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><a href="task17uploadFile.php" class="btn btn-success">upload file</a>
                    <a href="task17showPicture.php" class="btn btn-success">show pictures</a></p>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>
