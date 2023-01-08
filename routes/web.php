<?php

use App\Http\Controllers\AdminCon;
use App\Http\Controllers\NotesCon;
use App\Http\Controllers\StudentCon;
use App\Http\Controllers\StudentCourses;
use App\Http\Controllers\StudentNotes;
use App\Http\Controllers\StudentTimetable;
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
    Route::get('profile',[StudentCon::class, 'show'])->name('profile');
    Route::put('update',[StudentCon::class, 'update'])->name('update');
    Route::get('notes', [StudentNotes::class, 'index'])->name('notes');
    Route::get('courses', [StudentCourses::class, 'index'])->name('courses');
    Route::get('timetable',[StudentTimetable::class, 'index'])->name('timetable');
    Route::view('/login','student.login')->name('login');
    Route::view('sign','student.sign')->name('sign');
    Route::get('pdf',[StudentCon::class, 'pdf'])->name('pdf');
    Route::put('/upload-image', [StudentCon::class, 'storeImage'])->name('image.store');
});
Route::group(['prefix'=>'admin','middleware'=>['auth','isAdmin']],function () {
    Route::view('notes','admin.admin-notes')->name('notes');
    Route::view('courses','admin.admin-courses')->name('courses');
    Route::view('timetable','admin.admin-timetable')->name('admin_timetable');
});

Route::resource('admin', AdminCon::class)->except([
    'create','edit','update'
])->middleware(['auth','isAdmin']);


Route::put('admin', [AdminCon::class, 'update'] )->name('admin.update');
// Route::delete('admin/delete2/{id}', 'AdminCon@delete2' )->name('admin.delete2');

// Route::get('/admin/delete/{id}',function($id){
//     return view('admin.delete',['id'=> $id]);
// })->name('admin.deleteView');

// Route::view('/body','layouts.body');
// Route::view('/mottaki','student.mottaki');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

