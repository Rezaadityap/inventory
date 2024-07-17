<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
        </nav>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#profile" data-toggle="pill"
                                    class="nav-link active"><i class="fa fa-caret-square-o-up"></i> <span
                                        class="hidden-xs">Permintaan
                                        Kimia</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active" id="profile">
                                <h5 class="mb-3">Laporan Permintaan Kimia</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3" method="post"
                                                    action="<?php echo base_url('plating/laporan/cariLaporanPermintaan') ?>">
                                                    <div class="col-sm-12 mb-2">
                                                        <select id="inputState" class="form-control" name="bulan">
                                                            <option selected>Bulan</option>
                                                            <option value="1">Januari</option>
                                                            <option value="2">Februari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April</option>
                                                            <option value="5">Mei</option>
                                                            <option value="6">Juni</option>
                                                            <option value="7">Juli</option>
                                                            <option value="8">Agustus</option>
                                                            <option value="9">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <select id="inputState" class="form-control" name="tahun">
                                                            <option selected>Tahun</option>
                                                            <?php $tahun = date('Y');
                                                            for ($i = 2020; $i < $tahun + 5; $i++) { ?>
                                                                <option value="<?php echo $i ?>">
                                                                    <?php echo $i ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="text-center mt-3">
                                                            <button type="submit" class="btn btn-light">Cari
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Permintaan hari ini: <?php echo format_indo(date('Y-m-d')); ?></label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php if ($lap_permintaan == null) { ?>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close"
                                                            data-dismiss="alert">&times;</button>
                                                        <div class="alert-icon">
                                                            <i class="icon-info"></i>
                                                        </div>
                                                        <div class="alert-message">
                                                            <span><strong>Maaf</strong> Belum ada permintaan</span>
                                                        </div>
                                                    </div> <?php } else { ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Kode Kimia</th>
                                                                    <th scope="col">Nama Kimia</th>
                                                                    <th scope="col">Satuan</th>
                                                                    <th scope="col">Tanggal Minta</th>
                                                                    <th scope="col">Jumlah</th>
                                                                    <th scope="col">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no = 1;
                                                                foreach ($lap_permintaan as $l): ?>
                                                                    <tr>
                                                                        <td class="center">
                                                                            <?php echo $no++ ?>
                                                                        </td>
                                                                        <td class="center">
                                                                            <?php echo $l->kd_kimia ?>
                                                                        </td>
                                                                        <td class="center">
                                                                            <?php echo $l->nm_kimia ?>
                                                                        </td>
                                                                        <td class="center">
                                                                            <?php echo $l->satuan ?>
                                                                        </td>
                                                                        <td class="center">
                                                                            <?php echo $l->tanggal_minta ?>
                                                                        </td>
                                                                        <td class="center">
                                                                            <?= $l->jumlah ?>
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
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->
</div>
<!--End content-wrapper-->