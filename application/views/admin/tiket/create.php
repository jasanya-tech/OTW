<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content -5">
    <h1>Form tambah tiket</h1>
    <form action="">
        <label for="">kategori hari</label>
        <select class="form-select">
            <option value="Weekend">Weekend</option>
            <option value="Weekday">Weekday</option>
        </select>
        <label for="">harga</label>
        <input type="number" class="form-control">
        <label for="">jam mulai kunjungan</label>
        <input type="time" class="form-control">
        <label for="">jam selesai kunjungan</label>
        <input type="time" class="form-control">
    </form>
</div>