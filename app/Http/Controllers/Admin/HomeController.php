<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Suppliers;
use App\Models\Transaction;
use App\Models\Users;

class HomeController extends Controller
{
    //
    public function index() {
    	// lấy ra tổng số sản phẩm
    	$product = Products::select('id')->get();
    	$total_product = count($product);

    	// lấy ra tống số đơn hàng
    	$transactions =  Transaction::select('id', 'amount')->get();
    	$total_transaction = count($transactions);

    	// lấy ra tổng số thành viên
    	$users =  Users::select('id')->get();
    	$total_users = count($users);

    	// lấy ra doanh thu
    	$total_amount = 0;
    	foreach($transactions as $val) {
    		$total_amount = $total_amount + $val->amount;
    	}
    	
    	return view('admin.home.index', compact('total_product', 'total_transaction', 'total_users', 'total_amount'));
    }
}
