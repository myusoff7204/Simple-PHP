
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('DB.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['id'])){
        // removes backslashes
	$id = stripslashes($_REQUEST['id']);
        //escapes special characters in a string
	$id = mysqli_real_escape_string($con,$id); 
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['username']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "INSERT into `user` (id, username, password)
VALUES ('$username', '$username','".md5($password)."')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="id" name="id" placeholder="id" required />
<input type="username" name="username" placeholder="username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>