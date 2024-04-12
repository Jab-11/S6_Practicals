<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $_SESSION['name'] = isset($_POST['name']) ? $_POST['name'] : "NotFound";
    $_SESSION['dob'] = isset($_POST['dob']) ? $_POST['dob'] : "NotFound";
    $_SESSION['gender'] = isset($_POST['gender']) ? $_POST['gender'] : "NotFound";
    $_SESSION['email'] = isset($_POST['email']) ? $_POST['email'] : "NotFound";
    $_SESSION['mobile'] = isset($_POST['mobile']) ? $_POST['mobile'] : "NotFound";
    $_SESSION['address'] = isset($_POST['address']) ? $_POST['address'] : "NotFound";
    $_SESSION['state'] = isset($_POST['state']) ? $_POST['state'] : "NotFound";
    $_SESSION['education'] = isset($_POST['education']) ? implode(", ", $_POST['education']) : "NotFound";

    $conn = mysqli_connect('localhost', 'root', 'Cjp@1110', 'wp');

    if(!$conn){  
        die('Could not connect: '.mysqli_connect_error());  
    }  

    $create_table = "CREATE TABLE IF NOT EXISTS STUDENT(
        ID INT AUTO_INCREMENT PRIMARY KEY,
        NAME VARCHAR(30),
        DOB VARCHAR(10),
        GENDER VARCHAR(6),
        EMAIL VARCHAR(50),
        MOBILE VARCHAR(10),
        ADDRESS VARCHAR(70),
        STATE VARCHAR(30),
        EDUCATION VARCHAR(30)
    )";

    if(mysqli_query($conn, $create_table)) {
        $name = $_SESSION['name'];
        $dob = $_SESSION['dob'];
        $gender = $_SESSION['gender'];
        $email = $_SESSION['email'];
        $mobile = $_SESSION['mobile'];
        $address = $_SESSION['address'];
        $state = $_SESSION['state'];
        $education = $_SESSION['education'];

        $insert_info = "INSERT INTO STUDENT (NAME, DOB, GENDER, EMAIL, MOBILE, ADDRESS, STATE, EDUCATION) VALUES ('$name','$dob','$gender','$email','$mobile','$address','$state','$education')";

        if(mysqli_query($conn, $insert_info)) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $insert_info . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-container {
            display: flex;
            gap: 5px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn-delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <form method="post" action="index.php">
        <button type="submit" style="float: right; background-color:#4CAF50; color:#f2f2f2; margin:1em;" name='goBack'>Go Back!</button>
    </form>
    <h2>User Registration Data</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>State</th>
            <th>Education</th>
            <th>Action</th>
        </tr>
        <tr>
            <td><?php echo $_SESSION['name']; ?></td>
            <td><?php echo $_SESSION['dob']; ?></td>
            <td><?php echo $_SESSION['gender']; ?></td>
            <td><?php echo $_SESSION['email']; ?></td>
            <td><?php echo $_SESSION['mobile']; ?></td>
            <td><?php echo $_SESSION['address']; ?></td>
            <td><?php echo $_SESSION['state']; ?></td>
            <td><?php echo $_SESSION['education']; ?></td>
            <td>
                <div class="btn-container">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <button type="submit" name="ed" value="edit">Edit</button>
                    </form>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <button type="submit" name="del" value="delete">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>
    <?php
        function delRecord(){
            $name = $_SESSION['name'];
            $conn = mysqli_connect('localhost', 'root', 'Cjp@1110', 'wp');
            $delete_record = "DELETE FROM STUDENT WHERE NAME='$name'";
            if(mysqli_query($conn, $delete_record)) {
                echo "Record Deleted successfully.";
            } else {
                echo "Error: " . $delete_record . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }

        if(isset($_POST['del'])){
            delRecord();
            session_unset();
            
            $redirect_url = "http://localhost/P4/1-RegForm";
            header("Refresh: 0; URL=$redirect_url");
        }
        if(isset($_POST['ed'])){
            delRecord();
            $redirect_url = "http://localhost/P4/1-RegForm";
            header("Refresh: 0; URL=$redirect_url");
        }
    ?>
</body>
</html>