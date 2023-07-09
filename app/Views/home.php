<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

<div id="myCarousel" class="carousel slide mb-3" data-bs-ride="carousel" data-bs-theme="dark">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item">
            <div class="d-flex">
                <img class="" style="opacity: 0.1;" src="https://image.tmdb.org/t/p/w500/4j0PNHkMr5ax3IA8tjtxcmPU3QT.jpg" alt="" width="200">
                <img class="" style="opacity: 0.2;" src="https://image.tmdb.org/t/p/w500/kyeqWdyUXW608qlYkRqosgbbJyK.jpg" alt="" width="200">
                <img style="opacity: 0.3;" src="https://image.tmdb.org/t/p/w500/4j0PNHkMr5ax3IA8tjtxcmPU3QT.jpg" alt="" width="200">
                <img style="opacity: 0.5;" src="https://image.tmdb.org/t/p/w500/9NXAlFEE7WDssbXSMgdacsUD58Y.jpg" alt="" width="200">
                <img style="opacity: 0.8;" src="https://image.tmdb.org/t/p/w500/kuf6dutpsT0vSVehic3EZIqkOBt.jpg" alt="" width="200">
                <img style="opacity: 1;" src="https://image.tmdb.org/t/p/w500/qNBAXBIQlnOThrVvA6mA2B5ggV6.jpg" alt="" width="200">
            </div>
            <div class="container">
                <div class="carousel-caption grad-right rounded-5 text-white bg-opacity-50 px-5 text-start">
                    <h1>Funsies Full of Fantasies.</h1>
                    <p>Take a break and chill!</p>
                    <p><a class="btn d-xs-block d-md-none btn-outline-light" href="explore">Find out</a></p>
                    <p><a class="btn d-none d-sm-inline-flex btn-lg btn-outline-light" href="explore">Find out</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-flex">
                <img class="" style="opacity: 1;" src="https://image.tmdb.org/t/p/w500/4j0PNHkMr5ax3IA8tjtxcmPU3QT.jpg" alt="" width="200">
                <img style="opacity: 0.8;" src="https://image.tmdb.org/t/p/w500/kyeqWdyUXW608qlYkRqosgbbJyK.jpg" alt="" width="200">
                <img style="opacity: 0.5;" src="https://image.tmdb.org/t/p/w500/nAbpLidFdbbi3efFQKMPQJkaZ1r.jpg" alt="" width="200">
                <img style="opacity: 0.5;" src="https://image.tmdb.org/t/p/w500/fiVW06jE7z9YnO4trhaMEdclSiC.jpg" alt="" width="200">
                <img style="opacity: 0.8;" src="https://image.tmdb.org/t/p/w500/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg" alt="" width="200">
                <img style="opacity: 1;" src="https://image.tmdb.org/t/p/w500/uJYYizSuA9Y3DCs0qS4qWvHfZg4.jpg" alt="" width="200">
            </div>
            <div class="container">
                <div class="carousel-caption grad-mid rounded-5 rounded text-white bg-opacity-50 px-5">
                    <h1>Zero Worries Ticket.</h1>
                    <p>Guarantee refund free.</p>
                    <p><a class="btn d-xs-block d-md-none btn-outline-light" href="#">Learn more</a></p>
                    <p><a class="btn d-none d-sm-inline-flex btn-lg btn-outline-light" href="#">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item active">
            <div class="d-flex">
                <img style="opacity: 1;" src="https://image.tmdb.org/t/p/w500/nAbpLidFdbbi3efFQKMPQJkaZ1r.jpg" alt="" width="200">
                <img style="opacity: 0.8;" src="https://image.tmdb.org/t/p/w500/jeGvNOVMs5QIU1VaoGvnd3gSv0G.jpg" alt="" width="200">
                <img style="opacity: 0.5;" src="https://image.tmdb.org/t/p/w500/uJYYizSuA9Y3DCs0qS4qWvHfZg4.jpg" alt="" width="200">
                <img style="opacity: 0.3;" src="https://image.tmdb.org/t/p/w500/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg" alt="" width="200">
                <img style="opacity: 0.2;" src="https://image.tmdb.org/t/p/w500/fiVW06jE7z9YnO4trhaMEdclSiC.jpg" alt="" width="200">
                <img style="opacity: 0.1;" src="https://image.tmdb.org/t/p/w500/kuf6dutpsT0vSVehic3EZIqkOBt.jpg" alt="" width="200">
            </div>
            <div class="container">
                <div class="carousel-caption grad-left rounded-5 text-white bg-opacity-50 px-5 text-end">
                    <h1>Trending and Happening.</h1>
                    <p class="">The hottest in the cinema.</p>
                    <p><a class="btn d-xs-block d-md-none btn-outline-light" href="explore#popular">Explore</a></p>
                    <p><a class="btn d-none d-sm-inline-flex btn-lg btn-outline-light" href="explore#popular">Explore</a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<br>

