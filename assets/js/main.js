var base_url = $("meta[name='base-url']").attr("content");

$(document).ready(function () {

    window.openProductsDescription = openProductsDescription;

    function openProductsDescription(id, description) {
        $('.products_description_model_field_id').val(id);
        $('.products_description').text(description);
        $('.admin_products_description_modal').modal("show");

    }

    window.openProductImage = openProductImage;

    function openProductImage(id, image) {
        $('.products_image_model_field_id').val(id);
        $('.products_image').attr('src', image);
        $('.admin_products_image_modal').modal("show");
    }

    window.userStatus = userStatus;

    function userStatus(id, status) {
        $('.admin_update_user_status_field_id').val(id);
        $('.admin_change_status_field').val(status);
        $('.admin_update_user_status_modal').modal("show");
    }

    $('#status_form').submit(function (e) {
        e.preventDefault();
        var id = $('.admin_update_user_status_field_id').val();
        // var status = $('.admin_change_status_field').val();
        // $('.admin_update_user_status_btn').attr('disabled', true);
        $('.admin_update_user_status_btn').text('Processing');

        $.ajax({
            url: base_url + 'admin/update-save-user-status',
            type: "Post",
            data: {
                id: id,
                status: status
            },
            dataType: 'JSON',
            beforeSend: function () {
            },
            success: function (response) {
                if (response.statusCode == 200) {
                    toastr.success(response.message);
                }
                else {
                    toastr.error(response.message);
                }
            }
        });
    });

    openUerImage();

    function openUerImage(id, picture) {
        $('.open_user_image_filed_id').val(id);
        $('.user_image').attr("src", picture);
        $('.admin_open_user_image_modal').modal("show");
    }

    $('.admin_open_modal_add_attribute_btn').click(function () {
        $('.admin_add_attribute_modal').modal("show");
    });

    /**
     * Manage Groups
     */

    $('#groupTable').DataTable();

    window.editGroup = editGroup;

    function editGroup(id) {
        $.ajax({
            url: base_url + 'admin/get-group-by-id',
            method: 'POST',
            data: {id: id},
            dataType: "JSON",
            success: function (response) {
                // console.log(response.id);
                $('.category_hide_id').val(response.id);
                $('#edit_category_name').val(response.name);
                $('#edit_category_status').val(response.active);
                $('.admin_Edit_category_modal').modal({
                    keyboard: false
                });
            }
        });
    }

    /**
     * End Groups
     * --------------------------------------------------
     */

    /**
     * Add brand data
     */


    $('.admin_open_modal_brand_btn').click(function () {
        $('.admin_add_brand_modal').modal('show');
    });

    $('.manageBradData').DataTable();

    $('#createForm').submit(function (e) {
        e.preventDefault();
        $('.brand_data_save_btn').text('Processing...');
        $('.brand_data_save_btn').attr('disabled', true);

        $.ajax({
            url: base_url + 'admin/add-brand-data',
            type: 'POST',
            data: $('#createForm').serialize(),
            dataType: 'JSON',
            success: function (response) {
                if (response.statusCode == 200) {
                    $('#createForm')[0].reset();
                    toastr.success(response.message);
                    $('.brand_data_save_btn').text('Post');
                    $('.brand_data_save_btn').attr('disabled', false);
                    $('.modal admin_add_brand_modal').modal("hide");
                    $('.manageBradData').DataTable().ajax.reload();
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });

    window.editBrandData = editBrandData;

    function editBrandData(id) {
        $('.admin_edit_brand_data_modal').modal("show");
        $.ajax({
            url: base_url + 'admin/get-edit-brand-data-by-id',
            method: 'POST',
            data: {id: id},
            dataType: "JSON",
            success: function (response) {
                $('.edit_brand_data_id').val(response.id);
                $('#edit_brand_name').val(response.name);
                $('#edit_brand_status').val(response.active);
                $('.admin_edit_brand_data_modal').modal({
                    keyboard: false
                });
            }
        });
    }

    $('#updateBrandForm').submit(function () {
        // e.preventDefault();
        $('.brand_data_update_btn').text('Processing...');
        $.ajax({
            url: base_url + 'admin/update-brand-data',
            type: 'POST',
            data: $('#updateBrandForm').serialize(),
            dataType: 'JSON',
            success: function (response) {
                if (response.statusCode == 200) {
                    toastr.success(response.message);
                    $('.brand_data_update_btn').text('Update');
                    $('#updateBrandForm')[0].reset();
                    $('.admin_edit_brand_data_modal').modal("hide");
                    $('.manageBradData').DataTable().ajax.reload();
                }
                else {
                    toastr.error(response.message);
                }
            }
        });
    });

    window.deleteBrandData = deleteBrandData;

    function deleteBrandData(id) {
        if (confirm('Are you Sure you want to delete this record') == true) {
            $.ajax({
                url: base_url + 'admin/delete-brand-data',
                type: 'POST',
                dataType: 'JSON',
                data: {id: id},
                success: function (response) {
                    if (response.statusCode == 200) {
                        toastr.success(response.message);
                        $('.manageBradData').DataTable().ajax.reload();
                    } else {
                        toastr.error(response.message);
                        alert('Failed to Delete this Record');
                    }
                }
            });
        }
    }

    /*adminGetBrands();

    function adminGetBrands() {
        $.ajax({
            url: base_url + 'admin/brand',
            type: 'GET',
            dataType: 'JSON',
            beforeSend: function () {
            },
            success: function (response) {
                if (response.statusCode == 200) {
                    console.log(response);
                }
            },

        });
    }*/

    /*adminGetAllProducts();

    function adminGetAllProducts() {

        $.ajax({
            url: base_url + 'admin/get-all-products',
            type: 'GET',
            dataType: 'JSON',
            beforeSend: function () {

            },
            success: function (response) {
                var html = '';

                if (response.statusCode == 200) {
                    console.log(response);

                    $.each(response.items, function (index, item) {
                        console.log(response);
                        html += '<tr>\n' +
                            '<td>' + item.id + '</td>' +
                            '<td>' + item.name + '</td>' +
                            '<td>' + item.price + '</td>' +
                            '<td>' + item.image + '</td>' +
                            '<td>' + item.description + '</td>' +
                            '<td>' + item.brand + '</td>' +
                            '<td>' + item.total_items + '</td>' +
                            '<td>' + item.availability + '</td>' +
                            '<td>' + item.created_at + '</td>' +
                            '</tr>';
                        $('#product_data').html(html);
                    });

                } else {
                    html = '<p>Data Not Found.</p>';
                }
            }
        });
    }*/

    /*$('#create_form').submit(function (event) {
        event.preventDefault();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var cpassword = $('#cpassword').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var phone = $('#phone').val();
        var gender = $('#gender').val();

        if (username != "" && email != "" && password != "" && cpassword != ""
            && fname != "" && lname != "" && phone != "" && gender != "") {

            $("#admin_save_product_btn").attr("disabled", "disabled");

            $.ajax({
                url: base_url + 'admin/add-products',
                type: 'post',
                data: {
                    // type: 1,
                    username: username,
                    email: email,
                    password: password,
                    retype_password: cpassword,
                    first_name: fname,
                    lname:last_name,
                    phone: phone,
                    gender: gender,
                },
                dataType: 'JSON',
                cache: false,
                async: false,
                success: function (response) {
                    console.log(response);
                    $('#create_form')[0].reset();
                    alert('Successfully Insrted');

                    if (response.statusCode == 200) {
                        $("#admin_save_product_btn").removeAttr("disabled");
                        // $('#fupForm').find('input:text').val('');
                        $("#success").show();
                        $('#success').html('Data added successfully !');
                    }
                    else if (dataResult.statusCode == 201) {
                        alert("Error occured !");
                    }
                },
                error: function () {
                    alert('Error');
                }
            });
        } else {
            alert('Please fill all the field !');
        }

    });*/


    /**
     * Categories
     */

    $('#categoryExample').DataTable({
        "order": [],
        "ajax": {
            url: base_url + 'admin/get-all-categories',
        },
    });

    $('.admin_open_modal_add_category_btn').click(function () {
        $('.admin_add_category_modal').modal("show");
    });

    $('#createCategoryForm').submit(function (e) {
        e.preventDefault();
        $('.add_category_btn').text('Processing...');
        $.ajax({
            url: base_url + 'admin/add-category',
            type: "POST",
            data: $('#createCategoryForm').serialize(),
            dataType: 'JSON',
            async: false,
            success: function (response) {
                if (response.statusCode == 200) {
                    $('#createCategoryForm')[0].reset();
                    toastr.success(response.message);
                    $('.add_category_btn').text('Save');
                    $('.admin_add_category_modal').modal('hide');
                    $('#categoryExample').DataTable().ajax.reload();
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });


    window.editCategory = editCategory;

    function editCategory(id) {
        $('.admin_Edit_category_modal').modal("show");
        $.ajax({
            url: base_url + 'admin/get-category-data-id',
            method: 'POST',
            data: {id: id},
            dataType: "JSON",
            success: function (response) {
                // console.log(response.id);
                $('.category_hide_id').val(response.id);
                $('#edit_category_name').val(response.name);
                $('#edit_category_status').val(response.active);
                $('.admin_Edit_category_modal').modal({
                    keyboard: false
                });
            }
        });
    }

    window.deleteCategory = deleteCategory;

    function deleteCategory(id) {
        // alert(id);
        if (confirm('Are you Sure you want to delete this record') == true) {
            $.ajax({
                url: base_url + 'admin/delete-category-data',
                type: 'POST',
                dataType: 'JSON',
                data: {id: id},
                success: function (response) {
                    if (response.statusCode == 200) {
                        toastr.success(response.message);
                        $('#categoryExample').DataTable().ajax.reload();
                    } else {
                        toastr.error(response.message);
                        alert('Failed to Delete this Record');
                    }
                }
            });
        }
    }

    /**
     * end Category
     * ------------------------------------------------------------
     */

    /**
     * Start Stores
     */

    $('#storeTable').DataTable({
        "order": [],
        "ajax": {
            url: base_url + 'admin/get-store-data',
        },
    });

    $('.admin_open_modal_add_store_btn').click(function () {
        $('.admin_add_store_data_modal').modal("show");
    });

    $('#createStoreForm').submit(function (e) {
        e.preventDefault();
        $('.add_store_btn').text('Processing...');
        $.ajax({
            url: base_url + 'admin/add-store-data',
            type: 'POST',
            data: $('#createStoreForm').serialize(),
            dataType: 'JSON',
            success: function (response) {
                if (response.statusCode == 200) {
                    toastr.success(response.message);
                    $('.add_store_btn').text('Save');
                    $('#createStoreForm')[0].reset();
                    $('.admin_add_store_data_modal').modal("hide");
                    $('#storeTable').DataTable().ajax.reload();
                }
                else {
                    toastr.error(response.message);
                }
            }
        });
    });

    window.editStore = editStore;

    function editStore(id) {
        $('.admin_update_store_data_modal').modal("show");
        $.ajax({
            url: base_url + 'admin/get-edit-store-data-by-id',
            type: 'POST',
            data: {id: id},
            dataType: 'JSON',
            success: function (response) {
                console.log(response.id);
                $('.update_store_hidden_id').val(response.id);
                $('#edit_store_name').val(response.name);
                $('#edit_store_status').val(response.active);
                $('.admin_update_store_data_modal').modal({
                    keyboard: false
                });
            }
        });
    }

    $('#updateStoreForm').submit(function (e) {
        e.preventDefault();
        $('.add_store_btn').text('Processing...');
        $.ajax({
            url: base_url + 'admin/update-store-data',
            type: 'POST',
            data: $('#updateStoreForm').serialize(),
            dataType: 'JSON',
            success: function (response) {
                if (response.statusCode == 200) {
                    toastr.success(response.message);
                    $('.add_store_btn').text('Update');
                    $('#createStoreForm')[0].reset();
                    $('.admin_update_store_data_modal').modal("hide");
                    $('#storeTable').DataTable().ajax.reload();
                }
                else {
                    toastr.error(response.message);
                }
            }
        });
    });

    window.deleteStore = deleteStore;

    function deleteStore(id) {
        if (confirm('Are You Sure you Want to delete this record') == true) {
            $.ajax({
                url: base_url + 'admin/delete-store-data',
                type: 'POSt',
                data: {id: id},
                dataType: 'JSON',
                success: function (response) {
                    if (response.statusCode == 200) {
                        toastr.success(response.message);
                        $('#storeTable').DataTable().ajax.reload();
                    } else {
                        toastr.error(response.message);
                    }
                }
            })
        }
    }

    /**
     * End Sotores
     * --------------------------------------------------------------
     */

    /**
     * Attributes
     */

    $('.admin_open_modal_add_attribute_value_data_btn').click(function () {
        $('.admin_add_attribute_value_data_modal').modal('show');
    });

    $('#attributeAddValueDataForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'admin/add-attribute-value-data',
            type: "POST",
            data: $('#attributeAddValueDataForm').serialize(),
            dataType: 'JSON',
            async: false,
            success: function (response) {
                if (response.statusCode == 200) {
                    $('#attributeAddValueDataForm')[0].reset();
                    toastr.success(response.message);
                    $('.admin_add_attribute_value_data_modal').modal('hide');
                    $('#attribute_value_example').DataTable().ajax.reload();
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });

    window.editAttributeValueData = editAttributeValueData;

    function editAttributeValueData(id) {
        $('.admin_edit_attribute_value_data_update_modal').modal('show');
        $.ajax({
            url: base_url + 'admin/get-attribute-value-data_id',
            type: 'POST',
            data: {id: id},
            dataType: 'JSON',
            success: function (response) {
                if (response.statusCode == 200) {
                    $('.attribute_value_data_hide_id').val(response.id);
                    $('#attribute_value_data_field').val(response.value);
                    $('.admin_edit_attribute_value_data_update_modal').modal({
                        keyboard: false,
                    });
                }
            }
        });
    };

    // var attribute_value_data_hide_id = document.getElementById('attribute_value_data_hide_id').value;

    $('#attributeValueDataForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'admin/get-attribute-value-data-update',
            type: "POST",
            data: $('#attributeValueDataForm').serialize(),
            dataType: 'JSON',
            async: false,
            success: function (response) {
                if (response.statusCode == 200) {
                    $('#attributeValueDataForm')[0].reset();
                    toastr.success(response.message);
                    $('.admin_edit_attribute_value_data_update_modal').modal('hide');
                    // alert('Value Successfully Updated');
                    $('#attribute_value_example').DataTable().ajax.reload();
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });

    /**
     * Delete Attribute Value Data
     */

    window.deleteAttributeValueData = deleteAttributeValueData;

    function deleteAttributeValueData(id) {
        if (confirm('Are you Sure you want to delete this record') == true) {
            $.ajax({
                url: base_url + 'admin/delete-attribute-value-data',
                type: 'POST',
                dataType: 'JSON',
                data: {id: id},
                success: function (response) {
                    if (response.statusCode == 200) {
                        toastr.success(response.message);
                        $('#attribute_value_example').DataTable().ajax.reload();
                    } else {
                        toastr.error(response.message);
                        alert('Failed to Delete this Record');
                    }
                }
            });
        }
    }


    $('#createAttributeForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'admin/add-attribute-data',
            type: 'POST',
            data: $('#createAttributeForm').serialize(),
            dataType: 'JSON',
            success: function (response) {
                if (response.statusCode == 200) {
                    toastr.success(response.message);
                    $('#createAttributeForm')[0].reset();
                    $('.admin_add_attribute_modal').modal("hide");
                    $('#example1').DataTable().ajax.reload();
                }
                else {
                    toastr.error(response.message);
                }
            }
        });
    });

    /**
     * attribute fetching data
     */

    $('#example1').DataTable({
        /*"processing": true,
        "serverSide": true,*/
        "order": [],
        "ajax": {
            url: base_url + 'admin/manage-attribute-data',
        }
    });

    window.editAttribute = editAttribute;

    function editAttribute(id) {
        $('.admin_edit_attribute_modal').modal('show');
        $.ajax({
            url: base_url + 'admin/edit-attribute-data',
            method: 'POST',
            data: {id: id},
            dataType: "JSON",
            success: function (response) {
                $('.attribute_hide_id').val(response.id);
                $('#edit_attribute_name').val(response.name);
                $('#edit_attribute_status').val(response.active)
                $('.admin_edit_attribute_modal').modal({
                    keyboard: false
                });
            }
        });
    }

    $('#editForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'admin/update-attribute-save-data',
            type: "POST",
            data: $('#editForm').serialize(),
            dataType: 'JSON',
            async: false,
            success: function (response) {
                if (response.statusCode == 200) {
                    $('#editForm')[0].reset();
                    toastr.success(response.message);
                    $('.admin_edit_attribute_modal').modal('hide');
                    // alert('Data Successfully Updated');
                    $('#example1').DataTable().ajax.reload();
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });

    window.deleteAttribute = deleteAttribute;

    function deleteAttribute(id) {
        if (confirm('Are you Sure you Want to Delete this Record?') == true) {
            $.ajax({
                url: base_url + 'admin/delete-attribute-data',
                type: 'POST',
                dataType: 'JSON',
                data: {id: id},
                success: function (response) {
                    if (response.statusCode == 200) {
                        toastr.success(response.message);
                        $('#example1').DataTable().ajax.reload();
                    } else {
                        toastr.error(response.message);
                        alert('Failed to Delete this Record');
                    }
                }
            });
        }
    };

    /**
     * attribute value get data
     */

    var hidden_attribute_id = document.getElementById('hidden_attribute_id').value;
    $('#attribute_value_example').DataTable({
        /*"processing": true,
        "serverSide": true,*/
        "order": [],
        "ajax": {
            url: base_url + 'Attribute/adminGetAttributeValueData/' + hidden_attribute_id,
        },
    });


});

