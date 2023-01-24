<?php

namespace App\Http\Controllers\Admin;

use App\Theme;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Themes
    public function themes()
    {
        $themes = Theme::where('status', 1)->orderBy('created_at', 'desc')->get();
        $settings = Setting::where('status', 1)->first();

        return view('admin.themes.themes', compact('themes', 'settings'));
    }
}
