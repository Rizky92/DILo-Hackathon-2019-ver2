<?php

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('adminUsers', 'admin_usersController');

Route::resource('adminResetPasswords', 'admin_reset_passwordsController');

Route::resource('tourismDestCategories', 'tourism_dest_categoriesController');

Route::resource('tourismEventCategories', 'tourism_event_categoriesController');

Route::resource('tourismServProdCategories', 'tourism_serv_prod_categoriesController');

Route::resource('tourismDestinations', 'tourism_destinationsController');



Route::resource('tourismEmployees', 'tourism_employeesController');

Route::resource('tourismReports', 'tourism_reportsController');





Route::resource('tourismEvents', 'tourism_eventsController');



Route::resource('tourismEventCommittees', 'tourism_event_committeesController');

Route::resource('tourismServProds', 'tourism_serv_prodsController');



Route::resource('tourismEventRundowns', 'tourism_event_rundownsController');

Route::resource('clientUsers', 'client_usersController');

Route::resource('clientProfiles', 'client_profilesController');



Route::resource('clientBookmarks', 'client_bookmarksController');





Route::resource('clientReviews', 'client_reviewsController');





Route::resource('rewards', 'rewardsController');

Route::resource('missions', 'missionsController');

Route::resource('achievements', 'achievementsController');

Route::resource('investorProfiles', 'investor_profilesController');

Route::resource('clientScores', 'client_scoresController');

Route::resource('clientTransactions', 'client_transactionsController');





Route::resource('clientHistories', 'client_historiesController');