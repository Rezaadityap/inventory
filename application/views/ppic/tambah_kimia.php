<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/kimia') ?>">Kimia</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Kimia</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Tambah Kimia</div>
                        <hr>
                        <form action="<?= base_url('ppic/kimia/tambahAksi') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Kode Kimia</label>
                                <input type="text" name="kd_kimia" class="form-control"
                                    placeholder="Masukkan Kode Kimia">
                                <?php echo form_error('kd_kimia', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Kimia</label>
                                <input type="text" name="nm_kimia" class="form-control"
                                    placeholder="Masukkan Nama Kimia">
                                <?php echo form_error('nm_kimia', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <select name="satuan" id="" class="form-control">
                                    <option value="">-- Pilih Satuan --</option>
                                    <option value="Jrg">Jrg</option>
                                    <option value="Sak">Sak</option>
                                    <option value="Dus">Dus</option>
                                    <option value="Klg">Klg</option>
                                    <option value="Btl">Btl</option>
                                </select>
                                <?php echo form_error('satuan', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Supplier</label>
                                <select name="id_supplier" id="" class="form-control">
                                    <option value="">-- Pilih Supplier --</option>
                                    <?php foreach ($supplier as $s): ?>
                                        <option value="<?php echo $s->id_supplier ?>">
                                            <?php echo $s->nm_supplier ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_supplier', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" name="stok" class="form-control" placeholder="0" value='0' readonly>
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