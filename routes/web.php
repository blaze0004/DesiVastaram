<?php

use App\State;
use Illuminate\Support\Facades\DB;
use Wqqas1\LaravelVideoChat\Facades\Chat;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::post('/resetPassword', 'Profile\ProfileController@resetPassword')->name('profile.resetPassword');

    Route::get('/addUser', 'Profile\ProfileController@addNewUser')->name('addUser');
    Route::post('/addUser', 'Profile\ProfileController@storeNewUser')->name('storeNewUser');

    // admin buyers additional routes

    Route::get('/buyers/orders/{buyerId}', 'Order\OrderController@showAllOrders')->name('buyers.showAllOrders');
    Route::post('/buyers/deactivate/{buyersId}', 'Buyer\BuyerController@deactivateAccount')->name('buyers.deactivate');

    // admin seller additional routes

    Route::get('/sellers/products/{sellerId}', 'Product\ProductController@showAllProductsOfSeller')->name('sellers.showAllProducts');
    Route::post('/sellers/deactivate/{sellerId}', 'Seller\SellerController@activateDeactivateAccount')->name('sellers.activateDeactivate');

    // Admin Trainer Additional Route

    Route::get('/trainers/sellers/{trainerId}', 'Trainer\TrainerController@showAllSellersOfTrainer')->name('trainers.showAllSellers');
    Route::post('/trainers/deactivate/{trainersId}', 'Trainer\TrainerController@activateDeactivateAccount')->name('trainers.deactivate');

    // City, State, Country Add/Remove CRUD

   
    Route::get('/address', 'AddressController@create')->name('address.create');
    Route::post('/address/add/country', 'AddressController@addCountry')->name('address.addCountry');
    Route::post('/address/add/state', 'AddressController@addState')->name('address.addState');
    Route::post('/address/add/city', 'AddressController@addCity')->name('address.addCity');

    Route::post('/address/update/country', 'AddressController@updateCountry')->name('address.updateCountry');
    Route::post('/address/update/state', 'AddressController@updateState')->name('address.updateState');
    Route::post('/address/update/city', 'AddressController@updateCity')->name('address.updateCity');

    Route::resource('/trainers', 'Trainer\TrainerController');
    Route::resource('/buyers', 'Buyer\BuyerController');
    Route::resource('/sellers', 'Seller\SellerController');
    Route::resource('/profile', 'Profile\ProfileController');
 
    Route::resource('/category', 'Category\CategoryController');
    Route::resource('/', 'Admin\AdminController');

});

Route::group(['as' => 'productCRUD.', 'middleware' => ['auth', 'product'], 'prefix' => 'productCRUD'], function () {
       Route::resource('/products', 'Product\ProductController');
});
// City, States, Countries Route For Address

Route::get('/address/getCountryDetails', 'AddressController@getCountryDetails')->name('address.getCountryDetails');
Route::get('/address/getStateList', 'AddressController@getStateList')->name('address.getStateList');
Route::get('/address/getStateDetails', 'AddressController@getStateDetails')->name('address.getStateDetails');
Route::get('/address/getCityList', 'AddressController@getCityList')->name('address.getCityList');
Route::get('/address/getCityDetails', 'AddressController@getCityDetails')->name('address.getCityDetails');

// User Address CRUD START


Route::get('/my_addresses', 'AddressController@my_addresses')->name('my_addresses');
Route::get('/my_addresses/addNewAddress', 'AddressController@addNewAddressForm')->name('addNewAddressForm');
Route::post('/my_addresses/addNewAddress', 'AddressController@store')->name('addNewAddress');
Route::get('/my_addresses/{addressId}/edit', 'AddressController@edit')->name('address.edit');
Route::post('/my_addresses/{addressId}/update', 'AddressController@update')->name('updateAddress');/*
Route::get('/my_addresses/{addressId}/update', 'AddressController@updateForm')->name('updateAddressForm');*/
Route::post('/my_addresses/{addressId}/delete', 'AddressController@destroy')->name('deleteAddress');
Route::post('/my_addresses/{addressId}/makeDefault', 'AddressController@makeDefaultAddress')->name('makeDefaultAddress');
// User Address CRUD END

// User Profile Routes CRUD START

Route::get('/dashboard', 'Profile\ProfileController@dashboard')->name('dashboard');
Route::get('/myaccount/{userId}','Profile\ProfileController@index')->name('myaccount');
Route::post('/resetPassword/{userId}', 'Profile\ProfileController@resetPassword')->name('resetPassword');
Route::post('/myaccount/{userId}/save', 'Profile\ProfileController@update')->name('save_profile');
Route::get('/myaccount/{userId}/seller-role-request', 'Profile\ProfileController@sellerRoleRequest')->name('seller-role-request');
Route::post('/myaccount/{userId}/seller-role-request-send', 'Profile\ProfileController@sellerRoleRequestSend')->name('seller-role-request-send');
Route::get('/myaccount/{userId}/wholesalebuyer-role-request', 'Profile\ProfileController@wholesalebuyerRoleRequest')->name('wholesalebuyer-role-request');
Route::post('/myaccount/{userId}/wholesalebuyer-role-request-send', 'Profile\ProfileController@wholesalebuyerRoleRequestSend')->name('wholesalebuyer-role-request-send');
Route::get('/myaccount/{userId}/trainer-role-request', 'Profile\ProfileController@trainerRoleRequest')->name('trainer-role-request');
Route::post('/myaccount/{userId}/trainer-role-request-send', 'Profile\ProfileController@trainerRoleRequestSend')->name('trainer-role-request-send');

