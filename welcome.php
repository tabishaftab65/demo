<!DOCTYPE html>

<?php header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); ?>
<head>
</head>
<body>
<div style="text-align:right">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="submit" name="logout" value="logout">
	</form>
</div>

<?php
echo "<h1><strong>Welcome</strong> user</h1>";
echo "<pre>";
print_r($_POST);
$_SESSION["username"]= $_POST["username"];
print_r($_COOKIE);
print_r($_SESSION);
if(isset($_POST['logout'])){
	session_unset();
setcookie ("PHPSESSID", $_COOKIE['PHPSESSID'], time() - 864000, '/');
/*	if(ini_get("session.use_cookies")){
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params[httponly]
			);
	}
*/	session_destroy();
	header("Location:login.php");
}
?>
</body>
