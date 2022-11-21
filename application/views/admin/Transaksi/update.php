<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content -5">
    <h1>Form edit transaksi</h1>
    <form action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Qty</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="qty">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Total</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="total">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal transaksi</label>
            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggal_transaksi">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id pengunjung</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_pengunjung">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id MP</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_mp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id admin</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_admin">
        </div>
    </form>
</div>