<?php
	// host yang di gunakan
		$host = 'localhost';

	// username untuk login ke localhost
		$user = 'root';

	// jika menggunakan pc sendiri sebagai host
	// secara default password akan di kosongkan
		$passwd = '0210Sura';

	// isikan nama database sesuai database
		$dbname = 'belajar';

	// menghubung ke host
		$connect = mysql_connect($host, $user, $passwd) or die(mysql_error());

	// memilih database yang akan di gunakan
		$dbselect = mysql_select_db($dbname);
?>