<?php
  $conn = mysqli_connect("localhost","root","") or die("Unable to connect");
  mysqli_select_db($conn,"myshop");

if(isset($_POST['submit'])){

$email = trim($_POST['email']);
$password = trim(sha1($_POST['password']));
if(mysqli_query($conn,"UPDATE tbl_user1 SET password='$password' WHERE email='$email'")){

?>
<?php
 echo '<script type="text/javascript"> alert("Password Update Successfully")</script>';
 echo "<script> window.location.replace('../php/login.php')</script>";
 ?>
 <?php
}else{
echo 'no result';
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/stylelogin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="validator.js"></script>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Reset Password</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="New Password" name="password" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
            <p class="back-text"><a href="../index.php">Home</a></p>
            <p class="back-text"><a href="../php/login.php">Back</a></p>
		</form>
	</div>
</div>
</body>
</html>