<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('plating/permintaan') ?>">Permintaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Belanja</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($kimia as $k): ?>
                        <div class="card-title">Form Permintaan Kimia</div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td><b>Kode Kimia </b></td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $k->kd_kimia ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Kimia </b></td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $k->nm_kimia ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Satuan </b></td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $k->satuan ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Stok </b></td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $k->stok ?>
                                        </td>
                                    </tr>
                                    <?php
                                        echo form_open('plating/permintaan/add');
                                        echo form_hidden('id', $k->id_kimia);
                                        echo form_hidden('price', $k->stok);
                                        echo form_hidden('name', $k->nm_kimia);
                                        ?>
                                    <td><b>Jumlah minta </b></td>
                                    <td>:</td>
                                    <td><input type="number" name="qty" class="form-control" placeholder="0" min="1"
                                            required>
                                    </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-light"><i class="bi bi-cart"></i>Tambah
                            permintaan</button>
                        <a href="<?php echo base_url('plating/permintaan') ?>" class="btn btn-danger"> Kembali</a>
                        <?php echo form_close(); ?>
                    </div>
                    <?php endforeach; ?>
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