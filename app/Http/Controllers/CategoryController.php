<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $categories = Category::all();
        // return view('admin.category.index',compact('categories'));
       
        $categories =new Category();

        $search_key = $request->category_name;
        if($search_key!=''){
            $categories = $categories->where('category_name','like','%'.$search_key.'%');
        }
        $categories = $categories->orderBy('id','DESC')->paginate(5);
        return view('admin.category.index',compact('categories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            // 'logo' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        
        $logo = "";
        if ($file = $request->file('logo')) {
            $extension = $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/uploads/category/';
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $logo = $fileName;
        }

      $arr = [
          'logo' => $logo,
          'category_name'=>$request->category_name
      ];

      $category = Category::create($arr);
      return redirect()->route('category.index')
                      ->with('success','Category created successfully');

    //   $input = $request->all();
    //   $category = Category::create($input);
    //   return redirect()->route('category.index')
    //                   ->with('success','Category  created successfully');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $logo = $category->logo;

        if($logo=='' && ($request->file('logo')=='')){
            $this->validate($request, [
                'category_name' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        
        }else{
            $this->validate($request, [
                'category_name' => 'required'
            ]);
        }

        if ($file = $request->file('logo')) {
            $extension = $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/uploads/category/';
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $logo = $fileName;
        }

         $arr = [
              'logo' => $logo,
              'category_name'=>$request->category_name
          ];

        $category->update($arr);

        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}
