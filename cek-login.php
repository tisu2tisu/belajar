<?php
	session_start();

		// jika session username belum dibuat, atau session username kosong
			if(!isset($_SESSION['username'])  || empty($_SESSION['username']) )
				{
					// redurect ke halaman login
						header('location:login.php');
				}
?>