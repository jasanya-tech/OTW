<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>
<div class="content">
    <h1>Form tambah Metode Pembayaran</h1>
    <div class="col-lg-6">
        <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Jenis Pembayaran</label>
                <input type="text" class="form-control" name="jenis_pembayaran" required>
                <?= form_error("jenis_pembayaran", '<small class="text-danger">', "</small>"); ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">No Account</label>
                <input type="number" class="form-control" name="no_account" required>
                <?= form_error("no_account", '<small class="text-danger">', "</small>"); ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Logo</label>
                <img src="" class="logo-preview img-fluid mb-2 col-sm-5 d-block">
                <input type="file" class="form-control" name="logo" id="logo" onchange="previewLogo()" required>
                <?= form_error("logo", '<small class="text-danger">', "</small>"); ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
function previewLogo() {
    const logo = document.querySelector("#logo");
    const logoPreview = document.querySelector(".logo-preview");

    const blob = URL.createObjectURL(logo.files[0]);
    logoPreview.src = blob;

}
</script>