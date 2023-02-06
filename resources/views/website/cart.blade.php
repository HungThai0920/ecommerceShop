@extends('website.index')
@section('title', 'Giỏ hàng')
@section('show', 'show-on-click')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="{{url('/')}}">Trang chủ</a></li>
			<li class="active">Giỏ hàng</li>
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
				<form id="checkout-form" class="clearfix" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Giỏ Hàng</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th width="5%"></th>
										<th>Ảnh</th>
										<th>Tên sản phẩm</th>
										<th class="text-center">Giá</th>
										<th class="text-center">Số lượng</th>
										<th class="text-center">Tổng tiền</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php $total_price = []; ?>
									@if(!empty($content))
										@foreach($content as $product)
											<tr>
												<td><input type="checkbox" class="check_auto rowProduct_{{$product['id']}}" {{ $product['options']['flagUpdate'] == 1 ? 'checked="checked"' : '' }} rowId ="{{$product['rowId']}}" idProduct="{{$product['id']}}"></td>
												<td class="thumb">
													<img src="{{ asset('uploads/admin/products')}}/{{$product['options']['image']}}" alt="">
												</td>
												
												<td class="details">
													<a href="{{route('detailProducts',[safe_title($product['name']), $product['id']])}}">
														{{ the_excerpt($product['name'], 50) }} 
			                                            @if(strlen($product['name'])  > 50) ... @endif 
			                                            
		                                        	</a>
												</td>
												<td class="price text-center">
													
													
													@if(!empty($product['options']['sale']))

														<?php $price_new = ( $product['price']*(100-$product['options']['sale']))/100; ?>
														<strong><?php echo number_format($price_new) .'đ' ?></strong>
														<br><del class="font-weak"><?php echo number_format($product['price']) .'đ' ?></del>
													@else
														<strong>
															<?php echo number_format($product['price']) .'đ' ?>
														</strong>
													@endif
												</td>
												<td class="qty text-center">
													<input class="input" name="qty_cart[]" type="number" min="1" value="{{$product['qty']}}">
												</td>
												<td class="total text-center">
													<strong class="primary-color">
														@if(!empty($product['options']['sale']))
															<?php
															$price_new = ( $product['price']*(100-$product['options']['sale']))/100;
															echo number_format($price_new * $product['qty']) .'đ';
															?>

														@else
															<?php
															echo number_format($product['price']* $product['qty'] ) .'đ';
															?>
														@endif
														@if($product['options']['flagUpdate'] == 1)
															@if(!empty($product['options']['sale']))
																<?php
																	$price_new = ( $product['price']*(100-$product['options']['sale']))/100;
																	$total_price[] = $price_new * $product['qty'];
																?>

															@else
																<?php
																	$total_price[] = $product['price']* $product['qty'];
																?>
															@endif
														@endif
													</strong>
												</td>
												<td class="text-right">
													<button row_id = "{{$product['rowId']}}" class="main-btn icon-btn update_cart">
														<i class="fa fa-fw fa-refresh" title="Cập nhật"></i>
													</button>
													<a href="{{url('xoa-san-pham', $product['rowId'] )}}">
														<div class="main-btn icon-btn">
															<i class="fa fa-fw fa-trash-o" title="Xóa"></i>
														</div>
													</a>

												</td>
											</tr>
										@endforeach
									@endif
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5" style="text-align: center">Tổng đơn hàng</th>
										<th colspan="2" class="total total_delete_check">
											<?php 
												$total =  array_sum($total_price);
												echo number_format($total).'đ';
												Session::put('total_price',$total);
											?>
												
										</th>
									</tr>
								</tfoot>
							</table>
							<div class="pull-right">
								<a href="{{url('thanh-toan.html')}}" class="payment-cart"><div class="primary-btn">Thanh toán</div></a>
							</div>
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