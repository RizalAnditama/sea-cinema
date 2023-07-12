<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
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
            <h5 class="mb-0 mt-lg-5 mt-3">Total Price</h5>
            <span class="fs-4 underline">Rp. <?= number_format($total, 0, ',', '.') ?></span>
            <br>
            <?php if ($userData['balance'] >= $total) : ?>
                <form action="./pay" method="post">
                    <input type="hidden" name="total" value="<?= $total ?>">
                    <input type="hidden" name="selected" value="<?= implode(',', $selected) ?>">
                    <button type="submit" class="btn btn-danger fw-bold mt-4">Pay</button>
                </form>
            <?php else : ?>
                <button class="btn btn-danger fw-bold mt-4" data-bs-toggle="modal" data-bs-target="#topup">Pay</button>
            <?php endif ?>
        </div>

        <div class="d-none d-sm-block">
            <h5 class="underline my-3">Watch Date</h5>
            <span><?= date('D, d F Y', time()) ?></span>
            <h5 class="underline my-3">Ticket Price</h5>
            <span><?= 'Rp. ' . number_format($data['ticket_price'], 0, ',', '.') ?> / Person</span>
            <h5 class="underline my-3">Selected Seats</h5>
            <?php foreach ($selected as $row) : ?>
                <button class="btn btn-success" disabled><?= $row ?></button>
            <?php endforeach ?>
        </div>
    </div>
    <div class="d-block d-sm-none mb-3">
        <h5 class="underline my-3">Watch Date</h5>
        <span><?= date('D, d F Y', time()) ?></span>
        <h5 class="underline my-3">Selected Seats</h5>
        <?php foreach ($selected as $row) : ?>
            <button class="btn btn-success" disabled><?= $row ?></button>
        <?php endforeach ?>
        <h5 class="underline my-3">Ticket Price</h5>
        <span><?= 'Rp. ' . number_format($data['ticket_price'], 0, ',', '.') ?> / Person</span>
    </div>
    <!-- For desktop -->
    <div class="col-lg-4 d-none d-lg-block">
        <h5 class="mb-0 mt-lg-5 mt-3">Total Price</h5>
        <span class="fs-4 underline">Rp. <?= number_format($total, 0, ',', '.') ?></span>
        <br>
        <?php if ($userData['balance'] >= $total) : ?>
            <form action="./pay" method="post">
                <input type="hidden" name="total" value="<?= $total ?>">
                <input type="hidden" name="selected" value="<?= implode(',', $selected) ?>">
                <button type="submit" class="btn btn-danger fw-bold mt-4">Pay</button>
            </form>
        <?php else : ?>
            <button class="btn btn-danger fw-bold mt-4" data-bs-toggle="modal" data-bs-target="#topup">Pay</button>
        <?php endif ?>
    </div>
</div>

<div class="modal fade" id="topup" tabindex="-1" aria-labelledby="topupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-3 pb-4 border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-3 pt-0">
                <h5 class="fw-bold mb-0 fs-5">Your balance is not enough</h5>
                <h3 class="fw-bold mb-0 fs-3">Top up</h3>
                <hr>
                <form action="<?= base_url('topup') ?>" method="post">
                    <div class="form-floating mb-3">
                        <input required type="number" name="topup" min="10000" class="form-control rounded-3" id="topup" placeholder="sada" value="<?= $total - $userData['balance'] ?>">
                        <label for="topup">Amount</label>
                    </div>
                    <button class="w-100 btn btn-lg rounded-3 btn-outline-danger" type="submit">Enter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->endSection(); ?>