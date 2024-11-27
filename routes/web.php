<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\PingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ping', [PingController::class, 'index'])->name('ping');

Route::post('/user', [UserController::class, 'new'])->name('user.new');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::middleware(['jwt.auth'])->group(function () {
    Route::post('/influencer', [InfluencerController::class, 'new'])->name('influencer.new');
    Route::get('/influencer', [InfluencerController::class, 'index'])->name('influencer.index');
    Route::post('/campaign', [CampaignController::class, 'new'])->name('campaign.new');
    Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
    Route::get('/campaign/{id}/influencers', [CampaignController::class, 'list'])->name('campaign.list');
    Route::post('/campaign/{id}/influencers/new', [CampaignController::class, 'add'])->name('campaign.add');
});
