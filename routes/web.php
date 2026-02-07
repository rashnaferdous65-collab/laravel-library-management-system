<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\Book;


Route::get('/' ,[HomeController::class, 'home'])->name('home');


Route::get('/dashboard', function (){
$books = Book::all();
return view('home.index', compact('books'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/add_category', [AdminController::class, 'add_category'])
    ->middleware(['auth', 'admin'])
    ->name('add_category');

Route::post('/made_category', [AdminController::class, 'made_category'])
    ->middleware(['auth', 'admin'])
    ->name('made_category');

Route::delete('/cat_delete/{id}', [AdminController::class, 'cat_delete'])
    ->name('cat_delete');

Route::get('/edit_category/{id}', [AdminController::class, 'edit_category'])
    ->middleware(['auth', 'admin'])
    ->name('edit_category');

Route::put('/update_category/{id}', [AdminController::class, 'update_category'])
    ->middleware(['auth', 'admin'])
    ->name('update_category');

Route::get('/add_book', [AdminController::class, 'add_book'])
    ->middleware(['auth', 'admin'])
    ->name('add_book');

Route::post('/store_book', [AdminController::class, 'store_book'])
    ->middleware(['auth', 'admin'])
    ->name('store_book');

Route::get('/view_book', [AdminController::class, 'view_book'])
    ->middleware(['auth', 'admin'])
    ->name('view_book');

Route::delete('/book_delete/{id}', [AdminController::class, 'book_delete'])
    ->name('book_delete');

Route::get('/edit_book/{id}', [AdminController::class, 'edit_book'])
    ->middleware(['auth', 'admin'])
    ->name('edit_book');

Route::put('/update_book/{id}', [AdminController::class, 'update_book'])
    ->middleware(['auth', 'admin'])
    ->name('update_book');

Route::get('/book_details/{id}', [HomeController::class, 'book_details'])
    ->name('book_details');

Route::get('/borrow_books/{id}', [HomeController::class, 'borrow_books'])
    ->name('borrow_books');

Route::get('/borrow_book', [AdminController::class, 'borrow_book'])
    ->middleware(['auth', 'admin'])
->name('borrow_book');

Route::get('/approve_book/{id}', [AdminController::class, 'approve_book'])
    ->middleware(['auth', 'admin'])
    ->name('approve_book');

Route::get('/reject_book/{id}', [AdminController::class, 'reject_book'])
    ->middleware(['auth', 'admin'])
    ->name('reject_book');

Route::get('/return_book/{id}', [AdminController::class, 'return_book'])
    ->middleware(['auth', 'admin'])
    ->name('return_book');

Route::get('/book_history', [HomeController::class, 'book_history'])
    ->name('book_history');


Route::Delete('/cancel_book/{id}', [HomeController::class, 'cancel_book'])
    ->name('cancel_book');

Route::get('explore', [HomeController::class, 'explore'])
    ->name('explore');


Route::get('search', [HomeController::class, 'search'])
    ->name('search');


Route::get('/cat_search/{id}', [HomeController::class, 'cat_search'])
    ->name('cat_search');


Route::get('/create', [HomeController::class, 'create'])
    ->name('create');

Route::post('/store_create', [HomeController::class, 'store_create'])
    ->name('store_create');

Route::get('/reader_list', [AdminController::class, 'reader_list'])
    ->middleware(['auth', 'admin'])
    ->name('reader_list');


Route::get('/edit_reader/{id}', [AdminController::class, 'edit_reader'])
    ->middleware(['auth', 'admin'])
    ->name('edit_reader');

Route::put('/update_reader/{id}', [AdminController::class, 'update_reader'])
    ->middleware(['auth', 'admin'])
    ->name('update_reader');

Route::Delete('/reader_delete/{id}', [AdminController::class, 'reader_delete'])
   ->middleware(['auth', 'admin'])
    ->name('reader_delete');