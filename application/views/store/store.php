<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Store</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Store</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a href="javascript:void(0)" class="btn btn-sm btn-primary admin_open_modal_add_store_btn">Add
                Store</a>
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->

    <div class="manage-table" style="padding: 0 15px 0 15px">
        <div class="card">
            <table class="table table-bordered" id="storeTable">
                <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Store Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>

    <!-- /.content -->
</div>


<!-- create Store modal -->
<div class="modal admin_add_store_data_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Store</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="createStoreForm">
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
<div class="modal admin_update_store_data_modal" tabindex="-1" role="dialog">
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

