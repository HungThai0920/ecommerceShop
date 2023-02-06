<?php
namespace App\Http\ViewCompoers;
use DB;
use Illuminate\View\View;
use App\Models\CategoryProduct;

class CategoryComposer
{

    public function compose(View $view) {

        // show danh mục
        $dataCate = CategoryProduct::where('parent_id',0)->where('status',1)->orderBy('orders','ASC')->get()->toArray();

        foreach($dataCate as $key => $cate) {

            $dataCate[$key]['sub'] = CategoryProduct::where('parent_id',$cate['id'])->where('status',1)->orderBy('orders','ASC')->get()->toArray();
        }

        $view->with('categorys', $dataCate);
    }

}