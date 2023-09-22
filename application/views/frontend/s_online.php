<section class="page-section">
    <div class="container mb-5">
        <?php if ($this->session->flashdata('success') == TRUE) : ?>
            <?= $this->session->flashdata('success') ?>
        <?php endif; ?>
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Pengajuan Surat Online</h2>
            <h3 class="section-subheading text-muted">Isi Form Pengajuan Surat Dibawah:</h3>
        </div>
        <div class="text-justify pl-5 pr-5">
            <?= form_open_multipart('suratonline/ajukan', 'id="ajukanSurat"') ?>
            <div class="row">
                <div class="col-lg-6">
                    <label for="nik">NIK *</label>
                    <?= form_input(['name' => 'nik', 'id' => 'nik', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan NIK anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="nama">Nama *</label>
                    <?= form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan nama anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="tempat_lahir">Tempat Lahir *</label>
                    <?= form_input(['name' => 'tempat_lahir', 'id' => 'tempat_lahir', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan tempat lahir anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="tanggal_lahir">Tanggal Lahir *</label>
                    <?= form_input(['name' => 'tanggal_lahir', 'id' => 'tanggal_lahir', 'type' => 'date', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan tanggal lahir anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="gender">Gender *</label>
                    <select name="gender" id="gender" class="form-control mb-2" required="required">
                        <option value="" disabled selected>Pilih gender anda</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="nama">Pekerjaan *</label>
                    <?= form_input(['name' => 'pekerjaan', 'id' => 'pekerjaan', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan pekerjaan anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="nama">Status Perkawinan *</label>
                    <?= form_input(['name' => 'status', 'id' => 'status', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan status anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="nama">Pendidikan Terakhir *</label>
                    <?= form_input(['name' => 'pendidikan', 'id' => 'pendidikan', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan pendidikan terakhir anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="nama">Agama *</label>
                    <?= form_input(['name' => 'agama', 'id' => 'agama', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan agama anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="no_hp">No Hp *</label>
                    <?= form_input(['type' => 'text', 'name' => 'no_hp', 'id' => 'no_hp', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan No Hp anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="nama">Alamat *</label>
                    <?= form_input(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan alamat anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="nama">Desa *</label>
                    <?= form_input(['name' => 'desa', 'id' => 'desa', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan desa anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="nama">Kecamatan *</label>
                    <?= form_input(['name' => 'kecamatan', 'id' => 'kecamatan', 'class' => 'form-control mb-2', 'required' => 'required', 'placeholder' => 'Silahkan masukkan kecamatan anda']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="file">Scan KTP (asli)<sup class="text-danger">*PDF Recommended! | Max
                            5MB</sup></label>
                    <?= form_upload(['name' => 'ktp', 'id' => 'ktp', 'class' => 'form-control mb-2']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="file">Surat Pernyataan Pribadi<sup class="text-danger">*PDF Recommended! | Max
                            5MB</sup></label>
                    <?= form_upload(['name' => 'pribadi', 'id' => 'pribadi', 'class' => 'form-control mb-2']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="file">Suket Dari Desa<sup class="text-danger">*PDF Recommended! | Max
                            5MB</sup></label>
                    <?= form_upload(['name' => 'desa', 'id' => 'desa', 'class' => 'form-control mb-2']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="file">Suket Dari Camat<sup class="text-danger">*PDF Recommended! | Max
                            5MB</sup></label>
                    <?= form_upload(['name' => 'camat', 'id' => 'camat', 'class' => 'form-control mb-2']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="file">Scan Ijazah Terakhir<sup class="text-danger">*PDF Recommended! | Max
                            5MB</sup></label>
                    <?= form_upload(['name' => 'ijazah', 'id' => 'camat', 'class' => 'form-control mb-2']) ?>
                </div>
                <div class="col-lg-6">
                    <label for="file">Pas Foto Berwarna <sup class="text-danger">*PDF Recommended! | Max
                            5MB</sup></label>
                    <?= form_upload(['name' => 'foto', 'id' => 'camat', 'class' => 'form-control mb-2']) ?>
                </div>

            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-block btn-primary p-3">KIRIM PERMOHONAN</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>



</section>