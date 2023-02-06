@extends('admin.index')
@section('title', 'Danh mục sản phẩm')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh Sách Danh Mục Sản Phẩm</h3>
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
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 307px;">Tên Danh Mục</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 244px;">Danh Mục Cha</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Thứ tự hiển thị</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Trạng thái</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Action</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Created at</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-wallets">
                                <?php  $stt = 0 ;?>
                                @foreach($dataCatePro as $val)
                                    <tr class="row_{{ $val->id }} select" >
                                        <td><input type="checkbox" name="id[]" value="{{$val->id}}"></td>
                                        <td> {{ $val->name }} </td>
                                        <td>
                                            @if($val->parent_id != 0)
                                                @foreach($dataParent as $parent)
                                                    @if($val->parent_id == $parent->id)
                                                        {{ $parent->name }}
                                                   @endif
                                                @endforeach
                                            @else
                                                Danh mục cha
                                            @endif
                                        </td>
                                        <td class="text-center"> {{ $val -> orders }}</td>
                                        <td class="text-center">
                                            @if($val->status == 1)
                                                <i class="icon fa fa-check " id="icon-check" style="font-style: 18px">
                                            @elseif($val->status == 2)
                                                <i class="icon fa fa-ban" id="icon-ban"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('admin/category/getEdit', $val->id)}}"  title="Edit" class=""><i class="fa fa-fw fa-edit"></i></a>
                                            <a href="{{url('admin/category/getDelete', $val->id)}}"  title="Delete" class="delete-categorys option-delete-modal" id="{{ $val->id}}" name="{{ $val->name}}"><i  class="fa fa-fw fa-trash-o"></i></a>
                                        </td>
                                        <td>
                                            <?php echo date_format($val->created_at, "Y/m/d") ?>
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
                            <button type="button" class="btn btn-warning" id="deleteAll" link = "{{url('admin/category/deleteMultipleCategory')}}" token="{{ csrf_token() }}"> <i class="fa fa-trash"></i> Xóa</button>
                        </div>
                        <div class="col-sm-10">
                            <div style="float: right;">
                                {!! $dataCatePro -> links()!!}
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