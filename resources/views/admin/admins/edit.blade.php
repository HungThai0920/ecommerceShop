@extends('admin.index')
@section('title', 'Chỉnh sửa quản trị viên')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Chỉnh Sửa Quản Trị Viên</h2>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @include('admin.template.messages')
            <form role="form" action="{{url('admin/admins/postEdit',$admins->id )}}" method="post" id="form-add">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Tên đăng nhập <span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('user_name')) has-error @endif">
                            <input type="text" name="user_name" class="form-control"  placeholder="" maxlength="255" value="{!! old('user_name',isset($admins)?$admins->user_name:NULL) !!}">
                            <span class="text-danger"><p>{{ $errors->first('user_name') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Quyền <span class="obligatory">*</span></label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('roles')) has-error @endif">
                            <select name="roles" id="roles"  class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value=""></option>
                                <option  @if($admins->roles == 1 ) selected ="selected" @endif value="1">Super Admin</option>
                                <option @if($admins->roles == 2 ) selected ="selected" @endif value="2">Admin</option>
                            </select>
                            <span class="text-danger"><p>{{ $errors->first('roles') }}</p></span>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Email <span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('email')) has-error @endif">
                            <input type="text" name="email" class="form-control"  placeholder="" maxlength="255" value="{!! old('email',isset($admins)?$admins->email:NULL) !!}">
                            <span class="text-danger"><p>{{ $errors->first('email') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <label for="exampleInputEmail1">Trạng Thái</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('status')) has-error @endif">
                            <select name="status" id="status"   class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option @if($admins->status == 1 ) selected ="selected" @endif value="1" >Hoạt động</option>
                                <option @if($admins->status == 2 ) selected ="selected" @endif value="2" >Khóa</option>
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