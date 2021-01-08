<?php require "header.php"; ?>
<?php
$_POST['upload_max_filesize'] = (1024 * 10);
$directoryForFile = 'filesForDownload';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!file_exists($directoryForFile)) {
        mkdir($directoryForFile, 0777);
    }
    if ($_FILES["userFile"]["error"][0] != 0) {
        echo 'Upload error: Code:' . $_FILES["userFile"]["error"][0];
    }
    if ($_FILES["userFile"]["error"][0] == 0) {
        $howMuchFiles=count($_FILES["userFile"]['name']);
        for ($n=0; $n<$howMuchFiles; $n++) {
            $tmpName = $_FILES['userFile']['tmp_name'][$n];
            $name= $_FILES['userFile']['name'][$n];
            if (move_uploaded_file($tmpName, $directoryForFile . '/' . time() .$n. '.' . pathinfo($name, PATHINFO_EXTENSION))) {
                echo "File $n was Saved";
            } else echo "Can not save file $n!";
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
                        <label for="">
                            <input type="file" class="btn btn-outline-warning" name="userFile[]" multiple="multiple">
                        </label>
                        <button class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><a href="task17downloadFile.php" class="btn btn-success">download files</a></p>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>
