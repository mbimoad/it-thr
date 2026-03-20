
<div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Manage User</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Manage User</li>
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
                                    <h4 class="card-title mb-0">Manage User</h4>
                                    <button type="button" class="btn btn-primary inputuser" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                        Create New User
                                    </button>
                        
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="exampleModalgridLabel">Create New User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="javascript:void(0);">
                                                        <div class="row g-3">

                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="ttid" class="form-label">USER ID</label>
                                                                    <input type="text" class="form-control" id="ttid" placeholder="Enter TT/TC">
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="password" class="form-label">PASSWORD</label>
                                                                    <input type="text" class="form-control" id="password" placeholder="Enter Password">
                                                                </div>
                                                            </div>


                                                            <div class="col-xxl-12">
                                                                <div>
                                                                    <label for="title" class="form-label">ROLE</label>
                                                                    <select class="form-select" data-choices data-choices-sorting="true" id="user_role">
                                                                        <option value="User">User</option>
                                                                        <option value="Developer">Developer</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                           
                                                            <!--end col-->
                                                            <div class="col-lg-12">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary submituser">Submit</button>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
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

                                    <span class="userjson" data-json='<?php echo json_encode($result) ?>'></span>
                                    <table id="scroll-horizontal" class="table nowrap align-middle tbluser" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 10px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th>User ID</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i=0; $i<count($result); $i++): ?>
                                            <tr>
                                                <td scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                                    </div>
                                                </td>
                                                <td><?php echo $result[$i]["USERID"] ?></td>
                                                <td><?php echo $result[$i]["PASS"] ?></td>
                                                <td><?php echo $result[$i]["ROLE"] ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a data-id="<?php echo $result[$i]["USERID"] ?>" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" class="btn btn-primary updateuser">UPDATE</a>
                                                        <a data-id="<?php echo $result[$i]["USERID"] ?>" href="#" class="btn btn-danger  deleteuser">DELETE</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endfor; ?>
                                        
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