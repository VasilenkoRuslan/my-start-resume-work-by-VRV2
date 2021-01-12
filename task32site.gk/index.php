<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
        <?php
        $docRoot =  $_SERVER['SERVER_NAME'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://$docRoot/task32api.gk/users");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        $output = json_decode($output,true);

        curl_close($ch);
        $id = "";
        if(isset($output)){
            foreach ($output as $string )
            {
                ?>
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-danger"><a href="?del=<?php echo $string['id'];?>">DELETE</a></button>
                        <h5 class="card-title"> <?php echo $string['login'];?> </h5>
                        <p class="card-text"> <?php echo $string['password'] ?> </p>
                    </div>
                </div>
                <?php
            }
        }
        if(isset($_GET['del']))
        {
            $id = $_GET['del'];
            $ch2 = curl_init();
            curl_setopt($ch2, CURLOPT_URL, "http://$docRoot/api.gk/users/$id");
            curl_setopt($ch2, CURLOPT_POST, 1);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $id);
            $output2 = curl_exec($ch2);
            curl_close($ch);
            header ('Location:index.php');
        }
        ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>
