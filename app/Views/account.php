<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<?php
$error = [
    'name' => '',
    'username' => '',
    'birthdate' => '',
    'password' => '',
    'password_confirm' => '',
];
if (session()->getFlashdata('error')) {
    $su = session()->getFlashdata('error');
    foreach ($su as $key => $val) {
        $error[$key] = $val;
    }
} ?>
<?php if (session()->get('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif ?>
<!-- <div class="row"> -->
<!-- <div class="col-md-4 col-0 d-md-block d-none">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link ms-3 my-1" href="#item-1-2">Balance</a>
                <a class="nav-link" href="#item-2">Tickets</a>
                <a class="nav-link" href="#item-1">Account</a>
                <a class="nav-link ms-3 my-1" href="#item-1-1">Profile</a>
            </nav>
        </nav>
        </nav>
    </div> -->

<!-- <div class="col-md-8 col-12"> -->
<div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
    <div class="mb-4" id="item-1-2">
        <h5 class="underline mb-4">Balance</h5>
        <div class="d-flex">
            <p class="fs-3 fw-bold"><?= 'Rp. ' . number_format($user['balance'], 0, ',', '.') ?></p>
            <button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#topup">Top Up</button>
            <button class="btn btn-outline-danger ms-3" data-bs-toggle="modal" data-bs-target="#withdraw">Withdraw</button>
        </div>
    </div>
    <hr>
    <div class="my-3 row" id="item-2">
        <h4 class="underline mb-4">Tickets</h4>
        <?php if (count($movie) > 0) : ?>
            <?php foreach ($movie as $key) : ?>
                <div class="card mb-3 col-md-6 col-xl-4 rounded-5">
                    <div class="card-body row d-flex justify-content-center align-items-center">
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <img src="<?= $key['poster_url'] ?>" alt="<?= $key['name'] ?>" class="rounded-4" width="100">
                        </div>
                        <div class="col-6">
                            <h5><?= $key['name'] ?></h5>
                            <div class="d-block mb-3">
                                <span>Seat : <?= $key['seat_number'] ?></span>
                                <br>
                                <span><?= date('D, j M Y', strtotime($key['date'])) ?></span>
                                <br>
                                <span><?= 'Rp. ' . number_format($key['ticket_price'], 0, ',', '.') ?></span>
                            </div>
                            <?php if ($key['status'] === 'cancel') : ?>
                                <button class="btn btn-disabled" type="submit">Cancelled</button>
                            <?php else : ?>
                                <button class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#cancel<?= $key['history_id'] ?>">Cancel</button>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <div class="card mb-3">
                <div class="card-body">
                    You don't have any ticket
                </div>
            </div>
        <?php endif ?>
    </div>
    <hr>
    <div class="my-2" id="item-1">
        <h4>Account</h4>
    </div>
    <a href="logout" class="btn btn-danger mb-5">Logout</a>
    <div class="mb-3" id="item-1-1">
        <h5 class="underline mb-4">Profile</h5>
        <form action="<?= base_url('update') ?>" method="post">
            <div class="form-floating mb-3">
                <input type="hidden" name="id" value="<?= session()->get('id') ?>">
                <input type="text" name="name" class="form-control rounded-3 <?= ($error['name']) ? 'is-invalid' : ''; ?>" id="name" value="<?= old('name') ?? $user['name'] ?>" placeholder="name">
                <label for="name">Name</label>
                <div id="invalid-name" class="invalid-feedback">
                    <?= $error['name'] ?? '' ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control rounded-3 <?= ($error['username']) ? 'is-invalid' : ''; ?>" id="floatingInput" value="<?= old('username') ?? $user['username'] ?>" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
                <div id="invalid-username" class="invalid-feedback">
                    <?= $error['username'] ?? '' ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="date" name="birthdate" class="form-control rounded-3 <?= ($error['birthdate']) ? 'is-invalid' : ''; ?>" id="birthdate" placeholder="lol" value="<?= old('birthdate') ?? $user['birthdate'] ?>">
                <label for="birthdate">Birth date</label>
                <div id="invalid-birthdate" class="invalid-feedback">
                    <?= $error['birthdate'] ?? '' ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control rounded-3 <?= ($error['password']) ? 'is-invalid' : ''; ?>" id="password1" value="<?= old('password') ?>" placeholder="Password1">
                <label for="password1">Password</label>
                <div id="invalid-password" class="invalid-feedback">
                    <?= $error['password'] ?? '' ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password_confirm" class="form-control rounded-3 <?= ($error['password_confirm']) ? 'is-invalid' : ''; ?>" id="password2" placeholder="Password">
                <label for="password2">Confirm Password</label>
                <div id="invalid-password_confirm" class="invalid-feedback">
                    <?= $error['password_confirm'] ?? '' ?>
                </div>
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit">Update</button>
        </form>
    </div>
</div>
<!-- </div>
</div> -->

<div class="modal fade" id="topup" tabindex="-1" aria-labelledby="topupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-3 pb-4 border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-3 pt-0">
                <h1 class="fw-bold mb-0 fs-3">Top up balance</h1>
                <hr>
                <form action="<?= base_url('topup') ?>" method="post">
                    <div class="form-floating mb-3">
                        <input required type="number" name="topup" min="10000" class="form-control rounded-3" id="topup" placeholder="sada">
                        <label for="topup">Amount</label>
                    </div>
                    <button class="w-100 btn btn-lg rounded-3 btn-outline-danger" type="submit">Enter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="withdraw" tabindex="-1" aria-labelledby="withdrawLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-3 pb-4 border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-3 pt-0">
                <h1 class="fw-bold mb-0 fs-3">Withdraw balance</h1>
                <hr>
                <form action="<?= base_url('withdraw') ?>" method="post">
                    <div class="form-floating mb-3">
                        <input required type="number" name="withdraw" min="1" max="<?= $user['balance'] ?>" class="form-control rounded-3" id="withdraw" placeholder="sada">
                        <label for="withdraw">Amount</label>
                    </div>
                    <button class="w-100 btn btn-lg rounded-3 btn-outline-danger" type="submit">Enter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (count($movie) > 0) : ?>
    <?php foreach ($movie as $key) : ?>
        <div class="modal fade" id="cancel<?= $key['history_id'] ?>" tabindex="-1" aria-labelledby="cancelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="<?= base_url('cancel/' . $key['history_id']) ?>" method="post">
                    <div class="modal-content rounded-3 shadow">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-0">Are you sure you want to cancel it?</h5>
                            <p class="mb-0">Your ticket will be refunded.</p>
                        </div>
                        <div class="modal-footer flex-nowrap p-0">
                            <button type="submit" class="btn btn-lg btn-link text-danger fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end"><strong>Yes, cancel it</strong></button>
                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">No, nvm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach ?>
<?php endif; ?>
<?= $this->endSection(); ?>