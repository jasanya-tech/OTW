<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>
<div class="content">
    <?= $this->session->flashdata('alert') ?>
    <h2>Daftar Tiket</h2>
    <a href="<?= base_url("tiket/create"); ?>" class="btn btn-primary mb-3">Tambah Tiket</a>
    <div class="row row-cols-2">
        <?php foreach ($tikets as $tiket) : ?>
        <div class="col">
            <div class="card mb-3" style="cursor: pointer;">
                <div class="card-body">
                    <h5><?= $tiket->kategori_hari ?></h5>
                    <p><?= substr($tiket->jam_mulai_kunjungan, 0, 5) . " - " . substr($tiket->jam_selesai_kunjungan, 0, 5) ?>
                    </p>
                    <div class="text-end">
                        <h5><?= harga_rupiah($tiket->harga) ?></h5>
                    </div>
                    <a href="<?= base_url('tiket/update/' . $tiket->Id_tiket) ?>" class="btn btn-warning"
                        style="bottom: 0;">Edit</a>
                    <a href="<?= base_url('tiket/delete/' . $tiket->Id_tiket) ?>" class="btn btn-danger"
                        style="bottom: 0;" onclick="return confirm('Yakin ingin menghapus tiket?');">Hapus</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>