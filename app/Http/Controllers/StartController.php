<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    //
    public function index() {
        $url_data = [
            array(
                'title' => 'DEV1',
                'url'   => 'https://dev1.com'
            ),
            array(
                'title' => 'YouTube',
                'url' => 'https://youtube.com'
            )
        ];

//        dd($url_data);
//        dd(json_encode($url_data));

        return view('start', compact('url_data'));
    }

    public function getJson() {
        return [
            array(
                'title' => 'Google',
                'url'   => 'https://google.com'
            ),
            array(
                'title' => 'YouTube',
                'url' => 'https://youtube.com'
            )
        ];
    }
}
