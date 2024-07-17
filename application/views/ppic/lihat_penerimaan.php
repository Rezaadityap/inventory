<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/permintaan') ?>">Penerimaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lihat Penerimaan</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Penerimaan</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode Kimia</th>
                                        <th scope="col">Nama Kimia</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($penerimaan as $p): ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $no++ ?>
                                            </th>
                                            <td>
                                                <?= $p->kd_kimia ?>
                                            </td>
                                            <td>
                                                <?= $p->nm_kimia ?>
                                            </td>
                                            <td>
                                                <?= $p->tgl_masuk ?>
                                            </td>
                                            <td>
                                                <?= $p->jumlah ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url('ppic/penerimaan/konfirmasi') ?>">
                    <?php foreach ($penerimaan as $p): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault1">
                            <input type="hidden" name="id_stok" id="" value="<?= $p->id_stok ?>">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Barang OK
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="2" id="flexRadioDefault2"
                                checked>
                            <input type="hidden" name="id_stok" id="" value="<?= $p->id_stok ?>">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Barang NG
                            </label>
                        </div><br>
                        <button type="submit" class="btn btn-light px-5">Konfirmasi</button>
                    <?php endforeach; ?>
                    <a href="<?= base_url('ppic/penerimaan') ?>" class="btn btn-danger">Kembali</a>
                </form>
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