
<div id="aside" class="col-md-3">	
	<!-- aside widget -->
	<div class="aside">
		<h3 class="aside-title">Danh mục tin tức</h3>
		<!-- widget product -->
		<div class="category-nav" style="border-top: 1px solid #DADADA;">
			<ul class="category-list" style="position:unset !important;">
				@foreach($categoryNew as $category)
				<li><a href="{{route('newCategories',[safe_title($category['name']), $category['id'] ])}}">{{$category['name']}}</a></li>
				@endforeach
			</ul>
		</div>
		<!-- /widget product -->
	</div>
	<!-- /aside widget -->
</div>