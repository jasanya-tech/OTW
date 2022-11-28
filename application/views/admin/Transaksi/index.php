<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content p-5">
    <h1>Daftar Transaksi</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori Hari</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Tanggal Kunjungan</th>
                <th scope="col">Qty</th>
                <th scope="col">Status</th>
                <th scope="col">Id Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1; ?>
            <?php foreach ($transaksi as $t) : ?>
            <tr>
                <th scope="row"><?= $count++; ?></th>
                <td><?= $t->kategori_hari; ?></td>
                <td><?= $t->Total; ?></td>
                <td><?= $t->Tanggal_transaksi; ?></td>
                <td><?= $t->tanggal_kunjungan; ?></td>
                <td><?= $t->qty; ?></td>
                <td><?= $t->status; ?></td>
                <td><?= $t->Id_admin; ?></td>
                <td>
                    <a class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal<?= $t->Id_transaksi; ?>">Lihat bukti</a>
                </td>
            </tr>
            <div class="modal fade" id="exampleModal<?= $t->Id_transaksi; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <form action="<?= base_url("transaksi/konfirmasi"); ?>" method="POST">
                        <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" required
                            value="<?= $t->Id_transaksi; ?>" />
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= base_url("/assets/img/bukti/" . $t->bukti_bayar) ?>" alt=""
                                    class="img-thumbnail">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <?php if ($t->status == "Belum dikonfirmasi") : ?>
                                <button type="submit" class="btn btn-primary">Konfirmasi pembayaran</button>
                                <?php endif ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endforeach ?>
        </tbody>
    </table>
    <!-- Modal -->

</div>