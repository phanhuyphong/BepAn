<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	if (!empty($_POST["submit"])) {
		$loginquery = "SELECT * FROM staff WHERE username='$username' && password='" . md5($password) . "' && role ='$role'";
		$result = mysqli_query($db, $loginquery);
		$row = mysqli_fetch_array($result);

		if (is_array($row) && $_POST['role'] =='nvpv') {
			$_SESSION["staff_id"] = $row['staff_id'];
			header("refresh:1;url=dashboard.php");
		}
		elseif(is_array($row) && $_POST['role'] == 'nvb') {
			$_SESSION["staff_id"] = $row['staff_id'];
			header("refresh:1;url=dashboard_chef.php");
		}
		else {
			$message = "Invalid Username or Password!";
		}
	}
}

if (isset($_POST['submit1'])) {
	if (
		empty($_POST['cr_user']) ||
		empty($_POST['cr_email']) ||
		empty($_POST['cr_pass']) ||
		empty($_POST['cr_cpass']) ||
		empty($_POST['code'])
	) {
		$message = "ALL fields must be fill";
	} else {


		$check_username = mysqli_query($db, "SELECT username FROM admin where username = '" . $_POST['cr_user'] . "' ");

		$check_email = mysqli_query($db, "SELECT email FROM admin where email = '" . $_POST['cr_email'] . "' ");

		$check_code = mysqli_query($db, "SELECT adm_id FROM admin where code = '" . $_POST['code'] . "' ");


		if ($_POST['cr_pass'] != $_POST['cr_cpass']) {
			$message = "Password not match";
		} elseif (!filter_var($_POST['cr_email'], FILTER_VALIDATE_EMAIL)) // Validate email address
		{
			$message = "Invalid email address please type a valid email!";
		} elseif (mysqli_num_rows($check_username) > 0) {
			$message = 'username Already exists!';
		} elseif (mysqli_num_rows($check_email) > 0) {
			$message = 'Email Already exists!';
		}
		if (mysqli_num_rows($check_code) > 0)           // if code already exist 
		{
			$message = "Unique Code Already Redeem!";
		} else {
			$result = mysqli_query($db, "SELECT id FROM admin_codes WHERE codes =  '" . $_POST['code'] . "'");  //query to select the id of the valid code enter by user! 

			if (mysqli_num_rows($result) == 0)     //if code is not valid
			{
				// row not found, do stuff...
				$message = "invalid code!";
			} else                                 //if code is valid 
			{

				$mql = "INSERT INTO admin (username,password,email,code) VALUES ('" . $_POST['cr_user'] . "','" . md5($_POST['cr_pass']) . "','" . $_POST['cr_email'] . "','" . $_POST['code'] . "')";
				mysqli_query($db, $mql);
				$success = "Admin Added successfully!";
			}
		}
	}
}
?>

<head>
	<meta charset="UTF-8">
	<title>Flat Login Form</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

	<link rel="stylesheet" href="css/login.css">


</head>

<body>


	<div class="container">
		<div class="info">
			<h1>Staffistration </h1>
		</div>
	</div>
	<div class="form">
		<div class="thumbnail" style ="background: #e5e551;"><img src="images/manager.png" /></div>

		<span style="color:red;"><?php echo $message; ?></span>
		<span style="color:green;"><?php echo $success; ?></span>
		<form class="login-form" action="index.php" method="post">
			<input type="text" placeholder="username" name="username" />
			<input type="password" placeholder="password" name="password" />
			<table>
			<tr>
				<td><input type="radio" name="role" value="nvpv">NVPV</td>
				<td><input type="radio" name="role" value="nvb">Bếp</td>
			</tr>
			</table>
			<input type="submit" name="submit" value="login" style="background: #e5e551;"/>
			</p>
		</form>

	</div>

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
	</script>
	<script src='js/index.js'></script>






</body>

</html>