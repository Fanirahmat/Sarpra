
              <div class="panel">
								<div class="panel-heading">
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a><br>
								</div>
								<div class="panel-body">
									<table class="dataable table table-striped">
										<thead>
											<tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>NAMA RUANG</th>
                        <th>KODE RUANG</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                    <?php
                              $no=0;
                              foreach ($data_ruang as $dt_rg) {
                                $no++;
                                echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_rg->id_ruang.'</td>
                                <td>'.$dt_rg->nama_ruang.'</td>
                                <td>'.$dt_rg->kode_ruang.'</td>
                                <td>'.$dt_rg->keterangan.'</td>
                                <td>
                                <a href="#update_ruang" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_rg->id_ruang.')">Update</a> 
                                <a href="'.base_url('index.php/Ruang/hapus_ruang/'.$dt_rg->id_ruang).'" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin?\')">Delete</a></td>
            
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
        <h4 class="modal-title" id="myModalLabel">Tambah ruang</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Ruang/simpan_ruang')?>" method="post">
             Nama ruang
             <input type="text" name="nama_ruang" class="form-control"><br>
             kode ruang
             <input type="text" name="kode_ruang" class="form-control"><br>
             keterangan
             <input type="text" name="keterangan" class="form-control"><br>
             <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update_ruang">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update ruang</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Ruang/update_ruang')?>" method="post">
                <input type="hidden" name="id_ruang" id="id_ruang">  
                nama ruang
                <input id="nama_ruang" type="text" name="nama_ruang" class="form-control"><br>
                kode ruang
                <input id="kode_ruang" type="text" name="kode_ruang" class="form-control"><br>
                keterangan
                <input id="keterangan" type="text" name="keterangan" class="form-control"><br>

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
  $.getJSON("<?=base_url()?>index.php/Ruang/get_detail_ruang/"+id_lev,function(data){
    $("#id_ruang").val(data['id_ruang']);
    $("#nama_ruang").val(data['nama_ruang']);
    $("#kode_ruang").val(data['kode_ruang']);
    $("#keterangan").val(data['keterangan']);

  });
}
</script>


    
