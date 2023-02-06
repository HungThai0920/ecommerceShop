<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đơn hàng</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="{{ asset('admin\images\icons\admin_icon.png')}}" type="image/x-icon"/>
  <link rel="stylesheet" href="{{ asset('/admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
 <link rel="stylesheet" href="{{ asset('/admin/dist/css/AdminLTE.css')}}">

</head>
<body>
    <div class="container">
        <div class="wrapper">
            <section class="invoice">
               <!-- title row -->
               <div class="row">
                  <div class="col-xs-12">
                     <h2 class="page-header">
                        <i class="fa fa-globe"></i> 
                        <span style="margin-left: 29%; font-size: 36px; font-weight: bold;">HÓA ĐƠN MUA HÀNG </span>
                        <small class="pull-right">Date: <?php echo  date("Y/m/d"); ?></small>
                     </h2>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- info row -->
               <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                        <strong>Địa chỉ người gửi </strong><br>
                        <address>
                            <strong>Cây cảnh Phúc Thái</strong><br>
                            Quận 12, Thành phố Hồ Chí Minh<br>
                            Phone: 0838293181 <br>
                            Email: caycanhphucthai@gmail.com
                        </address>
                    </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                        <strong>Địa chỉ người nhận </strong>
                        @if($dataUserTransaction)
                        <address>
                            <strong>{{$dataUserTransaction->name}}</strong><br>
                            {{$dataUserTransaction->address}}<br>
                            
                            Phone: {{$dataUserTransaction->phone}}<br>
                            Email: {{$dataUserTransaction->email}}<br>
                            Mã đơn hàng : {{$dataUserTransaction->id}}
                        </address>
                        @endif
                  </div>
                   <div class="col-sm-4 invoice-col">
                       <strong>
                           @if($dataUserTransaction->payment == 1)
                               Thanh toán sau khi nhận hàng
                           @elseif($dataUserTransaction->payment == 2)
                               Thanh toán bằng thẻ ngân hàng
                           @endif
                       </strong><br>
                       <strong>
                           @if($dataUserTransaction->transport == 1)
                               Chuyển phát nhanh
                           @elseif($dataUserTransaction->transport == 2)
                               Giao hàng miễn phí
                           @endif
                       </strong><br>
                       <strong>
                            Ngày giao hàng : {{$dataUserTransaction->delivery_date}}
                       </strong><br>
                       <strong>Ghi chú : </strong>
                       <address>
                           {{$dataUserTransaction->message ? $dataUserTransaction->message : ''}}
                       </address>
                   </div>
               </div>
               <!-- /.row -->
               <!-- Table row -->
               <div class="row">
                  <div class="col-xs-12 table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>STT</th>
                              <th>Tên sản phẩm</th>
                              <th>Số lượng</th>
                              <th>Tổng tiền</th>
                              <th>Ngày đặt</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php $t = 0; ?>
                            @if($dataOrders)
                                @foreach($dataOrders as $key => $orders)
                                    <tr>
                                      <td>{{$key + 1}}</td>
                                      <td>{{ $orders-> product_name }}</td>
                                      <td>{{ $orders-> qty }}</td>
                                      <td>{{ number_format($orders-> amount) }} đ</td>
                                      <td><?php echo date_format($orders->created_at, "Y/m/d") ?></td>
                                   </tr>
                                    
                               @endforeach
                           @endif
                        </tbody>
                     </table>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
               <div class="row">
                  <!-- accepted payments column -->
                  <!-- /.col -->
                  <div class="col-xs-6">
                     <p class="lead">Số tiền phải trả </p>
                     <div class="table-responsive">
                        <table class="table">
                           <tbody>
                              <tr>
                                 <th style="width:50%">Tổng tiền:</th>
                                 <td>{{ $dataUserTransaction->transport == 1 ? number_format(intval($dataUserTransaction->amount) + 30000) : number_format($dataUserTransaction->amount) }} đ</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
               <!-- this row will not appear when printing -->
               <div class="row no-print">
                  <div class="col-xs-12">
                     <a href="invoice-print.html" target="_blank" onClick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                  </div>
               </div>
            </section>
        </div>
    </div>
</body>