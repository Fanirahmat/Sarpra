<div class="panel">
		<div class="panel-heading">
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a><br>
		</div>
			<div class="panel-body">
			<table class="table table-striped">
			    <thead>
					<tr>
                        <th>NO</th>
                        <th>ID PETUGAS</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>NAMA PETUGAS</th>
                        <th>LEVEL</th>
                        <th>AKSI</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                              $no=0;
                              foreach ($data_petugas as $dt_ptgs) {
                                $no++;
                                echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_ptgs->id_petugas.'</td>
                                <td>'.$dt_ptgs->username.'</td>
                                <td>'.$dt_ptgs->password.'</td>
                                <td>'.$dt_ptgs->nama_petugas.'</td>
                                <td>'.$dt_ptgs->nama_level.'</td>
                                <td>
                                <a href="#update_petugas" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_ptgs->id_petugas.')">Update</a> 
                               </td>
            
                            		</tr>';
                              }
                      ?>

										</tbody>
									</table>
								</div>
							</div>
         </table>
          <?php if($this->session->flashdata('pesan')!=null): ?>
          <div class= "alert alert-danger"><?= $this->session->flashdata('pesan');?></div>
          <?php endif?>                        

                <!-- Modal -->
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah petugas</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Petugas/simpan_petugas')?>" method="post">
             Username
             <input type="text" name="username" class="form-control"><br>
             Password
             <input type="text" name="password" class="form-control"><br>
             Nama petugas
             <input type="text" name="nama_petugas" class="form-control"><br>
             Level
             <select name="id_level" class="form-control">
				<?php
				foreach ($data_level as $lvl) {
					echo "<option value= '".$lvl->id_level."'>
					".$lvl->nama_level."
					</option>";
				}
				 ?>
			 </select><br>
             <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update_petugas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update petugas</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Petugas/update_petugas')?>" method="post">
                <input type="hidden" name="id_petugas" id="id_petugas">  
                Username
                <input type="text" id="username" name="username" class="form-control"><br>
                Password
                <input type="text" id="password" name="password" class="form-control"><br>
                Nama petugas
                <input type="text" id="nama_petugas" name="nama_petugas" class="form-control"><br>
                Level
                <select name="id_level" class="form-control">
                   <?php
                   foreach ($data_level as $lvl) {
                       echo "<option value= '".$lvl->id_level."'>
                       ".$lvl->nama_level."
                       </option>";
                   }
                    ?>
                </select><br>

                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>

function tm_detail(id_lev) {
  $.getJSON("<?=base_url()?>index.php/Petugas/get_detail_petugas/"+id_lev,function(data){
    $("#id_petugas").val(data['id_petugas']);
    $("#username").val(data['username']);
    $("#password").val(data['password']);
    $("#nama_petugas").val(data['nama_petugas']);
    $("#id_level").val(data['id_level']);

  });
}
</script>
