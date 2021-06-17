<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', 'PagesController@index');
Route::get('/live-stream', 'PagesController@liveStream');
Route::get('/about-us', 'PagesController@aboutUs');
Route::get('/mensclothing','PagesController@mensclothing');
Auth::routes();
/* user frontend */
/*admin backend*/
Route::group(['middleware'=> ['auth','isAdmin']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});
//Route::group(['prefix'=>'AdminPages','middleware'=>['auth','adminpages']],function (){
   // Route::get('/','AdminPagesController@index');
//});
// categories Routefor add, view, edit and delete
Route::match(['get', 'post'],'categories/add-category','CategoryController@addCategory');
Route::get('categories/view-category','CategoryController@viewCategory');
Route::match(['get', 'post'],'categories/edit-category/{id}','CategoryController@editCategory');
Route::match(['get', 'post'],'categories/delete-category/{id}','CategoryController@deleteCategory');

//products Route
Route::match(['get','post'],'products/add-product','ProductsController@addProduct');
Route::get('products/view-product','ProductsController@viewProduct');
Route::match(['get','post'],'products/delete-product/{id}','ProductsController@deleteProduct');
Route::match(['get','post'],'products/edit-product/{id}','ProductsController@editProduct');
//Route for Product attributes 
Route::match(['get','post'],'products/add-atributes/{id}','ProductsController@addAtributes');
Route::match(['get','post'], 'products/delete-attributes/{id}','ProductsController@deleteAttributes');
//category/listing route
Route::get('/frontproducts/{url}','ProductsController@frontProducts');
//product details route
Route::get('/product/{id}','ProductsController@product');
//get product price 
Route::get('/get-product-price','ProductsController@getProductPrice');

//addtocart route to pass the produt details to  function  to store in cart table
Route::match(['get','post'], '/add-cart','ProductsController@addtocart');
//cart page
Route::match(['get','post'], '/cart','ProductsController@cart');
//delete cart product
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');
//update product quantity cart 
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

//checkout page 
Route::match(['get','post'], 'checkout','ProductsController@checkout');//->middleware('auth');

//order review page 
Route::match(['get','post'],'/order-review','ProductsController@orderReview');

//place order
Route::match(['get','post'],'/place-order','ProductsController@placeOrder');

//Thanks Page
Route::get('/thanks','ProductsController@thanks');
//user Orders Page
Route::get('/orders','ProductsController@userOrders');
//user Ordered Products Page
Route::get('/orders/{id}','ProductsController@userOrderDetails');
//Admin Order Routes
Route::get('order/view-orders','ProductsController@viewOrders');
//Admin order Details Route
Route::get('order/view-order/{id}','ProductsController@viewOrderDetails');

//update order status
Route::post('orders/update-order-status','ProductsController@updateOrderStatus');

//search products
Route::post('/search-products','ProductsController@searchProducts');

//Blog Post --add_post,--edit_post,--view_post,--and--delete_post for--
Route::match(['get','post'],'Blog_posts/add-post','PostController@addPost');
Route::get('Blog_posts/index','PostController@index');
Route::get('Blog_posts/view-post/{id}','PostController@viewPost');
Route::match(['get','post'],'Blog_posts/edit-post/{id}','PostController@editPost');
Route::match(['get','post'],'Blog_posts/delete/{id}','PostController@delete');