<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    public function Index()
    {
    	$model =  News::all()->toArray();
    	return view('Admin.News.index', compact('model'));
    }
}
