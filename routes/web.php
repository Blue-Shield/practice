<?php

use Illuminate\Support\Facades\Route;

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

// Route::group(['middleware'=>'HtmlMinifier'], function(){ 

Route::post('admin-registration','AdminController@AdminRegistration')->name('admin-registration');
Route::get('admin-register','AdminController@AdminRegister')->name('admin-register');

Route::get('admin-login','AdminController@AdminLogin')->name('admin-login');
Route::post('admin-signup','AdminController@AdminSignup')->name('admin-signup');

// User Routes
Route::get('/','User\NewController@Home')->name('/');
Route::get('add-to-cart','User\NewController@AddToCart')->name('add-to-cart');
Route::get('rearrange-gallery','User\NewController@ReArrangeGallery')->name('rearrange-gallery');
Route::get('remove-cart','User\NewController@RemoveCart')->name('remove-cart');
Route::get('product-by-category/{category_name}/{id}','User\NewController@ProductByCategory')->name('product-by-category');
Route::get('product-by-subcategory/{subcategory_name}/{id}','User\NewController@ProductBySubCategory')->name('product-by-subcategory');
Route::get('cart','User\NewController@Cart')->name('cart');
Route::get('increase-cart','User\NewController@IncreaseCart')->name('increase-cart');
Route::get('decrease-cart','User\NewController@DecreaseCart')->name('decrease-cart');
Route::get('product-single-page/{product_name}/{id}','User\NewController@ProductSinglePage')->name('product-single-page');
Route::get('addto-cart-productpage','User\NewController@AddToCartProductPage')->name('addto-cart-productpage');
Route::get('addto-cart-productpage-attribute','User\NewController@AddToCartProductPageAttribute')->name('addto-cart-productpage-attribute');

Route::get('remove-item-from-cart','User\NewController@RemoveItemFromCart')->name('remove-item-from-cart');
Route::get('get-attribute-image','User\NewController@GetAttributeImage')->name('get-attribute-image');
Route::get('about-us','User\NewController@AboutUs')->name('about-us');
Route::get('contact','User\NewController@ContactUs')->name('contact');
Route::post('call-us','User\NewController@CallUs')->name('call-us');
Route::get('contactus','User\NewController@Contact')->name('contactus');
Route::get('user-login','User\NewController@UserLogin')->name('user-login');
Route::get('user-register','User\NewController@UserRegister')->name('user-register');
Route::post('user-registration','User\NewController@UserRegistration')->name('user-registration');
Route::post('user-signin','User\NewController@Signin')->name('user-signin');
Route::get('user-logout','User\NewController@UserLogout')->name('user-logout');
Route::get('ratings-submit','User\NewController@RatingsSubmit')->name('ratings-submit');

Route::group(['middleware' => ['UserMiddleware']], function(){
	Route::get('user-profile','User\NewController@Profile')->name('user-profile');
	Route::post('update-user-profile','User\NewController@UpdatProfile')->name('update-user-profile');
	Route::get('checkout','User\NewController@Checkout')->name('checkout');
	Route::get('get-states','User\NewController@GetStates')->name('get-states');
	Route::get('get-cities','User\NewController@GetCities')->name('get-cities');
	Route::get('get-payment','User\NewController@GetPayment')->name('get-payment');
	Route::get('get-payment-london','User\NewController@GetPaymentLondon')->name('get-payment-london');
	Route::post('checkout-submit','User\NewController@CheckoutSubmit')->name('checkout-submit');
	Route::get('paypal',function(){
	    return view('User/Pages/Paypal');
	});
	Route::get('square','User\NewController@Square')->name('square');
	Route::post('charge','User\NewController@Charge')->name('charge');
	Route::get('thankyou','User\NewController@ThankYou')->name('thankyou');
	Route::get('output','User\NewController@output')->name('output');
}); 



