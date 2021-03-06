<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Application;
use Validator;
use Log;

class ApplicationApiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $a = $request->all();
        // $app = new Application();

         $applications = Application::where('category_id',$request->id)->orderBy('id', 'desc')->get();
        // dd($loans);
        return $this->sendResponse($applications->toArray(), 'Application retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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

    public function downloadFile($id)
    {

        $app = Application::findOrFail($id);
            
        $myFile = public_path()."/uploads/application/".$app->file;
        $headers = ['Content-Type: application/*'];
        $newName = $app->name.'.apk';

        response()->download($myFile, $newName, $headers);

        return response()->json(['message'=>"Download Successufl."], 200);
    }
}