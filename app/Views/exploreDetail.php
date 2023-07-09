<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

<div class="row overflow-auto">
    <div class="col-lg-4 col-md-6 d-flex d-md-block justify-content-center align-items-center">
        <img src="<?= $data['poster_url'] ?>" alt="<?= $data['name'] ?>" class="cover">
    </div>
    <div class="col-lg-4 col-md-6 mt-3 mt-md-0">
        <h3 class="mb-0 mb-md-3"><?= $data['name'] ?></h3>
        <h5 class="underline my-3">Description</h5>
        <span><?= $data['description'] ?></span>
        <h5 class="underline my-3">Age Rating</h5>
        <span><?= $data['age_rating'] ?>+</span>
        <h5 class="underline my-3">Release Date</h5>
        <span><?= date('D, d F Y', strtotime($data['release_date'])) ?></span>
        <div class="d-block d-lg-none">
            <h5 class="mb-0 mt-lg-5 mt-3">Ticket Price</h5>
            <span class="fs-4 underline">Rp. <?= number_format($data['ticket_price'], 0, ',', '.') ?></span>
            <br>
            <a href="../book/<?= $data['name'] ?>" class="btn btn-danger fw-bold mt-4">Buy Ticket</a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 d-none d-lg-block">
        <h5 class="mb-0 mt-lg-5 mt-3">Ticket Price</h5>
        <span class="fs-4 underline">Rp. <?= number_format($data['ticket_price'], 0, ',', '.') ?></span>
        <br>
        <a href="../book/<?= $data['name'] ?>" class="btn btn-danger fw-bold mt-4">Buy Ticket</a>
    </div>
</div>
<?= $this->endSection(); ?>