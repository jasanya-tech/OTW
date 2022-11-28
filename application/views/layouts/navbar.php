<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('home'); ?>">
            <img src="<?= base_url('assets\img\logo-otw.jpg') ?>" class="rounded-circle" width="50" height="50" alt="" srcset=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <div class="d-flex">
                <div class="d-flex align-items-center gap-2">
                    <div class="nama">
                        <?= $this->session->userdata('nama'); ?>
                    </div>
                    <div class="bg-dark rounded-circle" style="width: 50px;height: 50px;"></div>
                </div>
            </div>
        </div>
    </div>
</nav>