<div class="container">
    <h2 class="mt-5 mb-3">Daftar TIket</h2>
    <div class="row row-cols-2" style="margin-bottom: 63px;">
        <?php foreach ($tikets as $tiket) : ?>
            <div class="col">
                <div class="card mb-3" style="cursor: pointer;">
                    <div class="card-body">
                        <h5><?= $tiket->kategori_hari ?></h5>
                        <p><?= substr($tiket->jam_mulai_kunjungan, 0, 5) . " - " . substr($tiket->jam_selesai_kunjungan, 0, 5) ?>
                        </p>
                        <div class="text-end">
                            <h5><?= harga_rupiah($tiket->harga) ?></h5>
                        </div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $tiket->Id_tiket ?>">Order</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal<?= $tiket->Id_tiket ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Order Tiket</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url("transaksi/create"); ?>" method="POST">
                            <div class="modal-body">
                                <input type="hidden" value="<?= $tiket->Id_tiket; ?>" name="id_tiket">
                                <input type="hidden" value="<?= $tiket->harga; ?>" name="harga">
                                <div class="mb-3">
                                    <label for="qty" class="form-label">Qty</label>
                                    <input type="number" class="form-control" id="qty" placeholder="Masukan Qty" name="qty" required />
                                    <?= form_error("qty", '<small class="text-danger">', "</small>"); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_kunjungan" class="form-label">Tanggal kunjungan</label>
                                    <input type="date" class="form-control" id="tanggal_kunjungan" placeholder="Masukan tanggal kunjungan" name="tanggal_kunjungan" required />
                                    <?= form_error("tanggal_kunjungan", '<small class="text-danger">', "</small>"); ?>
                                </div>
                                <div class="mb-2">
                                    <label for="status" class="form-label">Metode pembayaran</label>
                                    <?php foreach ($metode_pembayaran as $mp) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="aktif" checked name="Id_MP" value="<?= $mp->Id_MP; ?>">
                                            <label class="form-check-label" for="aktif">
                                                <img src="<?= base_url('assets/img/jenis pembayaran/' . $mp->logo); ?>" alt="metode pembayaran" width="40" height="20">
                                                <?= $mp->jenis_pembayaran; ?>
                                            </label>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
</div>