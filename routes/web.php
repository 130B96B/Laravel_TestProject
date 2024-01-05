<?php
use App\Http\Controllers\ContactsController;
//トップページ
Route::get('/contact',[ContactsController::class, 'index'])->name('contact.index');
//確認ページ
Route::post('/contact/confirm',[ContactsController::class, 'confirm'])->name('contact.confirm');
//送信完了ページ
Route::post('/contact/thanks',[ContactsController::class, 'send'])->name('contact.send');

Route::get('/', function () {
    return view('/auth/login');
});
Auth::routes();

//ホームページ
Route::get('/account_master/home', [App\Http\Controllers\AccountMastarController::class, 'home'])->name('home');
//アカウント一覧ページ
Route::get('/account_master/accounts', [App\Http\Controllers\AccountMastarController::class, 'accounts'])->name('accounts');
//新規会員登録ページ
Route::get('/account_master/registration',[App\Http\Controllers\AccountMastarController::class, 'registration'])->name('registration');
//確認ページ
Route::post('/account_master/confirm',[App\Http\Controllers\AccountMastarController::class, 'confirm'])->name('confirm');
//アカウントリスト
Route::get('/account_master/accounts_list',[App\Http\Controllers\AccountMastarController::class, 'accounts_list'])->name('accounts_list');
//編集ページ
Route::get('/account_master/edit/{id}',[App\Http\Controllers\AccountMastarController::class, 'edit'])->name('edit');
//修正
Route::put('/update/{id}',[App\Http\Controllers\AccountMastarController::class, 'update'])->name('update');
//削除
Route::delete('/destroy/{id}',[App\Http\Controllers\AccountMastarController::class, 'destroy'])->name('destroy');
//お問い合わせ一覧
Route::get('/account_master/contacts',[App\Http\Controllers\AccountMastarContactController::class, 'contacts'])->name('contacts');
//お問い合わせ編集
Route::get('/account_master/contacts_edit/{id}',[App\Http\Controllers\AccountMastarContactController::class, 'contacts_edit'])->name('contacts_edit');
//修正
Route::put('/contacts_update/{id}',[App\Http\Controllers\AccountMastarContactController::class, 'contacts_update'])->name('contacts_update');
