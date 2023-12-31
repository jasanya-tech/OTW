<section class="hero">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <style>
                p {
                    margin: 0;
                }

                .swiper-slide img {
                    width: 100%;
                    height: calc(100vh - 64px);
                    object-fit: cover;
                }
            </style>
            <?php foreach ($fasilities as $fasility) : ?>
                <div class="swiper-slide">
                    <img src="<?= base_url('assets\img\fasilitas/' . $fasility->image) ?>">
                </div>
            <?php endforeach ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<main class="container">
    <div class="row row-cols-2 my-5 shadow">
        <div class="col-8 p-5">
            <h4 class="mb-4">Welcome To Landung Waterfall</h4>
            <p class="m-0">Jam Operasional Weekday: 09:00 - 17:00 & Weekend : 08:00 - 18:00</p>
            <p class="m-0">Harga Tiket Masuk Weedays : Rp. 30.000 & Weekends Rp. 35.000</p>
            <p class="m-0">Sudah FREE Wahana </p>
            <p class="m-0">Tiket Bisa Di Tukarkan Dengan Souvenir</p>
        </div>
        <div class="col-4 d-flex justify-content-center align-items-center">
            <img src="<?= base_url('assets\img\logo-otw.jpg') ?>" alt="" width="200">
        </div>
    </div>
</main>

<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
