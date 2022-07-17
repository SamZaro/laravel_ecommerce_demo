<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Models\Image;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\ImageIntervention;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('admin.products.create', compact('category'));
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
            'cate_id'           => 'required',
            'name'              => 'required',
            'small_description' => 'required',
            'description'       => 'required',
            'selling_price'     => 'required',
        ];

        $this->validate($request, $rules);

        $user = auth()->user();

        $product = new Product();
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending')  == TRUE ? '1':'0';
        $product->user_id = $user->id;
        $product->save();

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request['product_id']=$product->id;
                $request['image']=$imageName;

                //$file is new image

                $file->move(\public_path("assets/uploads/products/carousel/"),$imageName);
                Image::create($request->all());
            }
        }


        return redirect('/products')->with('message',"Product Added Succesfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.products.show', compact('product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();

        return view('admin.products.edit', compact('product', 'category'));
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
        $product = Product::find($id);
        $user = auth()->user();

        $rules = [
            'cate_id'           => 'required',
            'name'              => 'required',
            'small_description' => 'required',
            'description'       => 'required',
            'selling_price'     => 'required',
        ];

        $this->validate($request, $rules);

        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending')  == TRUE ? '1':'0';
        $product->user_id = $user->id;
        $product->update();

        if($request->hasFile("images")){
            // Delete any existing image files and database entries.
           $existingimages = Image::where('product_id', $product->id)->get();
           if($existingimages->count() > 0)
               foreach($existingimages as $existingimage) {
                $path = 'assets/uploads/products/carousel/'.$existingimage->image;
                if(File::exists($path))
                {
                    File::delete($path);
                }
                $existingimage->delete();
            }

            // Add new Images
            if($request->hasFile("images")){
                $files=$request->file("images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['product_id']=$product->id;
                    $request['image']=$imageName;

                    //file is new image

                    $file->move(\public_path("assets/uploads/products/carousel/"),$imageName);

                    Image::create($request->all());
                }
            }
        }
        return redirect('/products')->with('message',"Product Updated Succesfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        // Delete any existing image files and database entries.
        $existingimages = Image::where('product_id', $product->id)->get();
        if($existingimages->count() > 0)
            foreach($existingimages as $existingimage) {
            $path = 'assets/uploads/products/carousel/'.$existingimage->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $existingimage->delete();
        }
        $product->delete();

        return redirect()->back()->with('message','Product Deleted Succesfully!');
    }
}
