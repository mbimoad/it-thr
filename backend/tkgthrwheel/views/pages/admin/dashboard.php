<div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4 class="card-title mb-0">Visitor</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    

                            

                                    <div class="dropzone" style="display:none;">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>

                                            <h4>Drop files here or click to upload.</h4>
                                        </div>
                                    </div>

                                    <ul class="list-unstyled mb-0" id="dropzone-preview" style="display:none;">

                                        <li class="mt-2" id="dropzone-preview-list">
                                            <!-- This is used as the file preview template -->
                                            <div class="border rounded">
                                                <div class="d-flex p-2">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm bg-light rounded">
                                                            <img data-dz-thumbnail class="img-fluid rounded d-block" src="<?= base_url() ?>assets/tapstore/backend/images/new-document.png" alt="Dropzone-Image" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="pt-1">
                                                            <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                            <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-3">
                                                        <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>


                                    <div id="line_chart_zoomable" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>



                                    <!-- end dropzon-preview -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4 class="card-title mb-0">Downloadable Apps</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="column_stacked" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4 class="card-title mb-0">Top App</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div id="custom_datalabels_bar" data-colors='["--vz-primary", "--vz-secondary", "--vz-success", "--vz-info", "--vz-warning", "--vz-danger", "--vz-dark", "--vz-primary", "--vz-success", "--vz-secondary"]' class="apex-charts" dir="ltr"></div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div> <!-- end col -->


                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4 class="card-title mb-0">Unusabled App</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Release Date</th>
                                                <th>Qty</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Kukdong</td>
                                                <td>Monitoring</td>
                                                <td>Mobile</td>
                                                <td>2025-01-23</td>
                                                <td>0</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kukdong</td>
                                                <td>Monitoring</td>
                                                <td>Mobile</td>
                                                <td>2025-01-23</td>
                                                <td>0</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kukdong</td>
                                                <td>Monitoring</td>
                                                <td>Mobile</td>
                                                <td>2025-01-23</td>
                                                <td>0</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kukdong</td>
                                                <td>Monitoring</td>
                                                <td>Mobile</td>
                                                <td>2025-01-23</td>
                                                <td>0</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                   
                    <!-- end row -->

                </div> <!-- container-fluid -->

            </div>
            <!-- End Page-content -->