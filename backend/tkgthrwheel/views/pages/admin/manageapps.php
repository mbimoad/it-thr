<div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Manage App</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Manage App</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4 class="card-title mb-0">Manage App</h4>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                        Create New App
                                    </button>
                        
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="exampleModalgridLabel">Create New App</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data" id="app-form">
                                                        <div class="row g-3">
                                                            <input type="hidden" name="userid" value="<?php echo $datas['users']; ?>">

                                                            <div class="col-xxl-12">
                                                                <div class="avatar-xl mx-auto">
                                                                    <input type="file" class="filepond filepond-images" id="" name="co" accept="image/png, image/jpeg, image/gif" />
                                                                    <!-- <input type="file" class="filepond filepond-images" multiple name="appcove" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="1"> -->
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="kategori" class="form-label">Kategori</label>
                                                                    <select class="form-select" data-choices data-choices-sorting="true" id="kategori" name="kategori">
                                                                        <option value="K0001">Monitoring</option>
                                                                        <option value="K0002">Waste</option>
                                                                        <option value="K0003">Scale</option>
                                                                        <option value="K0003">Mapping</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-12">
                                                                <div>
                                                                    <label for="ftp" class="form-label">Ftp / Path Link</label>
                                                                    <input type="text" name="ftp" class="form-control" id="ftp" placeholder="Enter Ftp">
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="date" class="form-label">Release Date</label>
                                                                    <input type="date" class="form-control" name="date" id="date">
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="author" class="form-label">Author</label>
                                                                    <select class="form-select" name="author" data-choices data-choices-sorting="true" id="author">
                                                                        <option selected value="<?php echo $datas['users']; ?>"><?php echo $datas['users']; ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="title" class="form-label">Programming Languange</label>
                                                                    <select class="form-select" name="languange" data-choices data-choices-sorting="true" id="plang">
                                                                        <option selected value="L0001">Laravel</option>
                                                                        <option selected value="L0002">CodeIgniter</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="title" class="form-label">Status</label>
                                                                    <select class="form-select" name="projstat" data-choices data-choices-sorting="true" id="projstat">
                                                                        <option value="S0001"  selected>Published</option>
                                                                        <option value="S0002" >Development</option>
                                                                        <option value="S0003" >Maintenance</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-12">
                                                                <div>
                                                                    <label for="title" class="form-label">Screenshots App</label>
                                                                    <input type="file" class="filepond filepond-input-multiple filepond-files" multiple name="ss[]" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                                                </div>
                                                            </div>


                                                            <!--end col-->
                                                            <div class="col-lg-12">
                                                                <label class="form-label">Type</label>
                                                                <div >
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input cmb_type" type="radio" name="tipe" id="inlineRadio1" value="D0003">
                                                                        <label class="form-check-label" for="inlineRadio1">Android</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input cmb_type" type="radio" checked="true" name="tipe" id="inlineRadio2" value="D0002">
                                                                        <label class="form-check-label" for="inlineRadio2">Website</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input cmb_type" type="radio" checked="true" name="tipe" id="inlineRadio3" value="D0001">
                                                                        <label class="form-check-label" for="inlineRadio3">Desktop</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-xxl-12">
                                                                <label for="emailInput" class="form-label">Description</label>
                                                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter your description"></textarea>
                                                            </div>
                                                            <!--end col-->
                                                     
                                                            <!--end col-->
                                                            <div class="col-lg-12">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary submitapps">Submit</button>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                    </form> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            

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


    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 10px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <!-- <th>ID</th> -->
                                                <th>TITLE</th>
                                                <th>CATEGORY</th>
                                                <th>LINK</th>
                                                <th>RELEASE</th>
                                                <th>AUTHOR</th>
                                                <th>LANGUANGE</th>
                                                <th>STATUS</th>
                                                <th>TYPE</th>
                                                <th style="width: 200px;">DESCRIPTION</th>
                                                <th>COVER_IMAGE</th>
                                                <!-- <th>SCREENSHOTS</th> -->
                                                <!-- <th>CREATION DATE</th> -->
                                                <!-- <th>CREATION BY</th>
                                                <th>UPDATE BY</th>
                                                <th>UPDATE DATE</th> -->
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($datas['query'] as $data): ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                                        </div>
                                                    </th>
                                                    <!-- <td><?= $data['IDAPP'] ?></td> -->
                                                    <td><?= $data['TITLE'] ?></td>
                                                    <td><?= $data['CATEGORY_NAME'] ?></td>
                                                    <td><a target="_blank" href="<?= $data['PATH_LINK'] ?>">Link</a></td>
                                                    <td><?= $data['RELEASE_DATE'] ?></td>
                                                    <td><?= $data['AUTHOR'] ?></td>
                                                    <td><?= $data['LANGUANGE_NAME'] ?></td>
                                                    <td><span class="badge bg-info-subtle text-info"><?= $data['STATUS_NAME'] ?></span></td>
                                                    <td><span class="badge bg-info-subtle text-info"><?= $data['DEVICE_NAME'] ?></span></td>
                                                    <td><?= (strlen($data['DESCRIPTION'])>30)?substr($data['DESCRIPTION'],0,27).'...':$data['DESCRIPTION']?></td>
                                                    <td><img width="100" src="http://172.70.10.166/filemgr/assets/Images/APPS/TKGPLAYSTORE/COVER/<?= $data['COVER_IMAGE'] ?>" alt=""> </td>
                                                    <!-- <td><?= $data['SCREENSHOTS'] ?></td> -->
                                                    <!-- <td><?= $data['CREATION_DATE'] ?></td> -->
                                                    <!-- <td><?= $data['CREATION_BY'] ?></td>
                                                    <td><?= $data['UPDATE_BY'] ?></td>
                                                    <td><?= $data['UPDATE_DATE'] ?></td> -->
                                                    <td>
                                                        <div class="dropdown d-inline-block">
                                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                                <li><a  data-bs-toggle="modal" data-bs-target="#exampleModalgrid" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                <li>
                                                                    <a class="dropdown-item remove-item-btn" id="sa-params">
                                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
    
                                        </tbody>
                                    </table>




                                    <!-- end dropzon-preview -->
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