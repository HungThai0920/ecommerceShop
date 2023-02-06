@extends('admin.index')
@section('title', 'Danh sách đơn hàng')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách đơn hàng</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @include('admin.template.messages')
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="checkAll" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 100px;" ><input type="checkbox" class="check-all"></th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 307px;">Họ và tên</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 244px;">Phone</th>
                                    {{--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 244px;">Địa chỉ</th>--}}
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 244px;">Tổng tiền</th>
                                    {{--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" title="HÌnh thức thanh toán" style="width: 244px;">Thanh toán</th>--}}
                                    {{--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" title="HÌnh thức thanh toán" style="width: 244px;">Vận chuyển</th>--}}
                                    {{--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" title="HÌnh thức thanh toán" style="width: 244px;">Lưu ý</th>--}}
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Shiper</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Trạng thái</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-wallets">
                                <?php  $stt = 0 ;?>
                                @foreach($dataTransaction as $val)
                                    <tr class="row_{{ $val->id }} select" >
                                        <td><input type="checkbox" name="id[]" value="{{$val->id}}"></td>
                                        <td> {{ $val->name }} </td>
                                        <td class="text-center"> {{ $val -> email }}</td>
                                        <td class="text-center"> {{ $val -> phone }}</td>
                                        {{--<td class="text-center"> {{ $val -> address }}</td>--}}
                                        <td class="text-center"> {{ $val->transport == 1 ? number_format(intval($val->amount) + 30000) :  number_format($val->amount) }} đ</td>
                                        {{--<td class="text-center">--}}
                                            {{--@if($val->payment == 1)--}}
                                               {{--Sau khi nhận hàng--}}
                                            {{--@elseif($val->payment == 2)--}}
                                               {{--Thanh toán bằng thẻ ngân hàng--}}
                                            {{--@endif--}}
                                        {{--</td>--}}

                                        {{--<td class="text-center">--}}
                                            {{--@if($val->transport == 1)--}}
                                               {{--Chuyển phát nhanh--}}
                                            {{--@elseif($val->transport == 2)--}}
                                                {{--Giao hàng miễn phí --}}
                                            {{--@endif--}}
                                        {{--</td>--}}
                                        {{--<td class=""> {{ $val -> message }}</td>--}}
                                        <td>
                                            <select name="shiper" class="form-control shiper" token="{{ csrf_token() }}" url="{{url('admin/transactions/updateTransaction', $val->id)}}">
                                                <option>Người giao hàng</option>
                                                @foreach(getlistShiper() as $key => $shiper )
                                                    <option value="{{$key}}" {{ $key ==  $val->shiper ? "selected = 'selected'" : "" }}>{{$shiper}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select name="status" class="form-control status" {{ $val->status ==  3 ? "disabled" : "" }} token="{{ csrf_token() }}" url="{{url('admin/transactions/updateTransaction', $val->id)}}">
                                                <option>Khởi tạo</option>
                                                @foreach(getListStatus() as $key => $status )
                                                    <option value="{{$key}}" {{ $key ==  $val->status ? "selected = 'selected'" : "" }}>{{$status}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/transactions/getDelete', $val->id)}}"  title="Delete" class="delete-categorys" onClick="confirmDelete('Xác nhận xóa.')"  id="{{ $val->id}}" name="{{ $val->name}}"><i  class="fa fa-fw fa-trash-o"></i></a>
                                            <a href="{{url('admin/transactions/orders', $val->id)}}"  title="Chi tiết đơn hàng" class="delete-categorys"><i  class="fa fa-fw fa-forward"></i></a>
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" style="margin-top: 20px;">
                        <button type="button" class="btn btn-warning" id="deleteAll" link = "{{url('admin/transactions/deleteMultipleTransaction')}}" token="{{ csrf_token() }}"> <i class="fa fa-trash"></i> Xóa</button>
                    </div>
                    <div class="col-sm-10">
                        <div style="float: right;">
                            {!! $dataTransaction -> links()!!}
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="box-footer">
           
        </div>
    </div>
@endsection