<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\CategoryNew;
use App\Models\CategoryProduct;
use Session;
class NewsController extends Controller
{
    //
    public function __construct() {

        // show danh mục
        $dataCate = CategoryProduct::where('parent_id',0)->where('status',1)->orderBy('id','DESC')->get()->toArray();

        foreach($dataCate as $key => $cate) {

            $dataCate[$key]['sub'] = CategoryProduct::where('parent_id',$cate['id'])->where('status',1)->orderBy('id','DESC')->get()->toArray();
        }

        Session::put('dataCate', $dataCate);
    }
    
    // show danh mục và tin tức
    public function index() {
    	
    	$categoryNew = CategoryNew::select('*')->orderBy('id','DESC')->get()->toArray();

    	$news = News::orderBy('id','DESC')->get();

    	return view('website.news', compact('categoryNew', 'news'));
    }

    //show tin tức thuộc danh mục
    public function newCategories($slug, $id) {
    	
    	$categoryNew = CategoryNew::select('*')->orderBy('id','DESC')->get()->toArray();
    	$news = News::where('cate_new_id',$id)->orderBy('id','DESC')->get();
    	$nameCate = CategoryNew::select('name')->where('id', $id)->first();
    
    	return view('website.news', compact('categoryNew', 'news', 'nameCate'));
    }

    public function detailNew($slug, $id) {

    	$categoryNew = CategoryNew::select('*')->orderBy('id','DESC')->get()->toArray();
    	$news = News::where('id',$id)->first();
    	$nameCate = CategoryNew::select('name')->where('id', $news->cate_new_id)->first();
    	
    	return view('website.detail-new', compact('categoryNew', 'news', 'nameCate'));
    }
}
