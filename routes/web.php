<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\InputNilaiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QueryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inputnilai');
});

Route::get('/melihatMahasiswa',[MahasiswaController::class, 'viewMahasiswa']);
Route::get('/inputMahasiswa',[MahasiswaController::class, 'createMahasiswa']);
Route::post('/actionInputMahasiswa',[MahasiswaController::class, 'actionCreateMahasiswa']);

Route::get('/inputNilai', [InputNilaiController::class, "inputNilai"]);
Route::post('/inputNilaiMahasiswa/{kelas}', [InputNilaiController::class, "inputNilaiMahasiswa"]);
Route::get('/getMatkul/{prodi}',[InputNilaiController::class, "getMatkul"]);
Route::get('/getMahasiswa/{matkul}',[InputNilaiController::class, "getMahasiswa"]);

// // Display the login form
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

// // Handle the login form submission
// Route::post('/login', 'Auth\LoginController@login');

// // Logout the user
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


// Display the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle the login form submission
Route::post('/login', [LoginController::class, 'login'])->middleware('web');

// Logout the user
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// forget-password button from login page
Route::get('/forget-password', function () {
    return view('auth.forget-password');
})->name('forget-password');


// sign-up button from login page
Route::get('/sign-up', function () {
    return view('auth.sign-up');
})->name('sign-up');

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);

Route::get('/raport', function () {
    return view('raportawal');
});



Route::get('/query1', [QueryController::class, 'query1']);
Route::get('/query2', [QueryController::class, 'query2']);
Route::get('/query3', [QueryController::class, 'query3']);
Route::get('/query4', [QueryController::class, 'query4']);
Route::get('/query5', [QueryController::class, 'query5']);
Route::get('/query6', [QueryController::class, 'query6']);
Route::get('/query7', [QueryController::class, 'query7']);
Route::get('/query8', [QueryController::class, 'query8']);
Route::get('/query9', [QueryController::class, 'query9']);
Route::get('/query10', [QueryController::class, 'query10']);
