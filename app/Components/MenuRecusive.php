<?php
namespace App\Components;
use App\Menu;

class MenuRecusive
{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }
    public function MenuRecusiveAdd($parentId = 0,$subMark = '')
    {
        $data = Menu::where('parent_id',$parentId)->get();
        foreach ($data as $dataItem)
        {
            $this->html .='<option value="'. $dataItem->id .'"> '. $subMark. $dataItem->name .'</option>';
            $this->MenuRecusiveAdd($dataItem->id, $subMark .'--');
        }
        return $this->html;
    }
    public function MenuRecusiveEdit($menuParentIdEdit,$parentId = 0,$subMark = '')
    {
        $data = Menu::where('parent_id',$parentId)->get();
        foreach ($data as $dataItem)
        {
            if($dataItem->id == $menuParentIdEdit)
            {
                $this->html .='<option selected value="'. $dataItem->id .'"> '. $subMark. $dataItem->name .'</option>';
            }else {
                $this->html .= '<option value="' . $dataItem->id . '"> ' . $subMark . $dataItem->name . '</option>';
            }
            $this->MenuRecusiveEdit($menuParentIdEdit,$dataItem->id, $subMark .'--');
        }
        return $this->html;
    }
}
