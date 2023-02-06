<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CategoryProductRequest;
class CategoryProductController extends Controller
{

    //
    // Danh sách danh mục
    public function index() {
        $dataCatePro = CategoryProduct::select()->orderBy('id','DESC')->paginate(15);
        $dataParent = CategoryProduct::where('parent_id',CategoryProduct::CATEGORY_PARENT)->get();
        $tabCategory = 'active';
    	return view('admin.category.index', compact('dataCatePro', 'dataParent', 'tabCategory'));
    }

    // giao diện thêm danh mục
    public function getAdd() {
        // lấy ra danh mục cha có id =1
    	$parent = CategoryProduct::where('parent_id',CategoryProduct::CATEGORY_PARENT)->get();
        $tabCategory = 'active';
    	return view('admin.category.add', compact('parent', 'tabCategory'));
    }

    // Thêm danh mục
    public function postAdd(CategoryProductRequest $request) {

        try {
            $categoryProduct            =  new CategoryProduct;
            $categoryProduct->name      = $request->name;
            $categoryProduct->parent_id = !empty($request->parent_id) ? $request->parent_id : CategoryProduct::CATEGORY_PARENT;
            $categoryProduct->orders    = $request->orders;
            $categoryProduct->status    = $request->status;
            $categoryProduct->save();
            Session::forget('dataCate');
            return  redirect('admin/category/getAdd')->with('success','Thêm thành công danh mục sản phẩm');
        } catch(Exception $e) {

            return  redirect('admin/category/add')->with('error','Lỗi không thể thêm danh mục sản phẩm');
        }
    }

    // giao diện chỉnh sửa danh mục
    public function getEdit($id){
        $categoryProduct = CategoryProduct::where('id',$id)->get()->toArray();
        $tabCategory = 'active';
        if(empty($categoryProduct)) {
            return redirect('admin/category/list')->with('error','Danh mục sản phẩm không tồn tại');
        }
        $parent = CategoryProduct::where('parent_id',CategoryProduct::CATEGORY_PARENT)->get();
        return view('admin.category.edit',compact('parent','categoryProduct', 'tabCategory'));
    }

    // chỉnh sửa danh mục
    public function postEdit(CategoryProductRequest $request, $id) {
        // kiểm tra danh mục có tồn tại
        $categoryProduct = CategoryProduct::where('id',$id)->get()->toArray();
        // nếu danh mục không tồn tại 
        if(empty($categoryProduct)) {
            return redirect('admin/category/getEdit',$id)->with('error','Không thể chỉnh sửa danh mục sản phẩm');
        }

        try {
            $categoryProduct = CategoryProduct::find($id);
            $categoryProduct->name      = $request->name;
            $categoryProduct->parent_id = !empty($request->parent_id) ? $request->parent_id : CategoryProduct::CATEGORY_PARENT;
            $categoryProduct->orders    = $request->orders;
            $categoryProduct->status    = $request->status;
            $categoryProduct->save();
            Session::forget('dataCate');
            return  redirect('admin/category/list')->with('success','Chỉnh sửa thành công danh mục sản phẩm');
        } catch(Exception $e) {
            return  redirect('admin/category/list')->with('error','Lỗi không thể chỉnh sửa danh mục sản phẩm');
        }
    }

    // xóa danh mục
    public function getDelete($id) {

        $categoryProduct = CategoryProduct::where('id',$id)->get()->toArray();
        // nếu danh mục không tồn tại 
        if(empty($categoryProduct)) {
            return redirect('admin/category/list')->with('error','Không thể xóa danh mục sản phẩm');
        }

        $dataProduct = Products::where('category_id',$id)->get()->toArray();
        
        if(!empty($dataProduct)) {
            return redirect('admin/category/list')->with('error','Bạn cần xóa hết sản phẩm thuộc danh mục trước.');
        }

       try {
            $categoryProduct = CategoryProduct::find($id);

            $categoryProduct->delete();
            Session::forget('dataCate');
            return  redirect('admin/category/list')->with('success','Xóa thành công danh mục sản phẩm');
       } catch (Exception $e) {

            return  redirect('admin/category/list')->with('error','Lỗi không thể xóa danh mục sản phẩm');
       }
    }

    public function deleteMultipleCategory(Request $request) {
        
        foreach($request->ids as $id) {
           
            $categoryProduct = CategoryProduct::where('id', $id)->get()->toArray();
           
            // nếu danh mục không tồn tại
            if(empty($categoryProduct)) {
                return redirect('admin/category/list')->with('error','Không thể xóa danh mục sản phẩm');
            }

            // $dataProduct = Products::where('category_id',$id)->get()->toArray();

            // if(!empty($dataProduct)) {
            //     return redirect('admin/category/list')->with('error','Bạn cần xóa hết sản phẩm thuộc danh mục trước.');
            // }

            try {
                $categoryProduct = CategoryProduct::find($id);
                $flg = $categoryProduct->delete();
            } catch (Exception $e) {
                return  redirect('admin/category/list')->with('error','Lỗi không thể xóa danh mục sản phẩm');
            }

        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }

}
