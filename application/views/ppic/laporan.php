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
                                    class="nav-link active"><i class="fa fa-plus-square-o"></i> <span
                                        class="hidden-xs">Penerimaan Kimia</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#messages" data-toggle="pill"
                                    class="nav-link"><i class="fa fa-caret-square-o-down"></i> <span
                                        class="hidden-xs">Permintaan Kimia</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                        class="fa fa-caret-square-o-up"></i> <span class="hidden-xs">Pengembalian
                                        Kimia</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active" id="profile">
                                <h5 class="mb-3">Laporan Penerimaan Kimia</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-secondary text-white text-center">
                                                <h5>Laporan Harian</h5>
                                            </div>
                                            <div class="card-body">
                                                <!-- No Labels Form -->
                                                <form class="row g-3 mt-2" method="post"
                                                    action="<?php echo base_url('ppic/laporan/laporanPenerimaanHarian') ?>">
                                                    <div class="col-sm-4">
                                                        <label><b>Tanggal</b></label>
                                                        <select class="form-control" name="tanggal">
                                                            <option>Tanggal</option>
                                                            <?php
                                                            $mulai = 1;
                                                            for ($i = $mulai; $i < $mulai + 31; $i++) {
                                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><b>Bulan</b></label>
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
                                                    <div class="col-sm-4">
                                                        <label><b>Tahun</b></label>
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
                                                            <button type="submit" class="btn btn-secondary">Cetak
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-secondary text-white text-center">
                                                <h5>Laporan Bulanan</h5>
                                            </div>
                                            <div class="card-body">
                                                <form class="row g-3 mt-2" method="post"
                                                    action="<?php echo base_url('ppic/laporan/laporanPenerimaanBulanan') ?>">
                                                    <div class="col-sm-6">
                                                        <label><b>Bulan</b></label>
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
                                                    <div class="col-sm-6">
                                                        <label><b>Tahun</b></label>
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
                                                            <button type="submit" class="btn btn-secondary">Cetak
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-secondary text-white text-center">
                                                <h5>Laporan Tahunan</h5>
                                            </div>
                                            <div class="card-body">
                                                <form class="row g-3 mt-2" method="post"
                                                    action="<?php echo base_url('ppic/laporan/laporanPenerimaanTahunan') ?>">
                                                    <div class="col-sm-12">
                                                        <label><b>Tahun</b></label>
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
                                                            <button type="submit" class="btn btn-secondary">Cetak
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages">
                                <h5 class="mb-3">Laporan Permintaan Kimia</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-warning text-white text-center">
                                                <h5>Laporan Harian</h5>
                                            </div>
                                            <div class="card-body">
                                                <!-- No Labels Form -->
                                                <form class="row g-3 mt-2" method="post"
                                                    action="<?php echo base_url('ppic/laporan/laporanPermintaanHarian') ?>">
                                                    <div class="col-sm-4">
                                                        <label><b>Tanggal</b></label>
                                                        <select class="form-control" name="tanggal">
                                                            <option>Tanggal</option>
                                                            <?php
                                                            $mulai = 1;
                                                            for ($i = $mulai; $i < $mulai + 31; $i++) {
                                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><b>Bulan</b></label>
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
                                                    <div class="col-sm-4">
                                                        <label><b>Tahun</b></label>
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
                                                            <button type="submit" class="btn btn-warning">Cetak
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-warning text-white text-center">
                                                <h5>Laporan Bulanan</h5>
                                            </div>
                                            <div class="card-body">
                                                <form class="row g-3 mt-2" method="post"
                                                    action="<?php echo base_url('ppic/laporan/laporanPermintaanBulanan') ?>">
                                                    <div class="col-sm-6">
                                                        <label><b>Bulan</b></label>
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
                                                    <div class="col-sm-6">
                                                        <label><b>Tahun</b></label>
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
                                                            <button type="submit" class="btn btn-warning">Cetak
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-warning text-white text-center">
                                                <h5>Laporan Tahunan</h5>
                                            </div>
                                            <div class="card-body">
                                                <form class="row g-3 mt-2" method="post"
                                                    action="<?php echo base_url('ppic/laporan/laporanPermintaanTahunan') ?>">
                                                    <div class="col-sm-12">
                                                        <label><b>Tahun</b></label>
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
                                                            <button type="submit" class="btn btn-warning">Cetak
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="edit">
                                <h5 class="mb-3">Laporan Pengembalian Kimia</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-danger text-white text-center">
                                                <h5>Laporan Harian</h5>
                                            </div>
                                            <div class="card-body">
                                                <!-- No Labels Form -->
                                                <form class="row g-3 mt-2" method="post"
                                                    action="<?php echo base_url('ppic/laporan/laporanPengembalianHarian') ?>">
                                                    <div class="col-sm-4">
                                                        <label><b>Tanggal</b></label>
                                                        <select class="form-control" name="tanggal">
                                                            <option>Tanggal</option>
                                                            <?php
                                                            $mulai = 1;
                                                            for ($i = $mulai; $i < $mulai + 31; $i++) {
                                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><b>Bulan</b></label>
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
                                                    <div class="col-sm-4">
                                                        <label><b>Tahun</b></label>
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
                                                            <button type="submit" class="btn btn-danger">Cetak
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-danger text-white text-center">
                                                <h5>Laporan Bulanan</h5>
                                            </div>
                                            <div class="card-body">
                                                <form class="row g-3 mt-2" method="post"
                                                    action="<?php echo base_url('ppic/laporan/laporanPengembalianBulanan') ?>">
                                                    <div class="col-sm-6">
                                                        <label><b>Bulan</b></label>
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
                                                    <div class="col-sm-6">
                                                        <label><b>Tahun</b></label>
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
                                                            <button type="submit" class="btn btn-danger">Cetak
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-danger text-white text-center">
                                                <h5>Laporan Tahunan</h5>
                                            </div>
                                            <div class="card-body">
                                                <form class="row g-3 mt-2" method="post"
                                                    action="<?php echo base_url('ppic/laporan/laporanPengembalianTahunan') ?>">
                                                    <div class="col-sm-12">
                                                        <label><b>Tahun</b></label>
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
                                                            <button type="submit" class="btn btn-danger">Cetak
                                                                Laporan</button>
                                                        </div>
                                                    </div>
                                                </form>
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