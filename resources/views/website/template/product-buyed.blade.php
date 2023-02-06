<div id="aside" class="col-md-3">	
	<!-- aside widget -->
	<div class="aside">
		<h3 class="aside-title">Sản phẩm bán chạy</h3>
		<!-- widget product -->
		@foreach($productBuyed as $product)
			<div class="product product-widget">
				<div class="product-thumb">
					<img src="{{ asset('uploads/admin/products')}}/{{$product->image}}" alt="">
				</div>
				<div class="product-body">
					<h2 class="product-name">
						<a href="{{route('detailProducts',[safe_title($product['name']), $product['id']])}}" title="{{$product['name']}}">
							{{ the_excerpt($product['name'], 50) }} 
                            @if(strlen($product['name'])  > 50) ... @endif 
                        </a>
					</h2>
					@if(!empty($product['sale']))

						<?php $price_new = ( $product['price']*(100-$product['sale']))/100; ?>
						<h3 class="product-price"><?php echo number_format($price_new) .'đ' ?>
							<del class="product-old-price"><?php echo number_format($product['price']) .'đ' ?></del>
						</h3>
					@else
						<h3 class="product-price"><?php echo number_format($product['price']) .'đ' ?>
						</h3>
					@endif
				</div>
			</div>
		@endforeach
		<!-- /widget product -->
	</div>
	<!-- /aside widget -->
</div>