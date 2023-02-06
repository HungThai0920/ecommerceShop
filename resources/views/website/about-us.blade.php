@extends('website.index')
@section('title', 'Giới thiệu')
@section('show', 'show-on-click')

@section('content')
	<div class="section">
		<div class="container">
            @foreach($abouts as $item)
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">{{$item->title}}</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="product-tab">
						<div class="tab-content">
							<div id="tab1" class="tab-pane fade in active">
								{!! $item->content !!}
							</div>
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
@endsection