<span id="popular" class="fw-bold mb-0 fs-2 grad-right p-3 my-3 rounded-5">Popular</span>
<!-- <div id="popular" class="my-4 d-flex justify-content-center align-items-center overflow-x-auto"> -->
<div class="my-4 row">
    <?php foreach ($popular as $row) :
    ?>
        <div class="col-lg-3 col-sm-4 col-6 d-flex align-items-stretch">
            <div class="card border-0 mb-md-3">
                <a href="<?= base_url('explore/' . $row['name']) ?>">
                    <img loading="lazy" class="d-md-block d-none bd-placeholder-img card-img-top" src="<?= $row['poster_url'] ?>" alt="<?= $row['name'] ?>" style="width: 200px;">
                    <img loading="lazy" class="d-xs-block d-md-none bd-placeholder-img card-img-top" src="<?= $row['poster_url'] ?>" alt="<?= $row['name'] ?>" style="width: 100px;">
                </a>
                <div class="card-body">
                    <span class="card-text"><?= $row['age_rating'] ?>+</span><br>
                    <a href="<?= base_url('explore/' . $row['name']) ?>" class="vertical-truncate d-xs-block d-md-none card-title fw-bold text-decoration-none"><?= $row['name'] ?></a>
                    <a href="<?= base_url('explore/' . $row['name']) ?>" class=" d-md-block d-none card-title h3 text-decoration-none"><?= $row['name'] ?></a>
                </div>
            </div>
        </div>
    <?php endforeach;
    unset($row);
    ?>
    <div class="col-md-3 col-6">
        <form action="explore#popular" method="post">
            <button class=" btn btn-danger btn-lg" style="min-height: 20vh;">See Full List</button>
        </form>
    </div>
</div>

<span id="now" class="fw-bold mb-0 fs-2 grad-right p-3 mt-5 mb-3 rounded-5">Now Playing</span>
<div class="my-4 row d-flex justify-content-center align-items-center">
    <?php foreach ($data as $row) :
    ?>
        <div class="col-lg-3 col-sm-4 col-6 d-flex align-items-stretch">
            <div class="card border-0 mb-md-3">
                <a href="<?= base_url('explore/' . $row['name']) ?>">
                    <img loading="lazy" class="d-md-block d-none bd-placeholder-img card-img-top" src="<?= $row['poster_url'] ?>" alt="<?= $row['name'] ?>" style="width: 200px;">
                    <img loading="lazy" class="d-xs-block d-md-none bd-placeholder-img card-img-top" src="<?= $row['poster_url'] ?>" alt="<?= $row['name'] ?>" style="width: 100px;">
                </a>
                <div class="card-body">
                    <span class="card-text"><?= $row['age_rating'] ?>+</span><br>
                    <a href="<?= base_url('explore/' . $row['name']) ?>" class="vertical-truncate d-xs-block d-md-none card-title fw-bold text-decoration-none"><?= $row['name'] ?></a>
                    <a href="<?= base_url('explore/' . $row['name']) ?>" class=" d-md-block d-none card-title h3 text-decoration-none"><?= $row['name'] ?></a>
                </div>
            </div>
        </div>
    <?php endforeach;
    unset($row);
    ?>

    <div class="col-md-3 col-6">
        <form action="explore#now" method="post">
            <button class=" btn btn-danger btn-lg" style="min-height: 20vh;">See Full List</button>
        </form>
    </div>
</div>



<?= $this->endSection(); ?>