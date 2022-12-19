<link rel="stylesheet" href="style1.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <title>Servis laptop</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link
      href="https://getbootstrap.com/docs/5.2/assets/css/docs.css"
      rel="stylesheet"
    />

<?php 
//sambungan ke pangkalan data
include "config.php";
//sambung fail header
include "header.php";
//mulakan sesi login untuk kekalkan login
?>

<html>
<body>  
<?php
// define variables and set to empty values
$nameErr = $emailErr = $rateErr = "";
$name = $email = $rate = $feedback = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["feedback"])) {
    $feedback = "";
  } else {
    $feedback = test_input($_POST["feedback"]);
  }

  if (empty($_POST["rate"])) {
    $rateErr = "rate is required";
  } else {
    $rate = test_input($_POST["rate"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<p><span class="error" style="color: red;">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <!-- <span class="error">* <?php echo $nameErr;?></span> -->
  <br><br>
  E-mail: <input type="text" name="email">
  <!-- <span class="error">* <?php echo $emailErr;?></span> -->
  <br><br>
 
  feedback: <textarea name="feedback" rows="5" cols="40"></textarea>
  <br><br>
  rate:
  <input type="radio" name="rate" value="good">good
  <input type="radio" name="rate" value="bad">bad
  <input type="radio" name="rate" value="other">Other
  <span class="error">* <?php echo $rateErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<!-- <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $feedback;
echo "<br>";
echo $rate;
?> -->

</body>
</html>