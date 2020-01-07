<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use Carbon\Carbon;
use App\Banner;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        $banners = Banner::All();
        // dd($banners);
        return view('test' , compact('banners'));
    }

    public function chart()
    {
        $subs_per_month = [];

        $current_month = Carbon::now()->month + 1;

        for ($i = 1  ; $i < $current_month ; $i++) {
            $results = Subscription::whereMonth('created_at' , '=' , $i)->whereYear('created_at' , '=' , Carbon::now()->year)->get();
            array_push($subs_per_month, count($results));
        }
        // var results = {!! json_encode($results) !!}
        return view('chart', compact('subs_per_month'));
    }

    public function multipleUpload(Request $request)
    {
        $files = request()->file('file');

        foreach ($files as $key => $value) {
            // dd($value);
            $ext = $value->getClientOriginalExtension();
            $path = public_path().'/uploads/general/';
            $just_name = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME);
            $image_name = str_slug($just_name);
            $value->move($path , $image_name.'.'.$ext);

            // $img_path = '/uploads/general/'.$image_name;
            // $actual_user->image = $img_path;
        }

        return response()->json(true);
    }

    public function listAllFiles()
    {
        $directory = public_path().'/uploads/general/';
        $files = \File::allFiles($directory);

        $images = [];

        foreach ($files as $key => $value) {
            array_push($images , pathinfo($value)['basename']);
        }

        return view('album' , compact('images'));
    }

    public function probarXSS(Request $request)
    {
        $input = $request->all();
        array_walk_recursive($input, function(&$input) {
            $input = strip_tags($input);
        });
        dd($input);
        $request->merge($input);
    }
}
