<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('plating/permintaan') ?>">Permintaan</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('plating/permintaan/keranjang') ?>">Keranjang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Transaksi Permintaan</div>
                        <hr>
                        <form action="<?= base_url('plating/permintaan/proses') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Yang meminta</label>
                                <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                                <input type="text" name="nama_user" class="form-control"
                                    value="<?= $this->session->userdata('nama_user') ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Yang mengetahui</label>
                                <select name="mengetahui" id="" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($leader as $l): ?>
                                        <option value="<?php echo $l->nama_user ?>"> <?php echo $l->nama_user ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('mengetahui', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal_minta" class="form-control"
                                    value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group">
                                <a href="<?= base_url('plating/permintaan/keranjang') ?>"
                                    class="btn btn-danger px-5">Kembali</a>
                                <button type="submit" class="btn btn-light px-5">Ajukan</button>
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