@extends('admin.index')
@section('title', 'Nhà cung cấp')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh Sách Nhà Cung Cấp</h3>
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
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 307px;">Tên nhà cung cấp</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 244px;">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Địa chỉ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Số điện thoại</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Created at</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-wallets">
                                <?php  $stt = 0 ;?>
                                @foreach($dataSuppliers as $val)
                                    <tr class="row_{{ $val->id }} select" >
                                        <td><input type="checkbox" name="id[]" value="{{$val->id}}"></td>
                                        <td> {{ $val->name }} </td>
                                        <td>
                                            {{ $val->email}}
                                        </td>
                                        <td>
                                            {{ $val->address}}
                                        </td>
                                        <td class="text-center"> {{ $val -> phone }}</td>
                                        <td> 
                                            <?php echo date_format($val->created_at, "Y/m/d") ?>
                                        </td>

                                        <td>
                                            <a href="{{url('admin/suppliers/getEdit', $val->id)}}"  title="Edit" class=""><i class="fa fa-fw fa-edit"></i></a>
                                            <a href="{{url('admin/suppliers/getDelete', $val->id)}}"  title="Delete" class="delete-categorys option-delete-modal"  id="{{ $val->id}}" name="{{ $val->name}}"><i  class="fa fa-fw fa-trash-o"></i></a>
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
                            <button type="button" class="btn btn-warning" id="deleteAll" link="{{url('admin/suppliers/deleteMultipleSuppliers')}}" token="{{ csrf_token() }}"> <i class="fa fa-trash"></i> Xóa</button>
                        </div>
                        <div class="col-sm-10">
                            <div style="float: right;">
                                {!! $dataSuppliers -> links()!!}
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