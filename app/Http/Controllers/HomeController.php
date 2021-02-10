<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $themes = DB::table('themes')->orderBy('id', 'DESC')->take(10)->get();
//        $themes = Theme::orderBy('id', 'DESC')->get();
        $themes = DB::table('themes')->orderBy('id', 'DESC')->paginate(5);
        return view('home', compact('themes'));
//        return view('home');
    }

    public function addTheme(Request $request)
    {
        $theme = new Theme();
//        $theme->name = 'STATIC 1';//$request->name;
//        $theme->body = 'BODY 1';//$request->body;
        $theme->name = $request->name;
        $theme->body = $request->body;
        $theme->save();

//        return response()->json($theme);
        return back()->with('theme_created', 'Theme has been created successfully');
    }

    public function deleteTheme($id)
    {
        DB::table('theme')->where('id', $id)->delete();
        return back('theme_deleted', 'Theme has benn deleted successfully!');
    }

    public function newBlog()
    {
        return view('home');
    }

    public function deleteBlog($id)
    {
        DB::table('Theme')->find($id)->delete();
    }
}
