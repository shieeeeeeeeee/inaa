<?php
session_start(); 
    
if( ! isset($_SESSION['username']) || $_SESSION['role'] != 1)
{
	header("Location: login.php");
}

include 'config.php';

if(isset($_POST['register']))
{
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$role = $_POST['role'];

	$options = [
		'cost' => 12
	];

	$hash = password_hash($password, PASSWORD_BCRYPT, $options);

	$sql = "INSERT INTO user (username, password, role) VALUES ('{$username}', '{$hash}', {$role})";

	if(mysqli_query($conn, $sql))
	{
		echo "User $username added successfully.";
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
</head>
<body>
	<div class="form-container">
		<form action="add_user.php" method="post" oninput="password2.setCustomValidity(password2.value != password.value ? 'Passwords do not match.' : '')">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" id="username"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" id="password"></td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td><input type="password" name="password2" id="password2"></td>
				</tr>
				<tr>
					<td>Role:</td>
					<td>
						<select id="userType" name="role">
							<option value="1">Admin</option>
							<option value="2">Event Coordinator</option>
							<option value="3">Tech Committee Chair</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><button type="submit" class="btn" name="register">Add User</button></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>