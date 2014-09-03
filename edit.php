<?php
	include('config.php');
	include('cek-login.php');
?>
<!DOCTYPE html>
	<html>
		<head>
			<title> belajar CRUD sederhana </title>
		</head>

		<body>
			<h1> FORM INPUT DATA </h1>
				<?php
					$id = $_GET['id'];

					$query = mysql_query("select * from user where user_id='$id'") or die(mysql_error());
					$data = mysql_fetch_array($query);
				?>

				<form name="update_data" action="update.php" method="post">
					<input type="hidden" name="user_id" value="<?php echo $id; ?>" />
					<table border="0" cellpadding="5" cellspacing="0">
				
					<tbody>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td><input type="text" name="username" maxlength="20" required="required" value="<?php echo $data['username']; ?>" disabled />
						</tr>

						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input type="text" name="password" maxlength="20" required="required" value="<?php echo $data['password']; ?>" />
						</tr>

						<tr>
							<td>Fullname</td>
							<td>:</td>
							<td><input type="text" name="fullname" maxlength="100" required="required" value="<?php echo $data['fullname']; ?>" />
						</tr>

						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type="email" name="email" required="required" value="<?php echo $data['email']; ?>" />
						</tr>

						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><input type="text" name="agama" required="required" value="<?php echo $data['agama']; ?>" />
						</tr>

						<tr>
							<td>Nomor HP</td>
							<td>:</td>
							<td><input type="text" name="no_hp" maxlength="14" required="required" value="<?php echo $data['no_hp']; ?>" />
						</tr>

						<tr>
							<td align="right" colspan="3"><input type="submit" name="submit" value="Simpan"/></td>
						</tr>
					</table>
				</form>
				<a href="view.php">Lihat Data </a>
			</body>
		</html>