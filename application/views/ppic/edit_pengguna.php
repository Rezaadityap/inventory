<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/pengguna') ?>">Pengguna</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Pengguna</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Edit Pengguna</div>
                        <hr>
                        <form action="<?= base_url('ppic/pengguna/editAksi') ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php foreach ($pengguna as $p): ?>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_user" value="<?= $p->nama_user ?>" class="form-control">
                                <input type="hidden" name="id_user" value="<?= $p->id_user ?>" id="">
                            </div>
                            <div class="form-group">
                                <label>Nip</label>
                                <input type="text" name="nip" class="form-control" value="<?= $p->nip ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" value="<?= $p->tgl_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="nama_jabatan" id="" class="form-control">
                                    <option value="<?= $p->nama_jabatan ?>">
                                        <?= $p->nama_jabatan ?>
                                    </option>
                                    <option value="Operator">Operator</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Leader">Leader</option>
                                    <option value="Maintenance Kimia">Maintenance Kimia</option>
                                    <option value="Maintenance Parameter">Maintenance Parameter</option>
                                    <option value="Maintenance Filter">Maintenance Filter</option>
                                    <option value="Maintenance Diwater">Maintenance Diwater</option>
                                    <option value="Maintenance WWTP">Maintenance WWTP</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Divisi</label>
                                <select name="nama_divisi" id="" class="form-control">
                                    <option value="<?= $p->nama_divisi ?>">
                                        <?= $p->nama_divisi ?>
                                    </option>
                                    <?php if ($p->nama_divisi == 'Plating') { ?>
                                    <option value="PPIC">PPIC</option>
                                    <?php } ?>
                                    <?php if ($p->nama_divisi == 'PPIC') { ?>
                                    <option value="Plating">Plating</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-light px-5">Simpan</button>
                            </div>
                            <?php endforeach; ?>
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