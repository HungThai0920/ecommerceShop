<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Transaction;
use Cart;
use Session;
use Validator;

class PayController extends Controller
{
    //
    public function getPay() {
        $content = Cart::content()->toArray();
    	if(empty($content)) {
    		return redirect('')->with('error', 'Bạn không có sản phẩm nào trong giỏ hàng');
    	}

    	$message = '';
    	foreach($content as $item) {
            if($item['options']['notification'] == 1) {
                $message = 'Thông báo cho tôi nếu giao hàng đúng dự kiến ';
            }
        }
    	return view('website.pay', compact('message'));
    }

    public function postPay(Request $request) {
    	$validator  = Validator::make($request->only('name', 'email', 'address', 'phone'), [
			'name'      => ['required', 'max:191'],
			'email'     => ['required', 'email',],
			'address'   => ['required', 'max:191'],
			'phone'     => ['required', 'numeric'],
    	],
        [
			'name.required'      => 'Nhập vào họ và tên',
			'name.max'           => 'Tên không được quá dài',
			'email.required'     => 'Email đăng nhập không được để trống',
			'email.email'        => 'Không đúng định dạng email',
			'address.required'   => 'Địa chỉ không được để trống',
			'address.max'        => 'Địa chỉ không được quá dài',
			'phone.required'     => 'Số điện thoại không được để trống',
			'phone.numeric'      => 'Số điện thoại phải ở định dạng số',
    	]);

    	if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator->errors());
        }
        $content = Cart::content()->toArray();

    	$totalPrice = 0;
        foreach($content as $product) {
            if($product['options']['flagUpdate'] == 1) {

                if (!empty($product['options']['sale'])) {

                    $price_new = ($product['price'] * (100 - $product['options']['sale'])) / 100;
                } else {
                    $price_new = $product['price'];
                }

                $delivery_date = \Carbon\Carbon::now()->addDay(5);
                if (!empty($product['options']['delivery_date'])) {
                    $status = 4;
                    $delivery_date = $product['options']['delivery_date'];
                }
                $totalPrice = $totalPrice + $price_new * $product['qty'];
            }
        }

        $transaction = new Transaction;
        if(isset($request->user_id)) {
        	$transaction->user_id    = $request->user_id;
        }
		$transaction->name           = $request->name;
		$transaction->email          = $request->email;
		$transaction->phone          = $request->phone;
		$transaction->address        = $request->address;
		$transaction->amount         = $totalPrice;
		$transaction->payment        = $request->payment;
		$transaction->transport      = $request->transport;
		$transaction->message        = $request->message;
		$transaction->status         = isset($status) && !empty($status) ? $status : 0;
        $transaction->delivery_date  =  $delivery_date;
		$transaction->remember_token = $request->_token;

		if($transaction->save()) {
			Session::forget('total_price');
			$dataTransaction = Transaction::orderBy('id', 'DESC')->limit(1)->get()->toArray();

			foreach($content as $product) {
                if($product['options']['flagUpdate'] == 1) {
                    $orders = new Orders;
                    $orders->transaction_id = $dataTransaction[0]['id'];
                    $orders->product_id = $product['id'];
                    $orders->qty = $product['qty'];
                    $orders->product_name = $product['name'];
                    $orders->price = $product['price'];
                    if (!empty($product['options']['sale'])) {

                        $price_new = ($product['price'] * (100 - $product['options']['sale'])) / 100;
                    } else {
                        $price_new = $product['price'];
                    }

                    $orders->amount = $price_new * $product['qty'];

                    $orders->save();
                }
			}
			Cart::destroy();
			Session::forget('content');
			return redirect('/')->with('success', 'Chúc mừng bạn đã đặt hàng thành công chúng tôi sẽ liên hệ giao hàng sớm nhất cho bạn. Nếu bạn có nhu cầu hủy đơn hàng, xin hãy liên hệ qua SDT của cửa hàng!');
		}else {
			return redirect('/')->with('error', 'Lỗi không thể đặt hàng. Vui lòng kiểm tra lại thông tin nhận hàng');
		}
    } 
}
