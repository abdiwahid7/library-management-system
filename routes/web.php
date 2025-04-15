<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/home', function () {
    return view('dashboard.home');
})->middleware(['auth'])->name('dashboard.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Front-end Book Routes
Route::resource('books', BookController::class);

// Front-end Author Routes
Route::resource('authors', AuthorController::class);

// Front-end Member Routes
Route::resource('members', MemberController::class);

// Front-end Transaction Routes
Route::resource('transactions', TransactionController::class)->except(['show']);
Route::post('transactions/{transaction}/return', [TransactionController::class, 'return'])
    ->name('transactions.return');

// Dashboard-specific routes with prefix and name prefix
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::resource('transactions', TransactionController::class)->except(['show']);
    Route::post('transactions/{transaction}/return', [TransactionController::class, 'return'])
        ->name('transactions.return');
});
