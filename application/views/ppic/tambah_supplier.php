<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/supplier') ?>">Supplier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Supplier</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Tambah Supplier</div>
                        <hr>
                        <form action="<?= base_url('ppic/supplier/tambahAksi') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Kode Supplier</label>
                                <input type="text" name="kd_supplier" class="form-control" placeholder="Masukkan Kode">
                                <?php echo form_error('kd_supplier', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" name="nm_supplier" class="form-control" placeholder="Masukkan Nama">
                                <?php echo form_error('nm_supplier', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" id="" class="form-control"
                                    placeholder="Masukkan Alamat"></textarea>
                                <?php echo form_error('alamat', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="number" name="no_telp" class="form-control" placeholder="Masukkan Telepon">
                                <?php echo form_error('no_telp', '<div class = "text-small text-danger"></div>') ?>
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