@extends('admin.index')
@section('title', 'Giới thiệu')

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Bài viết giới thiệu</h3>
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

                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20px;" >STT</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">Tiêu đề</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Trạng thái</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Created at</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody-wallets">
                        <?php  $stt = 0 ;?>
                        @foreach($dataAbouts as $val)
                        <tr class="row_{{ $val->id }} select" >
                            <td> {{ $stt = $stt +1 }}</td>
                            <td>
                                {{ the_excerpt($val->title, 50) }}
                                @if(strlen($val->title)  > 50) ... @endif
                            </td>
                            <td class="text-center ">
                                @if($val->status == 1)
                                <i class="icon fa fa-check " id="icon-check" style="font-style: 18px">
                                    @elseif($val->status == 2)
                                    <i class="icon fa fa-ban" id="icon-ban"></i>
                                    @endif
                            </td>
                            <td>
                                <?php echo date_format($val->created_at, "Y/m/d") ?>
                            </td>

                            <td>
                                <a href="{{url('admin/abouts/getEdit', $val->id)}}"  title="Edit" class=""><i class="fa fa-fw fa-edit"></i></a>
                                <a href="{{url('admin/abouts/getDelete', $val->id)}}"  title="Delete" class="delete-categorys" onClick="confirmDelete('Xác nhận xóa.')"  id="{{ $val->id}}" name="{{ $val->name}}"><i  class="fa fa-fw fa-trash-o"></i></a>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">

    </div>
</div>
@endsection