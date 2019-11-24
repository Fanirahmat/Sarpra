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
                        <th>NAMA JENIS</th>
                        <th>KODE JENIS</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                    <?php
                    $no=0;
                    foreach ($data_jenis as $dt_jns) {
                      $no++;
                      echo '<tr>
                      <td>'.$no.'</td>
                      <td>'.$dt_jns->id_jenis.'</td>
                      <td>'.$dt_jns->nama_jenis.'</td>
                      <td>'.$dt_jns->kode_jenis.'</td>
                      <td>'.$dt_jns->keterangan.'</td>
                      <td>
                      <a href="#update_jenis" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_jns->id_jenis.')">Update</a> 
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
        <h4 class="modal-title" id="myModalLabel">Tambah jenis</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Jenis/simpan_jenis')?>" method="post">
             Nama jenis
             <input type="text" name="nama_jenis" class="form-control"><br>
             kode jenis
             <input type="text" name="kode_jenis" class="form-control"><br>
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

<div class="modal fade" id="update_jenis">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update jenis</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Jenis/update_jenis')?>" method="post">
                <input type="hidden" name="id_jenis" id="id_jenis">  
                nama jenis
                <input id="nama_jenis" type="text" name="nama_jenis" class="form-control"><br>
                kode jenis
                <input id="kode_jenis" type="text" name="kode_jenis" class="form-control"><br>
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
  $.getJSON("<?=base_url()?>index.php/Jenis/get_detail_jenis/"+id_lev,function(data){
    $("#id_jenis").val(data['id_jenis']);
    $("#nama_jenis").val(data['nama_jenis']);
    $("#kode_jenis").val(data['kode_jenis']);
    $("#keterangan").val(data['keterangan']);

  });
}
</script>
