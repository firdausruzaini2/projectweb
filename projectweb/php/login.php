<?php
session_start();
include_once("../dbconnect.php");
if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim(sha1($_POST['password']));
    $sqllogin = "SELECT * FROM tbl_user1 WHERE email = '$email' AND password = '$password'";

    $select_stmt = $conn->prepare($sqllogin);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    if ($select_stmt->rowCount() > 0) {
        $_SESSION["session_id"] = session_id();
        $_SESSION["email"] = $email;
        $_SESSION["pass"] = $row['password'];
        echo "<script> alert('Login successful')</script>";
        echo "<script> window.location.replace('../php/viewproduct.php')</script>";
    } else {
        session_unset();
        session_destroy();
        echo "<script> alert('Login fail')</script>";
        echo "<script> window.location.replace('../php/login.php')</script>";
    }
}
if (isset($_GET["status"])) {
    if (($_GET["status"] == "logout")) {
        session_unset();
        session_destroy();
        echo "<script> alert('Session Cleared')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/stylelogin.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="register-text">Don't have an account? <a href="../php/register.php">Register Here</a>.</p>
            <p class="register-text">Forget Password? <a href="../php/forgetpassword.php">Click Here</a>.</p>
            <p class="back-text"><a href="../index.php">Home</a></p>
		</form>
	</div>
</div>
</body>
</html>
