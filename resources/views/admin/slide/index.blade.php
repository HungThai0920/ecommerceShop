@extends('admin.index')
@section('title', 'Slides')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh Sách Slide</h3>
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
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 100px;" >STT</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 307px;">Tên slide</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 307px;">Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 307px;">Link</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Hiển thị</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Trạng thái</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Action</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Created at</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-wallets">
                                <?php  $stt = 0 ;?>
                                @foreach($dataSlide as $val)
                                    <tr class="row_{{ $val->id }} select" >
                                        <td class="text-height"> {{ $stt = $stt +1 }}</td>
                                        <td class="text-height"> {{ $val->name }} </td>
                                        
                                        <td class="text-center">
                                            <img src="{{ asset('uploads/admin/slides')}}/{{$val->image}}" alt="" width="150" height="100">
                                        </td>
                                        <td class="text-center text-height"> {{ $val -> link }}</td>
                                        <td class="text-center text-height"> {{ $val -> sort }}</td>
                                        <td class="text-center text-height">
                                            @if($val->status == 1)
                                                <i class="icon fa fa-check " id="icon-check" style="font-style: 18px">
                                            @elseif($val->status == 2)
                                                <i class="icon fa fa-ban" id="icon-ban"></i>
                                            @endif
                                        </td>
                                        <td class="text-height">
                                            <a href="{{url('admin/slides/getEdit', $val->id)}}"  title="Edit" class=""><i class="fa fa-fw fa-edit"></i></a>
                                            <a href="{{url('admin/slides/getDelete', $val->id)}}"  title="Delete" class="delete-categorys" onClick="confirmDelete('Xác nhận xóa.')"  id="{{ $val->id}}" name="{{ $val->name}}"><i  class="fa fa-fw fa-trash-o"></i></a>
                                        </td>
                                        <td class="text-height">
                                            <?php echo date_format($val->created_at, "Y/m/d") ?>
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                             {!! $dataSlide -> links()!!}
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="box-footer">
           
        </div>
    </div>
@endsection