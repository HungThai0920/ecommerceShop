
@if(!empty($slides))
	@foreach($slides as $slide)
		<a href="{{URL::to('/san-pham.html')}}">
		<div class="banner banner-1">
			<img src="{{ asset('uploads/admin/slides')}}/{{$slide['image']}}" alt="">
			<div class="banner-caption text-center">
				<!-- <h1>{{$slide['name']}}</h1> -->
			</div>
		</div>
		</a>
		<!-- /banner -->
	@endforeach
@endif