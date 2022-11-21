<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content -5">
    <h1>Form tambah tiket</h1>
    <form action="" method="POST">
        <label for="">kategori hari</label>
        <select class="form-select" name="kategori_hari">
            <option value="Weekend">Weekend</option>
            <option value="Weekday">Weekday</option>
        </select>
        <label for="">harga</label>
        <input type="number" class="form-control" name="harga">
        <label for="">jam mulai kunjungan</label>
        <input type="time" class="form-control" name="jam_mulai_kunjungan">
        <label for="">jam selesai kunjungan</label>
        <input type="time" class="form-control" name="jam_selesai_kunjungan">
    </form>
</div>