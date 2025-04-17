<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role === 'member') {
        $transactions = $user->transactions()->with('book')->get();
        return view('dashboard_member', compact('transactions'));
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/home', function () {
    return view('dashboard.home');
})->middleware(['auth'])->name('dashboard.home');


Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::resource('users', UserController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Add frontend named routes for 'front' views
Route::get('books/front', [BookController::class, 'front'])->name('books.front');
Route::get('books/member', [BookController::class, 'member'])->name('books.member');
Route::get('members/front', [MemberController::class, 'front'])->name('members.front');
Route::get('transactions/front', [TransactionController::class, 'front'])->name('transactions.front');

Route::get('transactions/member', [TransactionController::class, 'member'])->name('transactions.member');

Route::get('services/front', [ServiceController::class, 'front'])->name('services.front');
Route::get('services/member', [ServiceController::class, 'member'])->name('services.member');
Route::resource('services', ServiceController::class);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        $users = \App\Models\User::all(); // Fetch all users for the admin dashboard
        return view('dashboard', compact('users'));
    }

    if ($user->role === 'member') {
        $transactions = $user->transactions()->with('book')->get();
        return view('dashboard_member', compact('transactions'));
    }

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

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
    Route::resource('books', BookController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('members', MemberController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('transactions', TransactionController::class)->except(['show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::post('transactions/{transaction}/return', [TransactionController::class, 'return'])
        ->name('transactions.return');
});

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('books', BookController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('members', MemberController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('transactions', TransactionController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});
