			<?php
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('Y-m-d');
			$harga = $_POST['harga'];
			$jumlah = $_POST['jumlah'];
			$harga2 = $harga*$jumlah;
			include "../koneksi.php";
                    $p=isset($_GET['act'])?$_GET['act']:null;
                    switch($p){
                        default:

                            break;
                        case "input":						
   mysql_query("INSERT INTO barangg VALUES ('','$_POST[nama]','$_POST[jumlah]','$date','$_POST[supplier]','$_POST[harga]')");
   mysql_query("INSERT INTO pembelian VALUES ('','$date','$_POST[jumlah]','$_POST[supplier]','$_POST[nama]','$harga2')");
		  header('location:../index.php?p=barang');
	                            break;
                        case "hapus":
mysql_query("DELETE FROM barangg WHERE id='$_GET[id]'");
  header('location:../index.php?p=barang');
	                            break;
                        case "update":
    mysql_query("UPDATE barangg SET stok=stok+$_POST[jumlah],tgl_update='$date' WHERE id='$_POST[id]'");
mysql_query("INSERT INTO pembelian VALUES ('','$date','$_POST[jumlah]','$_POST[supplier]','$_POST[nama]','$harga2')");						 
  header('location:../index.php?p=barang');  
  	                            break;
                        case "pakai":
    mysql_query("UPDATE barangg SET stok=$_POST[stokk],tgl_update='$date' WHERE id='$_POST[id]'");
mysql_query("INSERT INTO pemakaian VALUES ('','$date','$_POST[nama]','$_POST[jumlah]')");						 
  header('location:../index.php?p=barang'); 
	}
                    ?>
      