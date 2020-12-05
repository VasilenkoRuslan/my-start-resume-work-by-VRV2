<?php require "header.php"; ?>
<?php
$directoryForPicture = 'gallery';
$directoryForOtherFile = 'filesForDownload';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES["userFile"]["error"] != 0) {
        echo 'Upload error: Code:' . $_FILES["userFile"]["error"];
    }
    if ($_FILES["userFile"]["error"] == 0) {
        $tmpName = $_FILES['userFile']['tmp_name'];
        if (substr($_FILES["userFile"]['type'],0,6) === "image/") {
            if (move_uploaded_file($tmpName, $directoryForPicture . '/' . time() . '.' . pathinfo($_FILES['userFile']['name'], PATHINFO_EXTENSION))) {
                echo 'File was Saved';
            } else echo 'Can not save file!';
        }
        if (substr($_FILES["userFile"]['type'],0,6) !== "image/") {
            if (move_uploaded_file($tmpName, $directoryForOtherFile . '/' . time() . '.' . pathinfo($_FILES['userFile']['name'], PATHINFO_EXTENSION))) {
                echo 'File was Saved';
            } else echo 'Can not save file!';
        }
    }
}
?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <div class="form">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="upload_max_filesize" value="<?= (1024*10);?>">
                        <label for="">
                            <input type="file" class="btn btn-outline-warning" name="userFile">
                        </label>
                        <button class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><a href="task17showPicture.php" class="btn btn-success">show pictures</a>
                    <a href="task17downloadFile.php" class="btn btn-success">download files</a></p>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>
