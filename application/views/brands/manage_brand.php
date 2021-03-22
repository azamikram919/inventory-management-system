<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Brand</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Brands</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a href="javascript:void(0)" class="btn btn-sm btn-primary admin_open_modal_brand_btn">Add
                Brand</a>
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->

    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>

    <div class="manage-table" style="padding: 0 15px 0 15px">
        <div class="card">
            <?php
            if (isset($data) && !empty($data)) {
                ?>
                <table class="table table-bordered manageBradData">
                    <thead>

                    <tr>
                        <th>Sr#</th>
                        <th>Brands Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($data as $item) {
                        ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td><?= $item->name ?></td>
                            <td>
                                <?php
                                if ($item->active == 1) {
                                    ?>
                                    <a href="javascript:void(0)">
                                        <span class="badge rounded-pill bg-success">Active</span>
                                    </a>

                                    <?php
                                } else {
                                    ?>
                                    <a href="javascript:void(0)">
                                        <span class="badge rounded-pill bg-warning">In Active</span>
                                    </a>
                                    <?php
                                }
                                ?></td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-xs btn-info"
                                   onclick="editBrandData('<?= $item->id ?>')">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-xs btn-danger"
                                   onclick="deleteBrandData('<?= $item->id ?>')">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
            } else {
                ?>
                <p>Data Not Found</p>
                <?php
            }
            ?>
        </div>
    </div>

    <!-- /.content -->
</div>


<!-- create brand modal -->
<div class="modal admin_add_brand_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Brand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="createForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name"
                               placeholder="Enter brand name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="active">Status</label>
                        <select class="form-control" id="brand_status" name="brand_status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary brand_data_save_btn">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal admin_edit_brand_data_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Brand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="updateBrandForm">
                <input type="hidden" name="edit_brand_data_id" class="edit_brand_data_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" class="form-control" id="edit_brand_name" name="edit_brand_name"
                               placeholder="Enter brand name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="active">Status</label>
                        <select class="form-control" id="edit_brand_status" name="edit_brand_status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary brand_data_update_btn">Update</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
