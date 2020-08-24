<?php
namespace App\Components;
use App\Category;

class CategoryRecusive
{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }
    public function CategoryRecusiveAdd($parentId = 0,$subMark ='')
    {
        $data = Category::where('parent_id',$parentId)->get();
        foreach ($data as $dataItem){
            $this->html .= '<option value="'. $dataItem->id .'"> '. $subMark. $dataItem->name .'</option>';
            $this->CategoryRecusiveAdd($dataItem->id,$subMark . '--');
        }
        return $this->html;
    }
    public function CategoryRecusiveEdit($catParentIdEdit,$parentId = 0,$subMark =''){
        $data = Category::where('parent_id',$parentId)->get();
        foreach ($data as $dataItem){
            if($dataItem->id == $catParentIdEdit)
            {
                $this->html .= '<option selected value="'. $dataItem->id .'"> '. $subMark. $dataItem->name .'</option>';
            }else
            {
                $this->html .= '<option value="'. $dataItem->id .'"> '. $subMark. $dataItem->name .'</option>';
            }
            $this->CategoryRecusiveEdit($catParentIdEdit,$dataItem->id,$subMark . '--');
        }
        return $this->html;
    }
}

