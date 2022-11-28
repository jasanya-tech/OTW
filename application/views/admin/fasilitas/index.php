<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content">
    <?= $this->session->flashdata('alert') ?>
    <h1>Daftar Fasilitas</h1>
    <a href="<?= base_url('fasilitas/create'); ?>" class="btn btn-primary mb-3">Tambah Fasilitas</a>
    <div class="row">
        <?php foreach ($fasilities as $fasility) : ?>
            <div class="col-md-4">
                <div class="card mb-3" style="cursor: pointer;">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <img src="<?= base_url('assets/img/fasilitas/' . $fasility->image); ?>" alt="" height="100" width="100" style="object-fit: contain;">
                            </div>
                            <div>
                                <h3><?= $fasility->title; ?></h3>
                            </div>
                        </div>
                        <a href="<?= base_url('fasilitas/update/' . $fasility->fasilitas_id) ?>" class="btn btn-warning" style="bottom: 0;">Edit</a>
                        <a href="<?= base_url('fasilitas/delete/' . $fasility->fasilitas_id) ?>" class="btn btn-danger" style="bottom: 0;" onclick="return confirm('Yakin ingin menghapus Fasilitas?');">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>


    </div>
</div>