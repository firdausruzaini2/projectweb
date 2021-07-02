<?php
include_once("../dbconnect.php");
if (isset($_POST['submit'])) {
    if (!(isset($_POST["name"]) || isset($_POST["email"]) || isset($_POST["phone"]) || isset($_POST["passworda"]) || isset($_POST["passwordb"]))) {
        echo "<script>alert('Please fill in all required information')</script>";
        echo "<script>window.location.replace('../php/register.php')</script>";
    } else {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $passa = $_POST["passworda"];
            $passb = $_POST["passwordb"];
            $shapass = sha1($passa);
            $otp = rand(1000, 9999);
            $sqlregister = "INSERT INTO tbl_user1(name,email,phone,password,otp) VALUES ('$name','$email','$phone','$shapass','$otp')";
            try {
                $conn->exec($sqlregister);
                echo "<script>alert('Registration successful')</script>";
                echo "<script>window.location.replace('../php/login.php')</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Registration failed')</script>";
                echo "<script>window.location.replace('../php/register.php')</script>";
            }
        } 
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/styleregister.css">

	<title>Register Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="name" name="name" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
            <div class="input-group">
				<input type="tel" placeholder="Phone" name="phone" required>
            </div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="passworda" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="passwordb" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="../php/login.php">Login Here</a>.</p>
            <p class="back-text"><a href="../index.php">Home</a></p>
		</form>
	</div>
</body>
</html>