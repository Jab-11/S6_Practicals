<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P3_2_Pattern-1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="con">
        <p>Pattern - 1</p>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="num">Enter a number: </label>
            <input type="number" name="num" id="num"><br>
            <input type="submit">
        </form>
        <p class="result">
        <?php
            if(isset($_POST['num'])){
                $num = $_POST['num'];
                $n = 1;
                $c = 'a';
                for($i = 1; $i <= $num; $i++){
                    if($i % 2 == 0){
                        for($j = 1; $j <= $i; $j++){
                            echo "$c ";
                            $c++;
                        }
                    }
                    else{
                        for($j = 1; $j <= $i; $j++){
                            echo "$n ";
                            $n++;
                        }
                    }
                    echo "<br>";
                }
            }
            
        ?>
        </p>
    </div>
</body>
</html>