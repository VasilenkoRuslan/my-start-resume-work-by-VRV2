<?php
if(strpos( $_SERVER['HTTP_REFERER'], 'http://'.$_SERVER['SERVER_NAME'].'/task29.2.php' ) !== FALSE)
{
    http_response_code(403);
    header('Location: http://'.$_SERVER['SERVER_NAME'].'/task29.error.php');
    exit();
} ?>

<?php require "header.php"; ?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>task29.2.1</h3>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php"; ?>