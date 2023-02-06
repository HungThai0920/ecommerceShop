<?php $dataCate = Session::get('dataCate');  ?>

<span class="category-header">Danh Mục Sản Phẩm <i class="fa fa-list"></i></span>
<ul class="category-list">
	@foreach($categorys as $cate)
	<li class="dropdown side-dropdown">
		<a  @if(!empty($cate['sub'])) class="dropdown-toggle" data-toggle="dropdown" @else href="{{route('categoryProduct',[safe_title($cate['name']), $cate['id'] ])}}" @endif >
			{{ $cate['name']}}

			@if(!empty($cate['sub']))
				<i class="fa fa-angle-right"></i>
			@endif
		</a>
		@if(!empty($cate['sub']))
			<div class="custom-menu">
				<div class="row">
					<?php
						if(count($cate['sub']) >8) {

							$subCate = array_chunk($cate['sub'],8);
					?>
						@foreach($subCate as $sub)
							<div class="col-md-4">
								<ul class="list-links">
									@foreach($sub as $value)
									<li><a href="{{route('categoryProduct',[safe_title($value['name']), $value['id'] ])}}">{{ $value['name'] }}</a></li>
									@endforeach
								</ul>
								<hr class="hidden-md hidden-lg">
							</div>
						@endforeach

					<?php
						} else {
					?>
						<div class="col-md-4">
							<ul class="list-links">
								@foreach($cate['sub'] as $value)
								<li><a href="{{route('categoryProduct',[safe_title($value['name']), $value['id'] ])}}">{{ $value['name'] }}</a></li>
								@endforeach
							</ul>
							<hr class="hidden-md hidden-lg">
						</div>
					<?php
						}
						
					?>
			
				</div>
			</div>
		@endif

	</li>
	@endforeach
</ul>