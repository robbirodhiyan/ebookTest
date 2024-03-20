<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EbookController;

Route::get('/', [EbookController::class, 'index'])->name('ebook.index');

Route::get('/ebooks/create', [EbookController::class, 'create'])->name('ebook.create');

Route::post('/ebooks', [EbookController::class, 'store'])->name('ebook.store');

Route::get('/ebooks/{id}/edit', [EbookController::class, 'edit'])->name('ebook.edit');

Route::put('/ebooks/{id}', [EbookController::class, 'update'])->name('ebook.update');

Route::get('/ebooks/{id}', [EbookController::class, 'show'])->name('ebook.show');

Route::delete('/ebooks/{id}', [EbookController::class, 'destroy'])->name('ebook.destroy');

Route::get('/ebook/{id}/viewpdf', [EbookController::class, 'viewPdf'])->name('viewPdf');
