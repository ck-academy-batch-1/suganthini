<!DOCTYPE HTML>  
<html>
<head>
<style>
  h2{font-size:25px;
    font-weight: bold;
    text-align:center;
  }
.error {color: #ff0000;}

body{
  background-color:#00ffff;
  font-weight:bold;
}
form{
  font-size:large;
  padding:30px;
  border-color:black;
}

input{
  font-style: normal;
  font-size:14px;
  border-radius:8px;
}
input[type="checkbox"], input[type="radio"]{
  height:16px;
  weight:16px;
}

</style>
</head>
<body style="background-image:url(http://www.justinmaller.com/img/projects/thumbnail/THUMB__h13g.jpg); background-size: cover; background-repeat:no-repeat;">  

<?php
// define variables and set to empty values
$nameErr = $fnameErr = $mnameErr = $mobileErr = $emailErr = $genderErr = $addressErr = $bloodErr = $standErr= $courseErr = $photoErr = "";
$name = $fname = $mname = $mobile = $email = $gender = $address = $blood = $stand= $course = $photo = "";

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
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["mname"])) {
    $mnameErr = "Name is required";
  } else {
    $mname = test_input($_POST["mname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$mname)) {
      $mnameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["mobile"])) {
    $mobileErr = "contact is required";
  } else {
    $mobile = test_input($_POST["mobile"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$mobile)) {
      $mobileErr = "Only letters and white space allowed";
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

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["blood"])) {
    $bloodErr = "Please select the option";
  } else {
    $blood = test_input($_POST["blood"]);
  }

  if (empty($_POST["stand"])) {
    $standErr = "please select the field";
  } else {
    $stand = test_input($_POST["stand"]);
  }

  if (empty($_POST["course"])) {
    $courseErr = "select the course";
  } else {
    $course = test_input($_POST["course"]);
  }

  if (empty($_POST["photo"])) {
    $photoErr = "choose the file";
  } else {
    $photo = test_input($_POST["photo"]);
  }  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr>  
<td>Name:</td> <td><input type="text" name="name" placeholder="Enter Full name">
<span class="error">* <?php echo $nameErr;?></span>
</td></tr>
<tr>
<td>Father's Name:</td> <td><input type="text" name="fname">
<span class="error">* <?php echo $fnameErr;?></span>
</td></tr>
<tr>
<td>Mother's Name:</td> <td><input type="text" name="mname">
<span class="error">* <?php echo $mnameErr;?></span>
</td></tr>
<tr>
<td>Phone Number:</td> <td><input type="number" name="mobile" placeholder="017xxxxxxxx">
<span class="error">* <?php echo $mobileErr;?></span>
</td></tr>
<tr>
<td>E-mail:</td> <td><input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
</td></tr>
<tr>
<td>Gender:</td>
<td><input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other
<span class="error">* <?php echo $genderErr;?></span>
</td></tr>
<tr>
<td>Address:</td> <td><textarea name="address" rows="3" cols="25" ></textarea>
</td></tr>
<tr>
<td>Blood Group:</td>
  <td><select name="blood">
  <option value=""> 
  <option value="A+">A+
  <option value="B+">B+
  <option value="O+">O+
  <option value="O-">O-
  <option value="A1+">A1+
  <option value="A1-">A1-     
  <span class="error">* <?php echo $bloodErr;?></span>
</td></tr>
<tr> 
<td>Department:</td>
<td><input type="radio" name="stand" value="CSE">CSE
<input type="radio" name="stand" value="EEC">EEC
<input type="radio" name="stand" value="BBA">BBA
<span class="error">* <?php echo $standErr;?></span>
</td></tr>
<tr>
<td>Course:</td>
  <td><input type="checkbox" name="course" value="C">C
  <input type="checkbox" name="course" value="C++">C++
  <input type="checkbox" name="course" value="Java">Java
  <input type="checkbox" name="course" value="AI">AI
  <input type="checkbox" name="course" value="Machine Learning">Machine Learning
  <input type="checkbox" name="course" value="Robotics">Robotics
  <span class="error">* <?php echo $courseErr;?></span>
</td></tr>
<tr>
<td>Photo:</td>
  <td><input type="file" name="photo">
  <span class="error">* <?php echo $photoErr;?></span>
</td></tr>
<tr>
<td><input type="submit" name="submit" value="Submit"></td> 
<td><input type="reset" name="reset" value="Reset"></td>
</tr>
</table> 
</form>

<?php
echo "<h3>Your Input:</h3>";
echo $name;
echo "<br>";
echo $fname;
echo "<br>";
echo $mname;
echo "<br>";
echo $mobile;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $address;
echo "<br>";
echo $blood;
echo "<br>";
echo $stand;
echo "<br>";
echo $course;
echo "<br>";
echo $photo;
echo "<br>";

?>

</body>
</html>