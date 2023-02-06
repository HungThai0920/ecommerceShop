@extends('admin.index')
@section('title', 'Thêm mới quản trị viên')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Thêm Mới Quản Trị Viên</h1>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @include('admin.template.messages')
            <form role="form" action="{{url('admin/admins/postAdd')}}" method="post" id="form-add">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Tên đăng nhập <span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('user_name')) has-error @endif">
                            <input type="text" name="user_name" class="form-control"  placeholder="" maxlength="255" value="{{ old('user_name')}}">
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
                                <option  @if(old('roles') == 1 ) selected ="selected" @endif value="1">Super Admin</option>
                                <option @if(old('roles') == 2 ) selected ="selected" @endif value="2">Admin</option>
                            </select>
                            <span class="text-danger"><p>{{ $errors->first('roles') }}</p></span>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Mật khẩu <span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('password')) has-error @endif">
                            <input type="password" name="password" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="">
                            
                            <span class="text-danger"><p>{{ $errors->first('password') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Nhập lại mật khẩu <span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('rpassword')) has-error @endif">
                            <input type="password" name="rpassword" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="">
                            
                            <span class="text-danger"><p>{{ $errors->first('rpassword') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Email <span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('email')) has-error @endif">
                            <input type="text" name="email" class="form-control"  placeholder="" maxlength="255" value="{{ old('email')}}">
                            <span class="text-danger"><p>{{ $errors->first('email') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <label for="exampleInputEmail1">Trạng Thái</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('status')) has-error @endif">
                            <select name="status" id="status"   class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option @if(old('status') == 1 ) selected ="selected" @endif value="1" >Hoạt động</option>
                                <option @if(old('status') == 2 ) selected ="selected" @endif value="2" >Khóa</option>
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