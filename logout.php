<?php
	//lanjutkan session yang sudah di buat
		session_start();


	// hapus session yang sudah di buat
		session_destroy();

	//redirect ke halaman login
		header('location:login.php');
?>