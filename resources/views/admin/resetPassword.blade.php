<!DOCTYPE html>
<html>
<head>
  <title>Đặt lại mật khẩu</title>
  @include('admin.template.header')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Đặt Lại Mật Khẩu</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <form action="{{ url('admin/postResetPassword')}}" method="post">

      <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group has-feedback @if($errors->first('password')) has-error @endif">
            <input type="password" name="password" class="form-control" placeholder="Password" >
            <span class="text-danger"><p></p></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="text-danger"><p>{{ $errors->first('password') }}</p></span>
        </div>
        <div class="form-group has-feedback @if($errors->first('rpassword')) has-error @endif">
            <input type="password" name="rpassword" class="form-control" placeholder="Retype password">
            <span class="text-danger"><p></p></span>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <span class="text-danger"><p>{{ $errors->first('rpassword') }}</p></span>
        </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send</button>
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
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
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
