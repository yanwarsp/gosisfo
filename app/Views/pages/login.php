<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container login">
  <div class="row login-row">
    <div class="col login-col">
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
      <form action="auth/valid_login" method="POST">
        <?= csrf_field(); ?>
        <h3 class="my-3" style="text-align: center;"><i class="fas fa-user"></i> Login</h3>
        <hr>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input name="username" type="text" class="form-control" placeholder="Username" autofocus autocomplete="off">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input name="password" type="password" class="form-control" placeholder="Password">
        </div>
        <div class="container">
          <div class="row">
            <button type="submit" class="btn btn-success">Login</button>
          </div>
        </div>
        <p class="mt-3" style="text-align: center;">Haven't create an account? <a href="/register">Sign Up</a></p>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>