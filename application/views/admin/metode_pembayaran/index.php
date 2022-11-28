<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content">
    <?= $this->session->flashdata('alert') ?>
    <h1>Daftar metode pembayaran</h1>
    <a href="<?= base_url('metode_pembayaran/create'); ?>" class="btn btn-primary mb-3">Tambah Metode Pembayaran</a>
    <div class="row">
        <?php foreach ($metode_pembayaran as $mp) : ?>

            <div class="col-md-4">
                <div class="card mb-3" style="cursor: pointer;">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <img src="<?= base_url('assets/img/jenis pembayaran/' . $mp->logo); ?>" alt="" height="100" width="100" style="object-fit: contain;">
                            </div>
                            <div>
                                <h3><?= $mp->jenis_pembayaran; ?></h3>
                                <p><?= $mp->no_account; ?></p>
                            </div>
                        </div>
                        <a href="<?= base_url('metode_pembayaran/update/' . $mp->Id_MP) ?>" class="btn btn-warning" style="bottom: 0;">Edit</a>
                        <a href="<?= base_url('metode_pembayaran/delete/' . $mp->Id_MP) ?>" class="btn btn-danger" style="bottom: 0;" onclick="return confirm('Yakin ingin menghapus metode pembayaran?');">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>


    </div>
</div>