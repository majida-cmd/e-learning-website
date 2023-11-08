<?php

use App\Http\Controllers\ChapterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

/*
|------------------- -------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('contact-us', [ContactController::class, 'index']);
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');


Route::get('/', [LandingController::class, 'index'])->name('domaine.index');

Route::get('/contactForm', function () {
    return view('contactForm');
});






Route::get('/try', function () {
    return view('profile2');
});

Route::get('/chapter', function () {
    return view('chapter');
});

// DOMAINE
Route::get('/domaines', [DomaineController::class, 'index'])->name('domaine.index');
Route::get('/domaines/{domaine:slug}', [DomaineController::class, 'show'])->name('domaine.show');
// Route::get('/domaine/{domaine:slug}/module/{module:slug}', 'ModuleController@show')->name('module.show');



Route::get('/moduless', [ModuleController::class, 'indexm'])->name('module.indexm');

Route::get('/modules/{module:slug}/courseInner', [ModuleController::class, 'show'])->name('module.show');

Route::get('/courseInner/{module:slug}/inscrire', [RegisterController::class, 'showRegistrationForm'])->name('registration.form');
Route::post('/courseInner/{module:slug}/inscrire', [RegisterController::class, 'register'])->name('registration.post');
// Route::post('/courseInner/{module:slug}/inscrire', [RegisterController::class, 'register2'])->name('registration.post2');


// Route::get('/courseInner/{module}/{token}', [RegisterController::class, 'showRegistrationForm'])->name('registration.form');
// Route::post('/courseInner/{module}/{token}', [RegisterController::class, 'register'])->name('registration.post');


Route::get('/etudiants/{id}', [EtudiantController::class, 'show'])->name('etudiants.show')->middleware('admin');
Route::resource('etudiants', EtudiantController::class)->middleware('admin');
// Route::get('/etudiants/{id}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy')->middleware('admin');
Route::resource('modules', ModuleController::class)->middleware('admin');

//Route::get('/modules/{module}/chapters/{id}', [ChapterController::class, 'show'])->name('chapters.show');
//Route::get('/module/{module}/chapters/{id}', [ChapterController::class, 'show'])->name('chapters.show');
Route::get('/modules/{id}/chapter', [ChapterController::class, 'show'])->middleware('admin')->name('chapters.show');
Route::get('/chapters.create', [ChapterController::class, 'create'])->middleware('admin')->name('chapters.create');
Route::get('/chapters', [ChapterController::class, 'index'])->name('chapters.index');
Route::post('/chapters.store', [ChapterController::class, 'store'])->middleware('admin')->name('chapters.store');

Route::get('/etudiant/{id}', [EtudiantController::class, 'showProfile'])
    ->middleware('etudiant')
    ->name('etudiant.profile');

Route::get('/etudiant/{id}/modules', [EtudiantController::class, 'showChap'])
    ->middleware('etudiant')
    ->name('etudiant.modules');

Route::get('/etudiant/{id}/{module:slug}/playlist', [EtudiantController::class, 'showPlaylist'])
    ->middleware('etudiant')
    ->name('etudiant.playlist');

Route::get('/etudiant/{id}/{module}/{chapitre}', [EtudiantController::class, 'showVideo'])
    ->middleware('etudiant')
    ->name('etudiant.video');
Route::get('/index/{id}', [LandingController::class, 'index2'])
    ->middleware('etudiant')
    ->name('etudiant.index2');
Route::get('/index/{id}/modules', [ModuleController::class, 'modules'])
    ->middleware('etudiant')
    ->name('etudiant.moduless');
Route::get('/etudiant/{id}/course2', [EtudiantController::class, 'coursesleft'])
    ->middleware('etudiant')
    ->name('etudiant.course');
Route::get('/etudiant/{id}/course2/{module:slug}/courseInner2', [EtudiantController::class, 'coursesleftInner'])
    ->middleware('etudiant')
    ->name('etudiant.coursesleftInner');
Route::get('/etudiant/{id}/courseInner2/{module:slug}/Inscrire', [EtudiantController::class, 'registration2'])
    ->middleware('etudiant')
    ->name('etudiant.registration2');
Route::post('/etudiant/{id}/courseInner2/{module:slug}/Inscrire', [EtudiantController::class, 'register2'])
    ->middleware('etudiant')
    ->name('etudiant.register2');
Route::get('/etudiant/{id}/contact', [ContactController::class, 'showContactForm'])
    ->middleware('etudiant')
    ->name('etudiant.contact');
Route::post('/etudiant/{id}/contact', [ContactController::class, 'storeCF'])
    ->middleware('etudiant')
    ->name('etudiant.storeCF');


Route::get('fields', [DomaineController::class, 'indexAdd'])->middleware('admin')->name('domaines.index');
Route::get('fields/create', [DomaineController::class, 'create'])->middleware('admin')->name('domaines.create');
Route::post('fields/store', [DomaineController::class, 'store'])->middleware('admin')->name('domaines.store');
Route::delete('fields/{id}', [DomaineController::class, 'destroy'])->middleware('admin')->name('domaines.destroy');
Route::get('fields/edit/{id}', [DomaineController::class, 'edit'])->middleware('admin')->name('domaines.edit');
Route::put('fields/update/{id}', [DomaineController::class, 'update'])->middleware('admin')->name('domaines.update');
Route::resource('admins', AdminController::class)->middleware('admin');


Route::resource('professeurs', ProfesseurController::class)->middleware('admin');
//Route::get('/professeurs/create', [ProfesseurController::class, 'create'])->name('professeurs.create');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('getModule/{id}', [ChapterController::class, 'getModule']);






Route::get('/chapterInsc', [VideoController::class, 'index'])->name('module.index');
Route::get('/chapterInsc/{module:slug}/playlist/', [VideoController::class, 'show'])->name('playlist.show');
Route::get('/chapterInsc/{module}/{chapitre}', [VideoController::class, 'showd'])->name('playlist.showd');

Route::get('/playlist', function () {
    return view('playlist');
});
Route::get('/video', function () {
    return view('watch_vid');
});
