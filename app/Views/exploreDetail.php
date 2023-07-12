<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<?php if (session()->get('validation')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->get('validation') ?>
    </div>
<?php elseif (session()->get('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-lg-4 col-6 d-md-block ">
        <img src="<?= $data['poster_url'] ?>" alt="<?= $data['name'] ?>" style="max-width: 100%;" class="mt-md-2 mt-4 rounded-5">
    </div>
    <!-- For mobile device -->
    <div class="col-lg-4 col-6 my-3 mt-md-0">
        <h3 class="mb-0 mb-md-3"><?= $data['name'] ?></h3>
        <div class="d-block d-lg-none">
            <small>Age rating : 10+</small>
            <h5 class="mb-0 mt-lg-5 mt-3">Ticket Price</h5>
            <span class="fs-4 underline">Rp. <?= number_format($data['ticket_price'], 0, ',', '.') ?></span>
            <br>
            <?php if (session()->get('isLoggedIn')) : ?>
                <form action="../book/<?= $data['name'] ?>" method="post">
                    <button type="submit" class="btn btn-danger fw-bold mt-4" <?= (session()->get('validation')) ? 'disabled' : ''; ?>>Buy Ticket</button>
                </form>
            <?php else : ?>
                <button class="btn btn-danger fw-bold mt-4" data-bs-toggle="modal" data-bs-target="#signin">Buy Ticket</button>
            <?php endif ?>
        </div>

        <div class="d-none d-sm-block">
            <h5 class="underline my-3">Age Rating</h5>
            <span><?= $data['age_rating'] ?>+</span>
            <h5 class="underline my-3">Description</h5>
            <span class="text-justify"><?= $data['description'] ?></span>
            <h5 class="underline my-3">Release Date</h5>
            <span><?= date('D, d F Y', strtotime($data['release_date'])) ?></span>
        </div>
    </div>
    <div class="d-block d-sm-none mb-3">
        <h5 class="underline my-3">Description</h5>
        <span class="text-justify"><?= $data['description'] ?></span>
        <!-- <h5 class="underline my-3">Age Rating</h5>
        <span><?= $data['age_rating'] ?>+</span> -->
        <h5 class="underline my-3">Release Date</h5>
        <span><?= date('D, d F Y', strtotime($data['release_date'])) ?></span>
    </div>
    <!-- For desktop -->
    <div class="col-lg-4 d-none d-lg-block">
        <h5 class="mb-0 mt-lg-5 mt-3">Ticket Price</h5>
        <span class="fs-4 underline">Rp. <?= number_format($data['ticket_price'], 0, ',', '.') ?></span>
        <br>
        <?php if (session()->get('isLoggedIn')) : ?>
            <form action="../book/<?= $data['name'] ?>" method="post">
                <button type="submit" class="btn btn-danger fw-bold mt-4" <?= (session()->get('validation')) ? 'disabled' : ''; ?>>Buy Ticket</button>
            </form>
        <?php else : ?>
            <button class="btn btn-danger fw-bold mt-4" data-bs-toggle="modal" data-bs-target="#signin">Buy Ticket</button>
        <?php endif ?>
    </div>
</div>
<?= $this->endSection(); ?>