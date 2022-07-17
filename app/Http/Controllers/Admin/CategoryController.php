<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'       => 'required',
            'slug'       => 'required',
            'description'  => 'required',
            'image'        => 'required|file|image|max:5000',
        ];

        $this->validate($request, $rules);

        $category = new Category();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext= $file->getClientOriginalName();
            $filename = time().'_'.$ext;

            $request->file('image')->move(public_path(). '/assets/uploads/category/' ,$filename);

            $img = Image::make(public_path().'/assets/uploads/category/' . $filename);
            $img->resize(300,null,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save();
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/categories')->with('message',"Category Added Succesfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
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
        $rules = [
            'name'       => 'required',
            'slug'       => 'required',
            'description'  => 'required',
        ];

        $this->validate($request, $rules);

        $category = Category::find($id);


        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext= $file->getClientOriginalName();
            $filename = time().'_'.$ext;
            $file->move('assets/uploads/category',$filename);

            $img = Image::make(public_path().'/assets/uploads/category/' . $filename);
            $img->resize(300,null,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save();
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->update();

        return redirect('/categories')->with('message',"Category Updated Succesfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $path = 'assets/uploads/category/'.$category->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $category->delete();

        return redirect('/categories')->with('message',"Category Deleted Succesfully!");
    }
}
