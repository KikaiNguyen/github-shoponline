<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Product;
use App\Slider;
use App\Tag;
use Illuminate\Http\Request;

class WebsiteHomeController extends Controller
{
    public function __construct(Request $request)
    {

    }
    public function index(){
        $sliders = Slider::Latest()->get();
        $categories = Category::Where('parent_id',0)->get();
        $products = Product::Latest()->take(6)->get();
        $recommended_items = Product::Latest('view_count', 'desc')->take(6)->get();
        $menus = Menu::where('parent_id',0)->get();
        $tags = Tag::Latest()->get();
        return view('website.home.index',compact('sliders','categories',
            'products','recommended_items','tags','menus'));
    }
}
