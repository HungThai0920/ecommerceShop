@extends('admin.index')
@section('title', 'Chỉnh sửa danh mục sản phẩm')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Chỉnh Sửa Danh Mục Sản Phẩm</h1>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @include('admin.template.messages')
            <form role="form" action="{{url('admin/category/postEdit', $categoryProduct[0]['id'])}}" method="post" id="form-add">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Tên Danh Mục<span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('name')) has-error @endif">
                            <input type="text" name="name" class="form-control"  placeholder="" maxlength="255" value="{!! old('name',isset($categoryProduct)?$categoryProduct[0]['name']:NULL) !!}">
                            <span class="text-danger"><p>{{ $errors->first('name') }}</p></span>
                        </div>   
                    </div>
                   <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Danh Mục Cha</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('parent_id')) has-error @endif">
                            <select name="parent_id" id="parent_id"  class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="">---- Danh Mục Cha ----</option>
                                @foreach($parent as $val)
                                    <option @if($categoryProduct[0]['parent_id'] == $val->id ) selected ="selected" @endif value="{{ $val['id']}}">{{ $val['name']}} </option>
                                @endforeach
                            </select>
                            <span class="text-danger"><p>{{ $errors->first('parent_id') }}</p></span>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Thứ tự hiển thị<span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('orders')) has-error @endif">
                            <input type="number" min="0"  max="100" name="orders" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="{!! old('orders',isset($categoryProduct)?$categoryProduct[0]['orders']:NULL) !!}">
                            
                            <span class="text-danger"><p>{{ $errors->first('orders') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <label for="exampleInputEmail1">Trạng Thái</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('status')) has-error @endif">
                            <select name="status" id="status"   class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option @if($categoryProduct[0]['status'] == 1 ) selected ="selected" @endif value="1" >Hiển thị</option>
                                <option @if($categoryProduct[0]['status'] == 2 ) selected ="selected" @endif value="2" >Ẩn</option>
                            </select>
                          
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1"></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                             <button id="btn-submit" type="submit" class="btn btn-primary btn-submit">Submit</button>
                        </div>
                    </div>
                </div>
              <!-- /.box-body -->
        	</form>
        </div>
    </div>
@endsection