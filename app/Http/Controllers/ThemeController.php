<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    //
    public function index(){
        $themes = DB::table('themes')->orderBy('id', 'DESC')->get();
        return view('themes', compact('themes'));
    }

    public function addTheme(Request $request){
        $theme = new Theme();
        $theme->name = 'STATIC theme1';
        $theme->body = 'STATIC body1';

        return response()->json($theme);
    }

}
