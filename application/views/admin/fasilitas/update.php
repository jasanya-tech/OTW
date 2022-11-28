<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>
<div class="content">
    <h1>Form tambah Fasilitas</h1>
    <div class="col-lg-6">
        <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">title</label>
                <input type=" text" class="form-control" name="title" required value="<?= $fasility->title; ?>">
                <?= form_error("title", '<small class="text-danger">', "</small>"); ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <img src="<?= base_url('assets/img/fasilitas/' . $fasility->image); ?>" class="logo-preview img-fluid mb-2 col-sm-5 d-block">
                <input type="hidden" name="old_image" value="<?= $fasility->image; ?>">
                <input type="file" class="form-control" name="image" id="image" onchange="previewLogo()">
                <?= form_error("image", '<small class="text-danger">', "</small>"); ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
    function previewLogo() {
        const image = document.querySelector("#image");
        const logoPreview = document.querySelector(".logo-preview");

        const blob = URL.createObjectURL(image.files[0]);
        logoPreview.src = blob;

    }
</script>