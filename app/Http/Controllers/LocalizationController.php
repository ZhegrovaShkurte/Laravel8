<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function localization($locale)
    {
        if (in_array($locale, config('app.locales'))) {
            App::setLocale($locale);
        }
    
        return redirect()->back();
    }
}
