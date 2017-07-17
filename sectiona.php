<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END

<form action="sectiona.php" method="post" enctype=”multipart/form-data”><br>
First Name <input type="text" name="fname"><br>
Last Name <input type="text" name="lname"><br>
User Type<select name="usertype">
<option value="0">User</option>
<option value="1">Admin</option>
</select><br>
Email <input type="text" name="email"><br>
Password <input type="text" name="password"><br>
<input type="submit" value="Submit">
</form>
_END;

if(isset($_POST['fname']) &&
	isset($_POST['lname']) &&
	isset($_POST['usertype']) &&
	isset($_POST['email']) &&
	isset($_POST['password'])
	){
	
	extract($_POST);
	
	$query = "INSERT INTO user_profiles (`fname`, `lname`, `usercode`, `email`, `password`) VALUES ('$fname', '$lname', '$usertype', '$email', '$password')"; 

	/*$query    = "INSERT INTO user_profiles VALUES" .
      "('$fname', '$lname', '$usertype', '$email', '$password')";*/
    $result   = $conn->query($query);
	
  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
}
?>