@extends('admin.index')
@section('title', 'Chỉnh Sửa Nhà Cung Cấp')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Chỉnh Sửa Nhà Cung Cấp</h1>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @include('admin.template.messages')

            <form role="form" action="{{url('admin/suppliers/postEdit', $dataSuppliers->id)}}" method="post" id="form-add">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Tên nhà cung cấp<span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('name')) has-error @endif">
                            <input type="text" name="name" class="form-control"  placeholder="" maxlength="255" value="{!! old('name',isset($dataSuppliers)?$dataSuppliers->name:NULL) !!}">
                            <span class="text-danger"><p>{{ $errors->first('name') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Email</label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('email')) has-error @endif">
                            <input type="text" name="email" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="{!! old('email',isset($dataSuppliers)?$dataSuppliers->email:NULL) !!}">
                            
                            <span class="text-danger"><p>{{ $errors->first('email') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Địa chỉ</label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('address')) has-error @endif">
                            <input type="text" name="address" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="{!! old('address',isset($dataSuppliers)?$dataSuppliers->address:NULL) !!}">
                            
                            <span class="text-danger"><p>{{ $errors->first('address') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Số điện thoại</label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('phone')) has-error @endif">
                            <input type="text" name="phone" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="{!! old('phone',isset($dataSuppliers)?$dataSuppliers->phone:NULL) !!}">
                            
                            <span class="text-danger"><p>{{ $errors->first('phone') }}</p></span>
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