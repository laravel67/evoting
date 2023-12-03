<?php


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ComiteController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PriodeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Api\VotingController;
use App\Http\Controllers\ProfileController;

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


// Authenticate
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/auth/user', [LoginController::class, 'user'])->name('user');
Route::post('/auth/admin', [LoginController::class, 'admin'])->name('admin');
// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [HomeController::class, 'home'])->name('home')->middleware('auth');

Route::group(['middleware' => ['auth', 'is_role:user']], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/vote', [HomeController::class, 'index'])->name('voting');
        Route::post('/vote/{id}', [VoteController::class, 'vote'])->name('vote');
    });
});

// Admin
Route::group(['middleware' => ['auth', 'is_role:admin']], function () {
    Route::get('/dashboard', [DashController::class, 'index'])->name('dashboard');
    Route::post('/import', [ImportController::class, 'import'])->name('import');
    Route::get('/dashboard/master-data', [DataController::class, 'index'])->name('data');
    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile');
    // Route resource
    Route::resource('/dashboard/users', UserController::class)->except('show', 'edit', 'store', 'update', 'create');
    Route::resource('/dashboard/jabatans', JabatanController::class)->except('index', 'show', 'create', 'edit');
    Route::resource('/dashboard/priodes', PriodeController::class)->except('index', 'show', 'create', 'edit');
    Route::resource('/dashboard/locals', LocalController::class)->except('index', 'show', 'create', 'edit');
    Route::resource('/dashboard/candidates', CandidateController::class)->except('show');
    Route::resource('/dashboard/comites', ComiteController::class);
    // Route Api
    Route::get('/totalVotes', VotingController::class . '@getVote')->name('api.totalvotes');
    Route::get('/total-voters', VotingController::class . '@getVoters')->name('api.voters');
    Route::get('/allnewvoters', VotingController::class . '@allNewVoters')->name('api.allNewsVoters');
    Route::get('/new-voters', VotingController::class . '@getNewVoters')->name('api.newvoters');
    Route::get('/voted', VotingController::class . '@getVoted')->name('api.voted');
    Route::get('/voteYet', VotingController::class . '@voteYet')->name('api.voteYet');
    Route::get('/getCandidate', [VotingController::class, 'getCandidate'])->name('api.candidate');
    Route::post('/reset-voters/{id}/{candidate_id}', VoteController::class . '@reset')->name('reset');

    Route::get('/dashboard/hasil', [ResultController::class, 'index'])->name('result');
    Route::get('/result', VotingController::class . '@getResult')->name('api.getResult');
    Route::post('/lantik/{id}', VoteController::class . '@lantik')->name('lantik');
});
