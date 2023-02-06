@extends('website.index')
@section('title', 'Thế giới cây cảnh online')

@section('content')
	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<!-- banner -->
						@include('website.template.banner')
					<!-- /banner -->
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	{{--<!-- section -->--}}
	{{--<div class="section">--}}
		{{--<!-- container -->--}}
		{{--<div class="container">--}}
			{{--<!-- row -->--}}
			{{--<div class="row">--}}
				{{--@include('website.template.partem')--}}
			{{--</div>--}}
			{{--<!-- /row -->--}}
		{{--</div>--}}
		{{--<!-- /container -->--}}
	{{--</div>--}}
	{{--<!-- /section -->--}}

	<!-- section -->
	<div>
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản Phẩm Bán Chạy</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- Product Slick -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div id="" class="product">
							<!-- Product Single -->
							@if(!empty($productsHot))
								@foreach($productsHot as $product)
									<div class="col-md-3 col-sm-6 col-xs-6">
										<div class="product product-single">
											<div class="product-thumb">
												<div class="product-label">
													<!-- <span>New</span> -->
													@if(!empty($product['sale']))
														<span class="sale">-{{$product['sale']}}%</span>
													@endif
												</div>

												<a href="{{route('detailProducts',[safe_title($product['name']), $product['id']])}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem Ngay</button></a>
												<img src="{{ asset('uploads/admin/products')}}/{{$product['image']}}" alt="">
											</div>
											<div class="product-body">
												@if(!empty($product['sale']))

												<?php $price_new = ( $product['price']*(100-$product['sale']))/100; ?>
												<h3 class="product-price"><?php echo number_format($price_new) .'đ' ?>
													<del class="product-old-price"><?php echo number_format($product['price']) .'đ' ?></del>
												</h3>
												@else
													<h3 class="product-price"><?php echo number_format($product['price']) .'đ' ?>
													</h3>
												@endif
												<h2 class="product-name">
													<a href="{{route('detailProducts',[safe_title($product['name']), $product['id']])}}">
														{{ the_excerpt($product['name'], 50) }} 
			                                            @if(strlen($product['name'])  > 50) ... @endif 
			                                        </a>
			                                    </h2>
												<a href="{{url('mua-hang', $product['id'])}}" class="btn-add-cart"><div class="product-btns">
													<!--<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào Giỏ </button>-->
												</div></a>
											</div>
										</div>
									</div>
								@endforeach
							@endif
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			@if(isset($dataCate) && !empty($dataCate))
				@foreach($dataCate as $key => $cate)
					@if(!empty($cate->subCate))
						<div class="row">
						<!-- section title -->
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">{{$cate->name}}</h2>
							</div>
						</div>
						<!-- section title -->

						<!-- Product Single -->
						@foreach($cate->subCate as $product)
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<!-- <span>New</span> -->
										@if(!empty($product['sale']))
											<span class="sale">-{{$product['sale']}}%</span>
										@endif
									</div>
									<a href="{{route('detailProducts',[safe_title($product['name']), $product['id']])}}">
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i>Xem Ngay</button>
									</a>
									<img src="{{ asset('uploads/admin/products')}}/{{$product['image']}}" alt="">
								</div>
								<div class="product-body">
									@if(!empty($product['sale']))

									<?php $price_new = ( $product['price']*(100-$product['sale']))/100; ?>
									<h3 class="product-price"><?php echo number_format($price_new) .'đ' ?>
										<del class="product-old-price"><?php echo number_format($product['price']) .'đ' ?></del>
									</h3>
									@else
										<h3 class="product-price"><?php echo number_format($product['price']) .'đ' ?>
										</h3>
									@endif
									<h2 class="product-name">
										<a href="{{route('detailProducts',[safe_title($product['name']), $product['id']])}}" title="{{$product['name']}}">
											{{ the_excerpt($product['name'], 50) }}
											@if(strlen($product['name'])  > 50) ... @endif
										</a>
									</h2>
									<a href="{{url('mua-hang', $product['id'])}}" class="btn-add-cart"><div class="product-btns">
										<!--<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>-->
									</div></a>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /Product Single -->

					</div>
					@endif
				@endforeach
			@endif
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection