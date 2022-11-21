<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content -5">
    <h1>Form edit tiket</h1>
    <form action="">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Kategori hari</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Harga</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Jam mulai kunjungan</label>
    <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Jam selesai kunjungan</label>
    <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    

    </form>
</div>