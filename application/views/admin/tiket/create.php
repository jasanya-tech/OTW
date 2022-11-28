<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content">
    <h1>Form tambah tiket</h1>
    <div class="col-lg-6">
        <form action="<?= current_url() ?>" method="POST">
            <div class="mb-3">
                <label for="kategori_hari" class="form-label">kategori hari</label>
                <select class="form-select" name="kategori_hari">
                    <option value="">Pilih kategori hari</option>
                    <option value="Weekend">Weekend</option>
                    <option value="Weekday">Weekday</option>
                </select>
                <?= form_error("kategori_hari", '<small class="text-danger">', "</small>"); ?>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="number" class="form-control" name="harga" id="harga">
                <?= form_error("harga", '<small class="text-danger">', "</small>"); ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">jam mulai kunjungan</label>
                <input type="time" class="form-control" name="jam_mulai_kunjungan">
                <?= form_error("jam_mulai_kunjungan", '<small class="text-danger">', "</small>"); ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">jam selesai kunjungan</label>
                <input type="time" class="form-control" name="jam_selesai_kunjungan">
                <?= form_error("jam_selesai_kunjungan", '<small class="text-danger">', "</small>"); ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>