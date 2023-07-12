<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<?php
if (session()->get('selected')) {
    $selected = session()->get('selected');
    $selected = array_filter(explode(',', $selected));
} else {
    $selected = [];
}
// dd($selected, session()->get('seat'));
?>

<div class="container">
    <div class="mb-3 d-flex justify-content-center align-items-center">
        <h3>Book your seats (<?= count($selected) ?> out of <?= $seat ?? 0 ?>)</h3>
    </div>
</div>
<div class="d-flex justify-content-center align-items-center">
    <div class="row d-flex justify-content-center align-items-center seat">
        <!-- (.col-2>btn.btn.btn-success.m-1{$})*60^.d-flex.justify-content-center>(.col-2>btn.btn.btn-success.m-1{$})*4 -->
        <?php for ($i = 0; $i < 64; $i++) : ?>
            <div class="col-1 m-1">
                <form action="seat/<?= $i + 1 ?>" method="post">
                    <button type="submit" class="btn <?= in_array($i + 1, $selected) ? 'btn-success' : (in_array($i + 1, $booked) ? 'btn-danger' : 'btn-disabled border-success'); ?>" style="min-width: 45px;" <?= (in_array($i + 1, $selected) || in_array($i + 1, $booked)) ? 'disabled' : ''; ?> <?= (!$seat) ? 'disabled' : ''; ?>><?= $i + 1  ?></button>
                </form>
            </div>
        <?php endfor; ?>

        <!-- <div class="d-flex justify-content-center">
                <?php for ($i = 60; $i < 64; $i++) : ?>
                    <div class="col-1 m-1">
                        <form action="seat/<?= $i + 1 ?>" method="post">
                            <button type="submit" class="btn btn-danger" style="min-width: 45px;" disabled><?= $i + 1 ?></button>
                        </form>
                    </div>
                <?php endfor; ?>
            </div> -->
    </div>
</div>

<?= $this->endSection(); ?>