<?php

namespace App\Http\Controllers;

use App\Application;
use App\Category;
use Illuminate\Http\Request;
use Validator;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $applications = Application::orderBy('id', 'DESC')->paginate(5);
        return view('admin.application.index', compact('applications', 'categories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(public_path() . '/uploads/application/');
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'file' => 'required',
            'logo' => 'required',
        ];

        $customMessage = [
            'category_id.required' => 'Please Choose Application Category',
            'name.required' => 'Please Fill Application Name',
            'file.required' => 'Please Choose File',
            'logo.required' => 'Please Choose Application Logo',
        ];

         $this->validate($request, $rules, $customMessage);


        $fileup = "";
        if ($file = $request->file('file')) {
            $extension = $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/uploads/application/';
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $fileup = $safeName;
            // $output = array(
            // 'success' => 'Image uploaded successfully'
            // );
            // return response()->json($output);
        }

        $photo = "";
        if ($file = $request->file('logo')) {
            $extension = $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/uploads/application/';
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $photo = $safeName;
        }

        $fileupload = Application::create([
                    'category_id'=> $request->category_id,
                    'name'=>$request->name,
                    'file' =>$fileup,
                    'logo' => $photo
                ]);
        return redirect()->route('application.index')
            ->with('success', 'Application  created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Application::find($id);
        // dd($data);
        $categories = Category::all();

        return view('admin.application.edit', compact('data', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd(public_path() . '/uploads/application/');
        $application = Application::findOrFail($id);

        // dd($application);

        $rules = [
            'category_id' => 'required',
            'name' => 'required',
        ];

        $customMessage = [
            'category_id.required' => 'Please Choose Application Category',
            'name.required' => 'Please Fill Application Name',
        ];

        $this->validate($request, $rules, $customMessage);

        $structure = "uploads/application/";
        $photo = $application->logo;

        if ($request->file('photo')) {

            $file = $request->file('photo');

            if ($file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() == "JPG" || $file->getClientOriginalExtension() == "png" || $file->getClientOriginalExtension() == "PNG" || $file->getClientOriginalExtension() == "gif" || $file->getClientOriginalExtension() == "GIF") {

                $photo = $file->getClientOriginalName();
                $file->move($structure, $photo);
            }
        }

        $fileup = $application->file;
        if ($application->file = $request->file('file')) {
            $extension = $application->file->getClientOriginalExtension();

            $destinationPath = public_path() . '/uploads/application/';
            $safeName = str_random(10) . '.' . $extension;
            $file->file->move($destinationPath, $safeName);
            $fileup = $safeName;
        }

        $arr = [
            'id' => $id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'photo' => $photo,
            'file' => $fileup,
        ];

        // dd($arr);

        $application->fill($arr)->save();

        return redirect()->route('application.index')->with('success', 'Application Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Application::find($request->id)->delete();
        return redirect()->route('application.index')
            ->with('success', 'Application deleted successfully');
        //  return response()->json([
        //     'success' => 'Application deleted successfully!'
        // ]);


    }
}