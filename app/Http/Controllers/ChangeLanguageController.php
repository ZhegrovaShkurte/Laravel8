<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ChangeLanguageController extends Controller
{
    public function changeLanguage($language)
    {
        App::setLocale($language);
        session()->put('locale', $language);
        return redirect()->back();
    }
}
