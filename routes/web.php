<?php
use App\Http\Controllers\ContactsController;
//トップページ
Route::get('/contact',[ContactsController::class, 'index'])->name('contact.index');
//確認ページ
Route::post('/contact/confirm',[ContactsController::class, 'confirm'])->name('contact.confirm');
//送信完了ページ
Route::post('/contact/thanks',[ContactsController::class, 'send'])->name('contact.send');