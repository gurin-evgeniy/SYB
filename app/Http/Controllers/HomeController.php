<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends Controller
{
    public function index(){
    	return view('pages.home.index');
    }

    public function hello(){
    	return view('pages.home.hello');
    }

    public function contacts(){
    	return view('pages.home.contacts');
    }
}
