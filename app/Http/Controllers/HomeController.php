<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Application;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function frontend(){
        $categories = Category::all();
        return view('frontend',compact('categories'));
    }

    public function applicationByCat($id){
        $applications = Application::where('category_id',$id)->get();
        return view('application',compact('applications'));
    }
}
