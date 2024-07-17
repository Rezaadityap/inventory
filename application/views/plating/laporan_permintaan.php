<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('plating/Laporan') ?>">Laporan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Permintaan</li>
            </ol>
        </nav>
        <?php if (empty($laporan)) { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong>Maaf</strong> Data tidak ada</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <center>
                    <a href="<?= base_url('plating/laporan') ?>" class="btn btn-secondary">Kembali</a>
                </center>
            </div>
        </div>
        <?php } else { ?>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Permintaan</h5>
                        <small class="float-right mr-4">
                            <?php echo $bulan ?> /
                            <?php echo $tahun ?>
                        </small>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">No</th>
                                        <th class="center">Tanggal Minta</th>
                                        <th class="center">Status</th>
                                        <th class="center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                        foreach ($laporan as $l): ?>
                                    <tr>
                                        <td class="center">
                                            <?php echo $no++ ?>
                                        </td>
                                        <td class="center">
                                            <?php echo format_indo(date($l->tanggal_minta)) ?>
                                        </td>
                                        <td class="center">
                                            <?php if ($l->status == 2) { ?>
                                            <span class="badge badge-success"><i class="fa fa-check-circle"></i>
                                                Selesai</span>
                                            <?php } ?>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-sm btn-info"
                                                href="<?= base_url('plating/laporan/lihat/') . $l->id_permintaan ?>"><i
                                                    class="fa fa-eye"></i></a>
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
        <?php } ?>

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->