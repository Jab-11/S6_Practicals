<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P3_1_Prime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="con">
        <form method="post">
            <label for="num">Enter a number: </label>
            <input type="number" name="num" id="num"><br>
            <input type="submit">
        </form>
        <p class="result">
        <?php
            if(isset($_POST['num'])){
                $num = $_POST['num'];
                $is_prime = true;
                if($num < 1){
                    echo "Invalid input";
                    return;
                }
                else if($num == 1){
                    echo "$num is not a prime";
                    return;
                }
                for ($i = 2; $i < $num; $i++) {
                    if($num % $i == 0){
                        $is_prime = false;
                        break;
                    }
                }
                if($is_prime){
                    echo "$num is a prime";
                } else {
                    echo "$num is not a prime";
                }
            }
        ?>
        </p>
    </div>
</body>
</html>