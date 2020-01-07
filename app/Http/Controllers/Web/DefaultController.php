<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Home, Banner};

class DefaultController extends Controller
{
   	public function Home()
    {
        $data['home'] = Home::first();
        $data['banners'] = Banner::orderBy('orden', 'ASC')->where('visible', 1)->get();
        return view("web.default.home", compact('data'));
    }

    public function gracias()
    {
        return view("web.default.gracias");
    }

}