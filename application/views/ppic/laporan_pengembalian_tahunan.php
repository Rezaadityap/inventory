<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/Laporan') ?>">Laporan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Pengembalian Tahunan</li>
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
                    <a href="<?= base_url('ppic/laporan') ?>" class="btn btn-secondary">Kembali</a>
                </center>
            </div>
        </div>
        <?php } else { ?>
        <div class="row">
            <div class="col-lg-12">
                <style>
                form {
                    display: inline-block;
                }
                </style>
                <?php
                    echo form_open('ppic/laporan/excelLapPengembalianTahunan');
                    echo form_hidden('tahun', $tahun);
                    ?>
                <button type="submit" class="btn btn-sm btn-success d-print-none"><i class="fa fa-download"></i>
                    Excel</button>
                <?php echo form_close(); ?>
                <?php
                    echo form_open('ppic/laporan/printLapPengembalianTahunan');
                    echo form_hidden('tahun', $tahun);
                    ?>
                <button type="submit" class="btn btn-sm btn-info d-print-none"><i class="fa fa-file"></i>
                    Print</button>
                <?php echo form_close(); ?>
                <?php
                    echo form_open('ppic/laporan/pdfPengembalianTahunan');
                    echo form_hidden('tahun', $tahun);
                    ?>
                <button type="submit" class="btn btn-sm btn-danger d-print-none"><i class="fa fa-file"></i>
                    PDF</button>
                <?php echo form_close(); ?>
                <small class="float-right mr-4">
                    <?php echo $tahun ?>
                </small>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Pengembalian Tahunan</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Kimia</th>
                                        <th scope="col">Nama Kimia</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Supplier</th>
                                        <th scope="col">Tanggal Kembali</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                        $semua = 0;
                                        foreach ($laporan as $l):
                                            $semua = $semua + $l->jumlah; ?>
                                    <tr>
                                        <td class="center">
                                            <?php echo $no++ ?>
                                        </td>
                                        <td class="left">
                                            <?php echo $l->kd_kimia ?>
                                        </td>
                                        <td class="left">
                                            <?php echo $l->nm_kimia ?>
                                        </td>
                                        <td class="left">
                                            <?php echo $l->satuan ?>
                                        </td>
                                        <td class="left">
                                            <?php echo $l->nm_supplier ?>
                                        </td>
                                        <td class="center">
                                            <?php echo format_indo(date($l->tanggal_kembali)) ?>
                                        </td>
                                        <td class="right">
                                            <?= $l->jumlah ?>
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