<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Orders;
use App\Models\Products;

class TransactionController extends Controller
{
    public function index() {

    	//lấy ra danh sách giao dịch
    	$dataTransaction = Transaction::select()->orderBy('id','DESC')->paginate(15);
    	
    	return view('admin.transaction.index', compact('dataTransaction'));
    }

    // show danh sách đơn hàng
    public function orders($id) {
    	$dataUserTransaction = Transaction::where('id', $id)->first();

    	if(!$dataUserTransaction) {
    		return redirect('admin/transactions/list')->with('error', 'Đơn hàng không tồn tại');
    	}

    	$dataOrders = Orders::where('transaction_id', $id)->get();
    	
    	return view('admin.transaction.orders', compact('dataUserTransaction', 'dataOrders'));
    }

    // Xóa đơn hàng
    public function getDelete($id) {

    	$dataUserTransaction = Transaction::where('id', $id)->first();

    	if(!$dataUserTransaction) {
    		return redirect('admin/transactions/list')->with('error', 'Đơn hàng không tồn tại');
    	}

    	$dataOrders = Orders::where('transaction_id', $id)->get();

    	try {

	    	foreach($dataOrders as $orders) {

	    		$deleteProduct = Orders::find($orders->id);
	    		$deleteProduct->delete();
	    	}

	    	$dataUserTransaction->delete();
	    	return redirect('admin/transactions/list')->with('success', 'Xoá thành công đơn hàng');
    	} catch(Exception $e) {

    		return redirect('admin/transactions/list')->with('error', 'Đơn hàng không tồn tại');
    	}

    }

    // xác nhận đơn hàng
    public function confirmTransaction(Request $request) {

        $dataOrders = Orders::where('transaction_id', $request->id)->get();

        if(!$dataOrders) {

            return redirect('admin/transactions/list')->with('error', 'Đơn hàng không tồn tại');
        }

        foreach($dataOrders as $value) {

            $product = Products::where('id', $value['product_id'])->first();

            $pro = Products::find($product->id);
            $qty = $product->total - $value->qty;
            if($qty < 0) {
                echo "error";
               return ;
            }

            $pro->total = $qty ;

            $pro->save();
        }
        $transaction =  Transaction::find($request->id);
        $transaction->status = 1;
        $transaction->save();
    }
    //xóa nhiều đơn hàng
    public function deleteMultipleTransaction(Request $request) {

        foreach($request->ids as $id) {
            $dataOrders = Orders::where('transaction_id', $id)->get();
            foreach($dataOrders as $orders) {

                $deleteProduct = Orders::find($orders->id);
                $deleteProduct->delete();
            }
            Transaction::find($id)->delete();
        }

        return response()->json([
            'ids' => $request->ids
        ]);
    }

    public function updateTransaction(Request $request, $id)
    {
        $data = [];
        if(isset($request->shiper)) {
            $data['shiper'] = $request->shiper;
        }
        $data['status'] = $request->status;

        try {
            $transaction = Transaction::find($id);

            if($request->status == 3 ) {
                $listOrder = Orders::where('transaction_id', $transaction->id)->get();

                foreach($listOrder as $order) {
                    $product = Products::find($order->product_id);
                    if($product->total > 0) {
                        $total = $product->total - $order->qty;
                    }
                    $buyed = $product->buyed + $order->qty;
                    $dataProduct = [
                        'total' => $total,
                        'buyed' => $buyed
                    ];
                    $product->update($dataProduct);
                }
            }
            $transaction->update($data);
            $code = 1;
        } catch (\Exception $e) {
            $code = 0;
        }
        return response()->json([
            'code' => $code
        ]);
    }
}
