<?php
  // var_dump($data_peminjaman);die;
?>
<link href="<?=base_url()?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<div class="panel">
	<div class="panel-heading">
		<a href="#tambah" class="btn btn-primary" data-toggle="modal">
			<span class="glyphicon glyphicon-plus"></span>Tambah</a>
		<br>
	</div>
	<div class="panel-body">
		<h4>
			<i class="glyphicon glyphicon-save"></i><table class="table table-striped apik"></h4>
	</div>
	<div class="panel-body">
		
			<thead>
				<tr>
					<th>NO</th>
					<th>ID PEMINJAMAN</th>
					<th>NAMA BARANG</th>
					<th>TANGGAL PINJAM</th>
					<th>TANGGAL KEMBALI</th>
					<th>STATUS PEMINJAMAN</th>
					<th>ID PEGAWAI</th>
          <th>JUMLAH YANG DIPINJAM</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php foreach ($data_peminjaman as $dt_pmnjmn ) : ?>
				<tr>
					<td>
						<?= $no ?>
					</td>
					<td>
						<?= $dt_pmnjmn->id_peminjaman ?>
					</td>
					<td>
						<?= $dt_pmnjmn->nama ?>
					</td>
					<td>
						<?= $dt_pmnjmn->tanggal_pinjam ?>
					</td>
					<td>
						<?= $dt_pmnjmn->tanggal_kembali ?>
					</td>
					<td>
						<?= $dt_pmnjmn->status_peminjaman ?>
					</td>
					<td>
						<?= $dt_pmnjmn->id_pegawai ?>
					</td>
          <td>
						<?= $dt_pmnjmn->jumlah_pinjam ?>
					</td>
					<td>

            <?php if ($dt_pmnjmn->jumlah_pinjam != 0 ) : ?>
              <a href="<?= base_url('index.php/Peminjaman/kembali/') . $dt_pmnjmn->id_peminjaman ?>" class="btn btn-success">Dikembalikan</a>
            <?php endif; ?>
						
            <a class="btn btn-danger" data-toggle="modal"
						onclick="if (confirm('Apakah anda yakin ?')) window.location.href='<?= 
            base_url('index.php/Peminjaman/hapus_peminjaman/' . $dt_pmnjmn->id_peminjaman );
             ?>'">Delete</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</table>
<?php if($this->session->flashdata('pesan')!=null): ?>
<div class="alert alert-danger">
	<?= $this->session->flashdata('pesan');?>
</div>
<?php endif?>

<!-- Modal -->
<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah peminjaman</h4>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('index.php/Peminjaman/simpan_peminjaman')?>" method="post">
					Nama Barang
					<select name="id_inventaris" class="form-control">
            <?php foreach ($data_inventaris as $inv ) : ?>
              <option value="<?= $inv->id_inventaris ?>"><?= $inv->nama ?></option>
            <?php endforeach; ?>
					</select>
					<br> Tanggal Pinjam
					<input type="date" name="tanggal_pinjam" class="form-control">
					<br> Tanggal Kembali
					<input type="date" name="tanggal_kembali" class="form-control">
					<br> Status Peminjaman
					<!-- <input type="text" name="status_peminjaman" class="form-control"> -->
          <select name="status_peminjaman" id="form_control">
            <option value="sedang dipinjam">SEDANG DIPINJAM</option>
            <option value="dikembalikan">DIKEMBALIKAN</option>
          </select>
					<br> Id Pegawai
					<select name="id_pegawai" class="form-control">
						<?php
				foreach ($data_pegawai as $pgw) {
					echo "<option value= '".$pgw->id_pegawai."'>
					".$pgw->nama_pegawai."
					</option>";
				}
				 ?>
					</select>
					<br>Jumlah
          <input type="number" name="jumlah" class="form-control">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="update_peminjaman">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Update peminjaman</h4>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('index.php/Peminjaman/update_peminjaman')?>" method="post">
					<input type="hidden" name="id_peminjaman" id="id_peminjaman">
					<br> Nama Barang
					<select name="nama" class="form-control">
						<?php
                  foreach ($data_inventaris as $inv) {
                      echo "<option value= '".$inv->id_inventaris."'>
                      ".$inv->nama."
                      </option>";
                  }
                   ?>
					</select>
					<br> Tanggal Pinjam
					<input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control">
					<br> Tanggal Kembali
					<input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control">
					<br> Status Peminjaman
					<input type="text" id="status_peminjaman" name="status_peminjaman" class="form-control">
					<br> Id Pegawai
					<select name="id_pegawai" class="form-control">
						<?php
                    foreach ($data_pegawai as $pgw) {
                    echo "<option value= '".$pgw->id_pegawai."'>
                    ".$pgw->nama_pegawai."
                    </option>";
                        }
                 ?>
					</select>
					<br>
          <br>Jumlah
          <input type="number" name="jumlah" class="form-control">
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
	function tm_detail(id_peminjaman) {
		$.getJSON("<?=base_url()?>index.php/Peminjaman/get_detail_peminjaman/" + id_peminjaman, function (data) {
			$("#id_peminjaman").val(data['id_peminjaman']);
			$("#id_inventaris").val(data['id_inventaris']);
			$("#tanggal_pinjam").val(data['tanggal_pinjam']);
			$("#tanggal_kembali").val(data['tanggal_kembali']);
			$("#status_peminjaman").val(data['status_peminjaman']);
			$("#id_pegawai").val(data['id_pegawai']);

		});
	}

</script>
<script src="<?=base_url()?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script>
	$('.apik').DataTable({
		dom: 'Bfrtip',
		responsive: true,
		buttons: [
			'pdf','print','excel'
		]
	});
</script>
