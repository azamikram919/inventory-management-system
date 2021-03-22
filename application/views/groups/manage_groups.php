<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Groups</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Groups</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a href="<?= base_url('admin/add-group') ?>" class="btn btn-sm btn-primary admin_open_modal_add_group_btn">Add
                Group</a>
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->

    <?php
    if ($this->session->flashdata('msg')):
        ?>
        <div class="alert alert-success alert-dismissible ml-3 mr-3" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <?= $this->session->flashdata('msg') ?>
        </div>
    <?php
    endif;
    ?>

    <div class="manage-table" style="padding: 0 15px 0 15px">
        <div class="card">
            <table class="table table-bordered" id="groupTable">
                <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Group Name</th>
                    <!--<th>Group Permission</th>-->
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                if (!empty($groups_data) && !empty($groups_data)) {
                    ?>
                    <tbody>
                    <?php
                    foreach ($groups_data as $key => $item) {

                        $slug = str_replace('{a:1:{i:0;s:13:";}', '', $item->permission);
                        //var_dump($slug);

                        ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td><?= $item->group_name ?></td>
                            <!--<td>--><?//= $slug?><!--</td>-->
                            <td><?= $item->created_at ?></td>
                            <td>
                                <a href="<?= base_url('admin/get-group-by-id/' . $item->id) ?>"
                                   class="btn btn-info btn-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('admin/delete-group-data/' . $item->id) ?>"
                                   class="btn btn-danger btn-xs"
                                   onclick="return confirm('Are You Sure you delete this record')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- /.content -->
</div>


<!-- create Store modal -->
<div class="modal admin_add_group_data_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Group</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="createGroupForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand_name">Store Name</label>
                        <input type="text" class="form-control" id="store_name" name="store_name"
                               placeholder="Enter store name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="active">Status</label>
                        <select class="form-control" id="store_status" name="store_status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add_store_btn">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- create Update modal -->
<div class="modal admin_update_group_data_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Store</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="updateStoreForm">
                <div class="modal-body">
                    <input type="hidden" name="update_store_hidden_id" class="update_store_hidden_id">
                    <div class="form-group">
                        <label for="brand_name">Store Name</label>
                        <input type="text" class="form-control" id="edit_store_name" name="edit_store_name"
                               placeholder="Enter store name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="active">Status</label>
                        <select class="form-control" id="edit_store_status" name="edit_store_status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add_update_btn">Update</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

