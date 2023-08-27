<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers;

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
Route::resource('admin', AdminController::class);
Route::get(
    '/admin/{admin}/delete',
    [AdminController::class, 'delete']
)->name('admin.delete');

Route::get(
    '/',
    [Controllers\FrontendController::class, 'home']
)->name('home');

// Feed/Post routes
Route::get(
    'feed',
    [Controllers\PostController::class, 'posts']
)->name('feed');
Route::get(
    'my-posts',
    [Controllers\PostController::class, 'myPosts']
)->name('my-posts');
Route::match(
    ['get', 'post'],
    '/post-detail',
    [Controllers\PostController::class, 'comments']
)->name('post.detail');
Route::post(
    '/new-post',
    [Controllers\PostController::class, 'newPost']
)->name('post.new');
Route::post(
    '/new-comment',
    [Controllers\PostController::class, 'newComment']
)->name('comment.new');
Route::match(
    ['get', 'post'],
    '/upvote',
    [Controllers\PostController::class, 'toggleUpvote']
)->name('post.upvote');

// Job Routes
Route::get(
    'jobs',
    [Controllers\JobController::class, 'jobs']
)->name('job.all');
Route::get(
    'our-jobs',
    [Controllers\JobController::class, 'ourJobs']
)->name('our-jobs');
Route::get(
    'search-jobs',
    [Controllers\JobController::class, 'searchJobs']
)->name('search-jobs');
Route::get(
    'filter-jobs',
    [Controllers\JobController::class, 'filterJobs']
)->name('filter-jobs');
Route::match(
    ['get', 'post'],
    '/job-detail',
    [Controllers\JobController::class, 'detail']
)->name('job.detail');
Route::get(
    'new-job',
    [Controllers\JobController::class, 'newJob']
)->name('job.new');
Route::post(
    'save-job',
    [Controllers\JobController::class, 'saveJob']
)->name('job.save');
Route::match(
    ['get', 'post'],
    '/apply-now',
    [Controllers\JobController::class, 'applyNow']
)->name('job.apply');
Route::match(
    ['get', 'post'],
    '/applicants',
    [Controllers\JobController::class, 'getApplicants']
)->name('job.applicants');

// Customer Routes
Route::match(
    ['get', 'post'],
    '/login',
    [Controllers\CustomerController::class, 'login']
)->name('customer.login');
Route::match(
    ['get', 'post'],
    '/register',
    [Controllers\CustomerController::class, 'register']
)->name('customer.register');
Route::get(
    '/logout',
    [Controllers\CustomerController::class, 'logout']
)->name('customer.logout');
Route::match(
    ['get', 'post'],
    '/profile',
    [Controllers\CustomerController::class, 'profile']
)->name('customer.profile');
Route::get(
    '/{id}/download',
    [Controllers\CustomerController::class, 'downloadCV']
)->name('download.cv');


// Company Routes
Route::match(
    ['get', 'post'],
    '/login-company',
    [Controllers\CompanyController::class, 'login']
)->name('company.login');
Route::match(
    ['get', 'post'],
    '/register-company',
    [Controllers\CompanyController::class, 'register']
)->name('company.register');
Route::get(
    '/logout-company',
    [Controllers\CompanyController::class, 'logout']
)->name('company.logout');
Route::match(
    ['get', 'post'],
    '/profile-company',
    [Controllers\CompanyController::class, 'profile']
)->name('company.profile');
Route::get(
    '/companies',
    [Controllers\CompanyController::class, 'list']
)->name('company.all');
Route::match(
    ['get', 'post'],
    '/follow',
    [Controllers\CompanyController::class, 'follow']
)->name('company.follow');
Route::match(
    ['get', 'post'],
    '/unfollow',
    [Controllers\CompanyController::class, 'unfollow']
)->name('company.unfollow');

// Notification Route
Route::get(
    'notifications',
    [Controllers\NotificationController::class, 'getUserNotifications']
)->name('notifications');
