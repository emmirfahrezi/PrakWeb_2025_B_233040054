<div class="container">
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Selamat Datang di Website Saya!</h1>
            <p class="col-md-8 fs-4">Halo nama saya <?= isset($nama) ? htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') : ''; ?>.</p>
        </div>
    </div>
</div>