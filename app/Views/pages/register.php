<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container login">
  <div class="row login-row">
    <div class="col login-col">
      <form action="auth/valid_register" method="POST">
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
        <?= csrf_field(); ?>
        <h3 class="my-3" style="text-align: center;"><i class="fas fa-user"></i> Create Account</h3>
        <hr>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input name="username" type="text" class="form-control" placeholder="Username" autofocus>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input name="password" type="password" class="form-control" placeholder="Password">
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="roles">
          <option selected>Roles</option>
          <option value="admin">Admin</option>
          <option value="dosen">Dosen</option>
          <option value="staff">Staff</option>
        </select>
        <div class="container">
          <div class="row">
            <button type="submit" class="btn btn-success">Sign Up</button>
          </div>
        </div>
        <p class="mt-3" style="text-align: center;">Already have an account? <a href="/login">Login</a></p>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>