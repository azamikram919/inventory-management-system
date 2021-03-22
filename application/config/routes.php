<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login'] = 'AdminLogin/login';
$route['logout'] = 'AdminLogin/logout';

$route['admin/add-user'] = 'Home/adminAddUser';
$route['admin/edit-user/(:num)'] = 'Home/adminEditUser';
$route['admin/update-user-save'] = 'Home/adminUpdateUserSave';
$route['admin/update-save-user-status'] = 'Home/adminUpdateSaveUserStatus';
$route['admin/get-all-users'] = 'Home/adminGetAllUsers';
$route['admin/get-all-users/(:num)'] = 'Home/adminGetAllUsers';
$route['admin/delete-user/(:num)'] = 'Home/adminDeleteUser';


$route['admin/manage-group'] = 'Groups/index';
$route['admin/add-group'] = 'Groups/adminAddGroup';
$route['admin/get-group-by-id/(:num)'] = 'Groups/adminGetGroupById';
$route['admin/update-group-data'] = 'Groups/adminUpdateGroupData';
$route['admin/delete-group-data/(:num)'] = 'Groups/adminDeleteGroupData';


$route['admin/brand'] = 'Brand/index';
$route['admin/add-brand-data'] = 'Brand/adminAddBrandData';
$route['admin/get-edit-brand-data-by-id'] = 'Brand/adminGetEditBrandDataById';
$route['admin/update-brand-data'] = 'Brand/adminUpdateBrandData';
$route['admin/delete-brand-data'] = 'Brand/adminDeleteBrandData';


$route['admin/manage-category'] = 'Category/index';
$route['admin/get-all-categories'] = 'Category/adminGetAllCategories';
$route['admin/add-category'] = 'Category/adminAddCategory';
$route['admin/get-category-data-id'] = 'Category/adminGetCategoryDataId';
$route['admin/update-category-data'] = 'Category/adminUpdateCategoryData';
$route['admin/delete-category-data'] = 'Category/adminDeleteCategoryData';


$route['admin/manage-store'] = 'Store/index';
$route['admin/get-store-data'] = 'Store/adminGetStoreData';
$route['admin/add-store-data'] = 'Store/adminAddStoreData';
$route['admin/get-edit-store-data-by-id'] = 'Store/adminGetEditStoreDataById';
$route['admin/update-store-data'] = 'Store/adminUpdateStoreData';
$route['admin/delete-store-data'] = 'Store/adminDeleteStoreData';


$route['admin/attribute'] = 'Attribute/index';
$route['admin/manage-attribute-data'] = 'Attribute/adminManageAttributeData';
$route['admin/add-attribute-data'] = 'Attribute/adminAddAttributeData';

$route['admin/edit-attribute-data'] = 'Attribute/adminGetEditAttributeData';
$route['admin/update-attribute-save-data'] = 'Attribute/adminUpdateAttributeSaveData';
$route['admin/delete-attribute-data'] = 'Attribute/adminDeleteAttributeData';

$route['admin/get-attribute-value/(:num)'] = 'Attribute/adminGetAttributeValue';
$route['admin/add-attribute-value-data'] = 'Attribute/adminAddAttributeValueData';
$route['admin/get-attribute-value-data'] = 'Attribute/adminGetAttributeValueData';

$route['admin/get-attribute-value-data_id'] = 'Attribute/adminGetAttributeValueDataId';
$route['admin/get-attribute-value-data-update'] = 'Attribute/adminGetAttributeValueDataUpdate';
$route['admin/delete-attribute-value-data'] = 'Attribute/adminDeleteAttributeValueData';


$route['admin/add-order'] = 'Order/adminAddOrder';
$route['admin/manage-orders'] = 'Order/adminManageOrders';


$route['admin/add-product'] = 'Product/adminAddProduct';
$route['admin/edit-product'] = 'Product/adminEditProduct';
$route['admin/edit-product/(:num)'] = 'Product/adminEditProduct';
$route['admin/product-update-save'] = 'Product/adminProductUpdateSave';
$route['admin/delete-product/(:num)'] = 'Product/adminDeleteProduct';

$route['admin/index'] = 'Product/index';
$route['admin/index/(:num)'] = 'Product/index';

