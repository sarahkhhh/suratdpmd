<section>
    <div class="container-fluid d-flex justify-content-center flex-column text-center">
        <div class="row d-flex justify-content-center">
            <h1>Profil Akun</h1>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h5>Nama Lengkap</h5>
            </div>
            <div class="col-md-12">
                <input type="text" name="name" id="name" value="<?= $user['username'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h5>Email</h5>
            </div>
            <div class="col-md-12">
                <input type="email" name="email" id="email" value="<?= $user['email']; ?>" disabled>
            </div>
        </div>
    </div>
</section>