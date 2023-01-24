<?php

Route::group(config('translation.route_group_config') + ['namespace' => 'JoeDixon\\Translation\\Http\\Controllers'], function ($router) {
    $router->get(config('translation.ui_url'), 'LanguageController@index')
        ->name('languages.index')->middleware('auth');

    $router->get(config('translation.ui_url').'/create', 'LanguageController@create')
        ->name('languages.create')->middleware('auth');

    $router->post(config('translation.ui_url'), 'LanguageController@store')
        ->name('languages.store')->middleware('auth');

    $router->get(config('translation.ui_url').'/{language}/translations', 'LanguageTranslationController@index')
        ->name('languages.translations.index')->middleware('auth');

    $router->post(config('translation.ui_url').'/{language}', 'LanguageTranslationController@update')
        ->name('languages.translations.update')->middleware('auth');

    $router->get(config('translation.ui_url').'/{language}/translations/create', 'LanguageTranslationController@create')
        ->name('languages.translations.create')->middleware('auth');

    $router->post(config('translation.ui_url').'/{language}/translations', 'LanguageTranslationController@store')
        ->name('languages.translations.store')->middleware('auth');
});
