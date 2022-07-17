<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();

        return view('frontend.index', compact('featured_products'));

    }

    public function category(){

        $category = Category::all();

        return view('frontend.category', compact('category'));
    }


    public function viewcategory($slug){
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->get();
            return view('frontend.products.index', compact('category', 'products'));
        }
        else{
            return redirect('/')->with('message', "slug does not exist");
        }
    }

    public function productview($cate_slug, $prod_slug)
    {
        $category = Category::all();

        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {
                $products = Product::where('slug', $prod_slug)->first();


                return view('frontend.products.view', compact('products', 'category'));
            }
            else{
                return redirect('/')->with('status', "The link was broken");
            }
        }
        else{
            return redirect('/')->with('status', "No such category found");
        }
    }


}
