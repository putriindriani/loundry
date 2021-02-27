<?php
$server="localhost"; //Nama server default xampp tersebut biasanya localhost
$konek="root"; //Nama root ini biasanya default dari xampp tersebut
$password=""; //Isikan password jika diminta password pada halam awal ke localshost/phpmyadmin kalau tidak ada biarkan saja
$db="loundry"; //Sesuaikan dengan nama database yang anda sudah buat
 
$konek = mysql_connect($server,$konek,$password) or die (mysql_error());
$database = mysql_select_db($db);
date_default_timezone_set("Asia/Jakarta");
 ?>