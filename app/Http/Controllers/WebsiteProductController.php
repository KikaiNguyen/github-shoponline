<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Product;
use App\Slider;
use App\Tag;
use Illuminate\Http\Request;

class WebsiteProductController extends Controller
{
    public function list(){
        $sliders = Slider::Latest()->get();
        $categories = Category::Where('parent_id',0)->get();
        $products = Product::Latest()->paginate(6);
        $menus = Menu::where('parent_id',0)->get();
        return view('website.product.show_product',compact('sliders','categories','products','menus'));
    }
    public function category($slug,$categoryId){
        $sliders = Slider::Latest()->get();
        $categories = Category::Where('parent_id',0)->get();
        $products = Product::Where('category_id',$categoryId)->paginate(6);
        return view('website.product.show_product',compact('sliders','categories','products'));
    }
    public function detail($slug,$productId){
        $sliders = Slider::Latest()->get();
        $categories = Category::Where('parent_id',0)->get();
        $products = Product::Where('id',$productId)->first();
        return view('website.product.product_details',compact('sliders','categories','products'));
    }
}
