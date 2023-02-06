@extends('website.index')
@section('title', 'Tin Tức')
@section('show', 'show-on-click')

@section('content')
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ url('/')}}">Trang chủ</a></li>
				<li><a href="{{url('/tin-tuc.html')}}">Tin tức</a></li>

				@if(isset($nameCate)) 
				<li><a href="">{{$nameCate->name}}</a></li>
				@endif
			</ul>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<div class="row">
				@include('website.template.category-new')
				<div class="col-md-9">
					<div class="section-title store-filter">
						<h2 class="title"></h2>
					</div>
				</div>
				<div class="col-md-9">
					<div class="product-tab mgt-0">
						@foreach($news as $val)
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<a class="banner banner-1" href="#">
									<img src="{{ asset('uploads/admin/news')}}/{{$val->image}}" alt="">
								</a>
							</div>
							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
								<a href="{{route('detailNew',[safe_title($val->title), $val->id ])}}"><h5 class="title mgt-15">{{$val->title}}</h5></a>
								<div class="info">
									{{$val->info}}
								</div>
								<div class="footer">
									<div class="new-left"> 
										<i>Đăng ngày : <?php echo date_format($val->created_at, "Y/m/d") ?></i>
										<i> </i>
									</div>
									<div class="new-right">
										<a class="news-right" href="{{route('detailNew',[safe_title($val->title), $val->id ])}}"> Xem tiếp >> </a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection