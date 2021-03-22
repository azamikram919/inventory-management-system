<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a href="javascript:void(0)" class="btn btn-sm btn-primary admin_open_modal_add_category_btn">Add
                Category</a>
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->

    <div class="manage-table" style="padding: 0 15px 0 15px">
        <div class="card">
            <table class="table table-bordered" id="categoryExample">
                <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Category Name</th>
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


<!-- create Category modal -->
<div class="modal admin_add_category_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="createCategoryForm">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name"
                               placeholder="Enter attribute name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="active">Status</label>
                        <select class="form-control" id="category_status" name="category_status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add_category_btn">Save</button>
                </div>

            </form>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit Category modal -->
<div class="modal admin_Edit_category_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="editCategoryForm">
                <div class="modal-body">
                    <input type="hidden" name="id" class="category_hide_id">
                    <div class="form-group">
                        <label for="brand_name">Category Name</label>
                        <input type="text" class="form-control" id="edit_category_name" name="edit_category_name"
                               placeholder="Enter attribute name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="active">Status</label>
                        <select class="form-control" id="edit_category_status" name="edit_category_status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_category_btn">Update</button>
                </div>

            </form>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
