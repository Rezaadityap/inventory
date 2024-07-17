<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/kimia') ?>">Kimia</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Stok</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Tambah Stok Kimia</div>
                        <hr>
                        <form action="<?= base_url('ppic/kimia/tambahStokAksi') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Kimia</label>
                                <select name="kd_kimia" id="" class="form-control">
                                    <option value="">-- Pilih Kimia --</option>
                                    <?php foreach ($kimia as $k): ?>
                                    <option value="<?php echo $k->kd_kimia ?>">
                                        <?php echo $k->nm_kimia ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('kd_kimia', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" name="tgl_masuk" class="form-control"
                                    value="<?php echo date('Y-m-d'); ?>">
                                <?php echo form_error('tgl_masuk', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class=" form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" placeholder="0">
                                <?php echo form_error('jumlah', '<div class = "text-small text-danger"></div>') ?>
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