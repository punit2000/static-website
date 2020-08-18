<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/users.css" />
</head>
<body>
<header>
<?php
require('db.php');
if (isset($_REQUEST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username); 
	$firstname = stripslashes($_REQUEST['firstname']);
	$firstname = mysqli_real_escape_string($con,$firstname); 
	$lastname = stripslashes($_REQUEST['lastname']);
	$lastname = mysqli_real_escape_string($con,$lastname); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, firstname, lastname, email, trn_date)
VALUES ('$username', '".md5($password)."','$firstname','$lastname', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration </h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="text" name="firstname" placeholder="Firstname" required />
<input type="text" name="lastname" placeholder="Last name" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</header>
</body>
</html>
