<?php require "header.php"; ?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row justify-content-center">
                <?php
                $pathToDir = "filesForDownload";
                $pathFiles = [];
                if (file_exists($pathToDir)) {
                $dir = opendir($pathToDir);
                while (($file = readdir($dir)) !== false) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    $pathFiles["path"][] = $pathToDir . '/' . $file;
                    $pathFiles["name"][] = $file;
                }
                closedir($dir);
                $howMachFiles = count($pathFiles["path"]);

                for ($i = 0;
                $i < $howMachFiles;
                $i++) {
                    $typeFile=explode("/",mime_content_type($pathFiles["path"][$i]));
                if ($typeFile[0] === "image") { ?>
                <a href="<?= $pathFiles["path"][$i]; ?>" download><img src="<?= $pathFiles["path"][$i]; ?>"
                                                              alt="<?= $pathFiles["name"][$i]; ?>" height="150px"></a><br>
                    <?php }
                    if ($typeFile[0] !== "image") { ?>
                        <a href="<?= $pathFiles["path"][$i]; ?>" download><?= $pathFiles["name"][$i]; ?></a><br>
                    <?php }
                    }
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