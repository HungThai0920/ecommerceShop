<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    @include('admin.template.header')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Đăng Nhập</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>
        @include('admin.template.messages')
        <form action="{{ url('admin/postLogin') }}" method="post">
             
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group has-feedback @if($errors->first('user_name')) has-error @endif">

                <input type="text" name="user_name" class="form-control" placeholder="User name" value="{!!old('user_name')!!}">

                <span class="text-danger"><p></p></span>

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="text-danger"><p>{{ $errors->first('user_name') }}</p></span>
            </div>
            <div class="form-group has-feedback @if($errors->first('password')) has-error @endif">

                <input type="password" name="password" class="form-control" placeholder="Password">

                <span class="text-danger"><p></p></span>

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="text-danger"><p>{{ $errors->first('password') }}</p></span>
            </div>
            <div class="row" style="margin-left: 8px;">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                        <input name="remember" type="checkbox" >
                        </label>
                    </div>
                </div>
                    
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div class="social-auth-links text-center">
          <!-- p>- OR -</p> -->
          <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
            Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
            Google+</a> -->
        </div>
        <!-- /.social-auth-links -->

        <a href="{{ url('admin/getForgotPassword') }}">Quên mật khẩu</a><br>
    </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
@include('admin.template.javaScript')

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
