<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryNew;
use App\Models\News;
use App\Http\Requests\CategoryNewsRequest;


class CategoryNewsController extends Controller
{
	// hiển thị danh sách danh mục
	public function index() {
		$dataCateNews = CategoryNew::select()->orderBy('id','DESC')->paginate(15);
		$tabCategoryNew = 'active';
		return view('admin.category-new.index', compact('dataCateNews', 'tabCategoryNew'));
	}


	// thêm mới danh mục tin tức
	public function getAdd() {
        $tabCategoryNew = 'active';
		return view('admin.category-new.add', compact('tabCategoryNew'));
	}

	// thêm danh mục tin tức
	public function postAdd(CategoryNewsRequest $request) {
		
		try {
			$categoryNews = new CategoryNew;
			$categoryNews->name = $request->name;
			$categoryNews->sort = $request->sort;
			$categoryNews->status = $request->status;
			$categoryNews->save();

			return redirect('admin/category-new/list')->with('success', 'Thêm thành công danh mục tin tức .');

		} catch (Exception $e) {

			return redirect('admin/category-new/add')->with('error', 'Lỗi không thể thêm danh mục tin tức .');
		}
	}

	// get giao diện chỉnh sửa danh mục tin tức
	public function getEdit($id) {

		$dataCateNews = CategoryNew::where('id',$id)->get();
        $tabCategoryNew = 'active';
		if(empty($dataCateNews)) {
            return redirect('admin/category-new/list')->with('error','Danh mục tin tức không tồn tại');
        }

		return view('admin.category-new.edit', compact('dataCateNews', 'tabCategoryNew'));
	}

	// chỉnh sửa
	public function postEdit(CategoryNewsRequest $request, $id) {

		try {
			$dataCateNews = CategoryNew::find($id);
			$dataCateNews->name   = $request->name;
			$dataCateNews->sort   = $request->sort;
			$dataCateNews->status = $request->status;
			$dataCateNews->save();
			return redirect('admin/category-new/list')->with('success', 'Chỉnh sửa thành công danh mục tin tức .');
		} catch (Exception $e) {

			return redirect('admin/category-new/list')->with('error', 'Lỗi không thể chỉnh sửa danh mục tin tức .');
		}

	}


	public function getDelete($id) {

    	$dataCateNews = CategoryNew::find($id);

    	if($dataCateNews) {

    		$dataNews = News::where('cate_new_id',$id)->get()->toArray();
        
	        if(!empty($dataNews)) {
	            return redirect('admin/category-new/list')->with('error','Bạn cần xóa hết tin tức thuộc danh mục trước.');
	        }

	        try {

	        	$dataCateNews->delete();
	        	return  redirect('admin/category-new/list')->with('success','Xóa thành công danh mục tin tức.');
	        } catch(Exception $e) {

	        	return  redirect('admin/category-new/list')->with('error','Lỗi không thể xóa danh mục tin tức.');
	        }

    	} else {

    		return redirect('admin/category-new/list')->with('error','Danh mục không tồn tại.');
    	}


    }

    public function deleteMultipleCategoryNews(Request $request) {

        foreach($request->ids as $id) {
            $dataCateNews = CategoryNew::find($id)->delete();
        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }

}
