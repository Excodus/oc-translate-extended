<?php
/**
 * Created by PhpStorm.
 * User: r
 * Date: 13.04.16
 * Time: 16:12
 */

use Excodus\TranslateExtended\Models\Settings;
use Excodus\TranslateExtended\Classes\ExtendedLocaleMiddleware;
use RainLab\Translate\Classes\Translator;

App::before(function($request) {

    if (App::runningInBackend()) {
        return;
    }

    $translator = Translator::instance();
    if (!$translator->isConfigured())
        return;

    $locale = $translator->loadLocaleFromRequest() ? $translator->getLocale() : null;
    
    if(Settings::get('route_prefixing', true)) {

        if($locale){
            Route::group(['prefix' => $locale, 'middleware' => 'web'], function() {
                Route::any('{slug?}', 'Cms\Classes\CmsController@run')->where('slug', '(.*)?');
            });

            Route::any($locale, 'Cms\Classes\CmsController@run')->middleware('web');

            Event::listen('cms.route', function() use ($locale) {
                Route::group(['prefix' => $locale, 'middleware' => 'web'], function() {
                    Route::any('{slug?}', 'Cms\Classes\CmsController@run')->where('slug', '(.*)?');
                });
            });
        }

        if(Settings::get('homepage_redirect', true)) {
            Route::get('/', function() use($translator) {
                return redirect($translator->getLocale());
            })->middleware(['web', ExtendedLocaleMiddleware::class]);
        }

        if (Settings::get('force_prefix', true)) {
            Route::get('/{any}', function ($any) use ($translator, $request) {
                $redirect = $translator->getDefaultLocale() . '/' . $request->path();
                if ($request->query()) {
                    $redirect .= '?' . http_build_query($request->query());
                }
                return redirect($redirect);
            })->where('any', '.*');
        }
        
    }
});

