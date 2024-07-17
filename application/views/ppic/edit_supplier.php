<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/supplier') ?>">Supplier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Supplier</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Edit Supplier</div>
                        <hr>
                        <form action="<?= base_url('ppic/supplier/editAksi') ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php foreach ($supplier as $s): ?>
                            <div class="form-group">
                                <label>Kode Supplier</label>
                                <input type="text" name="kd_supplier" value="<?= $s->kd_supplier ?>"
                                    class="form-control">
                                <input type="hidden" name="id_supplier" value="<?= $s->id_supplier ?>" id="">
                            </div>
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" name="nm_supplier" class="form-control"
                                    value="<?= $s->nm_supplier ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $s->alamat ?>">
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" class="form-control" name="no_telp" value="<?= $s->no_telp ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-light px-5">Simpan</button>
                            </div>
                            <?php endforeach; ?>
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