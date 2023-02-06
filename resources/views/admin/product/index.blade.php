@extends('admin.index')
@section('title', 'Sản phẩm')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh Sách Sản Phẩm</h3>
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
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 480px;">Tên sản phẩm</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 244px;">Danh mục</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Nhà sản xuất</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 150px;">Giá</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 50px;">Giảm giá</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Số lượng</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 60px;">Đơn vị</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Đã bán</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 50px;">Trạng thái</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-wallets">
                                <?php  $stt = 0 ;?>
                                @foreach($dataProducts as $val)
                                    <tr class="row_{{ $val->id }} select" >
                                        <td class="text-height"><input type="checkbox" name="id[]" value="{{$val->id}}"></td>
                                        <td class="text-height" title="{{$val->name}}">
                                            {{ the_excerpt($val->name, 15) }}
                                            @if(strlen($val->name)  > 15) ... @endif
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ asset('uploads/admin/products')}}/{{$val->image}}" alt="" width="150" height="100">
                                        </td>
                                        <td class="text-height">
                                            @foreach($dataCate as $category)
                                                @if($category->id == $val->category_id)
                                                    <span title="{{$category->name}}">{{ the_excerpt($category->name, 15) }}
                                                        @if(strlen($category->name)  > 15) ... @endif</span>
                                                @endif
                                            @endforeach 
                                        </td>
                                        <td class="text-center text-height">
                                            @foreach($suppliers as $supplier)
                                                @if($supplier->id == $val ->supplier_id)
                                                    {{ $supplier->name}}
                                                @endif
                                            @endforeach 
                                        </td>
                                        <td class="text-center text-height">
                                            <?php echo number_format($val->price).'đ'; ?>
                                        </td>
                                        <td class="text-center text-height">
                                            {{ $val->sale}} @if(!empty($val->sale)) % @endif
                                        </td>
                                        <td class="text-center text-height">
                                            {{ $val->total}}
                                        </td>
                                        <td class="text-center text-height">
                                            @if($val->unit == 'con')
                                                <span>1/con</span>
                                            @elseif($val->unit == 'kg')
                                                <span>1/kg</span>
                                            @endif
                                        </td>
                                        <td class="text-center text-height">
                                            {{ $val->buyed}}
                                        </td>
                                        <td class="text-center text-height">
                                            @if($val->status == 1)
                                                <i class="icon fa fa-check " id="icon-check" style="font-style: 18px">
                                            @elseif($val->status == 2)
                                                <i class="icon fa fa-ban" id="icon-ban"></i>
                                            @endif
                                        </td>
                                        <td class="text-center text-height">
                                            <a href="{{url('admin/products/getEdit', $val->id)}}"  title="Edit" class=""><i class="fa fa-fw fa-edit"></i></a>
                                            <a href="{{url('admin/products/getDelete', $val->id)}}"  title="Delete" class="delete-categorys option-delete-modal"   id="{{ $val->id}}" name="{{ $val->name}}"><i  class="fa fa-fw fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2" style="margin-top: 20px; padding: 0px;">
                            <button type="button" class="btn btn-warning" id="deleteAll" link="{{url('admin/products/deleteMultipleProducts')}}" token="{{ csrf_token() }}"> <i class="fa fa-trash"></i> Xóa</button>
                        </div>
                        <div class="col-sm-10">
                            <div style="float: right;">
                                {!! $dataProducts -> links()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="box-footer">
           
        </div>
    </div>
@endsection