<div class="container d-md-block d-none">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="<?= base_url() ?>" class="d-inline-flex link-body-emphasis text-decoration-none h3">
                SEA&nbsp;<span class="text-danger">Cinema</span>
            </a>
        </div>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?= base_url() ?>" class="nav-link fs-5 px-2 <?= (uri_string() == '') ? 'link-danger' : 'link-secondary'; ?>">Movies</a></li>
            <li><a href="<?= base_url('explore') ?>" class="nav-link fs-5 px-2 <?= (uri_string() == 'explore') ? 'link-danger' : 'link-secondary'; ?>">Explore</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline-danger rounded-3" data-bs-toggle="modal" data-bs-target="#search"><i class="bi bi-search"></i> Search</button>
            </div>
            <span class="mx-3 underline">Rp0</span>
            <button type="button" class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#signin">Login</button>
        </div>
    </header>
</div>

<nav class="navbar navbar-expand-lg bg-body-tertiary d-sm-block d-md-none">
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
                    <a class="nav-link" href="<?= base_url('explore') ?>">Explore</a>
                </li>
            </ul>

            <!-- <span class="mb-3" style="text-underline-offset: 8px; text-decoration-color: red;">Rp0</span> -->

            <button class="w-100 btn btn-md rounded-3 btn-outline-danger" data-bs-toggle="modal" data-bs-target="#signin">Login</button>
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
                <form class="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="search" placeholder="sada">
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
                <form class="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="name" placeholder="sada">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" id="password" placeholder="Password">
                        <label for="password">Password</label>
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
                <form class="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="name" placeholder="asd">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" id="password1" placeholder="Password1">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" id="password2" placeholder="Password">
                        <label for="password2">Confirm Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit">Sign up</button>
                </form>
                <p class="text-body-secondary">Already have an account? <a class="text-link text-danger text-decoration-none" href="#signin" data-bs-toggle="modal" data-bs-target="#signin">sign in here</a>.</p>
            </div>
        </div>
    </div>
</div>