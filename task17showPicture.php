<?php require "header.php"; ?>
<?php
$pathToDir = "gallery";

function getPictures($pathToDir)
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
    <div class="col-md-2">
        <img src="<?= $pathToFile; ?>" data-img="<?= $pathToFile; ?>" class="img-thumbnail" alt="" width="300">
    </div>
    <?php
}
?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row justify-content-center">
            <?php
            $pictures = getPictures($pathToDir);
            foreach ($pictures as $pic) {
                showFile($pic);
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><a href="task17uploadFile.php" class="btn btn-success">upload file</a>
                    <a href="task17downloadFile.php" class="btn btn-success">download files</a></p>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>
