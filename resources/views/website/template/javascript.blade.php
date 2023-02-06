<script src="{{ asset('/js/jquery.min.js')}}"></script>
<script src="{{ asset('/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/js/slick.min.js')}}"></script>
<script src="{{ asset('/js/nouislider.min.js')}}"></script>
<script src="{{ asset('/js/jquery.zoom.min.js')}}"></script>
<script src="{{ asset('/js/main.js')}}"></script>
<script src="{{ asset('/js/custom.js')}}"></script>
<script>
	var url_base = "{{ url('/') }}";

	$('.fa-shopping-cart').click(function () {
        var cart =  '{{url('gio-hang.html')}}';

        window.location.href = cart;
    });
</script>

@if (Session::has('error') && ($message = Session::get('error'))) 
    <script>
    	alert('{{$message}}');
    </script>
@elseif (Session::has('success') && ($message = Session::get('success'))) 
    <script>
    	alert('{{$message}}');
    </script>
@endif

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2"></script>
