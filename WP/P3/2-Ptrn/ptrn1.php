<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P3_2_Pattern-1</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .con{
            margin: 2em auto;
            width: 75%;
            background-color: rgb(255, 255, 193);
            color: black;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border: 1px solid black;
            text-align: center;
            border-radius: 0.5em;
        }
        .con p{
            margin: 1.5em;
            font-size: 1.5rem;
        }
        input{
            margin: 2em 0;
        }
        input[type=submit]{
            padding: 0.5em 1em;
            border-radius: 0.5em;
            border: 1px solid #555;
            background-color: hsl(108, 60%, 75%); 
            color: #555;
            cursor: pointer;
            transition: all 0.5s linear; 
        }


        input[type=submit]:hover {
            background-color: hsl(108, 65%, 65%); 
            color: #000;
            border: 2px solid #000;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .result{
            margin-top: 2em;
            font-size: 1rem;
        }
    </style>
</head>
<body>
<div class="con">
        <h2>Pattern - 1 </h2>
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
                    echo PHP_EOL;
                }
            }
            
        ?>
        </p>
    </div>
</body>
</html>