<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row">

        <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <form action="<?= base_url('admin/update-user-save') ?>" method="post" enctype="multipart/form-data">
                <?php
                if (isset($row['id']) && !empty($row['id'])) {
                    ?>
                    <div class="box-body">
                        <input type="hidden" name="hide_id"
                               value="<?= $row['id'] ?>">
                        <input type="hidden" name="old_picture" value="<?= $row['picture'] ?>">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" autocomplete="off"
                                   class="form-control
                        <?= (form_error('username') != '') ? 'is-invalid' : '' ?>"
                                   value="<?= set_value('username', isset($row['username']) && !empty($row['username']) ?
                                       $row['username'] : '') ?>">
                            <div class="invalid-feedback text-right"><?= strip_tags(form_error('username')) ?></div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" class="form-control
                        <?= (form_error('email') != '') ? 'is-invalid' : '' ?>"
                                   value="<?= set_value('email', isset($row['email']) && !empty($row['email']) ?
                                       $row['email'] : '') ?>">
                            <div class="invalid-feedback text-right"><?= strip_tags(form_error('email')) ?></div>
                        </div>

                        <div class="form-group">
                            <label for="fname">First name</label>
                            <input type="text" name="fname" id="fname" placeholder="First name" autocomplete="off"
                                   class="form-control <?= (form_error('fname') != '') ? 'is-invalid' : '' ?>"
                                   value="<?= set_value('fname',
                                       isset($row['first_name']) && !empty($row['first_name']) ?
                                           $row['first_name'] : '') ?>">
                            <div class="invalid-feedback text-right"><?= strip_tags(form_error('fname')) ?></div>
                        </div>

                        <div class="form-group">
                            <label for="lname">Last name</label>
                            <input type="text" name="lname" id="lname" placeholder="Last name" autocomplete="off"
                                   class="form-control <?= (form_error('lname') != '') ? 'is-invalid' : '' ?>"
                                   value="<?= set_value('lname', isset($row['last_name']) && !empty($row['last_name']) ?
                                       $row['last_name'] : '') ?>">
                            <div class="invalid-feedback text-right"><?= strip_tags(form_error('lname')) ?></div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" placeholder="Phone" autocomplete="off"
                                   class="form-control <?= (form_error('phone') != '') ? 'is-invalid' : '' ?>"
                                   value="<?= set_value('phone', isset($row['phone']) && !empty($row['phone']) ?
                                       $row['phone'] : '') ?>">
                            <div class="invalid-feedback text-right"><?= strip_tags(form_error('phone')) ?></div>
                        </div>

                        <div class="form-group">
                            <label for="picture">picture</label>
                            <input type="file" name="picture"
                                   class="form-control <?= (form_error('picture') != '') ? 'is-invalid' : '' ?>">
                        </div>

                        <div class="form-group">
                            <label>Role
                                <select name="role" class="form-control">
                                    <option value="admin" <?= (isset($row['role']) && $row['role'] == 'admin' ? 'checked' : '') ?>>
                                        Admin
                                    </option>
                                    <option value="user" <?= (isset($row['role']) && $row['role'] == 'user' ? 'checked' : '') ?>>
                                        User
                                    </option>
                                </select>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="Status">Status</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" value="1"
                                        <?= (isset($row['status']) && $row['status'] == 1 ? 'checked' : '') ?>>
                                    Activate
                                </label>
                                <label>
                                    <input type="radio" name="status" value="0"
                                        <?= (isset($row['status']) && $row['status'] == 0 ? 'checked' : '') ?>>
                                    Blocked
                                </label>
                            </div>
                        </div>

                    </div>
                    <?php
                }
                ?>
                <!-- /.box-body -->

                <div class="box-footer pb-5">
                    <a href="<?= base_url('admin/get-all-users') ?>" class="btn btn-sm btn-warning">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update User</button>
                </div>
            </form>
        </div>
        <div class="col-md-3">

            <?php
            if (!empty($row['picture']) && file_exists($row['picture'])) {
                ?>
                <h5 class="text-center">Existing User Profile Picture</h5>
                <img src="<?= base_url($row['picture']) ?>" class="img-fluid img-thumbnail" width="250" alt="Avatar">
                <?php
            } else {
                ?>
                <h5 class=" text-center">No user Profile Picture</h5>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
