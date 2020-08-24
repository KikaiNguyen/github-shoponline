<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\CategoryRecusive;
use Illuminate\Support\Str;
use App\Traits;

class AdminCategoryController extends Controller
{
    use Traits\DeleteModelTrait;
    private $category;
    private $categoryRecusive;

    public function __construct(Category $category, CategoryRecusive $categoryRecusive)
    {
        $this->category = $category;
        $this->categoryRecusive = $categoryRecusive;
    }
    public function index()
    {
        $categories = $this->category->latest()->paginate(7);
        return view('admin.category.index',compact('categories'));
    }
    public function create()
    {
        $optionSelect = $this->categoryRecusive->CategoryRecusiveAdd();
        return view('admin.category.add',compact('optionSelect'));
    }
    public function store(Request $request)
    {
        $this->category->create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name,'-')
        ]);
        return redirect()->route('categories.index');
    }
    public function edit($id,Request $request)
    {
        $catFollowIdEdit = $this->category->find($id);
        $optionSelect = $this->categoryRecusive->CategoryRecusiveEdit($catFollowIdEdit->parent_id);
        return view('admin.category.edit',compact('optionSelect','catFollowIdEdit'));
    }
    public function update($id,Request $request)
    {
        $this->category->find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name,'-')
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->category);
    }
}
