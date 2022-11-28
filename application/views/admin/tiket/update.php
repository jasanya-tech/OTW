<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content">
    <h1>Form edit tiket</h1>
    <form action="<?= current_url() ?>" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">Kategori hari</label>
            <select class="form-select" name="kategori_hari">
                <option value="">Pilih kategori hari</option>
                <option <?= $tiket->kategori_hari  == 'Weekend' ? 'selected' : '' ?> value="Weekend">Weekend</option>
                <option <?= $tiket->kategori_hari  == 'Weekday' ? 'selected' : '' ?> value="Weekday">Weekday</option>
            </select>
            <?= form_error('kategori_hari'); ?>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="<?= $tiket->harga ?>">
            <?= form_error('harga'); ?>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">jam mulai kunjungan</label>
            <input type="time" class="form-control" name="jam_mulai_kunjungan"
                value="<?= $tiket->jam_mulai_kunjungan ?>">
            <?= form_error('jam_mulai_kunjungan'); ?>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">jam selesai kunjungan</label>
            <input type="time" class="form-control" name="jam_selesai_kunjungan"
                value="<?= $tiket->jam_selesai_kunjungan ?>">
            <?= form_error('jam_selesai_kunjungan'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>