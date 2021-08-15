<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand mx-3 my-2" href="/user/<?= session('roles'); ?>/<?= session('username'); ?>"><i class="fas fa-rocket"></i>&nbsp;&nbsp;GoSisfo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-3 my-2">
                    <a class="nav-link" aria-current="page" href='/user/<?= session('roles'); ?>/<?= session('username'); ?>'>Dashboard</a>

                </li>
                <li class="nav-item mx-3 my-2">
                    <a class="nav-link" aria-current="page" href='/user/list_dosen'>List Dosen</a>
                </li>
                <li class="nav-item mx-3 my-2">
                    <a class="nav-link" href='/user/list_staff'>List Staff</a>
                </li>
                <li class="nav-item mx-3 my-2">
                    <a class="nav-link" href="/auth/logout">Logout</a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</nav>