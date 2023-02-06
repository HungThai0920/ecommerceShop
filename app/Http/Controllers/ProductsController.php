<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Products;
use Carbon\Carbon;
use Session;
class ProductsController extends Controller
{
    public function __construct() {

        // show danh mục
        $dataCate = CategoryProduct::where('parent_id',0)->where('status',1)->orderBy('id','ASC')->get()->toArray();

        foreach($dataCate as $key => $cate) {

            $dataCate[$key]['sub'] = CategoryProduct::where('parent_id',$cate['id'])->where('status',1)->orderBy('id','ASC')->get()->toArray();
        }
        Session::put('dataCate', $dataCate);
    }
    // show danh sách sản phẩm
    public function index() {
    	
    	// show sản phẩm
    	$products =  Products::where('status',1)->orderBy('id','DESC')->paginate(12);
		//hiển thị sản phẩm bán chạy
    	$productBuyed = Products::
    					whereDate('created_at', '>=', Carbon::today()->subDays(30))
    					->where('status',1)
    					->orderBy('buyed','DESC')
    					->limit(8)
    					->get();
		
    	return view('website.product', compact('products', 'productBuyed'));
    }

    // show chi tiet san pham
    public function detailProduct($slug ='',$id) {
    	
    	$detailProduct = Products::find($id);
		
        $products = Products::where('category_id', $detailProduct->category_id)->limit(8)->get();

    	if(empty($detailProduct)) {
    		return redirect('');
    	}

        $view = $detailProduct->view + 1;
        $detailProduct->view = $view;
        $detailProduct->save();

    	return view('website.detail-product', compact('detailProduct', 'products'));
    }

    // show sản phẩm thuộc danh mục
    
    public function categoryProducts($slug ='', $id) {

    	$productBuyed = Products::
    					whereDate('created_at', '>=', Carbon::today()->subDays(30))
    					->where('status',1)
    					->orderBy('buyed','DESC')
    					->limit(8)
    					->get();

		$products = Products::where('category_id', $id)->where('status',1)->orderBy('buyed','DESC')->paginate(16);

		$nameCate = CategoryProduct::find($id);
		$nameCategory = $nameCate->name;

		return view('website.product-category', compact('products', 'productBuyed', 'nameCategory'));
    }	
}
