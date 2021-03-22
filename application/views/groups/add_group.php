<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Group</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Group</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <div class="manage-table" style="padding: 0 15px 0 15px">
        <div class="card">
            <form method="post" action="<?= base_url('admin/add-group') ?>" id="addGroupForm">
                <div class="card-body">
                    <div class="form-group">
<!--                        --><?php //echo validation_errors();?>
                        <label for="group_name">Group Name</label>
                        <input type="text" id="group_name" name="group_name"
                               placeholder="Enter group name" class="form-control <?= (form_error('group_name') != '') ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback"><?= strip_tags(form_error('group_name')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="permission">Permission</label>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Create</th>
                                <th>Update</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Users</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="createUser"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"
                                           class="minimal">
                                </td>
                            </tr>
                            <tr>
                                <td>Groups</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="createGroup"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup"
                                           class="minimal">
                                </td>
                            </tr>
                            <tr>
                                <td>Brands</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="createBrand"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateBrand"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewBrand"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="deleteBrand"
                                           class="minimal">
                                </td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="createCategory"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateCategory"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewCategory"
                                           class="minimal">
                                </td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="deleteCategory"
                                           class="minimal">
                                </td>
                            </tr>
                            <tr>
                                <td>Stores</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="createStore"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateStore"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewStore"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="deleteStore"
                                           class="minimal"></td>
                            </tr>
                            <tr>
                                <td>Attributes</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="createAttribute"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateAttribute"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewAttribute"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="deleteAttribute"
                                           class="minimal"></td>
                            </tr>
                            <tr>
                                <td>Products</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="createProduct"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateProduct"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewProduct"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="deleteProduct"
                                           class="minimal"></td>
                            </tr>
                            <tr>
                                <td>Orders</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="createOrder"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateOrder"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewOrder"
                                           class="minimal"></td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="deleteOrder"
                                           class="minimal"></td>
                            </tr>
                            <tr>
                                <td>Reports</td>
                                <td> -</td>
                                <td> -</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewReports"
                                           class="minimal"></td>
                                <td> -</td>
                            </tr>
                            <tr>
                                <td>Company</td>
                                <td> -</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany"
                                           class="minimal"></td>
                                <td> -</td>
                                <td> -</td>
                            </tr>
                            <tr>
                                <td>Profile</td>
                                <td> -</td>
                                <td> -</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile"
                                           class="minimal"></td>
                                <td> -</td>
                            </tr>
                            <tr>
                                <td>Setting</td>
                                <td>-</td>
                                <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting"
                                           class="minimal"></td>
                                <td> -</td>
                                <td> -</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('admin/manage-group') ?>" class="btn btn-warning">Back</a>
                    <input type="submit" class="btn btn-primary" value="Add Group">
                </div>
            </form>
        </div>
    </div>
</div>