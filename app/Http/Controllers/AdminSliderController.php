<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    use StorageImageTrait,DeleteModelTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $sliders = $this->slider->latest()->paginate(7);
        return view ('admin.slider.index',compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(Request $request)
    {
        $dataSliderCreate = ([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        $dataUpload = $this->storageTraitUpload($request,'image_path','slider');
        if (!empty($dataUpload))
        {
            $dataSliderCreate['image_path']=$dataUpload['image_path'];
            $dataSliderCreate['image_name']=$dataUpload['image_name'];
        }
        $this->slider->create($dataSliderCreate);
        return redirect()->route('sliders.index');
    }
    public function edit($id)
    {
        $sliders = $this->slider->find($id);
        return view('admin.slider.edit',compact('sliders'));
    }
    public function update(Request $request, $id)
    {
        $dataSliderUpdate = ([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        $dataUpdateImage = $this->storageTraitUpload($request,'image_path','slider');
        if (!empty($dataUpdateImage))
        {
            $dataSliderUpdate['image_path']=$dataUpdateImage['image_path'];
            $dataSliderUpdate['image_name']=$dataUpdateImage['image_name'];
        }
        $this->slider->find($id)->update($dataSliderUpdate);
        return redirect()->route('sliders.index');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->slider);
    }

}
