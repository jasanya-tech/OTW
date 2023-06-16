<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<link rel="stylesheet" href="<?= base_url('assets\plugins\dataTable\css\jquery-dataTables.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets\plugins\dataTable\css\buttons.dataTables.min.css') ?>">

<div class="content p-5">
	<h1>Daftar Transaksi</h1>
	<table id="example" class="display nowrap" style="width:100%">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Pengunjung</th>
				<th scope="col">Kategori Hari</th>
				<th scope="col">Total</th>
				<th scope="col">Tanggal Transaksi</th>
				<th scope="col">Tanggal Kunjungan</th>
				<th scope="col">Qty</th>
				<th scope="col">Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $count = 1; ?>
			<?php foreach ($transaksi as $t) : ?>
				<?php $pengunjung = get_user_by_id($t->Id_pengunjung); ?>
				<tr>
					<th scope="row"><?= $count++; ?></th>
					<td><?= $pengunjung != null ? $pengunjung->nama : 'tidak'; ?></td>
					<td><?= $t->kategori_hari; ?></td>
					<td><?= $t->Total; ?></td>
					<td><?= $t->Tanggal_transaksi; ?></td>
					<td><?= $t->tanggal_kunjungan; ?></td>
					<td><?= $t->qty; ?></td>
					<td><?= $t->status; ?></td>
					<td>
						<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $t->Id_transaksi; ?>">Lihat bukti</a>
					</td>
				</tr>
				<div class="modal fade" id="exampleModal<?= $t->Id_transaksi; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<form action="<?= base_url("transaksi/konfirmasi"); ?>" method="POST">
							<input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" required value="<?= $t->Id_transaksi; ?>" />
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<img src="<?= base_url("/assets/img/bukti/" . $t->bukti_bayar) ?>" alt="" class="img-thumbnail">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<?php if ($t->status == "Belum dikonfirmasi") : ?>
										<button type="submit" class="btn btn-primary">Konfirmasi pembayaran</button>
									<?php endif ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<script src="<?= base_url('assets\plugins\jquery\jquery-3.5.1.js') ?>"></script>
<script src="<?= base_url('assets\plugins\dataTable\js\jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets\plugins\dataTable\js\dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets\plugins\dataTable\js\jszip.min.js') ?>"></script>
<script src="<?= base_url('assets\plugins\dataTable\js\pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets\plugins\dataTable\js\vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets\plugins\dataTable\js\buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets\plugins\dataTable\js\buttons.print.min.js') ?>"></script>

<script>
	let exportColumn = [0, 1, 3, 4, 5, 6, 7];
	$(document).ready(function() {
		$('#example').DataTable({
			dom: 'Bfrtip',
			buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: exportColumn // Indeks kolom yang ingin diekspor (kolom ke-0, ke-1, dan ke-3)
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: exportColumn // Indeks kolom yang ingin diekspor (kolom ke-0, ke-1, dan ke-3)
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: exportColumn // Indeks kolom yang ingin diekspor (kolom ke-0, ke-1, dan ke-3)
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: exportColumn // Indeks kolom yang ingin diekspor (kolom ke-0, ke-1, dan ke-3)
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: exportColumn // Indeks kolom yang ingin diekspor (kolom ke-0, ke-1, dan ke-3)
                }
            },
        ]
		});
	});
</script>
