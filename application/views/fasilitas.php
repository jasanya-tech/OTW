<main class="container">
    <div class="row">
        <div class="col p-5 text-center">
            <h4>Fasilitas Landung Waterfall</h4>
            <div class="row row-cols-3 mt-4">
                <style>
                    #gambar-fasilitas {
                        width: 100%;
                        height: 360px;
                        object-fit: cover;
                    }
                </style>
                <?php foreach ($fasilities as $fasility) : ?>
                    <div class="col shadow py-2">
                        <div class="card m-3">
                            <img src="<?= base_url('assets\img\fasilitas/' . $fasility->image) ?>" id="gambar-fasilitas">
                            <div class="card-body">
                                <h5><?= $fasility->title; ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>