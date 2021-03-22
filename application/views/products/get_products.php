<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding:15px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Show All Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a href="<?= base_url('admin/add-product') ?>">
                <span class="btn btn-bock btn-sm btn-primary">Add Product</span>
            </a>
        </div><!-- /.container-fluid -->
    </div>

    <?php
    if ($this->session->flashdata('msg')) :
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <?= $this->session->flashdata('msg') ?>
        </div>
    <?php
    endif;
    ?>

    <!-- /.content-header -->
    <?php
    if (isset($get_products) && !empty($get_products)) {
        ?>
        <div class="card" style="padding: 0 15px 0 15px">
            <div class="card-header">
                <div class="dataTables_length">
                    <label>Show entries
                        <select name="manageTable" class="form-control input-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </label>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th class="text-center">Product Image</th>
                    <th style="width: 10%">Description</th>
                    <th>brand</th>
                    <th>Total Items</th>
                    <th>Availability</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                foreach ($get_products as $item) {
                    ?>
                    <tbody id="product_data">
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->price ?></td>
                        <td><a href="javascript:void(0)">
                                <img src="<?= base_url($item->image) ?>" class="img-thumbnail ml-2" width="100"
                                     alt="Product Image"
                                     onclick="openProductImage('<?= $item->id ?>', '<?= base_url($item->image) ?>')">
                            </a></td>
                        <td><?= substr($item->description, 0, 100) . '...'; ?>
                            <a href="javascript:void(0)">
                                <span class="badge rounded-pill bg-primary"
                                      onclick='openProductsDescription("<?= $item->id ?>", "<?= $item->description ?>")'>Read More</span>
                            </a>
                        </td>
                        <td><?= $item->brand ?></td>
                        <td><?= $item->total_items ?></td>
                        <td><?= $item->availability ?></td>
                        <td><?= $item->created_at ?></td>
                        <td>
                            <a href="<?= base_url('admin/edit-product/' . $item->id) ?>" class="btn btn-xs btn-info">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?= base_url('admin/delete-product/' . $item->id) ?>" class="btn btn-xs btn-danger"
                               onclick="return confirm('Are you Sure You Want to delete this Product')">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                    <?php
                }
                ?>
            </table>
        </div>
        <!----><?//= $links ?>
        <?php
    }
    ?>
    <!-- Main content -->

    <!-- /.content -->

    <div class="modal admin_products_image_modal" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Product Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="products_image_model_field_id">
                            <img class="products_image img-thumbnail"
                                 style="object-fit: cover">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal admin_products_description_modal" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Product Description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="products_description_model_field_id">
                            <p class="products_description p-2"
                               style="border: 1px solid #b9b9b9; border-radius: 5px;"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->



