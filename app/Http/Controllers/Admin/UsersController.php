<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Transaction;
use App\Models\Orders;

class UsersController extends Controller
{
    // show danh sách users
    public function index() {
    	
    	$dataUsers = Users::select()->orderBy('id','DESC')->paginate(15);
    	$tabUsers = 'active';
    	return view('admin.users.index', compact('dataUsers', 'tabUsers'));
    }


    //  xóa danh sách user
    public function getDelete($id) {

    	// kiểm tra user có tồn tại hay không
    	$dataUsers = Users::find($id);

    	if(!$dataUsers) {
    		return redirect('admin/users/list')->with('error', 'Thôn tin user không tồn tại');
    	}

    	$dataUsers->delete();

    	return redirect('admin/users/list')->with('success', 'Xóa thành công người dùng ');
    }

    public function deleteMultipleUsers(Request $request) {

        foreach($request->ids as $id) {
            Users::find($id)->delete();
        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }
}
