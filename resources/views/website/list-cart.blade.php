@extends('website.index')
@section('title', 'Giỏ hàng')
@section('show', 'show-on-click')

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Trang chủ</a></li>
                <li class="active">Danh sách đơn hàng</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <form id="checkout-form" class="clearfix" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">Danh sách đơn hàng của tôi</h3>
                            </div>
                            <table class="shopping-cart-table table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Trạng thái</th>
                                    <th>Giao hàng dự kiến</th>
                                    <th>Ngày tạo</th>
                                    <th class="text-center">Chi tiết</th>

                                </tr>
                                </thead>
                                <tbody id="tbody-wallets">
                                <?php  $stt = 0 ;?>
                                @foreach($listCart as $val)
                                    <tr class="row_{{ $val->id }} select" >
                                        <td> {{ $stt = $stt +1 }}</td>
                                        <td> {{ $val->name }} </td>
                                        <td> {{ $val -> email }}</td>
                                        <td> {{ $val->transport == 1 ? number_format(intval($val->amount) + 30000) :  number_format($val->amount) }} đ</td>
                                        <td>
                                            @if($val->payment == 1)
                                                Sau khi nhận hàng
                                            @elseif($val->payment == 2)
                                                Thanh toán bằng thẻ ngân hàng
                                            @endif
                                        </td>

                                        <td>
                                            @if($val->status == 1)
                                                Đang xử lý
                                            @elseif($val->status == 2)
                                                Đang giao hàng
                                            @elseif($val->status == 3)
                                                Hoàn thành
                                            @elseif($val->status == 4)
                                                Chờ xác nhận
                                            @elseif($val->status == 5)
                                                Đã hủy
                                            @else
                                                Khởi tạo
                                            @endif
                                        </td>
                                        <td>{{$val->delivery_date}}</td>
                                        <td>
                                            <?php echo date_format($val->created_at, "Y/m/d") ?>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{url('admin/transactions/orders', $val->id)}}"  title="Chi tiết đơn hàng" class="delete-categorys"><i  class="fa fa-fw fa-forward"></i></a>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection