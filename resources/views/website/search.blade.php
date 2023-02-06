@extends('website.index')
@section('title', 'Tìm kiếm')
@section('show', 'show-on-click')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="{{url('/')}}">Trang chủ</a></li>
			<li class="active">Sản phẩm</li>
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
			@include('website.template.product-buyed')
			<!-- /ASIDE -->

			<!-- MAIN -->
			<div id="main" class="col-md-9">
				<!-- store top filter -->
					<div class="store-filter clearfix">
					</div>
					<!-- /store top filter -->
				<!-- STORE -->
				<div id="store">
					<!-- row -->
					<div class="row">
						<!-- Product Single -->
						@if(!empty($dataSearch))
							@foreach($dataSearch as $product)
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
											<a href="{{url('mua-hang', $product->id)}}"><div class="product-btns">
												<!--<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào Giỏ</button>-->
											</div></a>
										</div>
									</div>
								</div>
								<!-- /Product Single -->						
								<div class="clearfix visible-sm visible-xs"></div>
							@endforeach
						@endif
					</div>
					<!-- /row -->
				</div>
				<!-- /STORE -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<div class="pull-right">
						{!! $dataSearch -> links()!!}
					</div>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /MAIN -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
@endsection