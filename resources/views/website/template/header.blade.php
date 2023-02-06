<div class="container">
	<div class="pull-left">
		<!-- Logo -->
		<div class="header-logo">
			<a class="logo" href="{{URL::to('/')}}">
				<img src="./img/logo.png" alt="">
			</a>
		</div>
		<!-- /Logo -->

		<!-- Search -->
		<div class="header-search">
			<form method="get" action="{{ url('search')}}">
				<input class="input search-input" name="key" type="text" placeholder="Nhập từ khóa tìm kiếm">
				<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<!-- /Search -->
	</div>
	<div class="pull-right">
		<ul class="header-btns">
			<!-- Account -->
			<li class="header-account dropdown default-dropdown" style="width: 220px; margin-right: 20px;">
				<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
					<div class="header-btns-icon">
						<i class="fa fa-user-o"></i>
					</div>
					<strong class="text-uppercase">Tài khoản &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></strong>
				</div>
				@if(!Session::has('users'))
					<a href="#" class="text-uppercase" data-toggle="modal" data-target="#login">Đăng nhập</a>/ 
					<a href="#" data-toggle="modal" data-target="#register" class="text-uppercase">Đăng ký</a>
				@else
					<a href="{{ url('logout')}}" class="text-uppercase">Đăng xuất</a>
				@endif
				<ul class="custom-menu" style="font-size: 12px;">
					@if(Session::has('users'))
						<?php $user = Session::get('users'); ?>
						<li><a href="{{url('gio-hang.html')}}" ><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#update-user" class="text-uppercase" ><i class="fa fa-user-o"></i>Cập nhật thông tin</a></li>
						<li><a href="{{url('don-hang-cua-toi', $user['id'])}}" ><i class="fa fa-shopping-cart"></i>Đơn hàng của tôi</a></li>
						<li><a href="#" data-toggle="modal" data-target="#change-pass" class="text-uppercase" ><i class="fa fa-fw fa-exchange"></i>Thay đổi mật khẩu</a></li>
						<li><a href="{{ url('logout')}}" class="text-uppercase"><i class="fa fa-arrow-circle-right"></i>Đăng xuất</a></li>
					@else
						<li data-toggle="modal" data-target="#login" ><a><i class="fa fa-unlock-alt"></i>Đăng nhập</a></li>
						<li data-toggle="modal" data-target="#register" ><a href="#"><i class="fa fa-user-plus"></i>Đăng ký</a></li>
					@endif
				</ul>
			</li>
			<!-- /Account -->

			<!-- Cart -->
			<li class="header-cart dropdown default-dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					<div class="header-btns-icon">
						<i class="fa fa-shopping-cart"></i>
						<span class="qty">
							@if(Session::has('content'))
									<?php $content = Session::get('content') ?>
									<?php
									$qty = 0;
									foreach($content as $product) {
										$qty = $qty + $product['qty'];
									}
									echo $qty;
									?>
								@else
									0
								@endif
						</span>

					</div>
					<strong class="text-uppercase">Giỏ hàng</strong>
					<br>
					<!-- <span>35.20$</span> -->
				</a>
				<div class="custom-menu">
					<div id="shopping-cart">
						<div class="shopping-cart-list">
							@if(!empty($content))
								@foreach($content as $product)
									<div class="product product-widget">
										<div class="product-thumb">
											<img src="{{ asset('uploads/admin/products')}}/{{$product['options']['image']}}" alt="">
										</div>
										<div class="product-body">
											@if(!empty($product['options']['sale']))

												<?php $price_new = ( $product['price']*(100-$product['options']['sale']))/100; ?>
												<h3 class="product-price"><?php echo number_format($price_new) .'đ' ?><span class="qty">&nbsp;x {{$product['qty']}}</span></h3>
												
											
											@else
												<h3 class="product-price"><?php echo number_format($product['price']) .'đ' ?>
												<span class="qty">&nbsp;x {{$product['qty']}}</span></h3>
											@endif
											<h2 class="product-name">
												<a href="{{route('detailProducts',[safe_title($product['name']), $product['id']])}}">
													{{ the_excerpt($product['name'], 30) }} 
		                                            @if(strlen($product['name'])  > 30) ... @endif 
		                                    	</a>
	                                    	</h2>
										</div>
										<a href="{{url('xoa-san-pham', $product['rowId'] )}}">
											<div class="cancel-btn"  style="margin-right: 10px;">
												<i class="fa fa-trash" title="Xóa"></i>
											</div>
										</a>
									</div>
								@endforeach
							@endif
						</div>
						
						<div class="shopping-cart-btns">
							<a href="{{url('gio-hang.html')}}"><button class="main-btn">Giỏ hàng</button></a>
							<a href="{{url('thanh-toan.html')}}"><button class="primary-btn">Thanh toán <i class="fa fa-arrow-circle-right"></i></button></a>
						</div>
						
					</div>
				</div>
			</li>
			
			<!-- /Cart -->

			<!-- Mobile nav toggle-->
			<li class="nav-toggle">
				<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
			</li>
			<!-- / Mobile nav toggle -->
		</ul>
	</div>
	<!-- Form Login -->
	<div class="modal fade" id="login">
	    <div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Đăng Nhập</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="body">
					<form role="form" action="{{ url('login')}}" method="post"  enctype="multipart/form-data">
		        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		        		<div class="form-group col-md-12 col-sm-12 col-xs-12 pdt-30">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Email <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('email')) has-error @endif">
								<input class="input" type="email" required="required" name="email"  value="{{ old('email')}}" placeholder="Email đăng nhập">
								<span class="text-danger"><p>{{ $errors->first('email') }}</p></span>
							</div>
						</div>
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Mật Khẩu <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('password')) has-error @endif">
								<input class="input" type="password" required="required" name="password"  value="{{ old('password')}}" placeholder="Mật khẩu đăng nhập">
								<span class="text-danger"><p>{{ $errors->first('password') }}</p></span>
							</div>
						</div>

						<div class="form-group col-md-12 col-sm-12 col-xs-12">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                            
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('password')) has-error @endif">
								<button id="btn-submit" type="submit" class="btn btn-primary btn-submit">Submit</button>
							</div>
						</div>
	        		</form>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
				</div>
			</div>
	    </div>
	</div>
	<!-- End Form Login -->

	<!-- Form Register -->
	<div class="modal fade" id="register">
	    <div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Đăng Ký</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="body">
					<form role="form" action="{{ url('register')}}" method="post"  enctype="multipart/form-data">
		        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		        		<div class="form-group col-md-12 col-sm-12 col-xs-12 pdt-30">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Email <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('email')) has-error @endif">
								<input class="input" type="email" name="email" required="required" value="{{ old('email')}}" placeholder="Email đăng nhập">
								<span class="text-danger"><p>{{ $errors->first('email') }}</p></span>
							</div>
						</div>
						<div class="form-group col-md-12 col-sm-12 col-xs-12 ">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Họ và tên <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('name')) has-error @endif">
								<input class="input" type="text" name="name" required="required"  value="{{ old('name')}}" placeholder="Nguyen Van A">
								<span class="text-danger"><p>{{ $errors->first('name') }}</p></span>
							</div>
						</div>
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Mật Khẩu <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('password')) has-error @endif">
								<input class="input" type="password" required="required" name="password"  value="{{ old('password')}}" placeholder="Mật khẩu đăng nhập">
								<span class="text-danger"><p>{{ $errors->first('password') }}</p></span>
							</div>
						</div>

						<div class="form-group col-md-12 col-sm-12 col-xs-12">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Nhập Lại Mật Khẩu <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('rpassword')) has-error @endif">
								<input class="input" type="password" name="rpassword" required="required"  value="{{ old('rpassword')}}" placeholder="Mật khẩu đăng nhập">
								<span class="text-danger"><p>{{ $errors->first('rpassword') }}</p></span>
							</div>
						</div>

						<div class="form-group col-md-12 col-sm-12 col-xs-12 ">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Địa chỉ  <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('address')) has-error @endif">
								<input class="input" type="text" name="address" required="required"  value="{{ old('address')}}" placeholder="">
								<span class="text-danger"><p>{{ $errors->first('address') }}</p></span>
							</div>
						</div>

						<div class="form-group col-md-12 col-sm-12 col-xs-12 ">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Số điện thoại  <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('phone')) has-error @endif">
								<input class="input" type="number" name="phone" minlength="10"  required="required"  value="{{ old('phone')}}" placeholder="">
								<span class="text-danger"><p>{{ $errors->first('phone') }}</p></span>
							</div>
						</div>

						<div class="form-group col-md-12 col-sm-12 col-xs-12 ">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Ngày sinh  <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('birthday')) has-error @endif">
								<input class="input" type="date" name="birthday"  value="{{ old('birthday')}}" placeholder="">
								<span class="text-danger"><p>{{ $errors->first('birthday') }}</p></span>
							</div>
						</div>

						<div class="form-group col-md-12 col-sm-12 col-xs-12 ">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                             <label for="exampleInputEmail1">Giới tính <span class="obligatory">*</span></label>
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('sex')) has-error @endif">
								<input type="radio" name="sex" value="1" {{ old('sex') == 1 ? 'checked' : ''}}> Nam &nbsp;
								<input type="radio" name="sex" value="2" {{ old('sex') == 2 ? 'checked' : ''}}> Nữ
								<span class="text-danger"><p>{{ $errors->first('sex') }}</p></span>
							</div>
						</div>

						<div class="form-group col-md-12 col-sm-12 col-xs-12">
		        			<div class="col-md-3 col-sm-6 col-xs-12 ">
	                        </div>
	                        <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('password')) has-error @endif">
								<button id="btn-submit" type="submit" class="btn btn-primary btn-submit">Submit</button>
							</div>
						</div>
	        		</form>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
				</div>
			</div>
	    </div>
	</div>
	<!-- End Form Register -->

    <!-- update info user  -->
    <div class="modal fade" id="update-user">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhật thông tin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="body">
                    @if(Session::has('users'))
                        <?php
                            $user =  Session::get('users');
                        ?>
                    <form role="form" action="{{ url('update-info-user',$user['id'])}}" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 pdt-30">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1">Email <span class="obligatory">*</span></label>
                            </div>
                            <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('email')) has-error @endif">
                                <input class="input" readonly="readonly" type="email" name="email" required="required" value="{{ old('email', isset($user)?$user['email']:'')}}">
                                <span class="text-danger"><p>{{ $errors->first('email') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1">Họ và tên <span class="obligatory">*</span></label>
                            </div>
                            <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('name')) has-error @endif">
                                <input class="input" type="text" name="name" required="required"  value="{{ old('name', isset($user)?$user['name']:'')}}">
                                <span class="text-danger"><p>{{ $errors->first('name') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1">Địa chỉ  <span class="obligatory">*</span></label>
                            </div>
                            <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('address')) has-error @endif">
                                <input class="input" type="text" name="address" required="required"  value="{{ old('address', isset($user)?$user['address']:'')}}">
                                <span class="text-danger"><p>{{ $errors->first('address') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1">Số điện thoại  <span class="obligatory">*</span></label>
                            </div>
                            <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('phone')) has-error @endif">
                                <input class="input" type="number" name="phone" required="required"  value="{{ old('phone', isset($user)?$user['phone']:'')}}" placeholder="">
                                <span class="text-danger"><p>{{ $errors->first('phone') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1">Ngày sinh  <span class="obligatory">*</span></label>
                            </div>
                            <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('birthday')) has-error @endif">
                                <input class="input" type="date" name="birthday"  value="{{ old('birthday', isset($user)?$user['birthday']:'')}}" placeholder="">
                                <span class="text-danger"><p>{{ $errors->first('birthday') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1">Giới tính <span class="obligatory">*</span></label>
                            </div>
                            <div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('sex')) has-error @endif">
                                <input type="radio" name="sex" value="1" {{ $user['sex'] == 1 ? 'checked' : ''}}> Nam &nbsp;
                                <input type="radio" name="sex" value="2" {{ $user['sex'] == 2 ? 'checked' : ''}}> Nữ
                                <span class="text-danger"><p>{{ $errors->first('sex') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                            </div>
                            <div class=" form-group  col-md-9 col-sm-9 col-xs-12">
                                <button id="btn-submit" type="submit" class="btn btn-primary btn-submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- update info user -->

	<div class="modal fade" id="change-pass">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Thay Đổi Mật Khẩu</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="body">
					<form role="form" action="{{ url('change-password', $user['id'] )}}" method="post"  enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group col-md-12 col-sm-12 col-xs-12 pdt-30">
							<div class="col-md-3 col-sm-6 col-xs-12 ">
								<label for="exampleInputEmail1">Nhập mật khẩu cũ <span class="obligatory">*</span></label>
							</div>
							<div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('old_password')) has-error @endif">
								<input class="input" type="password" required="required" name="old_password"  value="{{ old('old_password')}}" placeholder="Nhập mật khẩu cũ">
								<span class="text-danger"><p>{{ $errors->first('old_password') }}</p></span>
							</div>
						</div>

						<div class="form-group col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-3 col-sm-6 col-xs-12 ">
								<label for="exampleInputEmail1">Nhập mật khẩu mới <span class="obligatory">*</span></label>
							</div>
							<div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('password')) has-error @endif">
								<input class="input" type="password" required="required" name="password"  value="{{ old('password')}}" placeholder="Nhập mật khẩu mới">
								<span class="text-danger"><p>{{ $errors->first('password') }}</p></span>
							</div>
						</div>

						<div class="form-group col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-3 col-sm-6 col-xs-12 ">
								<label for="exampleInputEmail1">Nhập Lại Mật Khẩu <span class="obligatory">*</span></label>
							</div>
							<div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('rpassword')) has-error @endif">
								<input class="input" type="password" name="rpassword" required="required"  value="{{ old('rpassword')}}" placeholder="Mật khẩu đăng nhập">
								<span class="text-danger"><p>{{ $errors->first('rpassword') }}</p></span>
							</div>
						</div>
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-3 col-sm-6 col-xs-12 ">
							</div>
							<div class=" form-group  col-md-9 col-sm-9 col-xs-12 @if($errors->first('password')) has-error @endif">
								<button id="btn-submit" type="submit" class="btn btn-primary btn-submit">Submit</button>
							</div>
						</div>
					</form>
					@endif
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>