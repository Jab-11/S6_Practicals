<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>P1_4_Registration Form</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: lightblue;
            text-align: center;
        }
        form{
            background-color: rgb(226, 225, 225);
            margin: 10px auto;
            width: max-content;
            padding: 1.5em;
            border: 1px solid #ccc;
            border-radius: 1em;
        }
        form h2{
            text-align: center;
            margin-bottom: 0.8em;
            font-weight: 100;
        }
        form ul{
            list-style: none;
        }
        form ul li{
            margin-bottom: 1em;
            display: flex;
            align-items: flex-start;
        }
        label {
            display: inline-block;
            width: 150px;
            text-align: left;
        }
        .flabel{
          width: fit-content;
        }
        input[type=radio], input[type=checkbox]{
            margin: 5px;
        }
        button{
            align-self: center;
            padding: 0.5em 1em;
            margin: 0.5em auto;
            border-radius: 1em;
        }        
    </style>
</head>
<body>
    <form action="process_form.php" method="post">
      <h2>Registration Form</h2>
        <ul>
          <li>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>"/>
          </li>
          <li>
            <label for="dob">Date Of Birth:</label>
            <input type="date" name="dob" id="dob" value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : ''; ?>">
          </li>
          <li>
            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == 'male' ? 'checked' : ''; ?>>
            <label class="flabel" for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female' ? 'checked' : ''; ?>>
            <label class="flabel" for="female">Female</label>
          </li>
          <li>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"> 
          </li>
          <li>
            <label for="mobile">Mobile No.:</label>
            <input type="number" name="mobile" id="mobile" value="<?php echo isset($_SESSION['mobile']) ? $_SESSION['mobile'] : ''; ?>">
          </li>
          <li>
            <label for="address">Address:</label>
            <textarea name="address" id="address" cols="30" rows="10"><?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?></textarea>
          </li>
          <li>
            <label for="state">State:</label>
            <select id="state" name="state">
                <option value="" disabled>Select State</option>
                <?php
                $states = array("Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jharkhand", "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", "Uttarakhand", "West Bengal");
                foreach ($states as $state) {
                    $selected = isset($_SESSION['state']) && $_SESSION['state'] === $state ? 'selected' : '';
                    echo "<option value='$state' $selected>$state</option>";
                }
                ?>
            </select>
          </li>
          <li>
              <label>Education:</label><br>
              <?php
              $education_values = ["upto 10th", "upto 12th", "U. G.", "P. G.", "Ph. D."];
              $session_education = [];

              if (isset($_SESSION['education'])) {
                  $session_education = is_array($_SESSION['education']) ? $_SESSION['education'] : explode(", ", $_SESSION['education']);
              }
              foreach ($education_values as $value) {
                  if (is_array($session_education)) {
                      $checked = in_array($value, $session_education) ? 'checked' : '';
                  } else {
                      $checked = '';
                  }
                  echo "<input type='checkbox' name='education[]' id='ed$value' value='$value' $checked>";
                  echo "<label class='flabel' for='ed$value'>$value</label>";
              }
              ?>
          </li>
          <li>
            <button type="submit" name='submit'>Submit</button>
          </li>
        </ul>
      </form>
</body>
</html>