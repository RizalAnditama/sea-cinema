<?php

use App\Models\UserModel;

$error = [
    'name' => false,
    'username' => false,
    'birthdate' => false,
    'password' => false,
    'password_confirm' => false,
];

if (session()->get('isLoggedIn')) {
    $model = new UserModel();
    $userData = $model->find(session()->get('id'));
}

?>
<div class="container-fluid d-xl-block d-none">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="<?= base_url() ?>" class="d-inline-flex link-body-emphasis text-decoration-none h3">
                SEA&nbsp;<span class="text-danger">Cinema</span>
            </a>
        </div>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <!-- <li><a href="<?= base_url() ?>" class="nav-link fs-5 px-2 <?= (uri_string() == '') ? 'link-danger' : 'link-secondary'; ?>">Movies</a></li> -->
            <!-- <li><a href="<?= base_url('explore') ?>" class="nav-link fs-5 px-2 <?= (uri_string() == 'explore') ? 'link-danger' : 'link-secondary'; ?>">Explore</a></li> -->
        </ul>

        <div class="col-md-3 text-end">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline-danger rounded-3" data-bs-toggle="modal" data-bs-target="#search"><i class="bi bi-search"></i> Search</button>
            </div>
            <?php if (session()->get('isLoggedIn')) : ?>
                <a href="<?= site_url('account#balance') ?>" class="mx-3 underline text-white"><?= 'Rp. ' . number_format($userData['balance'], 0, ',', '.') ?></a>
                <a href="<?= base_url('account') ?>" class="btn btn-danger fw-bold">Account</a>
            <?php else : ?>
                <button type="button" class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#signin">Login</button>
            <?php endif; ?>
        </div>
    </header>
</div>

<nav class="navbar navbar-expand-lg bg-body-tertiary d-sm-block d-xl-none">
    <div class="container-fluid">
        <a href="<?= base_url() ?>" class="navbar-brand d-inline-flex link-body-emphasis text-decoration-none h3">
            SEA&nbsp;<span class="text-danger">Cinema</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">Home</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="<?= base_url('explore') ?>">Explore</a> -->
                </li>
                <!-- <span class="mb-3" style="text-underline-offset: 8px; text-decoration-color: red;">Rp0</span> -->
                <?php if (!session()->get('isLoggedIn')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#signin" data-bs-toggle="modal" data-bs-target="#signin">Sign in</a>
                    </li>
                    <!-- <button class="w-100 btn btn-md rounded-3 btn-outline-danger mt-2" data-bs-toggle="modal" data-bs-target="#signin">Login</button> -->
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('account#balance') ?>">Account (<?= 'Rp. ' . number_format($userData['balance'], 0, ',', '.') ?>)</a>
                    </li>
                <?php endif ?>
            </ul>
            <div class="btn-group rounded-5 d-flex my-3" role="group" aria-label="Basic outlined example">
                <input required class="form-control rounded-0" type="text" placeholder="Search by keyword">
                <button type="button" class="btn btn-outline-danger">search</button>
            </div>
        </div>
    </div>
</nav>
<br>

<div class="modal fade" id="search" tabindex="-1" aria-labelledby="searchLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <h1 class="fw-bold mb-0 fs-3">What are you searching for?</h1>
                <hr>
                <form action="<?= base_url('explore') ?>" method="get">
                    <div class="form-floating mb-3">
                        <input required type="text" name="keyword" class="form-control rounded-3" id="search" placeholder="sada">
                        <label for="search">Search by Keyword</label>
                    </div>
                    <button class="w-100 btn btn-lg rounded-3 btn-outline-danger" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signin" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <h1 class="fw-bold mb-0 fs-2">Login</h1>
                <hr>
                <form action="<?= base_url('login') ?>" method="post">
                    <div class="form-floating mb-3">
                        <input required type="text" class="form-control rounded-3 <?= ($error['username']) ? 'is-invalid' : ''; ?>" id="username" value="<?= old('username') ?>" placeholder="sada" name="username" pattern="[A-Za-z0-9]+">
                        <label for="username">username</label>
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

                <h5 class="fw-bold my-4 fs-2 text-center">Don't have account yet?</h5>

                <button class="w-100 btn btn-lg rounded-3 btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#signup">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Sign up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="<?= base_url('register') ?>" method="post">
                    <div class="form-floating mb-3">
                        <input required type="text" name="name" class="form-control rounded-3 <?= ($error['name']) ? 'is-invalid' : ''; ?>" id="name" value="<?= old('name') ?>" placeholder="name">
                        <label for="name">Name</label>
                        <div id="invalid-name" class="invalid-feedback">
                            <?= $error['name'] ?? '' ?>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input required type="text" name="username" class="form-control rounded-3 <?= ($error['username']) ? 'is-invalid' : ''; ?>" id="floatingInput" value="<?= old('username') ?>" placeholder="name@example.com" pattern="[A-Za-z0-9]+">
                        <label for="floatingInput">Username</label>
                        <div id="invalid-username" class="invalid-feedback">
                            <?= $error['username'] ?? '' ?>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input required type="date" name="birthdate" class="form-control rounded-3 <?= ($error['birthdate']) ? 'is-invalid' : ''; ?>" id="birthdate" value="<?= old('birthdate') ?>" placeholder="lol">
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
    </div>
</div>