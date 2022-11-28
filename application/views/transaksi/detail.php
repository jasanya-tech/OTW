<div class="container">
    <div class="row justify-content-center mt-5">
        <h1 class="text-center">Detail Transaksi</h1>
        <div class="col-md-6 pb-3">
            <table class="table">
                <tr>
                    <td>Kategori Hari</td>
                    <td>:</td>
                    <td><?= $transaksi->kategori_hari; ?></td>
                </tr>
                <tr>
                    <td>Jam kunjungan</td>
                    <td>:</td>
                    <td><?= substr($transaksi->jam_mulai_kunjungan, 0, 5) . " - " . substr($transaksi->jam_selesai_kunjungan, 0, 5) ?>
                    </td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>:</td>
                    <td><?= $transaksi->Total; ?></td>
                </tr>
                <tr>
                    <td>Tanggal kunjungan</td>
                    <td>:</td>
                    <td><?= $transaksi->tanggal_kunjungan; ?></td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td>:</td>
                    <td><?= $transaksi->qty; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <?= $transaksi->status; ?></td>
                </tr>
                <tr>
                    <td>Metode pembayaran</td>
                    <td>:</td>
                    <td>
                        <?= $transaksi->jenis_pembayaran; ?></td>
                </tr>
                <tr>
                    <td>No account</td>
                    <td>:</td>
                    <td>
                        <?= $transaksi->no_account; ?></td>
                </tr>
            </table>
            <?php if (!$transaksi->bukti_bayar) : ?>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Upload Bukti Bayar
                </button>
            </div>
            <?php endif ?>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload bukti pembayaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url("transaksi/uploadBukti"); ?>" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" value="<?= $transaksi->Id_transaksi; ?>" name="id_transaksi">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="bukti_bayar" class="form-label">Bukti Pembayaran</label>
                                    <img src="" class="img-preview img-thumbnail mb-2 d-block">
                                    <input type="file" class="form-control" id="bukti_bayar" placeholder="Masukan bukti"
                                        name="bukti_bayar" required onchange="previewImage()" />
                                    <?= form_error("bukti_bayar", '<small class="text-danger">', "</small>"); ?>
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

        </div>
    </div>

</div>
<script>
function previewImage() {
    const image = document.querySelector("#bukti_bayar");
    const imgPreview = document.querySelector(".img-preview");

    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;

}
</script>