<div class='panel panel-border panel-success'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-user'></i> Data Karyawan</h3> 
                                    </div>  <div class='panel-body'> 
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
										<th><i class='icon-terminal'></i> NIK</th>
                                            <th><i class='icon-terminal'></i> Nama</th>
                                            <th><i class='icon-time'></i> Username</th>
											<th><i class='icon-signal'></i> Alamat</th>
											<th><i class='icon-signal'></i> Telp</th>
											<th><i class='icon-signal'></i> Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
							$i=1;
							$tp=mysql_query("SELECT * FROM pengguna WHERE level='Karyawan' ORDER BY id ");
							while($r=mysql_fetch_array($tp)){
							?>
							<tr>
							 <td><?php echo $r['nik'];?></td>
                                    <td><?php echo $r['nama'];?></td>
									<td><?php echo$r['username'];?></td>
									<td><?php echo$r['alamat'];?></td>
									<td><?php echo$r['telp'];?></td>
									<td><?php echo$r['gender'];?></td>
                                    
							</tr>
							<?php $i=$i+1;?>
							<?php } ?>
							</tbody>
                        </table>
                                     </div><!-- /.box-body -->
          </div><!-- /.box -->   