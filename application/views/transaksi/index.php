<div class="container">
    <h2 class="mt-5 mb-3">Daftar Transaksi</h2>
    <div class="row row-cols-2" style="margin-bottom: 63px;">
        <?php foreach ($transaksi as $t) : ?>
        <div class="col">
            <div class="card mb-3" style="cursor: pointer;">
                <div class="card-body">
                    <h5><?= $t->kategori_hari ?></h5>
                    <p class="mb-0">
                        <?= substr($t->jam_mulai_kunjungan, 0, 5) . " - " . substr($t->jam_selesai_kunjungan, 0, 5) ?>
                    <p>Tanggal kunjungan : <?= $t->tanggal_kunjungan; ?></p>
                    </p>
                    <div class="text-end">
                        <h5><?= harga_rupiah($t->Total) ?></h5>
                    </div>
                    <a href="<?= base_url('home/transaksi/' . $t->Id_transaksi); ?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
</div>