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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about',function(){
// 	echo "wkwk";
// });

// Route::get('getData',function(){
// 	$data=DB::select('select * from test where id=? and nama =?',array(1,'urip'));
// 	echo "<pre>";
// 	print_r($data);
// });

// Route::post('foo',function(){
// 	print_r($_REQUEST);
// });

// Route::get('foo',function(){
// 	return view('form');
// });

// Route::put('update', function(){
// 	$name=$_REQUEST['name'];
// 	$id=$_REQUEST['id'];
// 	$affected = DB::update("UPDATE test set nama='$name' where id = ?", [$id]);
// 	echo $affected==1?"Successfully Updated":"UPdate Fail";
// });

// Route::get('update', function(){
// 	$fetchData = DB::select('select * from test where id = ?', array(1));
// 	echo '<form method="POST" action="update">';
// 	echo "Update Name: <input type=\"text\" name=\"name\" value=\"{$fetchData[0]->nama}\">";
// 	echo "<input type=\"hidden\" value=\"{$fetchData[0]->id}\" name=\"id\">";
// 	echo '<input type="hidden" value="PUT" name="_method">';
// 	echo '<input type="submit">';
// 	echo csrf_field();
// 	echo '</form>';
// });

// Route::delete('delete', function(){
// 	$id=$_REQUEST['id'];
// 	$affected = DB::update("DELETE FROM test where id = ?", [$id]);
// 	echo $affected==1?"Successfully Deleted":"Delete Fail";
// });

// Route::get('delete', function(){
// 	// $fetchData = DB::select('select * from users where id = ?', array(1));
// 	echo '<form method="POST" action="delete">';
// 	echo "Enter User Id for Delete: <input type=\"text\" name=\"id\">";
// 	echo '<input type="hidden" value="DELETE" name="_method">';
// 	echo '<input type="submit" value="Delete">';
// 	echo csrf_field();
// 	echo '</form>';
// });

// Route::get('blade',function(){
// 	return view('contoh_blade');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewcustomer/{id}', 'HomeController@viewCustomer');
Route::post('/viewschedule/{id}','HomeController@viewSchedule');
Route::post('/book/{id}','HomeController@book');

Route::prefix('/customer')->group(function(){
  Route::get('/', 'CustomerController@index')->name('customer.dashboard');
  Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
  Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
});

Route::resource('field','FieldController');
Route::resource('schedule','ScheduleController',[
	'except' => ['create']
]);

Route::prefix('/schedule')->group(function(){
  Route::get('/{field_id}/create', 'ScheduleController@create');
});

Route::get('/api','ApiController@index');
Route::get('/api/{customer}/field','ApiController@field');
Route::get('/api/form',function(){
	return view('form_api');
});
Route::post('/api/insert','ApiController@insert');