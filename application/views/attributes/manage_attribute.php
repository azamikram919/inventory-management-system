<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Attribute</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Attribute</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a href="javascript:void(0)" class="btn btn-sm btn-primary admin_open_modal_add_attribute_btn">Add
                Attribute</a>
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->

    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>
    <div class="manage-table" style="padding: 0 15px 0 15px">
        <div class="card">
            <table class="table table-bordered" id="example1">
                <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Attribute Name</th>
                    <th>Attribute Value</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>

    <!-- /.content -->
</div>


<!-- create brand modal -->
<div class="modal admin_add_attribute_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Attribute</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post" id="createAttributeForm">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="brand_name">Attribute Name</label>
                        <input type="text" class="form-control" id="attribute_name" name="attribute_name"
                               placeholder="Enter attribute name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="active">Status</label>
                        <select class="form-control" id="attribute_status" name="attribute_status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Edit brand modal -->
<div class="modal admin_edit_attribute_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Attribute</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="editForm">
                <div class="modal-body">
                    <input type="hidden" class="attribute_hide_id" name="id">
                    <div class="form-group">
                        <label for="brand_name">Attribute Name</label>
                        <input type="text" class="form-control" id="edit_attribute_name" name="update_attribute_name"
                               placeholder="Enter attribute name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="active">Status</label>
                        <select class="form-control" id="edit_attribute_status" name="update_attribute_status">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
