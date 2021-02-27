			<?php
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('Y-m-d');
			$harga = $_POST['berat'];
			$harga2 = $harga*5000;
			include "../koneksi.php";
                    $p=isset($_GET['act'])?$_GET['act']:null;
                    switch($p){
                        default:

                            break;
                        case "input":						
   mysql_query("INSERT INTO jenis  
                            VALUES ('','$_POST[jenis]','$_POST[harga]')");
								   
   header('location:../index.php?p=jenis');
	                            break;
                        case "hapus":
mysql_query("DELETE FROM jenis WHERE id='$_GET[id]'");
  header('location:../index.php?p=barang');
	                            break;
                        case "update":
    mysql_query("UPDATE jenis SET jenis='$_POST[jenis]',harga='$_POST[harga]' WHERE id='$_POST[id]'");
							 
  header('location:../index.php?p=jenis');  
	}
                    ?>
      