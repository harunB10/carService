<?php

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'App\Http\Middleware\MechanicMiddleware'], function () {
    Route::get('/loginMehanicar', function () {
        return view('loginMehanicar');
    });

});
Route::get('home', 'UserCarController@getCars');

Route::put('/home/ocjena/{id}', [
    'as'   => 'ocjena',
    'uses' => 'UserCarController@getRating',
]);
Route::patch('/home/{id}', [
    'as'   => 'home',
    'uses' => 'UserCarController@izmjenaPodataka',
]);
Route::get('kalendar', 'CalendarController@index');
Route::get('mehanicar', 'MehanicarController@index');
Route::get('mehanicar/profil/{id}', 'MehanicarController@getMehanicar');

Route::get('hello', 'PomocniController@test2');
Route::post('hello/{id}', 'PomocniController@test');

Route::get('ajax-subcat', 'MehanicarController@harun');
Route::get('ajax-rating', 'MehanicarController@harun2');

Route::post('dodajAuto', 'UserCarController@unesiVozilo2');
Route::get('ajax-auto', 'UserCarController@prikaziVozila');

Route::get('/{id}/zakaziTermin', 'TerminController@zakaziTermin');
Route::post('dodajTermin', 'TerminController@dodajTermin');
Route::get('zahtjeviZaServis', 'TerminController@prikaziZahtjeve');
Route::get('prihvatiZahtjev/{id}', 'TerminController@prihvatiZahtjev');
Route::get('odbijZahtjev/{id}', 'TerminController@odbijZahtjev');
Route::get('pretragaAuto', 'UserCarController@pretragaAuto');

Route::get('unosServisa/{id}', 'UserCarController@unosServisa');
Route::post('unosServisa2', 'UserCarController@unosServisa2');
Route::get('podaciOVozilu/{id}', 'MehanicarController@pregledServisa');
