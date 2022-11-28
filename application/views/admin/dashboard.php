<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>
<div class="content p-5">
    <div class="row">
        <?= $this->session->flashdata("message"); ?>
        <div class="col-4">
            <div class="card bg-primary text-white" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fs-3">Jumlah Transaksi</h5>
                    <p class="card-text fs-1"><?= $jumlah_transaksi; ?></p>

                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-success text-white" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fs-3">Jumlah Tiket</h5>
                    <p class="card-text fs-1"><?= $jumlah_tiket; ?></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-warning text-white" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fs-3">Jumlah Customer</h5>
                    <p class="card-text fs-1"><?= $jumlah_customer; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>