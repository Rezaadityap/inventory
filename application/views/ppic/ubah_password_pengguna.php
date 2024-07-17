<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/profil') ?>">Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Ubah Password</div>
                        <hr>
                        <form action="<?= base_url('ppic/profil/ubahPasswordAksi') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="password1" placeholder="Masukkan Password Baru"
                                    class="form-control">
                                <?php echo form_error('password', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password</label>
                                <input type="password" name="password2" placeholder="Ulangi Password"
                                    class="form-control">
                                <?php echo form_error('password2', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-light px-5">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->