<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugsController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login', 'patient');
});
Route::middleware('guest:patient,doctor,pharmacist')->group(function () {
    Route::get('/{guard}/login', [AuthController::class, 'show_login'])
        ->name('login');
    Route::get('/{guard}/sign-up', [AuthController::class, 'show_signup'])
        ->name('register');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/sign-up', [AuthController::class, 'sign_up'])
        ->name('sign_up');
});
Route::middleware('auth:patient,doctor,pharmacist')->group(function () {
    Route::get('/home', function () {
        return response()->view('auth.starter', ['guard' => session('guard')]);
    })->name('starter');
    Route::resource('drugs', DrugsController::class);
    Route::get('/assignDrugToPatient-{id}', [DoctorController::class, 'showAssignDrug'])->name('show_assign_drug');
    Route::post('/assignDrugToPatient-{id}', [DoctorController::class, 'assignDrug'])->name('assign_drug');
    Route::resource('patients', PatientController::class);
    Route::delete('unsigne_drug/{drug_id}-{pat_id}', [DoctorController::class, 'unsignDrug'])->name('unsigne_drug');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
