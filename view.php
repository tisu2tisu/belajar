<?php
	include('config.php');
	include('cek-login.php');
?>

	<!DOCTYPE html>
		<html>
			<head>
				<title> Belajar sistem crud </title>
			</head>

			<body>
				<?php
					echo $_SESSION['role'];
					echo $_SESSION['username'];
				?>
				<h1> Data user </h1>
					<?php
						if(!empty($_GET['message']) && $_GET['message'] == 'success')
								{
									echo '<h3>Berhasil Meng-update data</h3>';
								}

						if(!empty($_GET['message']) && $_GET['message'] == 'deleted')
							{
								echo '<h3> Data berhasil di hapus </h3>';
							}
					?>
					<a href="index.php">+ tambah data</a>
						<table border="1" cellpadding="5" cellspacing="0">
							<thead>
								<tr>
									<td>No.</td>
									<td>Username</td>
									<td>Password</td>
									<td>Email</td>
									<td>Fullname</td>
									<td>Agama</td>
									<td>No HP </td>
									<td>Opsi </td>
								</tr>
							</thead>

							<tbody>
								<?php
									$no = 1;
									$query = mysql_query("select * from user");

										// jika user mempunyai role administrator maka
											if($_SESSION['role'] == 'Administrator')
												{
													while($data = mysql_fetch_array($query))
														{
								?>
															<tr>
																<td><?php echo $no ?></td>
																<td><?php echo $data['username'] ?> </td>
																<td><?php echo $data['password'] ?> </td>
																<td><?php echo $data['email'] ?> </td>
																<td><?php echo $data['fullname'] ?></td>
																<td><?php echo $data['agama'] ?></td>
																<td><?php echo $data['no_hp'] ?></td>
																<td><a href="edit.php?id=<?php echo $data['user_id'] ?>">Edit</a> || <a href="delete.php?id=<?php echo $data['user_id'] ?>">Delete</a></td>
														<?php
																$no++;
														}
												}
												else if($_SESSION['role'] == 'Moderator')
														{
															while($data = mysql_fetch_array($query))
																{
														?>
																	<tr>
																		<td><?php echo $no ?></td>
																		<td><?php echo $data['username'] ?></td>
																		<td><?php echo $data['password'] ?></td>
																		<td><?php echo $data['email'] ?></td>
																		<td><?php echo $data['fullname'] ?></td>
																		<td><?php echo $data['agama'] ?></td>
																		<td><?php echo $data['no_hp'] ?></td>
																		<td><a href="edit.php?id=<?php echo $data['user_id']?>">Edit</a> || Delete</td>
																	</tr>
														<?php
																$no++;
																}
														}
														else if($_SESSION['role'] == 'Member')
																{
																	while($data = mysql_fetch_array($query))
																		{
														?>
																			<tr>
																				<td><?php echo $no ?></td>
																				<td><?php echo $data['username'] ?></td>
																				<td>******</td>
																				<td>******</td>
																				<td><?php echo $data['fullname'] ?></td>
																				<td><?php echo $data['agama'] ?></td>
																				<td><?php echo $data['no_hp'] ?></td>
																				<td>    </td>
																			</tr>
														<?php 
																$no++;
																		}
																}	
														?>

							</tbody>
						</table>
					</body>
				</html>
