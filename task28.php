<?php require "header.php"; ?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№28. Написать функцию сложения массивов.</h3>
                    <h5>Написать функцию сложения массивов.
                        Необходимо сделать форму с двумя textarea. В них заполняются данный в виде матрицы <br><br>
                        1 2 3 4<br>
                        4 5 3 2<br>
                        3 4 5 2<br>
                        <br>
                        и<br>
                        <br>
                        3 4 3 2<br>
                        2 3 2 1 1<br>
                        <br>
                        Размеры матриц могут быть разными.<br>
                        Вывести на экран результат сложения этих матриц по след. условиям:<br>
                        - Если ячейка присутствует в обеих матрицах — сложить их значения.<br>
                        - Если ячейка присутствует только в одной матрице — просто добавить ее значения в
                        результирующую.<br>
                        - Не достающие ячейки добавить как 0.<br>
                        <br>
                        Пример ответа для представленных выше параметров:<br><br>
                        4 6 6 6 1<br>
                        6 8 5 3 1<br>
                        3 4 5 2 0</h5>
                </div>
            </div>
        </div>
        <div class="container bg-dark borderForm">
            <form action="" method="POST" class="row" style="margin: 5em">
                <label for="matrix1"></label>
                <textarea name="matrix1" id="matrix1" class="col-md-4" cols="20" rows="5"></textarea>
                <label for="matrix2"></label>
                <textarea name="matrix2" id="matrix2" class="col-md-4" cols="20" rows="5"></textarea>
                <input type="submit" class="btn btn-outline-warning col-md-2" value="Посчитать">
                <?php
                if (isset($_POST["matrix1"])) {
                    $matrix1 = explode(PHP_EOL, $_POST["matrix1"]);
                    $matrix2 = explode(PHP_EOL, $_POST["matrix2"]);
                    $maxRowsMatrix = (count($matrix1) > count($matrix2) ? count($matrix1) : count($matrix2));
                    $maxColsMatrix = 0;
                    for ($row = 0; $row < $maxRowsMatrix; $row++) {
                        if (isset($matrix1[$row])) {
                            $matrix1[$row] = explode(" ", $matrix1[$row]);
                        }
                        if (empty($matrix1[$row])) {
                            $matrix1[$row] = [];
                        }
                        if (isset($matrix2[$row])) {
                            $matrix2[$row] = explode(" ", $matrix2[$row]);
                        }
                        if (empty($matrix2[$row])) {
                            $matrix2[$row] = [];
                        }
                        if ($maxColsMatrix < count($matrix1[$row])) {
                            $maxColsMatrix = count($matrix1[$row]);
                        }
                        if ($maxColsMatrix < count($matrix2[$row])) {
                            $maxColsMatrix = count($matrix2[$row]);
                        }
                    }
                    for ($row = 0; $row < $maxRowsMatrix; $row++) {
                        for ($col = 0; $col < $maxColsMatrix; $col++) {
                            if (empty($matrix1[$row][$col])) {
                                $matrix1[$row][$col] = 0;
                            }
                            if (empty($matrix2[$row][$col])) {
                                $matrix2[$row][$col] = 0;
                            }
                        }
                    }
                    function summa_matrix($arrMatrix1, $arrMatrix2)
                    {
                        $arrMatrixResult = [];
                        foreach ($arrMatrix1 as $row => $arrInRow) {
                            foreach ($arrInRow as $col => $val) {
                                $arrMatrixResult[$row][$col] = (($val) + ($arrMatrix2[$row][$col]));
                            }
                        }
                        return $arrMatrixResult;
                    }

                    function transformMatrixToString($matrix)
                    {
                        foreach ($matrix as $key => $val) {
                            $matrix[$key] = implode(" ", $val);
                        }
                        return implode("<br>", $matrix);
                    }

                    ?>
                    <div class="col-md-2 text-light">
                        <h5>Результат: <br>
                            <?= transformMatrixToString(summa_matrix($matrix1, $matrix2));
                            ?>
                        </h5>
                    </div>
                    <?php
                }
                ?>
            </form>
        </div>
    </section>
<?php require "footer.php"; ?>