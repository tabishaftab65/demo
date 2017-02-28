<!DOCTYPE HTML>

<?php
	include ($_SERVER['DOCUMENT_ROOT'].'/demo/classes/db.class.php');
	session_start();
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
?>

<head>
	<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
	<title>Login Form</title>
</head>
<body style="background-color: #ffeb3b">
	<div id = "form">
		<h1>Welcome</h1>
		<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
			username: <input type = "text" name = "username"></br>
			password: <input type = "password" name = "password"></br>
			<input type = "submit" name = "login" value = "login"></br>
		</form>
	</div>
<?php

/*Check whether the form is submitted */ 

if(isset($_POST['login'])){
	$username = $_POST['username']; 
	$password = $_POST['password'];
	$query = "select username, password from user where username = '".$username."' and password = '".$password."'";
	$connect = new Database();                                                            //connecting to database.
	$result = $connect->getConnected()->query($query);
	$connect->close();                                                                    //closing the connection.

	/*Validating a user*/
	
	if($result->num_rows == 1){
		header("Location:welcome.php");
		echo "Hello User";
	}
	else{
		echo "Wrong Credentials";
	}                                                  
}
else{
	echo "Please enter the credentials";
}
?>
</body>
