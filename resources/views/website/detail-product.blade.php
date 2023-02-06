@extends('website.index')
@section('title', 'Sản phẩm')
@section('show', 'show-on-click')

@section('content')
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="{{ asset('uploads/admin/products')}}/{{$detailProduct->image}}" alt="" height="450">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<div class="product-label">
								@if(!empty($detailProduct['sale']))
									<span class="sale">-{{$detailProduct['sale']}}%</span>
								@endif
							</div>
							<h2 class="product-name" title="{{$detailProduct['name']}}">
								{{ the_excerpt($detailProduct['name'], 60) }} 
                                @if(strlen($detailProduct['name'])  > 60) ... @endif 
                            </h2>
                            <br>
							@if(!empty($detailProduct['sale']))

								<?php $price_new = ( $detailProduct['price']*(100-$detailProduct['sale']))/100; ?>
								<h3 class="product-price"><?php echo number_format($price_new) .'đ' ?>
									<del class="product-old-price"><?php echo number_format($detailProduct['price']) .'đ' ?></del>
								</h3>
							@else
								<h3 class="product-price"><?php echo number_format($detailProduct['price']) .'đ' ?>
								</h3>
							@endif
							
							@if(!empty($detailProduct['warranty']))
								<p><strong>Bảo hành :  </strong>
								{{$detailProduct['warranty']}} </p> 
							@endif

							@if($detailProduct['total'] > 0)
							<p><strong> Số lượng :</strong> {{$detailProduct['total']}} {{$detailProduct['unit']}} </p>
							@endif

							<p>
								{!!$detailProduct['description']!!}
							</p>
							<div class="product-options">
								<p>
									<strong>Tình trạng :  
										@if($detailProduct['total'] > 0)
											 <i class="icon fa fa-check " id="icon-check" style=" font-style: 18px; color: #00AA00"> Còn hàng </i>
										@else
											<i class="icon fa fa-ban" id="icon-ban" style=" font-style: 18px; color: #990000"> Hết hàng</i>
										@endif
									</strong>
								</p> 
							</div>

							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">QTY: </span>
									<input class="input-qty" type="number" min="1" max="{{$detailProduct['total']}}" value="1" style="text-align: center;">
								</div>
								<a href="{{url('mua-hang', $detailProduct['id'])}}" class="btn-add-cart"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào Giỏ</button></a>
							</div>
							<div class="product-options" style="margin-top: 20px">
								@if($detailProduct['total'] <= 0)
									<a style="color: #0f9ed8" class="deposit">Vui lòng nhấp vào nếu bạn có nhu cầu đặt trước sản phẩm ? </a>
									<input type="hidden" id="flag" value="0" >
									<div class="product-btns info-deposit" style="display: none;">
										<div class="form-group" style="margin-top: 20px">
											<label for="exampleInputEmail1" style="margin-bottom: 15px">Ngày tháng giao hàng</label>
											<div class="form-group" style="width: 60%">
												<input type="date" class="form-control delivery_date" >
											</div>

											<span class="messageError" style="color: red;"></span>
										</div>
										<div class="form-group" style="margin-top: 20px">
											<label for="notification">
												<input type="radio" name="notification" class="notification"  id="notification" value="1" > Thông báo cho tối nếu giao hàng trước dự kiến !
											</label>
										</div>

										<div class="form-group" style="margin-top: 10px">
											<label for="notification_2">
												<input type="radio" name="notification" class="notification"  id="notification_2" value="2" > Giao hàng đúng ngày dự kiến !
											</label>
										</div>
									</div>
								@endif
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Hình ảnh mô tả</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									{!! $detailProduct['content'] !!}
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm liên quan</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@if(!empty($products))
					@foreach($products as $product)
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<!-- <span>New</span> -->
										@if(!empty($product->sale))
											<span class="sale">-{{$product->sale}}%</span>
										@endif
									</div>
									<a href="{{route('detailProducts',[safe_title($product['name']), $product['id']])}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem Ngay</button>
									</a>
									<img src="{{ asset('uploads/admin/products')}}/{{$product->image}}" alt="">
								</div>
								<div class="product-body">
									@if(!empty($product->sale))

										<?php $price_new = ( $product->price*(100-$product->sale))/100; ?>
										<h3 class="product-price"><?php echo number_format($price_new) .'đ' ?>
											<del class="product-old-price"><?php echo number_format($product->price) .'đ' ?></del>
										</h3>
									@else
										<h3 class="product-price"><?php echo number_format($product->price) .'đ' ?>
										</h3>
									@endif
									<h2 class="product-name">
										<a href="{{route('detailProducts',[safe_title($product['name']), $product['id']])}}" title="{{$product['name']}}">
											{{ the_excerpt($product->name, 50) }}
											@if(strlen($product->name)  > 50) ... @endif
										</a>
									</h2>
									<a href="{{url('mua-hang', $product['id'])}}" class="btn-add-cart"><div class="product-btns">
											<!--<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào Giỏ</button>-->
										</div></a>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<div class="clearfix visible-sm visible-xs"></div>
					@endforeach
				@endif
				<!-- /Product Single -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
@endsection