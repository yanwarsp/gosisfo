<?= $this->extend('layout/_template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2 class="opening">List Staff</h2>
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
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
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
                            <td><?= $r['name']; ?></td>
                            <td><a href="/user/staff/<?= $r['username']; ?>" class="btn btn-success">View</a></td>
                            <td><a href="/user/profile_staff/<?= $r['username']; ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="/user/delete_staff/<?= $r['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>