<?php
$error = [
    'name' => false,
    'username' => false,
    'birthdate' => false,
    'password' => false,
    'password_confirm' => false,
];
if (session()->getFlashdata('error_login')) {
    $su = session()->getFlashdata('error_login');
    foreach ($su as $key => $val) {
        $error[$key] = $val;
    }
} ?>
<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-center align-items-center">
    <div class="container">
        <h5 class="fw-bold mb-4 fs-2 text-center">Sign in</h5>
        <form action="<?= base_url('login') ?>" method="post">
            <div class="form-floating mb-3">
                <input required type="text" class="form-control rounded-3 <?= ($error['username']) ? 'is-invalid' : ''; ?>" id="username" value="<?= old('username') ?>" placeholder="sada" name="username" pattern="[A-Za-z0-9]+">
                <label for="username">Username</label>
                <div id="invalid-username" class="invalid-feedback">
                    <?= $error['username'] ?? '' ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input required type="password" class="form-control rounded-3" id="password" placeholder="Password" <?= ($error['password']) ? 'is-invalid' : ''; ?> name="password">
                <label for="password">Password</label>
                <div id="invalid-password" class="invalid-feedback">
                    <?= $error['password'] ?? '' ?>
                </div>
            </div>
            <button class="w-100 btn btn-lg rounded-3 btn-outline-danger" type="submit">Enter</button>
        </form>

        <h5 class="fw-bold my-4 fs-4 text-center">Don't have account yet?</h5>

        <button class="w-100 btn btn-lg rounded-3 btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#signup">Sign Up</button>
    </div>
</div>
<?= $this->endSection(); ?>