<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('plating/laporan') ?>">Laporan</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('plating/laporan/cariLaporanPermintaan') ?>">Laporan
                        Permintaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Permintaan</li>
            </ol>
        </nav>
        <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
        <a href="<?= base_url('plating/laporan/pdfPermintaan/' . $permintaan->id_permintaan) ?>"
            class="btn btn-sm btn-danger">PDF</a>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Permintaan</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Meminta</th>
                                        <th scope="col">Mengetahui</th>
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
                                                <?= $d->mengetahui ?>
                                            </td>
                                            <td>
                                                <?= $d->nm_kimia ?>
                                            </td>
                                            <td>
                                                <?= format_indo(date($d->tanggal_minta)) ?>
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