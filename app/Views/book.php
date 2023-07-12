<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="container mb-5">
    <form action="<?= base_url('seat') ?>" method="post">
        <h3 class="text-center mb-3">How many ticket you'd like to buy?</h3>
        <div class="d-flex justify-content-center">
            <div class="w-50 input-group input-group-lg">
                <input type="number" name="seat" class="form-control" aria-label="Number" aria-describedby="number" min="1" max="6" value="1" required>
                <button type="submit" class="btn btn-danger">Enter</button>
            </div>
        </div>
    </form>
    <div class="d-flex justify-content-center">
        <small class="text-center">You can only buy upto 6 tickets per transaction</small>
    </div>
</div>
<?= $this->endSection(); ?>