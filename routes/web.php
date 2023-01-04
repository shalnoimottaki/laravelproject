<?php

use App\Http\Controllers\AdminCon;
use App\Http\Controllers\NotesCon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// the functions use: get , post , put , delete , patch , options
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('course-single', function () {
    return view('course-single');
});
// Route::view('/course-single','course-single');

// Route::get('/', 'welcome')->name('home');

// Route::match(['get', 'post'], '/user/profile', function () {

// });

// Route::any('users/{id}', function ($id) {

// });
// Route::redirect('/etudiant','/',301);

// Route::get('users/{id}/{name}', function ($id) {
//     return 'Hello User '.$id;
// })->where(['id'=>'[0-9]+','name'=>'[a-z]+'])->name('user');

// Route::get('users/{id?}', function ($id=null) {
//     return 'Hello User '.$id;
// })->name('user');

// $url = Route('user');

// Route::prefix('admin')->group(function(){
//     Route::get('users/{id}',function($id){
//         return 'Hello User '.$id;
//     });
// });

// Route::name('admin.')->group(function(){
//     Route::get('users/{id}',function($id){
//         return 'Hello User '.$id;
//     })->name('users');
// });

Route::fallback(function(){
    return view('page404');
});

// Route::get('users/{name}', function ($name) {
//     return view('users',['json'=>['name'=>'anas','age'=>'21']]);
//     });

// Route::get('test/', function () {
//     return ['name'=>'anas','age'=>'21'];
// });

Route::group(['prefix'=>'student','as'=>'student.','middleware'=>['auth','isStudent']],function () {
    Route::get('profile','StudentCon@show')->name('profile');
    Route::put('update','StudentCon@update')->name('update');
    Route::get('/notes',[NotesCon::class,'index'])->name('notes');
    Route::view('/login','student.login')->name('login');
    Route::view('sign','student.sign')->name('sign');
    Route::get('pdf','StudentCon@pdf')->name('pdf');
});

Route::resource('admin', AdminCon::class)->except([
    'create','edit','update'
])->middleware(['auth','isAdmin']);

Route::put('admin', 'AdminCon@update' )->name('admin.update');
Route::delete('admin/delete2/{id}', 'AdminCon@delete2' )->name('admin.delete2');

// Route::get('/admin/delete/{id}',function($id){
//     return view('admin.delete',['id'=> $id]);
// })->name('admin.deleteView');

// Route::view('/body','layouts.body');
// Route::view('/mottaki','student.mottaki');




