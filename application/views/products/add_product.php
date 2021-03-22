<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <form action="<?= base_url('admin/add-product') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="product_name" placeholder="Enter Product Name"
                               class="form-control <?= (form_error('product_name') != '') ? 'is-invalid' : '' ?>"
                               value="<?= set_value('product_name') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('product_name')) ?></div>
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="text" name="product_price" id="product_price" placeholder="Enter Product Price"
                               class="form-control <?= (form_error('product_price') != '') ? 'is-invalid' : '' ?>"
                               value="<?= set_value('product_price') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('product_price')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="brand">Product Brand</label>
                        <input type="text" name="product_brand" id="product_brand" placeholder="Enter Product Brand"
                               class="form-control <?= (form_error('product_brand') != '') ? 'is-invalid' : '' ?>"
                               value="<?= set_value('product_brand') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('product_brand')) ?></div>
                    </div>
                    <div class="form-group">
                        <label for="items">Product Total Items</label>
                        <input type="number" name="product_items" id="product_items" placeholder="Enter Product Items"
                               class="form-control <?= (form_error('product_items') != '') ? 'is-invalid' : '' ?>"
                               value="<?= set_value('product_items') ?>">
                        <div class="invalid-feedback text-right"><?= strip_tags(form_error('product_items')) ?></div>
                    </div>

                    <div class="form-group">
                        <label for="store">Product Availability</label>
                        <select name="availability" id="availability"
                                class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Product Image</label>
                        <input type="file" name="product_image" id="product_image" autocomplete="off"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="desc">Product Description <span style="font-size: 10px">(Optional)</span></label>
                        <textarea name="product_description" id="product_description" rows="7"
                                  class="form-control"></textarea>
                    </div>
                </div>

                <div class="box-footer pt-3 pb-4">
                    <a href="<?= base_url('admin/get-all-products') ?>" class="btn btn-sm btn-warning">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
