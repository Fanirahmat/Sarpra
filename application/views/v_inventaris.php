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
                        <th>NAMA</th>
                        <th>KONDISI</th>
                        <th>KETERANGAN</th>
                        <th>JUMLAH</th>
                        <th>ID JENIS</th>
                        <th>TANGGAL REGISTER</th>
                        <th>ID RUANG</th>
                        <th>KODE INV</th>
                        <th>ID PETUGAS</th>
                        <th>AKSI</th>
						</tr>
					</thead>
				<tbody>
                    <?php
                    $no=0;
                    foreach ($data_inventaris as $dt_inv) {
                      $no++;
                      echo '<tr>
                      <td>'.$no.'</td>
                      <td>'.$dt_inv->id_inventaris.'</td>
                      <td>'.$dt_inv->nama.'</td>
                      <td>'.$dt_inv->kondisi.'</td>
                      <td>'.$dt_inv->keterangan.'</td>
                      <td>'.$dt_inv->jumlah.'</td>
                      <td>'.$dt_inv->id_jenis.'</td>
                      <td>'.$dt_inv->tanggal_register.'</td>
                      <td>'.$dt_inv->id_ruang.'</td>
                      <td>'.$dt_inv->kode_inventaris.'</td>
                      <td>'.$dt_inv->id_petugas.'</td>
                      <td>
                      <a href="#update_inventaris" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_inv->id_inventaris.')">Update</a> 
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
        <h4 class="modal-title" id="myModalLabel">Tambah inventaris</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Inventaris/simpan_inventaris')?>" method="post">
        Nama
        <input type="text"  name="nama" class="form-control"><br>
        kondisi
        <input type="text"  name="kondisi" class="form-control"><br>
        keterangan
        <input type="text"  name="keterangan" class="form-control"><br>
        Jumlah
        <input type="text"  name="jumlah" class="form-control"><br>
        Id Jenis
        <select name="id_jenis" class="form-control">
                   <?php
                   foreach ($data_jenis as $jns) {
                       echo "<option value= '".$jns->id_jenis."'>
                       ".$jns->nama_jenis."
                       </option>";
                   }
                    ?>
                </select><br>
        Tanggal Register
        <input type="text"  name="tanggal_register" class="form-control"><br>
        Id Ruang
        <select name="id_ruang" class="form-control">
                   <?php
                   foreach ($data_ruang as $rg) {
                       echo "<option value= '".$rg->id_ruang."'>
                       ".$rg->nama_ruang."
                       </option>";
                   }
                    ?>
                </select><br>
        Kode Inventaris
        <input type="text"  name="kode_inventaris" class="form-control"><br>
        Id Petugas
        <select name="id_petugas" class="form-control">
                   <?php
                   foreach ($data_petugas as $ptgs) {
                       echo "<option value= '".$ptgs->id_petugas."'>
                       ".$ptgs->nama_petugas."
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

<div class="modal fade" id="update_inventaris">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update inventaris</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Inventaris/update_inventaris')?>" method="post">
        <input type="hidden" name="id_inventaris" id="id_inventaris"><br>
        Nama
        <input type="text" id="nama" name="nama" class="form-control"><br>
        kondisi
        <input type="text" id="kondisi" name="kondisi" class="form-control"><br>
        keterangan
        <input type="text" id="keterangan" name="keterangan" class="form-control"><br>
        Jumlah
        <input type="text" id="jumlah" name="jumlah" class="form-control"><br>
        Id Jenis
        <select name="id_jenis" class="form-control">
                   <?php
                   foreach ($data_jenis as $jns) {
                       echo "<option value= '".$jns->id_jenis."'>
                       ".$jns->nama_jenis."
                       </option>";
                   }
                    ?>
                </select><br>
        Tanggal Register
        <input type="text" id="tanggal_register" name="tanggal_register" class="form-control"><br>
        Id Ruang
        <select name="id_ruang" class="form-control">
                   <?php
                   foreach ($data_ruang as $rg) {
                       echo "<option value= '".$rg->id_ruang."'>
                       ".$rg->nama_ruang."
                       </option>";
                   }
                    ?>
                </select><br>
        Kode Inventaris
        <input type="text" id="kode_inventaris" name="kode_inventaris" class="form-control"><br>
        Id Petugas
        <select name="id_petugas" class="form-control">
                   <?php
                   foreach ($data_petugas as $ptgs) {
                       echo "<option value= '".$ptgs->id_petugas."'>
                       ".$ptgs->nama_petugas."
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
  $.getJSON("<?=base_url()?>index.php/Inventaris/get_detail_inventaris/"+id_lev,function(data){
    $("#id_inventaris").val(data['id_inventaris']);
    $("#nama").val(data['nama']);
    $("#kondisi").val(data['kondisi']);
    $("#keterangan").val(data['keterangan']);
    $("#jumlah").val(data['jumlah']);
    $("#id_jenis").val(data['id_jenis']);
    $("#tanggal_register").val(data['tanggal_register']);
    $("#id_ruang").val(data['id_ruang']);
    $("#kode_inventaris").val(data['kode_inventaris']);
    $("#id_petugas").val(data['id_petugas']);

  });
}
</script>
