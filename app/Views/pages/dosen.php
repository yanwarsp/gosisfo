<?= $this->extend('layout/_template'); ?>

<?= $this->section('content'); ?>


<div class="container components">
    <div class="row">
        <div class="col">
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
            <h3 style="text-align: center;">Profile</h3>
            <div class="card" style="width: 18rem;">
                <div class="container">
                    <img src="/img/default.svg" class="card-img-top img" alt="default">
                </div>

                <div class="card-body">
                    <h5 class="card-title"><?= strtoupper($username['name']); ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= ucfirst($username['roles']); ?></li>
                    <li class="list-group-item"><?= $username['institute']; ?></li>
                    <li class="list-group-item"><?= $username['job_desc']; ?></li>
                </ul>
                <?php if (session('roles') == 'admin') : ?>
                <?php else : ?>
                    <div class="card-body">
                        <a href="/auth/logout" class="btn btn-success">Log Out</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>