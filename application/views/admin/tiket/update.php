<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content">
    <?= $this->session->flashdata('alert') ?>
    <form action="<?= current_url() ?>" method="POST">
        <label for="">kategori hari</label>
        <select class="form-select" name="kategori_hari">
            <option value="">Pilih kategori hari</option>
            <option <?= $tiket->kategori_hari  == 'Weekend' ? 'selected' : '' ?> value="Weekend">Weekend</option>
            <option <?= $tiket->kategori_hari  == 'Weekday' ? 'selected' : '' ?> value="Weekday">Weekday</option>
        </select>
        <?php echo form_error('kategori_hari'); ?>
        <label for="">harga</label>
        <input type="number" class="form-control" name="harga" value="<?= $tiket->harga ?>">
        <?php echo form_error('harga'); ?>

        <label for="">jam mulai kunjungan</label>
        <input type="time" class="form-control" name="jam_mulai_kunjungan" value="<?= $tiket->jam_mulai_kunjungan ?>">
        <?php echo form_error('jam_mulai_kunjungan'); ?>
        <label for="">jam selesai kunjungan</label>
        <input type="time" class="form-control" name="jam_selesai_kunjungan" value="<?= $tiket->jam_selesai_kunjungan ?>">
        <?php echo form_error('jam_selesai_kunjungan'); ?>
        <div class="my-2 text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>