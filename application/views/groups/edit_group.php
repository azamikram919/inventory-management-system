<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Group</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Group</li>
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
            <form method="post" action="<?= base_url('admin/update-group-data') ?>">
                <?php
                if (isset($row) && !empty($row)) {
                    ?>
                    <div class="card-body">
                        <input type="hidden" class="group_hide_id" name="group_hide_id" value="<?= $row['id'] ?>">
                        <div class="form-group">
                            <label for="group_name">Group Name</label>
                            <input type="text" id="group_name" name="group_name"
                                   placeholder="Enter group name"
                                   class="form-control <?= (form_error('group_name') != '') ? 'is-invalid' : '' ?>"
                                   value="<?= $row['group_name']; ?>">
                            <div class="invalid-feedback"><?= strip_tags(form_error('group_name')) ?></div>
                        </div>

                        <div class="form-group">
                            <label for="permission">Permission</label>
                            <?php $serialize_permission = unserialize($row['permission']); ?>
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
                                    <td><input type="checkbox" class="minimal" name="permission[]" id="permission"
                                               class="minimal" value="createUser" <?php if ($serialize_permission) {
                                            if (in_array('createUser', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?> ></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateUser" <?php
                                        if ($serialize_permission) {
                                            if (in_array('updateUser', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        }
                                        ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewUser" <?php
                                        if ($serialize_permission) {
                                            if (in_array('viewUser', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        }
                                        ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="deleteUser" <?php
                                        if ($serialize_permission) {
                                            if (in_array('deleteUser', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        }
                                        ?>></td>
                                </tr>
                                <tr>
                                    <td>Groups</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="createGroup" <?php
                                        if ($serialize_permission) {
                                            if (in_array('createGroup', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        }
                                        ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateGroup" <?php
                                        if ($serialize_permission) {
                                            if (in_array('updateGroup', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        }
                                        ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewGroup" <?php
                                        if ($serialize_permission) {
                                            if (in_array('viewGroup', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        }
                                        ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="deleteGroup" <?php
                                        if ($serialize_permission) {
                                            if (in_array('deleteGroup', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        }
                                        ?>></td>
                                </tr>
                                <tr>
                                    <td>Brands</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="createBrand" <?php if ($serialize_permission) {
                                            if (in_array('createBrand', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateBrand" <?php if ($serialize_permission) {
                                            if (in_array('updateBrand', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewBrand" <?php if ($serialize_permission) {
                                            if (in_array('viewBrand', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="deleteBrand" <?php if ($serialize_permission) {
                                            if (in_array('deleteBrand', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="createCategory" <?php if ($serialize_permission) {
                                            if (in_array('createCategory', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateCategory" <?php if ($serialize_permission) {
                                            if (in_array('updateCategory', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewCategory" <?php if ($serialize_permission) {
                                            if (in_array('viewCategory', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="deleteCategory" <?php if ($serialize_permission) {
                                            if (in_array('deleteCategory', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                </tr>
                                <tr>
                                    <td>Stores</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="createStore" <?php if ($serialize_permission) {
                                            if (in_array('createStore', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateStore" <?php if ($serialize_permission) {
                                            if (in_array('updateStore', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewStore" <?php if ($serialize_permission) {
                                            if (in_array('viewStore', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="deleteStore" <?php if ($serialize_permission) {
                                            if (in_array('deleteStore', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                </tr>
                                <tr>
                                    <td>Attributes</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="createAttribute" <?php if ($serialize_permission) {
                                            if (in_array('createAttribute', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateAttribute" <?php if ($serialize_permission) {
                                            if (in_array('updateAttribute', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewAttribute" <?php if ($serialize_permission) {
                                            if (in_array('viewAttribute', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="deleteAttribute" <?php if ($serialize_permission) {
                                            if (in_array('deleteAttribute', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                </tr>
                                <tr>
                                    <td>Products</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="createProduct" <?php if ($serialize_permission) {
                                            if (in_array('createProduct', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateProduct" <?php if ($serialize_permission) {
                                            if (in_array('updateProduct', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewProduct" <?php if ($serialize_permission) {
                                            if (in_array('viewProduct', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="deleteProduct" <?php if ($serialize_permission) {
                                            if (in_array('deleteProduct', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                </tr>
                                <tr>
                                    <td>Orders</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="createOrder" <?php if ($serialize_permission) {
                                            if (in_array('createOrder', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateOrder" <?php if ($serialize_permission) {
                                            if (in_array('updateOrder', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewOrder" <?php if ($serialize_permission) {
                                            if (in_array('viewOrder', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="deleteOrder" <?php if ($serialize_permission) {
                                            if (in_array('deleteOrder', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                </tr>
                                <tr>
                                    <td>Reports</td>
                                    <td> -</td>
                                    <td> -</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewReports" <?php if ($serialize_permission) {
                                            if (in_array('viewReports', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td> -</td>
                                </tr>
                                <tr>
                                    <td>Company</td>
                                    <td> -</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateCompany" <?php if ($serialize_permission) {
                                            if (in_array('updateCompany', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td> -</td>
                                    <td> -</td>
                                </tr>
                                <tr>
                                    <td>Profile</td>
                                    <td> -</td>
                                    <td> -</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="viewProfile" <?php if ($serialize_permission) {
                                            if (in_array('viewProfile', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td> -</td>
                                </tr>
                                <tr>
                                    <td>Setting</td>
                                    <td>-</td>
                                    <td><input type="checkbox" name="permission[]" id="permission" class="minimal"
                                               value="updateSetting" <?php if ($serialize_permission) {
                                            if (in_array('updateSetting', $serialize_permission)) {
                                                echo "checked";
                                            }
                                        } ?>></td>
                                    <td> -</td>
                                    <td> -</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="card-footer">
                    <a href="<?= base_url('admin/manage-group') ?>" class="btn btn-warning">Back</a>
                    <input type="submit" class="btn btn-primary" value="Update Group">
                </div>
            </form>
        </div>
    </div>
</div>