Route::group(['middleware' => ['AdminMiddleware']], function(){
	Route::get('admin-home','AdminController@AdminHome')->name('admin-home');
	Route::get('admin-logout','AdminController@AdminLogout')->name('admin-logout');
	Route::get('admin-category','AdminController@AdminCategory')->name('admin-category');
	Route::get('add-category','AdminController@AdminAddCategory')->name('add-category');
	Route::post('category_add','AdminController@AdminCategoryAdd')->name('category_add');
	Route::get('edit-category/{id}','AdminController@AdminEditCategory')->name('edit-category');
	Route::post('update-category/{id}','AdminController@AdminUpdateCategory')->name('update-category');
	Route::get('delete-category/{id}','AdminController@AdminDeleteCategory')->name('delete-category');
	Route::get('admin-sub-category','AdminController@AdminSubcategory')->name('admin-sub-category');
	Route::get('add-subcategory','AdminController@AdminAddSubcategory')->name('add-subcategory');
	Route::post('subcategory_add','AdminController@AdminSubcategoryAdd')->name('subcategory_add');
	Route::get('edit-subcategory/{id}','AdminController@AdminEditSubcategory')->name('edit-subcategory');
	Route::post('update-subcategory/{id}','AdminController@AdminUpdateSubcategory')->name('update-subcategory');
	Route::get('delete-subcategory/{id}','AdminController@AdminDeleteSubcategory')->name('delete-subcategory');
	Route::get('get-products','AdminController@AdminGetProducts')->name('get-products');
	Route::get('add-product','AdminController@AddProduct')->name('add-product');
	Route::get('get-subcategory','AdminController@GetSubcategory')->name('get-subcategory');
	Route::post('product-add','AdminController@ProductAdd')->name('product-add');
	Route::get('edit-product/{id}','AdminController@EditProduct')->name('edit-product');
	Route::get('edit-product-attribute/{id}','AdminController@EditProductAttribute')->name('edit-product-attribute');
	Route::post('update-attribute/{id}','AdminController@UpdateAttribute')->name('update-attribute');
	Route::get('delete-gallery-image/{id}','AdminController@DeleteGallery')->name('delete-gallery-image');
	Route::post('update-product/{id}','AdminController@UpdateProduct')->name('update-product');
	Route::get('delete-product-attribute/{id}','AdminController@DeleteProductAttribute')->name('delete-product-attribute');
	Route::get('delete-product/{id}','AdminController@DeleteProduct')->name('delete-product');
	Route::get('seo','AdminController@Seo')->name('seo');
	Route::get('edit-seo/{id}','AdminController@EditSeo')->name('edit-seo');
	Route::post('update-seo-field/{id}','AdminController@UpdateSeo')->name('update-seo-field');
	Route::get('seo-section','AdminController@SeoSection')->name('seo-section');
	Route::get('delete-seo/{id}','AdminController@DeleteSeo')->name('delete-seo');
	Route::post('add-seo-field','AdminController@AddSeoSection')->name('add-seo-field');


	Route::get('admin-career','AdminController@AdminCareer')->name('admin-career');
	Route::get('download-resume/{filename}','AdminController@DownloadResume')->name('download-resume');
	Route::get('get-report','AdminController@GetReport')->name('get-report');
	Route::get('get-partner','AdminController@GetPartner')->name('get-partner');
	Route::get('get-order','AdminController@GetOrder')->name('get-order');
	Route::get('get-all-orderDetails/{orderId}','AdminController@GetOrderDetails')->name('get-all-orderDetails');
	Route::get('change-order-status/{orderId}','AdminController@ChangeOrderStatus')->name('change-order-status');
	Route::get('get-attribute','AdminController@ProductAttributes')->name('get-attribute');
	Route::get('add-attribute','AdminController@AddAttribute')->name('add-attribute');
	Route::post('attribute_add','AdminController@AttributeAdd')->name('attribute_add');
	Route::get('edit-attribute/{id}','AdminController@EditAttribute')->name('edit-attribute');
	Route::post('attribute_update/{id}','AdminController@AttributeUpdate')->name('attribute_update');
	Route::get('delete-attribute/{id}','AdminController@DeleteAttribute')->name('delete-attribute');
	
}); 
 

// });


 