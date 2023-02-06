<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\CategoryProduct;
use App\Models\Suppliers;
use App\Http\Requests\ProductsRequest;
use Validator;
use File;


class ProductsController extends Controller
{
    // list danh sách sản phẩm
    public function index() {
		$dataProducts = Products::select()->orderBy('id','DESC')->paginate(15);
    	$dataCate = CategoryProduct::select()->get();
    	$suppliers = Suppliers::select()->get();
    	$tabProducts = 'active';
    	return  view('admin.product.index', compact('dataProducts', 'dataCate', 'suppliers', 'tabProducts'));
    }

    // thêm mới sản phẩm
    public function getAdd() {
        $tabProducts = 'active';
    	$dataCate = CategoryProduct::select()->where('status', 1)->get()->toArray();
    	$suppliers = Suppliers::select()->get()->toArray();

    	return view('admin.product.add', compact('dataCate', 'suppliers', 'tabProducts'));
    }
	// thực hiện thêm mới
    public function postAdd(ProductsRequest $request) {

    	try {

			$products = new Products;

			$image = $request->file('image');

			if(!empty($image)){
			$nameimg       = $image->getClientOriginalName();
            $timestamp = \Carbon\Carbon::now()->format('Y-m-d-H-i-s');
            $extension = $image->getClientOriginalName();
			// Directory path upload photos  FOLDER_PHOTOS edit model/Products
            $thumbName = $timestamp . '-' . str_slug($nameimg, "-"). $extension;
			$products->image = $thumbName;
			$des           = Products::FOLDER_UPLOAD;
			$image->move($des,$thumbName);
			} else {
			$products->image = '';
			}

			$products->name           =  $request->name;
			$products->category_id    =  $request->category_id;
			$products->supplier_id    =  $request->supplier_id;
			$products->price          =  $request->price;
			$products->sale           =  $request->sale;
			$products->total          =  $request->total;
			$products->show_home      =  $request->show_home;
			$products->hot            =  isset($request->hot) ? $request->hot : 0;
			$products->unit           =  $request->unit;
			$products->description    =  $request->description;
			$products->content        =  $request->contents;
			$products->status         =  $request->status;
            $products->hot            =  isset($request->hot) ? $request->hot : 0;
			$products->save();

			return redirect('admin/products/getAdd')->with('success', 'Thêm thành công sản phẩm');
    	} catch (Exception $e) {

    		return redirect('admin/products/getAdd')->with('error', 'Lỗi không thể thêm sản phẩm');
    	}
    }
	// hiển thị giao diện chỉnh sửa
    public function getEdit($id) {

    	$dataProducts = Products::find($id);
        $tabProducts = 'active';
    	$dataCate = CategoryProduct::select()->get()->toArray();
    	$suppliers = Suppliers::select()->get()->toArray();

    	if($dataProducts) {
    		return view('admin.product.edit', compact('dataProducts', 'dataCate', 'suppliers', 'tabProducts'));
    	} else {
    		return redirect('admin/products/list')->with('error','Sản phẩm không tồn tại');
    	}
    }
	// chỉnh sửa dữ liệu
    public function postEdit(Request $request, $id) {

    	$validator  = Validator::make($request->only('name', 'category_id', 'price', 'sale', 'total', 'image' ), [
            'name'        => ['required', 'max:191'],
            'category_id' => ['required'],
            'price'       => ['required', 'numeric'],
            'sale'        => ['nullable', 'numeric'],
            'total'       => ['required', 'numeric'],
            'image'       => ['nullable', 'image'],
    	],
        [
			'name.required'        => 'Bạn cần nhập vào tên sản phẩm',
			'name.max'             => 'Tên sản phẩm không được vượt quá 191 ký tự',
			'category_id.required' => 'Danh mục sản phẩm không thể để trống',
			'price.required'       => 'Giá sản phẩm không được để trống',
			'price.numeric'        => 'Giá sản phẩm phải ở định dạng số',
			'sale.numeric'         => 'Giảm giá sản phẩm phải ở định dạng số',
			'total.numeric'        => 'Tổng số sản phẩm phải ở định dạng số',
			'total.required'       => 'Tổng số sản phẩm không được để trống',
			'image.image'          => 'Ảnh sản phẩm không thuộc định dạng cho phép',
    	]);

    	if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator->errors());
        }

    	try {

    		$products = Products::find($id);

	    	$image = $request->file('image');

	    	if(!empty($image)){
				$nameimg         = $image->getClientOriginalName();
                $timestamp = \Carbon\Carbon::now()->format('Y-m-d-H-i-s');
                $extension = $image->getClientOriginalName();
                // Directory path upload photos  FOLDER_PHOTOS edit model/Products
                $thumbName = $timestamp . '-' . str_slug($nameimg, "-"). $extension;
                $products->image = $thumbName;
                $des           = Products::FOLDER_UPLOAD;
				$image->move($des,$thumbName);
	        }

	        $products->name           =  $request->name;
			$products->category_id    =  $request->category_id;
			$products->supplier_id    =  $request->supplier_id;
			$products->price          =  $request->price;
			$products->sale           =  $request->sale;
			$products->total          =  $request->total;
			$products->show_home      =  $request->show_home;
            $products->unit           =  $request->unit;
			$products->warranty       =  $request->warranty;
			$products->specifications =  $request->specifications;
			$products->description    =  $request->description;
			$products->content        =  $request->contents;
			$products->status         =  $request->status;
			$products->hot            =  isset($request->hot) ? $request->hot : 0;
			$products->save();

			return redirect('admin/products/list')->with('success', 'Chỉnh sửa thành công sản phẩm');
    	} catch (Exception $e) {

			return redirect('admin/products/list')->with('error', 'Lỗi không thể chỉnh sửa sản phẩm');
    	}
    }
	// xóa 
    public function getDelete($id) {

    	$products = Products::find($id);

    	if(!$products) {
    		return redirect('admin/products/list')->with('error','Sản phẩm không tồn tại');
    	}

    	try {
    		$products ->delete();

	    	File::delete(Products::FOLDER_UPLOAD.'/'.$products->image);

	    	return redirect('admin/products/list')->with('success','Xóa thành công sản phẩm.');
    	} catch (Exception $e) {
    		return redirect('admin/products/list')->with('error','Lỗi không thể xóa sản phẩm');
    	}
    }
	// xóa nhiều sản phẩm
    public function deleteMultipleProducts(Request $request) {

        foreach($request->ids as $id) {
            $products = Products::find($id);
            if(!$products) {
                return redirect('admin/products/list')->with('error','Sản phẩm không tồn tại');
            }

            try {
                $products ->delete();
                File::delete(Products::FOLDER_UPLOAD.'/'.$products->image);

            } catch (Exception $e) {
                return redirect('admin/products/list')->with('error','Lỗi không thể xóa sản phẩm');
            }
        }
        return response()->json([
            'ids' => $request->ids
        ]);

    }
    
}
