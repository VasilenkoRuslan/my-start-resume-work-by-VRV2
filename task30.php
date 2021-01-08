<?php require "header.php"; ?>
<?php
global $mysqlConnect;
$sql = $mysqlConnect->query("CREATE TABLE IF NOT EXISTS `categories` 
( `id` INT(11) NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(255) NOT NULL , 
`parent_id` INT(11) NULL DEFAULT NULL , PRIMARY KEY (`id`)) 
COLLATE utf8_general_ci;");
?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№30. Создать таблицу с категориями.</h3>
                    <h5>Создать таблицу с категориями.<br>
                        Категории могут быть трех уровней:<br><br>
                        - Главная<br>
                        - Cаб категории<br>
                        - Cаб категории второго уровня<br><br>
                        Все категории должны находиться в одной таблицы и все должны быть связаны через поле
                        parent_id.<br>
                        Создать минимум 50 произвольных категории, разной вложенности, главных и следующие категории
                        должно быть минимум по 10.<br>
                        Вывести на странице сайта все категории с необходимой вложенностью.<br>
                        Сделать фильтр.<br>
                    </h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 form-group text-center">
                    <h2>Магазин по продаже коллекционных футболок известных футболистов</h2>
                    <label for="league">Выберите лигу</label>
                    <select name="league" class="form-control" id="league">
                        <option></option>
                        <?php
                        $leagueForFilter = $mysqlConnect->query("SELECT * FROM categories WHERE `parent_id` IS NULL");
                        while ($result = $leagueForFilter->fetch_assoc()) {
                            ?>
                            <option value="<?= $result['id']; ?>" <?= (isset($_GET["league"]) && $_GET["league"] === $result['id']) ? "selected" : "" ?>><?= $result['name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label for="club">Выберите клуб</label>
                    <select name="club" class="form-control" id="club">
                        <option></option>
                        <?php if (isset($_GET["league"])) {
                            $league = $_GET["league"];
                            $clubsInFilter = $mysqlConnect->query("SELECT * FROM categories WHERE `parent_id` = $league");
                            while ($result = $clubsInFilter->fetch_assoc()) {
                                ?>
                                <option value="<?= $result['id']; ?>" <?= (isset($_GET["club"]) && $_GET["club"] === $result['id']) ? "selected" : "" ?>><?= $result['name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <label for="player">Выберите игрока</label>
                    <select name="player" class="form-control" id="player">
                        <option></option>
                        <?php if (isset($_GET["club"])) {
                            $club = $_GET["club"];
                            $playersInFilter = $mysqlConnect->query("SELECT * FROM categories WHERE `parent_id` = $club");
                            while ($result = $playersInFilter->fetch_assoc()) {
                                ?>
                                <option value="<?= $result['id']; ?>"><?= $result['name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select><br>
                    <label for="count">Укажите количество: </label>
                    <input type="number" id="count"><br><br>
                    <button class="btn btn-dark btn-block">Заказать</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    function getCategory()
                    {
                        global $mysqlConnect;
                        $allLeague = $mysqlConnect->query("SELECT * FROM categories");
                        $arrayResult = [];
                        while ($row = $allLeague->fetch_assoc()) {
                            $arrayResult[$row["parent_id"]][] = $row;
                        }
                        return $arrayResult;
                    }

                    $category_arr = getCategory();

                    function outTree($parent_id, $level)
                    {
                        global $category_arr;
                        if (isset($category_arr[$parent_id])) {
                            foreach ($category_arr[$parent_id] as $value) {
                                echo "<div style='margin-left:" . ($level * 25) . "px;'>" . $value["name"] . "</div>";
                                $level++;
                                outTree($value["id"], $level);
                                $level--;
                            }
                        }
                    }

                    outTree(NULL, 0);

                    ?>
                </div>
            </div>
        </div>
    </section>
    <script>
        $("#league").change(function () {
            let league = $("#league").val();
            location.href = "task30.php?league=" + league;
        })
        $("#club").change(function () {
            let league = $("#league").val();
            let club = $("#club").val();
            location.href = "task30.php?league=" + league + "&club=" + club;
        })
    </script>
<?php require "footer.php"; ?>