<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<span class="fw-bold mb-0 fs-2 grad-right p-3 my-3 rounded-5">Popular</span>
<div class="my-4 row">
    <?php foreach ($popular as $row) :
    ?>
        <div class="col-lg-3 col-sm-4 col-6 d-flex align-items-stretch">
            <div class="card border-0 mb-md-3">
                <a href="#">
                    <img loading="lazy" class="d-md-block d-none bd-placeholder-img card-img-top" src="<?= $row['poster_url'] ?>" alt="<?= $row['name'] ?>" style="width: 200px;">
                    <img loading="lazy" class="d-sm-block d-md-none bd-placeholder-img card-img-top" src="<?= $row['poster_url'] ?>" alt="<?= $row['name'] ?>" style="width: 100px;">
                </a>
                <div class="card-body">
                    <span class="card-text"><?= $row['age_rating'] ?>+</span><br>
                    <a href="#" class="vertical-truncate d-sm-block d-md-none card-title fw-bold text-decoration-none"><?= $row['name'] ?></a>
                    <a href="#" class=" d-md-block d-none card-title h3 text-decoration-none"><?= $row['name'] ?></a>
                </div>
            </div>
        </div>
    <?php endforeach;
    unset($row);
    ?>
</div>

<span class="fw-bold mb-0 fs-2 grad-right p-3 my-3 rounded-5">Now Playing</span>
<div class="my-4 row d-flex justify-content-center align-items-center">
    <?php foreach ($data as $row) :
    ?>
        <div class="col-lg-3 col-sm-4 col-6 d-flex align-items-stretch">
            <div class="card border-0 mb-md-3">
                <a href="#">
                    <img loading="lazy" class="d-md-block d-none bd-placeholder-img card-img-top" src="<?= $row['poster_url'] ?>" alt="<?= $row['name'] ?>" style="width: 200px;">
                    <img loading="lazy" class="d-sm-block d-md-none bd-placeholder-img card-img-top" src="<?= $row['poster_url'] ?>" alt="<?= $row['name'] ?>" style="width: 100px;">
                </a>
                <div class="card-body">
                    <span class="card-text"><?= $row['age_rating'] ?>+</span><br>
                    <a href="#" class="vertical-truncate d-sm-block d-md-none card-title fw-bold text-decoration-none"><?= $row['name'] ?></a>
                    <a href="#" class=" d-md-block d-none card-title h3 text-decoration-none"><?= $row['name'] ?></a>
                </div>
            </div>
        </div>
    <?php endforeach;
    unset($row);
    ?>
</div>
<?= $this->endSection(); ?>