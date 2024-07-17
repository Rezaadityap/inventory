<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/penerimaan') ?>">Penerimaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Transaksi Pengembalian</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Transaksi Pengembalian</div>
                        <hr>
                        <form action="<?= base_url('ppic/penerimaan/proses') ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php foreach ($users as $u): ?>
                            <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="hidden" name="id_user" value="<?= $u->id_user ?>" id="">
                                <input type="text" name="nama_user" value="<?= $u->nama_user ?>" id=""
                                    class="form-control" readonly>
                            </div>
                            <?php endforeach; ?>
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
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <input type="date" class="form-control" name="tanggal_kembali"
                                    value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group">
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