<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    public function create(Request $request)
    {
        $email=Input::get('newsletter');
        News::create(['email'=>$email]);
        return view('news.confirm');
    }
}
