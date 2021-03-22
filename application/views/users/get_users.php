<!-- Content Wrapper. Contains page content -->
<style>
    .table td, .table th {
        padding: 10px;
    }
</style>

<div class="content-wrapper" style="padding: 15px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Show All Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a href="<?= base_url('admin/add-user') ?>">
                <span class="btn btn-sm btn-primary">Add User</span>
            </a>
        </div><!-- /.container-fluid -->
    </div>

    <?php
    if ($this->session->flashdata('msg')):
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <?= $this->session->flashdata('msg') ?>
        </div>
    <?php
    endif;
    ?>

    <!-- /.content-header -->
    <?php
    if (isset($get_users) && !empty($get_users)) {
        ?>
        <div class="card" style="padding: 0 15px 0 15px">
            <div class="card-header">
                <div class="dataTables_length">
                    <label>Show entries
                        <select name="manageTable" class="form-control input-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sr#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Cell</th>
                    <th style="width: 5%">Author</th>
                    <th>Role</th>
                    <th>Gender</th>
                    <th>Place</th>
                    <th style="width: 5%">Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                foreach ($get_users

                         as $item) {
                    ?>
                    <tbody id="product_data">
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->first_name ?></td>
                        <td><?= $item->last_name ?></td>
                        <td><?= $item->username ?></td>
                        <td><?= $item->phone ?></td>
                        <td>
                            <a href="javascript:void(0)">
                                <img src="<?= base_url($item->picture) ?>" width="50" class="img-thumbnail"
                                     alt="user image"
                                     onclick="openUerImage('<?= $item->id ?>', '<?= base_url($item->picture) ?>')">
                            </a>
                        </td>
                        <td><?= $item->role ?></td>
                        <td><?= $item->gender ?></td>
                        <td><?= $item->place ?></td>
                        <td>
                            <?php
                            if ($item->status == 1) {
                                ?>
                                <a href="javascript:void(0)">
                                    <span class="badge rounded-pill bg-success"
                                          onclick="userStatus('<?= $item->id ?>', '<?= $item->status ?>')">Activate</span>
                                </a>

                                <?php
                            } else {
                                ?>
                                <a href="javascript:void(0)">
                                    <span class="badge rounded-pill bg-warning"
                                          onclick="userStatus('<?= $item->id ?>', '<?= $item->status ?>')">Blocked</span>
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                        <td><?= $item->created_at ?></td>
                        <td>
                            <a href="<?= base_url('admin/edit-user/' . $item->id) ?>" class="btn btn-xs btn-info">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?= base_url('admin/delete-user/' . $item->id) ?>" class="btn btn-xs btn-danger"
                               onclick="return confirm('Are you sure you want to delete your Record?')">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                    <?php
                }
                ?>
            </table>
        </div>
        <?= $links ?>
        <?php
    }
    ?>

    <!-- Main content -->


    <div class="modal admin_open_user_image_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">User Image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="hidden" class="open_user_image_filed_id">
                    <img class="user_image img-thumbnail" alt="User Image" style="object-fit: cover; width: 100%">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal admin_update_user_status_modal" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form method="post" id="status_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">User Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" class="admin_update_user_status_field_id">

                            <div class="form-group">
                                <label for="status">Change Status:</label>
                                <div class="inline-group">
                                    <label class="radio">
                                        <input type="radio" name="admin_change_status_field"
                                               class="admin_change_status_field" value="1" checked>
                                        Activate</label>
                                    <label class="radio">
                                        <input type="radio" name="admin_change_status_field" value="0"
                                               class="admin_change_status_field ml-2">
                                        Blocked</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                            <input type="submit" class="btn btn-primary admin_update_user_status_btn"
                                   value="Update Status">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /.content -->
</div>
<!--<td>--><? //= $item->status ? 'Active' : 'Blocked' ?><!--</td>-->
<!-- /.content-wrapper -->



