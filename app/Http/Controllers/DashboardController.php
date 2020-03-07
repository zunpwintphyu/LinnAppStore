<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Category;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->keyword);
        $applications =new Application();
        $categories =  Category::all();
        $keyword = $request->keyword;
        if($keyword!=''){
            $applications = $applications->where('name','like','%'.$keyword.'%');
        }

        $category_id = $request->category_id;
        if ($category_id!='') {
            $applications = $applications->where('category_id',$category_id);
        }
        $applications = $applications->orderBy('id', 'DESC');
        $count = $applications->count();
        $applications = $applications->paginate(60);
        // $applications = Application::orderBy('id', 'DESC')->paginate(60);
        return view('dashboard',compact('applications','categories','count'))->with('i', ($request->input('page', 1) - 1) * 60);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request);
    //    $data = Application::all();
    //    // dd($data);
    //    return view('dashboard',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
