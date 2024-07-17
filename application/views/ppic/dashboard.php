<div class="content-wrapper">
    <div class="container-fluid">

        <!--Start Dashboard Content-->

        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">Pengguna <span class="float-right"><i
                                        class="fa fa-users"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:100%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total <span class="float-right">
                                    <?= $pengguna ?>
                                </span></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">Kimia <span class="float-right"><i
                                        class="fa fa-briefcase"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:100%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total <span class="float-right">
                                    <?= $kimia ?>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">Penerimaan <span class="float-right"><i
                                        class="fa fa-arrow-circle-down"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:100%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total <span
                                    class="float-right"><?= $penerimaan ?></span></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">Permintaan <span class="float-right"><i
                                        class="fa fa-arrow-circle-up"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:100%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total <span
                                    class="float-right"><?= $permintaan ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Dashboard Content-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->