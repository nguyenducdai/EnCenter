<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
	public function __construct() {
    	$this->middleware('admin',['except' => 'getLogout']);
    }

 
   public function Home(){
  		return View('Admin.Home.Index');
   }

   public function getLogout() {
    	Auth::guard('admin')->logout();
    	return redirect('cp/login');
	}
}
