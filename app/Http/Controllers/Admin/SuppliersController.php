<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suppliers;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SuppliersRequest;
use App\Models\Products;

class SuppliersController extends Controller
{
    //danh sách nhà cung cấp
    public function index() {
    	$dataSuppliers = Suppliers::select()->orderBy('id','DESC')->paginate(15);
    	$tabSuppliers = 'active';
    	return view('admin.suppliers.index', compact('dataSuppliers', 'tabSuppliers'));
    }

    // giao diện thêm mới nhà cung cấp
    public function getAdd() {
        $tabSuppliers = 'active';
    	return view('admin.suppliers.add', compact('tabSuppliers'));
    }

    // post thêm mới nhà cung cấp lưu vào database
    public function postAdd(SuppliersRequest $request) {

		try {
            $suppliers          = new Suppliers;
            $suppliers->name    = $request->name;
            $suppliers->email   = $request->email;
            $suppliers->address = $request->address;
            $suppliers->phone   = $request->phone;
            $suppliers->save();

            return  redirect('admin/suppliers/getAdd')->with('success','Thêm thành công nhà cung cấp');
        } catch(Exception $e) {
            return  redirect('admin/suppliers/getAdd')->with('error','Lỗi không thể thêm nhà cung cấp');
        }

    }

    //show form chỉnh sửa 
    public function getEdit($id) {

    	$dataSuppliers = Suppliers::find($id);
        $tabSuppliers = 'active';
    	if($dataSuppliers) {

    		return view('admin.suppliers.edit', compact('dataSuppliers', 'tabSuppliers'));
    	} else {

    		return redirect('admin/suppliers/list')->with('error','Nhà cung cấp không tồn tại');
    	}
    }

    // chỉnh sửa nhà cung cấp
    public function postEdit(SuppliersRequest $request, $id) {

		try {
            $suppliers          = Suppliers::find($id);
            $suppliers->name    = $request->name;
            $suppliers->email   = $request->email;
            $suppliers->address = $request->address;
            $suppliers->phone   = $request->phone;
            $suppliers->save();
            return  redirect('admin/suppliers/list')->with('success','Chỉnh sửa thành công nhà cung cấp');
        } catch(Exception $e) {
            return  redirect('admin/suppliers/list')->with('error','Lỗi không thể chỉnh sửa nhà cung cấp');
        }
    }

    public function getDelete($id) {

    	$dataSuppliers = Suppliers::find($id);

    	if($dataSuppliers) {

    		$dataProduct = Products::where('supplier_id',$id)->get()->toArray();
        
	        if(!empty($dataProduct)) {
	            return redirect('admin/suppliers/list')->with('error','Bạn cần xóa hết sản phẩm thuộc nhà cung cấp trước.');
	        }

	        try {

                $dataSuppliers->delete();
                return  redirect('admin/suppliers/list')->with('success','Xóa thành công nhà cung cấp');
            } catch (Exception $e) {

                 return  redirect('admin/suppliers/list')->with('error','Lỗi không thể xóa nhà cung cấp');
            }

    	} else {

    		return redirect('admin/suppliers/list')->with('error','Nhà cung cấp không tồn tại');
    	}
    }

    public function deleteMultipleSuppliers(Request $request) {
        foreach($request->ids as $id) {
            $dataSuppliers = Suppliers::find($id);
            $dataSuppliers->delete();
        }

        return response()->json([
            'ids' => $request->ids
        ]);
    }



}
