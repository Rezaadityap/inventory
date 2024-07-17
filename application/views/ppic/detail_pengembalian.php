<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/pengembalian') ?>">Pengembalian</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pengembalian</li>
            </ol>
        </nav>
        <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Pengembalian</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pengirim</th>
                                        <th scope="col">Supplier</th>
                                        <th scope="col">Nama Kimia</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($detail as $d): ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $no++ ?>
                                        </th>
                                        <td>
                                            <?= $d->nama_user ?>
                                        </td>
                                        <td>
                                            <?= $d->nm_supplier ?>
                                        </td>
                                        <td>
                                            <?= $d->nm_kimia ?>
                                        </td>
                                        <td>
                                            <?= format_indo($d->tanggal_kembali) ?>
                                        </td>
                                        <td>
                                            <?= $d->jumlah ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url('ppic/pengembalian/konfirmasi') ?>">
                    <?php if ($pengembalian->status == 0) { ?>
                    <input type="hidden" name="id_pengembalian" value="<?= $pengembalian->id_pengembalian ?>">
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btn btn-light px-5">Konfirmasi</button>
                    <?php } ?>
                    <a href="<?= base_url('ppic/pengembalian') ?>" class="btn btn-danger">Kembali</a>
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