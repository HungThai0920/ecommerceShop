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
				<li><a href="" title="{{$news->title}}">
					{{ the_excerpt($news->title, 60) }} 
                    @if(strlen($news->title)  > 60) ... @endif 
				</a></li>
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
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h3>{{$news->title}}</h3>
						<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
							<a class="banner banner-1 img-new" href="#">
								<img src="{{ asset('uploads/admin/news')}}/{{$news->image}}" alt="">
							</a>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="info">
								{{$news->info}}
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="info">
								{!!$news->content!!}
							</div>
						</div>
						<div class="footer">
							<div class="new-left"> 
								<i>Đăng ngày : <?php echo date_format($news->created_at, "Y/m/d") ?></i>
								<i> </i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection