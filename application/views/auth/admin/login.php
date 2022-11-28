<div class="row justify-content-center" style="width: 100%;">
    <div class="col-lg-4">
        <main class="form-signin">
            <form action="<?= base_url("admin/login"); ?>" method="post">
                <h1 class="h3 mb-3 fw-normal text-center mt-4">Form Login Admin</h1>
                <?= $this->session->flashdata("message"); ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukan Email" name="email"
                        autofocus required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukan Password"
                        name="password" required />
                </div>
                <button class="btn btn-primary mb-2" style="width: 100%">Login</button>
                <p>Login sebagai user ? <a href="<?= base_url("auth"); ?>" class="text-decoration-none">Login</a>
                </p>
            </form>
        </main>
    </div>
</div>
<script src="<?= base_url('assets\plugins\bootstrap-5.0.2\js\bootstrap.bundle.min.js') ?>"></script>
</body>

</html>