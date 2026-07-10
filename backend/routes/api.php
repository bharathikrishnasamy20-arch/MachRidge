<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('health', [FrontendController::class, 'health']);

Route::get('hero-sliders', [FrontendController::class, 'getHeroSliders']);
Route::get('products', [FrontendController::class, 'getProducts']);
Route::get('products/{slug}', [FrontendController::class, 'getProduct']);
Route::get('product-categories', [FrontendController::class, 'getProductCategories']);
Route::get('products/category/{slug}', [FrontendController::class, 'getProductByCategory']);
Route::get('capabilities', [FrontendController::class, 'getCapabilities']);
Route::get('inspection-equipment', [FrontendController::class, 'getInspectionEquipment']);
Route::get('industries', [FrontendController::class, 'getIndustries']);
Route::get('testimonials', [FrontendController::class, 'getTestimonials']);
Route::get('blogs', [FrontendController::class, 'getBlogs']);
Route::get('blogs/{slug}', [FrontendController::class, 'getBlog']);
Route::get('gallery', [FrontendController::class, 'getGallery']);
Route::get('settings', [FrontendController::class, 'getSettings']);
Route::post('contact', [FrontendController::class, 'submitContact']);
Route::post('quote-request', [FrontendController::class, 'submitQuoteRequest']);

// Auth routes
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/user', [AuthController::class, 'user']);
    Route::put('auth/profile', [AuthController::class, 'updateProfile']);
    Route::put('auth/change-password', [AuthController::class, 'changePassword']);
});
