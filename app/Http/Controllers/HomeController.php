<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Slides;
use App\Models\CategoryProduct;
use App\Models\CategoryNew;
use Session;
use Carbon\Carbon;
use App\Models\Abouts;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// lấy ra sản phẩm hot
    	$productsHot =  Products::where('hot',1)->where('status',1)->orderBy('id','DESC')->limit(15)->get()->toArray();
//    	// lấy ra sản phẩm xem nhiều
//    	$productsView =  Products::where('status',1)->orderBy('view','DESC')->limit(15)->get()->toArray();
    	// Show slide
    	$slides = Slides::where('status',1)->orderBy('id','DESC')->limit(5)->get()->toArray();

    	$dataCate = CategoryProduct::select('id','name')->where('parent_id', 0)->where('status',1)->get();
        // hiển thị sản phẩm theo danh mục
    	foreach($dataCate as $key => $cate) {
            $listId = [];
    	    $subCate = CategoryProduct::where('parent_id', $cate->id)->where('status',1)->pluck('id');

    	    if(!empty($subCate)) {
                $listId = [ $cate->id ];
                foreach ($subCate as $val) {
                    array_push($listId, $val);
                }
            } else {
                $listId = [ $cate->id ];
            }

            $product = Products::whereIn('category_id', $listId)->where('show_home',1)->where('status',1)->orderBy('id','DESC')->limit(8)->get()->toArray();
            $cate->subCate = $product;
        }

//    	$productShowHome = Products::where('show_home',1)->where('status',1)->orderBy('id','DESC')->limit(8)->get()->toArray();

        return view('website.content', compact('productsHot','slides', 'dataCate'));
    }

    // giới thiệu
    public function aboutUs() {
        $abouts = Abouts::where('status', 1)->get();
        return view('website.about-us', compact('abouts'));
    }

    //tìm kiếm sản phẩm
    public function search(Request $resquest) {
        $productBuyed = Products::
                        whereDate('created_at', '>=', Carbon::today()->subDays(30))
                        ->where('status',1)
                        ->orderBy('buyed','DESC')
                        ->limit(8)
                        ->get();

        $dataSearch = Products::where('name','like', '%'.$resquest->key.'%')
                                        ->orWhere('price', $resquest->key)
                                        ->paginate(16);

        return view('website.search', compact('productBuyed', 'dataSearch'));
    }

    
}
