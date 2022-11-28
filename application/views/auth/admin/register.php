<div class="row justify-content-center" style="width: 100%;">
    <div class="col-lg-4">
        <main class="form-signin">
            <form action="<?= base_url("admin/register"); ?>" method="post">
                <h1 class="h3 mb-3 fw-normal text-center mt-3">Form admin register</h1>
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control <?= (form_error("nama")) ? "is-invalid" : ''; ?>" id="nama"
                        placeholder="Masukan nama" name="nama" autofocus required value="<?= set_value("nama"); ?>" />
                    <?= form_error("nama", '<small class="text-danger">', "</small>"); ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?= (form_error("email")) ? "is-invalid" : ''; ?>"
                        id="email" placeholder="Masukan email" name="email" required
                        value="<?= set_value("email"); ?>" />
                    <?= form_error("email", '<small class="text-danger">', "</small>"); ?>
                </div>
                <div class="mb-2">
                    <label for="jenis_kelamin" class="form-label">Jeni kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required class="form-control">
                        <option>
                            Pilih Jenis Kelamin
                        </option>
                        <option value="laki-laki">Laki - laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    <?= form_error("jenis_kelamin", '<small class="text-danger">', "</small>"); ?>
                </div>
                <div class="mb-3">
                    <label for="password1" class="form-label">Password</label>
                    <input type="password" class="form-control <?= (form_error("password1")) ? "is-invalid" : ''; ?>"
                        id="password1" placeholder="Masukan password" name="password1" required />
                    <?= form_error("password1", '<small class="text-danger">', "</small>"); ?>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control <?= (form_error("password2")) ? "is-invalid" : ''; ?>"
                        id="password2" placeholder="Masukan konfirmasi password" name="password2" required />
                </div>
                <button class="btn btn-primary mb-2" style="width: 100%">Register</button>
            </form>
        </main>
    </div>
</div>
<script src="<?= base_url('assets\plugins\bootstrap-5.0.2\js\bootstrap.bundle.min.js') ?>"></script>
</body>

</html>