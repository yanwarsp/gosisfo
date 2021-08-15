<?= $this->extend('layout/_template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-success" role="alert" style="text-align: center;">
        <?= session()->getFlashdata('msg'); ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('err')) : ?>
    <div class="alert alert-danger" role="alert" style="text-align: center;">
        <?= session()->getFlashdata('err'); ?>
    </div>
<?php endif; ?>

<div class="container components">
    <div class="row login-row">
        <div class="col login-col">
            <form action="/user/update_staff/<?= $username['id']; ?>" method="POST">
                <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                        <?= session()->getFlashdata('msg'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('err')) : ?>
                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                        <?= session()->getFlashdata('err'); ?>
                    </div>
                <?php endif; ?> <?= csrf_field(); ?>
                <h3 class="my-3" style="text-align: center;"><i class="fas fa-user"></i>Profil</h3>
                <hr>
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Name" autofocus>
                </div>
                <label class="form-label">Institute</label>
                <select class="form-select mb-3" aria-label="Default select example" name="institute">
                    <option selected>Institute</option>
                    <?php foreach ($institute as $i) : ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                    <?php endforeach; ?>
                </select>
                <label class="form-label">Job Description</label>
                <select class="form-select mb-3" aria-label="Default select example" name="job_desc">
                    <option selected>Job Description</option>
                    <?php foreach ($job as $j) : ?>
                        <option value="<?= $j; ?>"><?= $j; ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="container">
                    <div class="row">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>