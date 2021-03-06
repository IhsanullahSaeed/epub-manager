<?php
require_once __DIR__ . "/layouts/header.php";
?>



<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <h1>Actions</h1>

            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        tables
                    </li>
                    <li class="breadcrumb-item" aria-current="page">basic-tables</li>
                </ol>
            </nav> -->
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-contact"> Add New Action
                </button>
            </div>
        </div>


        <!-- Add Department model Button -->
        <div class="modal fade" id="modal-add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="../actions/add_action.php" method="post">
                        <div class="modal-header px-4">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Create New Action</h5>
                        </div>
                        <div class="modal-body px-4">

                        <div class="form-group row mb-6">
                                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label"> Book</label>
                                <div class="col-sm-8 col-lg-10">
                                    <div class="custom-file mb-1">
                                        <select class="form-control" name="book_id" id="">
                                            <?php
                                            $query = new Book();
                                            $books = $query->all();

                                            foreach ($books as $book) {


                                                echo  "<option value='" . $book['id'] . "'>" . $book['book_title'] . "</option>";
                                            }

                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-6">
                                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label"> Users</label>
                                <div class="col-sm-8 col-lg-10">
                                    <div class="custom-file mb-1">
                                        <select class="form-control" name="user_id" id="">
                                            <?php
                                            $query = new User();
                                            $users = $query->all();

                                            foreach ($users as $user) {


                                                echo  "<option value='" . $user['id'] . "'>" . $user['firstname'] ." ". $user['lastname'] . "</option>";
                                            }

                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-6">
                                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label"> Status</label>
                                <div class="col-sm-8 col-lg-10">
                                    <div class="custom-file mb-1">
                                        <select class="form-control" name="status_id" id="">
                                            <?php
                                            $query = new Status();
                                            $statuses = $query->all();

                                            foreach ($statuses as $status) {


                                                echo  "<option value='" . $status['id'] . "'>" . $status['title'] .  "</option>";
                                            }

                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                          <div class="form-group row mb-6">
                                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label"> Created At</label>
                                <div class="col-sm-8 col-lg-10">
                                    <div class="custom-file mb-1">
                                    <input type="Date" name="created_date" required class="form-control mt-2" id="formGroupExampleInput" placeholder="Created Date">
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div class="modal-footer px-4">
                            <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-pill">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Action</h2>
                        <div class="
                         ">
                            <span></span>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Book</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = new Action(0,0,0);
                                $actions = $query->all();
                                foreach ($actions as $action) {
                                ?>
                               
                                    <tr>
                                        <td>
                                        <?php  
                                            $book = new Book();
                                            $book->find($action['book_id']);
                                        ?>
                                            <?php echo $book->book_title;?></td>
                                            <td>
                                            <?php  
                                            $user = new User();
                                            $user->find($action['user_id']);
                                        ?>
                                            <a class="text-dark" href=""> <?php echo $user->firstname." ".$user->lastname; ?></a>
                                        </td>
                                        <td>
                                        <?php  
                                            $status = new Status();
                                            $status->find($action['user_id']);
                                        ?>
                                            <a class="text-dark" href=""> <?php echo $status->title; ?></a>
                                        </td>
                                        <td>
                                            <a class="text-dark" href=""> <?php echo $action['created_at']; ?></a>
                                        </td>


                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                                    <!-- <li class="dropdown-item">
                                                        <a href="#" onclick="showEditForm(<?php echo $department['id']; ?>,'<?php echo $department['name']; ?>')">Edit</a>
                                                    </li> -->
                                                    <li class="dropdown-item">
                                                        <a href="../actions/delete_action.php?action_id=<?php echo $action['id'] ?>">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php

                                    // $departments = $query->find($department['id']);

                                    ?>


                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="right-sidebar-2">
        <div class="right-sidebar-container-2">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
                <div class="slim-scroll-right-sidebar-2" style="overflow: hidden; width: auto; height: 100%;">

                    <div class="right-sidebar-2-header">
                        <h2>Layout Settings</h2>
                        <p>User Interface Settings</p>
                        <div class="btn-close-right-sidebar-2">
                            <i class="mdi mdi-window-close"></i>
                        </div>
                    </div>

                    <div class="right-sidebar-2-body">
                        <span class="right-sidebar-2-subtitle">Header Layout</span>
                        <div class="no-col-space">
                            <a href="javascript:void(0);" class="btn-right-sidebar-2 header-fixed-to btn-right-sidebar-2-active">Fixed</a>
                            <a href="javascript:void(0);" class="btn-right-sidebar-2 header-static-to">Static</a>
                        </div>

                        <span class="right-sidebar-2-subtitle">Sidebar Layout</span>
                        <div class="no-col-space">
                            <select class="right-sidebar-2-select" id="sidebar-option-select">
                                <option value="sidebar-fixed">Fixed Default</option>
                                <option value="sidebar-fixed-minified">Fixed Minified</option>
                                <option value="sidebar-fixed-offcanvas">Fixed Offcanvas</option>
                                <option value="sidebar-static">Static Default</option>
                                <option value="sidebar-static-minified">Static Minified</option>
                                <option value="sidebar-static-offcanvas">Static Offcanvas</option>
                            </select>
                        </div>

                        <span class="right-sidebar-2-subtitle">Header Background</span>
                        <div class="no-col-space">
                            <a href="javascript:void(0);" class="btn-right-sidebar-2 btn-right-sidebar-2-active header-light-to">Light</a>
                            <a href="javascript:void(0);" class="btn-right-sidebar-2 header-dark-to">Dark</a>
                        </div>

                        <span class="right-sidebar-2-subtitle">Navigation Background</span>
                        <div class="no-col-space">
                            <a href="javascript:void(0);" class="btn-right-sidebar-2 btn-right-sidebar-2-active sidebar-dark-to">Dark</a>
                            <a href="javascript:void(0);" class="btn-right-sidebar-2 sidebar-light-to">Light</a>
                        </div>

                        <span class="right-sidebar-2-subtitle">Direction</span>
                        <div class="no-col-space">
                            <a href="javascript:void(0);" class="btn-right-sidebar-2 btn-right-sidebar-2-active ltr-to">LTR</a>
                            <a href="javascript:void(0);" class="btn-right-sidebar-2 rtl-to">RTL</a>
                        </div>

                        <div class="d-flex justify-content-center" style="padding-top: 30px">
                            <div id="reset-options" style="width: auto; cursor: pointer" class="btn-right-sidebar-2 btn-reset">Reset
                                Settings</div>
                        </div>

                    </div>

                </div>
                <div class="slimScrollBar" style="background: rgb(153, 153, 153); width: 5px; position: absolute; top: 0px; opacity: 0; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 979px;"></div>
                <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
            </div>
        </div>

    </div>

</div>

<div class="modal fade" id="modal-add-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="../actions/update_department.php" method="post">
                <input type="hidden" name="department_id" id="department_id">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Department Name</h5>
                </div>
                <div class="modal-body px-4">

                    <div class="form-group row mb-6">

                        <div class="col-sm-8 col-lg-10">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Edit Department Name</label>
                                <input type="text" name="name" id="dep_name" required class="form-control" id="formGroupExampleInput" placeholder="Add New Department">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-pill">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script>
    function showEditForm(dep_id, dep_name) {
        $("#department_id").val(dep_id);
        $("#dep_name").val(dep_name);
        $('#modal-add-edit').modal('show');
    }
</script> -->
<?php require_once __DIR__ . "/layouts/footer.php" ?>