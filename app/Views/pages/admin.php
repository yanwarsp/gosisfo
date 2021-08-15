<?= $this->extend('layout/_template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2 class="opening">Admin List</h2>
        </div>
    </div>
</div>

<div class="container my-2 lists">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Username</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($roles as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= ucfirst($r['roles']); ?></td>
                            <td><?= $r['username']; ?></td>
                            <td><a href="/user/delete_admin/<?= $r['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- <div class="container">
    <div class="row">
        <div class="col">
            <a href="/auth/logout" class="btn btn-success">Logout</a>
        </div>
    </div>
</div> -->

<?= $this->endSection(); ?>