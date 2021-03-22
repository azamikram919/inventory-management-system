<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Attribute Value</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Attribute Value</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a href="javascript:void(0)" class="btn btn-sm btn-primary admin_open_modal_add_attribute_value_data_btn">Add
                Attribute Value</a>
            <a href="<?= base_url('admin/attribute')?>" class="btn btn-sm float-right btn-warning">
                Back to Attributes</a>
        </div><!-- /.container-fluid -->
    </div>

    <div class="attribute-title pl-3 pr-3">
        <div class="card">
            <div class="card-head">
                <h4>Attribute name: <?php echo $attribute_data['name']; ?></h4>
            </div>
        </div>
    </div>

    <!-- Main content -->

    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>

    <div class="manage-table" style="padding: 0 15px 0 15px">
        <div class="card">
            <table class="table table-bordered" id="attribute_value_example">
                <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Attribute Value</th>
                    <th>Action</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>

    <!-- /.content -->
</div>

<!-- create brand modal -->
<div class="modal admin_add_attribute_value_data_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Attribute</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="attributeAddValueDataForm">
                <div class="modal-body">
                    <input type="hidden" id="hidden_attribute_id" name="hidden_attribute_id"
                           value="<?= $attribute_data['id'] ?>">
                    <div class="form-group">
                        <label for="brand_name">Attribute Name</label>
                        <input type="text" class="form-control" id="attribute_name" name="attribute_value_name"
                               placeholder="Enter attribute name" autocomplete="off">
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
<div class="modal admin_edit_attribute_value_data_update_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Attribute Value</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="attributeValueDataForm">
                <div class="modal-body">
                    <input type="hidden" class="attribute_value_data_hide_id"
                           name="attribute_value_data_hide_id" value="<?= $attribute_data['id'] ?>">
                    <div class="form-group">
                        <label for="brand_name">Attribute Value</label>
                        <input type="text" class="form-control" id="attribute_value_data_field"
                               name="attribute_value_data_field"
                               placeholder="Enter attribute value" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Value</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

