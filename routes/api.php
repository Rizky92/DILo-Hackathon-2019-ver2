<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('client_profiles/send_api/', 'client_profilesAPIController@post_api');

Route::resource('admin_users', 'admin_usersAPIController');

Route::resource('admin_reset_passwords', 'admin_reset_passwordsAPIController');

Route::resource('tourism_dest_categories', 'tourism_dest_categoriesAPIController');

Route::resource('tourism_event_categories', 'tourism_event_categoriesAPIController');

Route::resource('tourism_serv_prod_categories', 'tourism_serv_prod_categoriesAPIController');

Route::resource('tourism_destinations', 'tourism_destinationsAPIController');



Route::resource('tourism_employees', 'tourism_employeesAPIController');

Route::resource('tourism_reports', 'tourism_reportsAPIController');





Route::resource('tourism_events', 'tourism_eventsAPIController');



Route::resource('tourism_event_committees', 'tourism_event_committeesAPIController');

Route::resource('tourism_serv_prods', 'tourism_serv_prodsAPIController');



Route::resource('tourism_event_rundowns', 'tourism_event_rundownsAPIController');

Route::resource('client_users', 'client_usersAPIController');

Route::resource('client_profiles', 'client_profilesAPIController');



Route::resource('client_bookmarks', 'client_bookmarksAPIController');





Route::resource('client_reviews', 'client_reviewsAPIController');





Route::resource('rewards', 'rewardsAPIController');

Route::resource('missions', 'missionsAPIController');

Route::resource('achievements', 'achievementsAPIController');

Route::resource('investor_profiles', 'investor_profilesAPIController');

Route::resource('client_scores', 'client_scoresAPIController');

Route::resource('client_transactions', 'client_transactionsAPIController');





Route::resource('client_histories', 'client_historiesAPIController');