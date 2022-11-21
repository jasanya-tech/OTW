<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>
<div class="content">
    <?= $this->session->flashdata('alert') ?>
    <h2>Daftar Tiket</h2>
    <div class="row row-cols-2">
        <?php foreach ($tikets as $tiket) : ?>
            <div class="col">
                <div class="card" style="cursor: pointer;" onclick="window.location.href = '<?= base_url('tiket/update/' . $tiket->Id_tiket) ?>'">
                    <div class="card-body">
                        <h5><?= $tiket->kategori_hari ?></h5>
                        <p><?= substr($tiket->jam_mulai_kunjungan, 0, 5) . " - " . substr($tiket->jam_selesai_kunjungan, 0, 5) ?></p>
                        <div class="text-end">
                            <h5><?= harga_rupiah($tiket->harga) ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>