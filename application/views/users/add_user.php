<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div><!-- /.col -->

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <form action="<?php base_url('admin/add-user') ?>" method="post" id="create_form"
                  enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" autocomplete="off"
                               class="form-control
                        <?= (form_error('username') != '') ? 'is-invalid' : '' ?>" value="<?= set_value('username') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('username')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" class="form-control
                        <?= (form_error('email') != '') ? 'is-invalid' : '' ?>" value="<?= set_value('email') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('email')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" autocomplete="off"
                               class="form-control
                        <?= (form_error('password') != '') ? 'is-invalid' : '' ?>" value="<?= set_value('password') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('password')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="cpassword">Confirm password</label>
                        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"
                               autocomplete="off"
                               class="form-control <?= (form_error('cpassword') != '') ? 'is-invalid' : '' ?>"
                               value="<?= set_value('cpassword') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('cpassword')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="fname">First name</label>
                        <input type="text" name="fname" id="fname" placeholder="First name" autocomplete="off"
                               class="form-control <?= (form_error('fname') != '') ? 'is-invalid' : '' ?>"
                               value="<?= set_value('fname') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('fname')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="lname">Last name</label>
                        <input type="text" name="lname" id="lname" placeholder="Last name" autocomplete="off"
                               class="form-control <?= (form_error('lname') != '') ? 'is-invalid' : '' ?>"
                               value="<?= set_value('lname') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('lname')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" autocomplete="off"
                               class="form-control <?= (form_error('lname') != '') ? 'is-invalid' : '' ?>"
                               value="<?= set_value('lname') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('phone')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Author Image</label>
                        <input type="file" name="picture" id="file" placeholder="I" autocomplete="off"
                               class="form-control ">
                    </div>

                    <div class="form-group">
                        <label>Role
                            <select name="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="radio">
                            <label>
                                <input type="radio" id="gender" name="gender" value="male" checked>
                                Male
                            </label>
                            <label>
                                <input type="radio" id="gender" name="gender" value="female">
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Details">User Detail</label>
                        <textarea name="user_detail" rows="7" placeholder="Write Your Details"
                                  class="form-control
                                  <?= (form_error('user_detail') != '') ? 'is-invalid' : '' ?>"></textarea>
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('user_detail')) ?></div>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer pb-4">
                    <a href="<?= base_url('admin/get-all-users') ?>" class="btn btn-sm btn-warning">Back</a>
                    <button type="submit" id="admin_save_product_btn" class="btn btn-sm btn-primary">Save Product</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
