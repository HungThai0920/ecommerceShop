@extends('website.index')
@section('title', 'Thanh toán')
@section('show', 'show-on-click')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="{{url('/')}}">Trang chủ</a></li>
			<li class="active">Thanh toán</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
				
				<form id="checkout-form" method="post" action="{{ url('postPay') }}" class="clearfix">
					<div class="col-md-6">
						<div class="billing-details">
							<p>Đăng nhập để mua hàng ? <a href="#" data-toggle="modal" data-target="#login">Đăng nhập</a></p>
							<div class="section-title">
								<h3 class="title">Nhập thông tin mua hàng</h3>
							</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<input class="input" type="hidden" name="user_id" 

								@if(Session::has('users'))
									<?php $users = Session::get('users'); ?>
									value="{{ $users['id'] }}"
								@else 
									value=''
								@endif
								>
							</div>
							<div class="form-group @if($errors->first('name')) has-error @endif">
								<input class="input" type="text" required="required" name="name" 
								@if(Session::has('users'))
									<?php $users = Session::get('users'); ?>
									value="{{ $users['name'] }}"
								@else 
									value="{{ old('name')}}" 
								@endif
								
								placeholder="Họ và tên">
								<span class="text-danger"><p>{{ $errors->first('name') }}</p></span>
							</div>
							<div class="form-group @if($errors->first('email')) has-error @endif">
								<input class="input" type="email" required="required" name="email"  

								@if(Session::has('users'))
									<?php $users = Session::get('users'); ?>
									value="{{ $users['email'] }}"
								@else 
									value="{{ old('email')}}" 
								@endif
								placeholder="Email">
								<span class="text-danger"><p>{{ $errors->first('email') }}</p></span>
							</div>
							<div class="form-group @if($errors->first('address')) has-error @endif">
								<input class="input" type="text" required="required" name="address" placeholder="Địa chỉ liên lạc"  

								@if(Session::has('users'))
									<?php $users = Session::get('users'); ?>
									value="{{ $users['address'] }}"
								@else 
									value="{{ old('address')}}"
								@endif
								 >
								<span class="text-danger"><p>{{ $errors->first('address') }}</p></span>
							</div>
							<div class="form-group @if($errors->first('phone')) has-error @endif">
								<input class="input" type="number"

								@if(Session::has('users'))
									<?php $users = Session::get('users'); ?>
									value="{{ $users['phone'] }}"
								@else 
									value="{{ old('phone')}}" 
								@endif
								 
								name="phone" placeholder="Số điện thoại liên hệ">
								<span class="text-danger"><p>{{ $errors->first('phone') }}</p></span>
							</div>
							<div class="form-group">
								<textarea class="form-control" rows="5" name="message">{!! $message !!}</textarea>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title" style="margin-top: 43px;">
								<h4 class="title">Hình thức vận chuyển</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="transport" id="shipping-1" checked="" value="1">
								<label for="shipping-1">Chuyển phát nhanh - 30.000đ</label>
								<div class="caption">
									<p>Chúng tôi sẽ liên hệ bạn sớm nhất trong thời gian cỏ thể . Đơn hàng của bạn sẽ được vận chuyển trong thời gian 2-3 ngày làm việc.
										</p><p>
								</p></div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="transport" id="shipping-2" value="2">
								<label for="shipping-2">Giao hàng miễn phí</label>
								<div class="caption">
									<p>Chúng tôi sẽ liên hệ bạn sớm nhất trong thời gian cỏ thể . Đơn hàng của bạn sẽ được vận chuyển trong thời gian 1 tuần ngày làm việc.
										</p><p>
								</p></div>
							</div>
						</div>

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Hình thức thanh toán</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payment" id="payments-1" checked="" value="1">
								<label for="payments-1">Sau khi nhận được hàng .</label>
								<div class="caption">
									<p>Nhân viên sẽ liên lạc cho bạn và giao hàng. Khi nhận được hàng bạn tiến hành thanh toán trực tiếp với nhân viên giao hàng.
										</p><p>
								</p></div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payment" id="payments-2" value="2">
								<label for="payments-2">Thanh toán bằng thẻ ngân hàng ( hướng phát triển )</label>
								<div class="caption">
									<p>Hiện tại hình thức này là hướng phát triển sau này.
										</p><p>
								</p></div>
							</div>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="pull-right">
							<button class="primary-btn">Đặt hàng</button>
						</div>
					</div>

				</form>
			<!-- /MAIN -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

@endsection