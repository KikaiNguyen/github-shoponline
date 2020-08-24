<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Components\MenuRecusive;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminMenuController extends Controller
{
    use DeleteModelTrait;
    private $menu;
    private $menuRecusive;
    public function __construct(Menu $menu, MenuRecusive $menuRecusive)
    {
        $this->menu = $menu;
        $this->menuRecusive = $menuRecusive;
    }
    public function index()
    {
        $menus = $this->menu->latest()->paginate(7);
        return view('admin.menus.index',compact('menus'));
    }
    public function create()
    {
        $optionSelect = $this->menuRecusive->MenuRecusiveAdd();
        return view('admin.menus.add',compact('optionSelect'));
    }
    public function store(Request $request)
    {
        $this->menu->create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name,'-')
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id, Request $request)
    {
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->MenuRecusiveEdit($menuFollowIdEdit->parent_id);
        return view('admin.menus.edit',compact('optionSelect','menuFollowIdEdit'));
    }
    public function update($id,Request $request)
    {
        $this->menu->find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name,'-')
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->menu);
    }
}
