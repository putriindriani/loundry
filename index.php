<div class='panel panel-border panel-success'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-user-plus'></i> Buat Transaksi</h3> 
</div>  <div class='panel-body'> 
<?php
if(isset($_POST['jenis'])){
$jeniss	= $_POST['jenis'];
$query = mysql_query("SELECT * FROM jenis WHERE jenis = '$jeniss'");
$hasil = mysql_fetch_array($query);
$harga= $hasil['harga'];
$berat		= $_POST['berat'];
$konsumen		= $_POST['konsumen'];
if ($berat>10){
$tarif = $berat*$harga*90/100;
}else{
$tarif = $berat*$harga;
}
$tgl_ambil		= $_POST['tgl_ambil'];
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$tgl_transaksi=date('Y-m-d');

	
	$input = mysql_query("INSERT INTO transaksi VALUES(NULL, '$jeniss','$tarif', '0', '$tgl_transaksi', '$tgl_ambil', '$berat','$usr','$konsumen')") or die(mysql_error());
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>
Transaksi Berhasil!</b></h4>';		
		echo '
		<b>Rincian Transaksi</b><br>
		============================<Br>
		Konsumen : <b>'.$konsumen.'</b><br>
		Jenis Laundry : <b>'.$jeniss.'</b><br>
		Berat : <b>'.$berat.' Kg</b><br>
		Tarif : <b>Rp. ' . number_format( $tarif, 0 , '' , '.' ) . ',-</b><br>
		Tanggal Transaksi : <b>'.TanggalIndo($tgl_transaksi).'</b><br>
		Tanggal Ambil : <b>'.TanggalIndo($tgl_ambil).'</b><br>
		============================
		</div>
		
		';	
		
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="tambah.php">Kembali</a>';	
		
	}
  }
?>
									<form method="post">
																 <div class="form-group">
                                                <label>Konsumen</label>
                                                <select  class="form-control" name="konsumen">
												<?php
							$tp=mysql_query("SELECT * FROM konsumen ORDER BY id");
							while($r=mysql_fetch_array($tp)){
							?>
							<option value="<?php echo $r['nama'];?>"><?php echo $r['nama'];?></option>
							<?php } ?>
							</select>
							 </div>
																		 <div class="form-group">
                                                <label>Jenis</label>
                                                  <select  class="form-control" name="jenis">
												<?php
							$tp2=mysql_query("SELECT * FROM jenis ORDER BY id");
							while($r2=mysql_fetch_array($tp2)){
							?>
							<option value="<?php echo $r2['jenis'];?>"><?php echo $r2['jenis'];?></option>
							<?php } ?>
							</select>
											   </div>
									 <div class="form-group">
                                                <label>Berat (Dalam Kilogram)</label>
                                                <input type="number" class="form-control" name="berat" placeholder="Masukan Berat Pakaian" required>
                                            </div>
											 <div class="form-group">
                                                <label>Tanggal Ambil</label>
                                                <input type="date" class="form-control" name="tgl_ambil" required>
                                            </div>
											<pre>
*Setiap transaksi lebih dari 10kg akan mendapatkan potongan harga 10%</pre>
<button type="submit" class="btn btn-success waves-effect waves-light">Buat Transaksi</button>
</form>
                                     </div>
									 
          </div>
		 