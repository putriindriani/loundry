<div class='panel panel-border panel-success'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-user-plus'></i> Tambah Konsumen</h3> 
                                    </div>  <div class='panel-body'> <?php
if(isset($_POST['nama'])){
$nama		= $_POST['nama'];
$telp		= $_POST['telp'];
$alamat		= $_POST['alamat'];
	
	$input = mysql_query("INSERT INTO konsumen VALUES(NULL, '$nama','$alamat', '$telp')") or die(mysql_error());
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>Tambah Konsumen Berhasil!</b></h4>';		//Pesan jika proses tambah sukses
		echo '
		============================<Br>
		<b>Info Konsumen</b><br>
		Nama : <b>'.$nama.'</b><br>
		Alamat : <b>'.$alamat.'</b><br>
		Telp : <b>'.$telp.'</b><br>
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
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Konsumen" required>
                                            </div>
											 <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat Konsumen" required>
                                            </div>
											 <div class="form-group">
                                                <label>Telp</label>
                                                <input type="text" class="form-control" name="telp" placeholder="Masukan No. Telepon Konsumen" required>
                                            </div>
<button type="submit" class="btn btn-success waves-effect waves-light">Tambah</button>
</form>
                                     </div>
									 
          </div>
		 