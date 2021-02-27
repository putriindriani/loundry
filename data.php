<div class='panel panel-border panel-success'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-user'></i> Data Konsumen</h3> 
                                    </div>  <div class='panel-body'> 
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
											<th><i class='icon-terminal'></i> No</th>
										<th><i class='icon-terminal'></i> Nama</th>
											<th><i class='icon-signal'></i> Alamat</th>
											<th><i class='icon-signal'></i> Telp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
							$i=1;
							$tp=mysql_query("SELECT * FROM konsumen ORDER BY id ");
							while($r=mysql_fetch_array($tp)){
							?>
							<tr> <td><?php echo $i;?></td>
                                    <td><?php echo $r['nama'];?></td>
									<td><?php echo$r['alamat'];?></td>
									<td><?php echo$r['telp'];?></td>
                                    
							</tr>
							<?php $i=$i+1;?>
							<?php } ?>
							</tbody>
                        </table>
                                     </div><!-- /.box-body -->
          </div><!-- /.box -->   