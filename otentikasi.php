<?php
	include('config.php');
	session_start();

		// tangkap data dari form login
			$username = $_POST['username'];
			$password = $_POST['password'];

		// untuk mencegah sql injection
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);

		// cek data yang dikirim, apakah kosong atau tidak
			if(empty($username && $password))
				{
					// jika username dan password kosong
						header('localtion:login.php?error=1');
						break;
				} else if(empty($username))
					{
						// jika username saja yang kosong
							header('location:login.php?error=2');
							break;
					} else if(empty($password))
						{
							// jika password saja yang kosong
								header('location:login?error=3');
								break;
						}
				$query = mysql_query("select * from user where username='$username' and password='$password'");
				$data = mysql_fetch_array($query);
				if(mysql_num_rows($query) == 0 )
					{
						// jika username dan password tidak terdaftar di database
						header('location:login.php?error=4');
					}
				if($username == $data['username'] && $password == $data['password'])
					{
						// jika username dan password benar yang ada di database
						// buat session dengan nama username dengan isi nama user yang login
						$_SESSION['role'] = $data['role'];
						$_SESSION['username'] = $username;
						header('location:index.php');
					}

?>