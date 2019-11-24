            <div class="panel">
								<div class="panel-heading">
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a><br>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>NAMA LEVEL</th>
                        <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                    <?php
                              $no=0;
                              foreach ($data_level as $dt_lvl) {
                                $no++;
                                echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_lvl->id_level.'</td>
                                <td>'.$dt_lvl->nama_level.'</td>
                                <td>
                                <a href="#update_level" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_lvl->id_level.')">Update</a> 
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
        <h4 class="modal-title" id="myModalLabel">Tambah Level</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Level/simpan_level')?>" method="post">
             Nama Level
             <input type="text" name="nama_level" class="form-control"><br>
             <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update_level">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Level</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Level/update_level')?>" method="post">
                <input type="hidden" name="id_level" id="id_level">  
                nama level
                <input id="nama_level" type="text" name="nama_level" class="form-control"><br>

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
  $.getJSON("<?=base_url()?>index.php/Level/get_detail_level/"+id_lev,function(data){
    $("#id_level").val(data['id_level']);
    $("#nama_level").val(data['nama_level']);

  });
}
</script>