// User Profile Routes CRUD END

/*
Route::group([], function() {
Route::resource('/seller', "Seller\SellerController");
});*/

Route::group(['as' => 'product.', 'prefix' => 'product'], function () {
    Route::post('/productImageDelete', 'Product\ProductController@productImageDelete')->name('productImageDelete');
    Route::get('/{product_slug}', 'Product\ProductController@single')->name('single');
});

Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
    Route::get('/{category_slug}', 'Product\ProductController@allProductsWithCategory')->name('allProductsWithCategory');
});

Route::resource('/checkout', 'Order\OrderController');

Route::get('/order/history/{userId}', 'Order\OrderController@history')->name('order_history');
Route::get('/order/details/', 'Order\OrderController@showOrderDetails')->name('order_details');
Route::get('/product-order/{sellerId}/list/', 'Order\OrderController@productOrderList')->name('product-order.list');
Route::get('/wishlists', 'Wishlist\WishlistController@userWishlist')->name('userWishlist');
Route::post('/wishlists/save', 'Wishlist\WishlistController@store')->name('wishlist.store');

Route::get('/basket', 'Cart\CartController@index')->name('showUserCart');

Route::post('/cart/save', 'Cart\CartController@store')->name('cart.store');
Route::post('/cart/destroy', 'Cart\CartController@destroy')->name('cart.destroy');
Route::post('/cart/changeQuantity', 'Cart\CartController@changeQuantity')->name('cart.changeQuantity');


Route::get('/checkout', 'Order\OrderController@checkoutForm')->name('order.checkout');

Route::post('/checkout/pay', 'Order\OrderController@makeCheckout')->name('checkout.pay');

//Route

Route::get('/search/{query}', "SearchController@productSearch")->name('productSearch');
Route::get('/search/keywordSuggestions', 'SearchController@productSearchSuggestions')->name('productSearchSuggestions');




Route::get('/my-trainee/{trainerId}', 'Trainer\TrainerController@mytrainee')->name('trainer.my-trainee');
Route::get('/my-trainee/{trainer-id}/add-trainee', 'Trainer\TrainerController@storeNewTraineeUser')->name('trainer.add-trainee');
Route::get('/add-trainee/{trainerid}', 'Trainer\TrainerController@addtraineeform')->name('trainer.add-trainee-form'); 



// Video Chat One To One Contact 
/*Route::group(['as' => 'chat.', 'prefix' => 'chat'], function () {
   Route::get('/', 'VideoChatController@index')->name('chat');
   Route::get('/message/{message}/to/{id}', function($message, $id) {
      //  dd($message);
        $conversation = DB::table('conversations')->where(['first_user_id' => Auth::id(), 'second_user_id' => $id])->first();
        if ($conversation === null) {

            Chat::startConversationWith($id);

        }

        $conversation = DB::table('conversations')->where(['first_user_id' => Auth::id(), 'second_user_id' => $id])->first();
        Chat::sendConversationMessage($conversation->id, $message);

        $conversation = Chat::getConversationMessageById($conversation->id);

        return view('chat', compact('conversation'));
   });

   Route::get('/chat/{conversationId}', 'VideoChatController@chat')->name('open-chat-room');

   Route::get('/chat/{id}', 'VideoChatController@chat')->name('chat');

   Route::post('/chat/message/send', 'VideoChatController@send')->name('send');
   Route::post('/chat/message/send/file', 'VideoChatController@sendFilesInConversation')->name('send.file');

Route::get('/accept/message/request/{id}' , function ($id){
    Chat::acceptMessageRequest($id);
    return redirect()->back();
})->name('accept.message');

Route::post('/trigger/{id}' , function (\Illuminate\Http\Request $request , $id) {
    Chat::startVideoCall($id , $request->all());
});



});

*/

Route::get('/chat', 'VideoChatController@index')->name('chats');
Route::get('/chat/{id}', 'VideoChatController@chat')->name('chat');

Route::post('/chat/message/send', 'VideoChatController@send')->name('chat.send');
Route::post('/chat/message/send/file', 'VideoChatController@sendFilesInConversation')->name('chat.send.file');

Route::get('/accept/message/request/{id}' , function ($id){
    Chat::acceptMessageRequest($id);
    return redirect()->back();
})->name('accept.message');

Route::post('/trigger/{id}' , function (\Illuminate\Http\Request $request , $id) {
    Chat::startVideoCall($id , $request->all());
});




// For State wise Show 

Route::get('/state/{stateName}', 'Product\ProductController@showProductByStates');