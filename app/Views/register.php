<?php $error = [
    'name' => false,
    'email' => false,
    'birthdate' => false,
    'password' => false,
    'password_confirm' => false,
];
if (session()->getFlashdata('error_register')) {
    $su = session()->getFlashdata('error_register');
    foreach ($su as $key => $val) {
        $error[$key] = $val;
    }
} ?>
<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-center align-items-center">
    <div class="container">
        <h5 class="fw-bold mb-4 fs-2 text-center">Sign up</h5>
        <form action="<?= base_url('register') ?>" method="post">
            <div class="form-floating mb-3">
                <input required type="text" name="name" class="form-control rounded-3 <?= ($error['name']) ? 'is-invalid' : ''; ?>" id="name" value="<?= old('name') ?>" placeholder="name">
                <label for="name">Name</label>
                <div id="invalid-name" class="invalid-feedback">
                    <?= $error['name'] ?? '' ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input required type="email" name="email" class="form-control rounded-3 <?= ($error['email']) ? 'is-invalid' : ''; ?>" id="floatingInput" value="<?= old('email') ?>" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                <div id="invalid-email" class="invalid-feedback">
                    <?= $error['email'] ?? '' ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input required type="date" name="birthdate" class="form-control rounded-3 <?= ($error['birthdate']) ? 'is-invalid' : ''; ?>" id="birthdate" value="<?= old('birthdate') ?>" placeholder="lol" value="<?= date('Y-m-d', strtotime('-12 year', time())) ?>">
                <label for="birthdate">Birth date</label>
                <div id="invalid-birthdate" class="invalid-feedback">
                    <?= $error['birthdate'] ?? '' ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input required type="password" name="password" class="form-control rounded-3 <?= ($error['password']) ? 'is-invalid' : ''; ?>" id="password1" value="<?= old('password') ?>" placeholder="Password1">
                <label for="password1">Password</label>
                <div id="invalid-password" class="invalid-feedback">
                    <?= $error['password'] ?? '' ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input required type="password" name="password_confirm" class="form-control rounded-3 <?= ($error['password_confirm']) ? 'is-invalid' : ''; ?>" id="password2" placeholder="Password">
                <label for="password2">Confirm Password</label>
                <div id="invalid-password_confirm" class="invalid-feedback">
                    <?= $error['password_confirm'] ?? '' ?>
                </div>
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit">Sign up</button>
        </form>
        <p class="text-body-secondary">Already have an account? <a class="text-link text-danger text-decoration-none" href="#signin" data-bs-toggle="modal" data-bs-target="#signin">sign in here</a>.</p>
    </div>
</div>
<?= $this->endSection(); ?>