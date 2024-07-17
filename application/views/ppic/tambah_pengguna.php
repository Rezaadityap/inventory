<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/pengguna') ?>">Pengguna</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Tambah Pengguna</div>
                        <hr>
                        <form action="<?= base_url('ppic/pengguna/tambahAksi') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_user" class="form-control" placeholder="Masukkan Nama">
                                <?php echo form_error('nama_user', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Nip</label>
                                <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP">
                                <?php echo form_error('nip', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir">
                                <?php echo form_error('tgl_lahir', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="nama_jabatan" id="" class="form-control">
                                    <option value="">-- Pilih Jabatan --</option>
                                    <option value="Operator">Operator</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Leader">Leader</option>
                                    <option value="Maintenance Kimia">Maintenance Kimia</option>
                                    <option value="Maintenance Parameter">Maintenance Parameter</option>
                                    <option value="Maintenance Filter">Maintenance Filter</option>
                                    <option value="Maintenance Diwater">Maintenance Diwater</option>
                                    <option value="Maintenance WWTP">Maintenance WWTP</option>
                                </select>
                                <?php echo form_error('nama_jabatan', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Divisi</label>
                                <select name="nama_divisi" id="" class="form-control">
                                    <option value="">-- Pilih Divisi --</option>
                                    <option value="PPIC">PPIC</option>
                                    <option value="Plating">Plating</option>
                                </select>
                                <?php echo form_error('nama_divisi', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan Password">
                                <?php echo form_error('password', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password</label>
                                <input type="password" name="password2" class="form-control"
                                    placeholder="Ulangi Password">
                                <?php echo form_error('password2', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hak Akses</label>
                                <select name="role_id" id="" class="form-control">
                                    <option value="">-- Hak Akses --</option>
                                    <option value="1">PPIC</option>
                                    <option value="2">Plating</option>
                                </select>
                                <?php echo form_error('role_id', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-light px-5">Simpan</button>
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