<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Cart;
use Session;
use App\Models\Transaction;

class ShoppingCartController extends Controller
{
    // thêm sản phẩm vào giỏ hàng
    public function shoppingCart(Request $request, $id)
    {

        $productBuy = Products::find($id);
        $dataMessage = [];
        $qty = 0;
        if (isset($request->qty) && !empty($request->qty)) {
            $qty = $request->qty;
        }

        if ($request->delivery_date == NULL) {
            if ($qty > $productBuy->total) {
                $dataMessage = [
                    'flag' => 1,
                    'message' => 'Số lượng sản phẩm không đủ để đặt hàng. Vui lòng nhập lại số lượng!'
                ];
                return response()->json([
                    'result' => $dataMessage
                ]);
            }
        }

        if ($qty < 1 || $qty == 0 ) {
            $dataMessage = [
                'flag' => 1,
                'message' => 'Không thể đặt hàng do số lượng sản phẩm dưới 1!'
            ];
            return response()->json([
                'result' => $dataMessage
            ]);
        }

        $dataCart = array(
            'id'=>$productBuy->id,
            'name'=>$productBuy->name,
            'qty'=> $qty,
            'price' =>$productBuy->price ,
            'options'=> array(
                'image'=> $productBuy->image ,
                'sale' =>$productBuy->sale,
                'delivery_date' => !empty($request->delivery_date) ? $request->delivery_date : NULL,
                'notification' => !empty($request->notification) ? $request->notification : NULL,
                'flagUpdate' =>  1,
            ),
        );

    	Cart::add($dataCart);

        $content = Cart::content()->toArray();
        Session::put('content', $content);

        $dataMessage = [
            'flag' => 2,
            'message' => 'Đặt hàng thành công!'
        ];

        return response()->json([
            'result' => $dataMessage
        ]);
    }

    // show sản phẩm trong giở hàng
    public function Cart() {

    	$content = Cart::content()->toArray();
    	return view('website.cart', compact('content'));
    }

    // xóa giỏ hàng
    public function deleteCart($id) {

    	Cart::remove($id);

        $content = Cart::content()->toArray();
        Session::put('content', $content);
    	return redirect('/gio-hang.html');
    }

    // update giỏ hàng
    public function updateCart(Request $request) {
        $content = Cart::content()->toArray();
        $content[$request->row_id]['options']['flagUpdate'] = intval($request->flagUpdate);
        $dataUpdate = $content[$request->row_id]['options'];

        if (isset($content[$request->row_id]['id']))
        {
            $id = $content[$request->row_id]['id'];

            $productBuy = Products::find($id);

            if ($request->qty > $productBuy->total) {

                return response()->json([
                    'flag' => 1,
                    'message' => 'Số lượng sản phẩm không đủ để đặt hàng.'
                ]);
            }

        }

        if(isset($request->status)) {
            Cart::update($request->row_id, ['options' => $dataUpdate]);
        } else {
            Cart::update($request->row_id, ['qty' => $request->qty]);
        }

        $content = Cart::content()->toArray();
        Session::put('content', $content);

        foreach($content as $key => $product) {
            if($product['id'] == $request->idProduct) {
                $rowId = $key;
            }
            if($product['options']['flagUpdate'] == 1) {
                if(!empty($product['options']['sale'])) {
                    $price_new = ( $product['price']*(100-$product['options']['sale']))/100;
                    $total_price[] = $price_new * $product['qty'];
                } else {
                    $total_price[] = $product['price']* $product['qty'];
                }
            }
        }

        if(!empty($total_price)) {
            $total =  array_sum($total_price);
            $total = number_format($total).'đ';
        } else {
            $total = '0 đ';
        }

        return response()->json([
            'result' => ['total' => $total, 'rowId' => $request->row_id], 'flag' => 0 , 'message' => ''
        ]);
    }

    public function listOrderCart($id) {

        $listCart = Transaction::where('user_id', $id)->get();
        return view('website.list-cart', compact('listCart'));
    }
}
