<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P3_2_Pattern-2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="con">
        <p>Pattern - 2</p>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="num">Enter a number: </label>
            <input type="number" name="num" id="num"><br>
            <input type="submit">
        </form>
        <p class="result">
        <?php
            if(isset($_POST['num'])){
                $num = $_POST['num'];
                
                for($i = 1; $i <= $num; $i++){
                    if($i % 2 == 0){
                        $n = 0;
                        for($j = 1; $j <= $i; $j++){
                            echo "$n ";
                            $n = ($n==1)?0:1;
                        }
                    }
                    else{
                        $n = 1;
                        for($j = 1; $j <= $i; $j++){
                            echo "$n ";
                            $n = ($n==1)?0:1;
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