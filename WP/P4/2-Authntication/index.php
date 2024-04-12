<?php
  session_start();
  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect('localhost','root','Cjp@1110','wp');

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM USERS WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
    <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #f7f7f7;
          margin: 0;
          padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
        .container {
          background-color: #fff;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          width: 300px;
        }
        .container h3 {
          text-align: center;
          margin-bottom: 20px;
          color: #333;
        }
        .form-group {
          margin-bottom: 15px;
        }
        .label {
          display: block;
          font-weight: bold;
          margin-bottom: 5px;
        }
        .input-field {
          width: 100%;
          padding: 8px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }
        .button {
          width: 100%;
          padding: 10px;
          border: none;
          border-radius: 5px;
          background-color: #007bff;
          color: #fff;
          cursor: pointer;
        }
        .button:hover {
          background-color: #0056b3;
        }
        .error{
          color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Log In</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <div class="form-group">
                <label class="label" for="username">Username</label>
                <input class="input-field" type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label class="label" for="password">Password</label>
                <input class="input-field" type="password" name="password" id="password" required>
            </div>
            <button class="button" type="submit" name='login'>Log In</button>
            <?php if(isset($error)) { ?>
                <div class="error"><?php echo $error; ?></div>
            <?php } ?>
        </form>
    </div>
</body>
</html>