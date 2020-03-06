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
        // $this->middleware('auth');
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

    public function applicationByCat(Request $request, $id)
    {

        $applications = Application::with('viewcategory')->where('category_id',$id);
        $keyword = $request->keyword;
        if($keyword!=''){
            $applications = $applications->where('name','like','%'.$keyword.'%');
        }
        $applications = $applications->get();


        return view('application',compact('applications'));
    }
}
