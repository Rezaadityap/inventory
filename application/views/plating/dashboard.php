<div class="content-wrapper">
    <div class="container-fluid">

        <!--Start Dashboard Content-->

        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 border-light">
                        <div class="card-body">
                            <h4 class="text-center">Hallo, Selamat datang!</h4>
                            <h3 class="text-center mb-3 mt-3">
                                <?= $this->session->userdata('nama_user') ?>
                            </h3>
                            <h5 class="text-center">Di Aplikasi Persediaan Bahan Kimia Produksi</h5>
                            <h5 class="text-center">PT Indoplat Perkasa Purnama</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->
        <!--End Dashboard Content-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->